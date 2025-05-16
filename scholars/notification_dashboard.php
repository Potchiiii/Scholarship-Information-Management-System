<?php
include "./head.php";
require_once "../central_control.php";
include "./notification_service.php";

// Check if user is admin
if (!isset($_SESSION['email']) || !isset($_SESSION['password'])) {
    header('Location: ../login.php');
    exit;
}

$email = $_SESSION['email'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
$stmt->bindParam(':email', $email);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user['roles'] != 1 && $user['roles'] != 2) {
    header('Location: index.php');
    exit;
}

// Handle sending a manual notification
if (isset($_POST['send_notification'])) {
    $scholarship_id = $_POST['scholarship_id'];
    $notification_type = $_POST['notification_type'];
    $custom_message = $_POST['custom_message'];
    
    $result = send_scholarship_notification($notification_type, $scholarship_id, $custom_message);
    
    if ($result) {
        $success_message = 'Notification sent successfully!';
    } else {
        $error_message = 'Failed to send notification. Please check the logs.';
    }
}

// Get list of scholarships for the dropdown
$scholarships_stmt = $pdo->prepare("SELECT scholarshipID, name FROM scholarship ORDER BY name");
$scholarships_stmt->execute();
$scholarships = $scholarships_stmt->fetchAll(PDO::FETCH_ASSOC);

// Get notification statistics
$stats = [
    'total' => 0,
    'new_scholarship' => 0,
    'update' => 0,
    'recent' => []
];

// Check if the table exists first
$table_check = $pdo->query("SHOW TABLES LIKE 'notification_logs'");
if ($table_check->rowCount() > 0) {
    // Total notifications
    $total_stmt = $pdo->query("SELECT COUNT(*) as count FROM notification_logs");
    $total = $total_stmt->fetch(PDO::FETCH_ASSOC);
    $stats['total'] = $total['count'];
    
    // Count by type
    $type_stmt = $pdo->query("SELECT notification_type, COUNT(*) as count FROM notification_logs GROUP BY notification_type");
    $types = $type_stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($types as $type) {
        $stats[$type['notification_type']] = $type['count'];
    }
    
    // Recent notifications
    $recent_stmt = $pdo->query("
        SELECT nl.log_id, nl.notification_type, s.name, nl.recipients_count, nl.date_sent 
        FROM notification_logs nl
        JOIN scholarship s ON nl.scholarship_id = s.scholarshipID
        ORDER BY nl.date_sent DESC
        LIMIT 5
    ");
    $stats['recent'] = $recent_stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<body>
    <?php include "./controls.php";
    if ($roles == 3) {
        echo "<script>window.location.href='index.php'</script>";
    }
    ?>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php include "./sidebar.php"; ?>
            <div class="layout-page">
                <?php include "./topbar.php"; ?>
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4">
                            <span class="text-muted fw-light">Scholarship /</span> Notification Dashboard
                        </h4>
                        
                        <?php if (isset($success_message)): ?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <?php echo $success_message; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (isset($error_message)): ?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <?php echo $error_message; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        
                        <!-- Statistics Cards -->
                        <div class="row">
                            <div class="col-lg-4 col-md-12 col-6 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            <div class="avatar flex-shrink-0">
                                                <i class="fas fa-bell fa-2x text-primary"></i>
                                            </div>
                                        </div>
                                        <span class="fw-semibold d-block mb-1">Total Notifications</span>
                                        <h3 class="card-title mb-2"><?php echo $stats['total']; ?></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 col-6 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            <div class="avatar flex-shrink-0">
                                                <i class="fas fa-graduation-cap fa-2x text-success"></i>
                                            </div>
                                        </div>
                                        <span class="fw-semibold d-block mb-1">New Scholarship Notifications</span>
                                        <h3 class="card-title mb-2"><?php echo $stats['new_scholarship']; ?></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 col-6 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            <div class="avatar flex-shrink-0">
                                                <i class="fas fa-sync fa-2x text-warning"></i>
                                            </div>
                                        </div>
                                        <span class="fw-semibold d-block mb-1">Update Notifications</span>
                                        <h3 class="card-title mb-2"><?php echo $stats['update']; ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <!-- Send Notification Card -->
                            <div class="col-md-6 col-12 mb-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Send Manual Notification</h5>
                                    </div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="mb-3">
                                                <label for="scholarship_id" class="form-label">Select Scholarship</label>
                                                <select class="form-select" id="scholarship_id" name="scholarship_id" required>
                                                    <option value="">-- Select Scholarship --</option>
                                                    <?php foreach ($scholarships as $scholarship): ?>
                                                        <option value="<?php echo $scholarship['scholarshipID']; ?>">
                                                            <?php echo $scholarship['name']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="notification_type" class="form-label">Notification Type</label>
                                                <select class="form-select" id="notification_type" name="notification_type" required>
                                                    <option value="new_scholarship">New Scholarship</option>
                                                    <option value="update">Scholarship Update</option>
                                                </select>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="custom_message" class="form-label">Custom Message (Optional)</label>
                                                <textarea class="form-control" id="custom_message" name="custom_message" rows="4"></textarea>
                                                <div class="form-text">This message will be included in the notification email.</div>
                                            </div>
                                            
                                            <button type="submit" name="send_notification" class="btn btn-primary">Send Notification</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Recent Notifications Card -->
                            <div class="col-md-6 col-12 mb-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Recent Notifications</h5>
                                    </div>
                                    <div class="table-responsive text-nowrap">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Type</th>
                                                    <th>Scholarship</th>
                                                    <th>Recipients</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                <?php if (count($stats['recent']) > 0): ?>
                                                    <?php foreach ($stats['recent'] as $log): ?>
                                                        <tr>
                                                            <td>
                                                                <?php if ($log['notification_type'] == 'new_scholarship'): ?>
                                                                    <span class="badge bg-label-success">New</span>
                                                                <?php else: ?>
                                                                    <span class="badge bg-label-warning">Update</span>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td><?php echo $log['name']; ?></td>
                                                            <td><?php echo $log['recipients_count']; ?></td>
                                                            <td><?php echo date('M d, Y H:i', strtotime($log['date_sent'])); ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <tr>
                                                        <td colspan="4" class="text-center">No notifications sent yet</td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Notification Logs Table -->
                        <div class="card">
                            <h5 class="card-header">Notification History</h5>
                            <div class="table-responsive text-nowrap">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Type</th>
                                            <th>Scholarship</th>
                                            <th>Recipients</th>
                                            <th>Date & Time</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <?php
                                        // Check if the table exists first
                                        if ($table_check->rowCount() > 0) {
                                            $logs_stmt = $pdo->query("
                                                SELECT nl.log_id, nl.notification_type, s.name, nl.recipients_count, nl.date_sent 
                                                FROM notification_logs nl
                                                JOIN scholarship s ON nl.scholarship_id = s.scholarshipID
                                                ORDER BY nl.date_sent DESC
                                                LIMIT 20
                                            ");
                                            $logs = $logs_stmt->fetchAll(PDO::FETCH_ASSOC);
                                            
                                            if (count($logs) > 0) {
                                                foreach ($logs as $log) {
                                                    echo "<tr>";
                                                    echo "<td>{$log['log_id']}</td>";
                                                    echo "<td>";
                                                    if ($log['notification_type'] == 'new_scholarship') {
                                                        echo "<span class='badge bg-label-success'>New Scholarship</span>";
                                                    } else {
                                                        echo "<span class='badge bg-label-warning'>Update</span>";
                                                    }
                                                    echo "</td>";
                                                    echo "<td>{$log['name']}</td>";
                                                    echo "<td>{$log['recipients_count']}</td>";
                                                    echo "<td>" . date('M d, Y H:i', strtotime($log['date_sent'])) . "</td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='5' class='text-center'>No logs found</td></tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='5' class='text-center'>Notification logs table not yet created</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php include "./footer.php"; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>