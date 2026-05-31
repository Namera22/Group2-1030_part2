
<?php
session_start();
$pageTitle = "HR Manager | Smart City Infrastructure Consultancy";
$pageDescription = "HR manager dashboard for Smart City Infrastructure Consultancy.";
$pageKeywords = "HR manager, dashboard, Smart City Infrastructure Consultancy";
$pageAuthor = "Group 2";
$pageStyles = ["global-style.css", "manage-style.css"];

// Guard - redirect to login if not logged in
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}
 //EOI management is only available to administrators.
if (($_SESSION['role'] ?? '') !== 'admin') {
    header("Location: index.php");
   exit();
}

require_once('settings.php');

// Establish database connection
$conn = mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("<p style='color:red;'>Database connection failure: " . mysqli_connect_error() . "</p>");
}

$table = "eoi";
$msg = "";
$msg_type = "success";

//Handle POST Actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $action = isset($_POST['action']) ? $_POST['action'] : '';

    if ($action === 'update_status') {
        $EOInumber = (int) $_POST['EOInumber'];
        $new_status = trim($_POST['status'] ?? '');

        if ($EOInumber > 0 && in_array($new_status, ['NEW', 'CURRENT', 'FINAL'])) {
            $update_query = "UPDATE $table SET status = '$new_status' WHERE EOInumber = $EOInumber";
            if (mysqli_query($conn, $update_query)) {
                $msg = "Status updated to '$new_status' for EOI #$EOInumber.";
            } else {
                $msg = "Error updating status: " . mysqli_error($conn);
                $msg_type = "error";
            }
        } else {
            $msg = "Invalid EOI ID or status value.";
            $msg_type = "error";
        }

    } elseif ($action === 'delete_job_ref') {
        $delete_ref = mysqli_real_escape_string($conn, trim($_POST['delete_job_reference'] ?? ''));

        if (!empty($delete_ref)) {
            $delete_query = "DELETE FROM $table WHERE job_reference = '$delete_ref'";
            if (mysqli_query($conn, $delete_query)) {
                $deleted_rows = mysqli_affected_rows($conn);
                if ($deleted_rows > 0) {
                    $msg = "Deleted $deleted_rows EOI record(s) with Job Reference '$delete_ref'.";
                } else {
                    $msg = "No records found with Job Reference '$delete_ref'.";
                    $msg_type = "error";
                }
            } else {
                $msg = "Delete failed: " . mysqli_error($conn);
                $msg_type = "error";
            }
        } else {
            $msg = "Please enter a Job Reference to delete.";
            $msg_type = "error";
        }
    }
}


//Build SELECT query with optional filters
$where_clauses = [];

if (!empty($_GET['search_job_ref'])) {
    $search_job_ref = mysqli_real_escape_string($conn, trim($_GET['search_job_ref']));
    $where_clauses[] = "job_reference LIKE '%$search_job_ref%'";
}

if (!empty($_GET['search_name'])) {
    $search_name = mysqli_real_escape_string($conn, trim($_GET['search_name']));
    $where_clauses[] = "(first_name LIKE '%$search_name%' OR last_name LIKE '%$search_name%' OR CONCAT(first_name, ' ', last_name) LIKE '%$search_name%')";
}

$query = "SELECT * FROM $table";
if (!empty($where_clauses)) {
    $query .= " WHERE " . implode(" AND ", $where_clauses);
}

//Sort field and direction
$allowed_sorts = ['EOInumber', 'job_reference', 'first_name', 'last_name', 'status'];
$sort_field = 'EOInumber';
if (!empty($_GET['sort_by']) && in_array($_GET['sort_by'], $allowed_sorts)) {
    $sort_field = $_GET['sort_by'];
}

$sort_dir = 'ASC';
if (!empty($_GET['sort_dir']) && $_GET['sort_dir'] === 'DESC') {
    $sort_dir = 'DESC';
}

$query .= " ORDER BY $sort_field $sort_dir";

$result = mysqli_query($conn, $query);
$row_count = $result ? mysqli_num_rows($result) : 0;


?>

<?php include 'header.inc'; ?>

<?php include 'nav.inc'; ?>

    <main id="maincontent" style="max-width:1100px; margin: 8em auto 3em; padding: 0 2em;">

        <h1 style="color:#0a1628;">HR Manager Dashboard</h1>
        <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>.
            <a href="logout.php">Logout</a>
        </p>

        <!-- Action Notification Banner -->
        <?php if (!empty($msg)): ?>
            <div class="status-alert" style="<?php echo $msg_type === 'error' ? 'background:#fee2e2; color:#991b1b; border-left:4px solid #dc2626;' : ''; ?>">
                <?php echo htmlspecialchars($msg); ?>
            </div>
        <?php endif; ?>

        <div class="hr-dashboard-grid">

            <!-- SEARCH / FILTER / SORT FORM -->
            <div class="dashboard-card">
                <h3>Search, Filter &amp; Sort EOIs</h3>
                <form action="manage.php" method="GET" class="form-inline">

                    <div class="form-group">
                        <label for="search_job_ref">Job Reference</label>
                        <input type="text" name="search_job_ref" id="search_job_ref"
                               placeholder="e.g. UX123"
                               value="<?php echo isset($_GET['search_job_ref']) ? htmlspecialchars($_GET['search_job_ref']) : ''; ?>">
                    </div>

                    <div class="form-group">
                        <label for="search_name">Applicant Name</label>
                        <input type="text" name="search_name" id="search_name"
                               placeholder="First or last name..."
                               value="<?php echo isset($_GET['search_name']) ? htmlspecialchars($_GET['search_name']) : ''; ?>">
                    </div>

                    <div class="form-group">
                        <label for="sort_by">Sort By</label>
                        <select name="sort_by" id="sort_by">
                            <option value="EOInumber"        <?php if ($sort_field === 'EOInumber')        echo 'selected'; ?>>EOI ID</option>
                            <option value="job_reference" <?php if ($sort_field === 'job_reference') echo 'selected'; ?>>Job Reference</option>
                            <option value="first_name"    <?php if ($sort_field === 'first_name')    echo 'selected'; ?>>First Name</option>
                            <option value="last_name"     <?php if ($sort_field === 'last_name')     echo 'selected'; ?>>Last Name</option>
                            <option value="status"        <?php if ($sort_field === 'status')        echo 'selected'; ?>>Status</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="sort_dir">Direction</label>
                        <select name="sort_dir" id="sort_dir">
                            <option value="ASC"  <?php if ($sort_dir === 'ASC')  echo 'selected'; ?>>Ascending</option>
                            <option value="DESC" <?php if ($sort_dir === 'DESC') echo 'selected'; ?>>Descending</option>
                        </select>
                    </div>

                    <button type="submit" class="btn">Apply Filters</button>
                    <a href="manage.php" class="btn btn-secondary">Reset / List All</a>
                </form>
            </div>

            <!-- BULK DELETE INTERFACE -->
            <div class="dashboard-card" style="border-left: 4px solid #dc2626;">
                <h3 style="color: #dc2626;">Danger Zone: Bulk Delete</h3>
                <form action="manage.php" method="POST" class="form-inline"
                      onsubmit="return confirm('Are you sure you want to delete ALL EOIs matching this Job Reference? This cannot be undone.');">
                    <input type="hidden" name="action" value="delete_job_ref">
                    <div class="form-group">
                        <label for="delete_job_reference">Target Job Reference</label>
                        <input type="text" name="delete_job_reference" id="delete_job_reference" required
                               placeholder="e.g. UX123">
                    </div>
                    <button type="submit" class="btn btn-danger">Delete Matching EOIs</button>
                </form>
            </div>

            <!-- RESULTS TABLE -->
            <div class="dashboard-card">
                <h3>
                    Expressions of Interest
                    <span style="font-size:0.85em; font-weight:normal; color:#64748b;">
                        — <?php echo $row_count; ?> record<?php echo $row_count !== 1 ? 's' : ''; ?> found
                    </span>
                </h3>
                <div class="table-container">
                    <?php if ($row_count > 0): ?>
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>EOI ID</th>
                                    <th>Job Ref</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Contact Info</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                    <tr>
                                        <td><strong>#<?php echo htmlspecialchars($row['EOInumber']); ?></strong></td>
                                        <td><?php echo htmlspecialchars($row['job_reference']); ?></td>
                                        <td><?php echo htmlspecialchars($row['first_name'] . ' ' . $row['last_name']); ?></td>
                                        <td>
                                            <?php echo htmlspecialchars($row['address'] . ', ' . $row['suburbtown'] . ' ' . $row['state'] . ' ' . $row['postcode']); ?>
                                        </td>
                                        <td>
                                            <small>
                                                Email: <a href="mailto:<?php echo htmlspecialchars($row['email'] ?? ''); ?>">
                                                    <?php echo htmlspecialchars($row['email'] ?? 'N/A'); ?></a><br>
                                                Phone: <?php echo htmlspecialchars($row['phone'] ?? 'N/A'); ?>
                                            </small>
                                        </td>
                                        <td>
                                            <form action="manage.php" method="POST" style="margin:0;">
                                                <input type="hidden" name="action" value="update_status">
                                                <input type="hidden" name="EOInumber" value="<?php echo (int) $row['EOInumber']; ?>">
                                                <select name="status" class="select-status-inline"
                                                        onchange="this.form.submit()"
                                                        aria-label="Change status for EOI #<?php echo (int) $row['EOInumber']; ?>">
                                                    <option value="NEW"     <?php if ($row['status'] === 'NEW')     echo 'selected'; ?>>New</option>
                                                    <option value="CURRENT" <?php if ($row['status'] === 'CURRENT') echo 'selected'; ?>>Current</option>
                                                    <option value="FINAL"   <?php if ($row['status'] === 'FINAL')   echo 'selected'; ?>>Final</option>
                                                </select>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <p style="color:#64748b; font-style:italic;">No records found matching your filter criteria.</p>
                    <?php endif; ?>
                </div>
            </div>

        </div><!-- end .hr-dashboard-grid -->

    </main>

<?php
if ($result) mysqli_free_result($result);
mysqli_close($conn);
?>

<?php include 'footer.inc'; ?>