<?php
include "./head.php";
require_once "../central_control.php";

// Add PHPMailer namespace imports
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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

$message = '';
$status = '';

// Test sending an email
if (isset($_POST['test_email'])) {
    $test_email = $_POST['email'];

    if (empty($test_email)) {
        $message = 'Please enter an email address';
        $status = 'error';
    } else {
        try {
            // Create a new PHPMailer instance
            $mail = new PHPMailer(true);

            // Enable verbose debug output
            $mail->SMTPDebug = 0; // Set to 2 for detailed debugging

            // SMTP configuration
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'lyrrafe002@gmail.com';
            $mail->Password = 'xgak lkgk lqol kyni';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Set sender and recipient
            $mail->setFrom('lyrrafe002@gmail.com', 'Scholarship System');
            $mail->addAddress($test_email);

            // Set email content
            $mail->isHTML(true);
            $mail->Subject = 'Test Email from Scholarship System';
            $mail->Body = '<h1>Test Email</h1><p>This is a test email from the scholarship system.</p><p>Time: ' . date('Y-m-d H:i:s') . '</p>';

            // Send the email
            if ($mail->send()) {
                $message = 'Test email sent successfully to ' . $test_email;
                $status = 'success';
            } else {
                $message = 'Failed to send test email: ' . $mail->ErrorInfo;
                $status = 'error';
            }
        } catch (Exception $e) {
            $message = 'Failed to send test email: ' . $e->getMessage();
            $status = 'error';
        }
    }
}

// Test SMTP connection directly
if (isset($_POST['test_smtp'])) {
    $test_email = $_POST['smtp_test_email'];

    try {
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = 2; // Detailed debugging
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'lyrrafe002@gmail.com';
        $mail->Password = 'xgak lkgk lqol kyni';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('lyrrafe002@gmail.com', 'Scholarship System');
        $mail->addAddress($test_email);
        $mail->isHTML(true);
        $mail->Subject = 'SMTP Test Email';
        $mail->Body = '<h1>SMTP Test Email</h1><p>This is a test email to verify SMTP settings.</p><p>Time: ' . date('Y-m-d H:i:s') . '</p>';

        // Capture output
        ob_start();
        $result = $mail->send();
        $debug_output = ob_get_clean();

        if ($result) {
            $message = 'SMTP test successful! Email sent to ' . $test_email;
            $status = 'success';
        } else {
            $message = 'SMTP test failed: ' . $mail->ErrorInfo;
            $status = 'error';
        }
    } catch (Exception $e) {
        $debug_output = $e->getMessage();
        $message = 'SMTP test failed: ' . $e->getMessage();
        $status = 'error';
    }
}

// Test sending a scholarship notification
if (isset($_POST['test_scholarship'])) {
    $scholarship_id = $_POST['scholarship_id'];
    $notification_type = $_POST['notification_type'];
    $custom_message = $_POST['custom_message'];

    if (empty($scholarship_id)) {
        $message = 'Please select a scholarship';
        $status = 'error';
    } else {
        $result = send_scholarship_notification($notification_type, $scholarship_id, $custom_message);

        if ($result) {
            $message = 'Scholarship notification sent successfully';
            $status = 'success';
        } else {
            $message = 'Failed to send scholarship notification. Check server logs for details.';
            $status = 'error';
        }
    }
}

// Get list of scholarships for the dropdown
$scholarships_stmt = $pdo->prepare("SELECT scholarshipID, name FROM scholarship ORDER BY name");
$scholarships_stmt->execute();
$scholarships = $scholarships_stmt->fetchAll(PDO::FETCH_ASSOC);

// Set active menu item for sidebar
$a = 11; // For test notification page
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification System</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9fafb;
        }

        .primary-color {
            background-color:
                <?php echo $settings['color'] ?>
            ;
        }

        .primary-text-color {
            color:
                <?php echo $settings['text_color'] ?>
            ;
        }

        /* Keep original sidebar structure */
        .tcolor {
            color:
                <?php echo $settings['text_color'] ?>
            ;
        }

        /* Enhanced menu items with Tailwind */
        .menu-vertical {
            font-family: 'Poppins', sans-serif;
        }

        .menu-item {
            margin-bottom: 0.5rem;
            position: relative;
            transition: all 0.2s ease;
        }

        .menu-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 1.25rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .menu-link:hover {
            transform: translateX(5px);
            background-color: rgba(232, 212, 212, 0.16) !important;
            color:
                <?php echo $settings['text_color'] ?>
                !important;
        }

        /* Tailwind enhanced active state */
        .active {
            color:
                <?php echo $settings['text_color'] ?>
            ;
            background-color: rgba(232, 212, 212, 0.16) !important;
            font-weight: 500;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        /* Add subtle hover effect */
        .menu-link::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 0;
            background-color: rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease;
        }

        .menu-link:hover::before {
            width: 100%;
        }

        .menu-icon {
            font-size: 1.2rem;
            margin-right: 0.8rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            opacity: 0.9;
        }

        .menu-link:hover .menu-icon {
            transform: scale(1.1);
            opacity: 1;
        }

        .app-brand-text {
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .menu-inner {
            padding: 1.5rem 1rem;
        }

        /* Menu category headers */
        .menu-header {
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color:
                <?php echo $settings['text_color'] ?>
            ;
            opacity: 0.6;
            margin: 1.25rem 1.25rem 0.75rem;
        }

        .menu-divider {
            height: 1px;
            margin: 1rem 1.25rem;
            background-color: rgba(255, 255, 255, 0.1);
        }

        /* Tab button hover and active states */
        .tab-btn {
            transition: all 0.3s ease;
        }

        .tab-btn:hover {
            background-color: rgba(128, 0, 0, 0.05);
            color:
                <?php echo $settings['color'] ?>
            ;
        }

        .tab-btn.active {
            color:
                <?php echo $settings['color'] ?>
            ;
            border-color:
                <?php echo $settings['color'] ?>
            ;
        }

        .tab-btn.active:hover {
            background-color: rgba(128, 0, 0, 0.05);
        }
    </style>

</head>

<body class="bg-gray-50">
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <aside id="layout-menu" class="layout-menu menu-vertical menu"
                style="background-color: <?php echo $settings['color'] ?>">
                <div class="app-brand demo">
                    <a href="system_description.php" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <img src="../assets/images/logo/<?php echo $settings['Logo'] ?>" alt=""
                                class="img-fluid d-none d-sm-block" width="30px">
                        </span>
                        <span
                            class="app-brand-text demo menu-text fw-bold ms-2 tcolor text-uppercase"><?php echo $settings['abbreviation'] ?></span>
                    </a>

                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <img src="../assets/images/logo/<?php echo $settings['Logo'] ?>" alt="" class="" width="40px">
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Admin Menu -->
                    <div class="menu-header">Administration</div>

                    <li class="menu-item <?php if ($a == 1) {
                        echo "active";
                    } ?>">
                        <a href="index.php" class="menu-link tcolor hover:shadow-sm">
                            <i class="menu-icon tf-icons fi fi-rr-dashboard-panel"></i>
                            <div data-i18n="Basic">Dashboard</div>
                        </a>
                    </li>

                    <li class="menu-item <?php if ($a == 2) {
                        echo "active";
                    } ?>">
                        <a href="user.php" class="menu-link tcolor hover:shadow-sm">
                            <i class="menu-icon tf-icons bx bx-user"></i>
                            <div data-i18n="Basic">Administrators</div>
                        </a>
                    </li>

                    <li class="menu-item <?php if ($a == 9) {
                        echo "active";
                    } ?>">
                        <a href="scholars.php" class="menu-link tcolor hover:shadow-sm">
                            <i class="menu-icon tf-icons bx bx-user"></i>
                            <div data-i18n="Basic">Scholars</div>
                        </a>
                    </li>

                    <div class="menu-divider"></div>
                    <div class="menu-header">Content</div>

                    <li class="menu-item <?php if ($a == 8) {
                        echo "active";
                    } ?>">
                        <a href="bulletin.php" class="menu-link tcolor hover:shadow-sm">
                            <i class="menu-icon fi fi-rr-megaphone-sound-waves"></i>
                            <div data-i18n="Basic">Announcements</div>
                        </a>
                    </li>

                    <li class="menu-item <?php if ($a == 7) {
                        echo "active";
                    } ?>">
                        <a href="publications.php" class="menu-link tcolor hover:shadow-sm">
                            <i class="menu-icon fi fi-rr-blog-text"></i>
                            <div data-i18n="Basic">Publications</div>
                        </a>
                    </li>

                    <div class="menu-divider"></div>
                    <div class="menu-header">Scholarship</div>

                    <li class="menu-item <?php if ($a == 3) {
                        echo "active";
                    } ?>">
                        <a href="scholarships.php" class="menu-link tcolor hover:shadow-sm">
                            <i class="menu-icon fi fi-rr-diploma"></i>
                            <div data-i18n="Basic">Scholarship Programs</div>
                        </a>
                    </li>

                    <li class="menu-item <?php if ($a == 4) {
                        echo "active";
                    } ?>">
                        <a href="semeters.php" class="menu-link tcolor hover:shadow-sm">
                            <i class="menu-icon fi fi-rr-calendar-day"></i>
                            <div data-i18n="Basic">Semesters</div>
                        </a>
                    </li>

                    <li class="menu-item <?php if ($a == 5) {
                        echo "active";
                    } ?>">
                        <a href="settings.php" class="menu-link tcolor hover:shadow-sm">
                            <i class="menu-icon fi fi-rr-settings"></i>
                            <div data-i18n="Basic">Settings</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="stipend_management.php" class="menu-link tcolor hover:shadow-sm">
                            <i class="menu-icon tf-icons fas fa-money-bill-wave"></i>
                            <div data-i18n="Analytics">Stipend Management</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="test_notification.php" class="menu-link tcolor hover:shadow-sm">
                            <i class="menu-icon tf-icons bx bx-envelope"></i>
                            <div data-i18n="Test Notifications">Notifications</div>
                        </a>
                    </li>
                </ul>
            </aside>
            <div class="layout-page">
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="max-w-6xl mx-auto px-4 py-8">
                            <div class="flex items-center justify-between mb-8">
                                <h1 class="text-3xl font-bold text-gray-800">Notification System</h1>
                                <a href="index.php" class="flex items-center text-gray-600 hover:text-gray-900">
                                    <i class="fas fa-arrow-left mr-2"></i>
                                    <span>Back to Dashboard</span>
                                </a>
                            </div>

                            <?php if (!empty($message)): ?>
                                <div
                                    class="mb-6 p-4 rounded-lg <?php echo $status === 'success' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'; ?>">
                                    <div class="flex items-center">
                                        <i
                                            class="<?php echo $status === 'success' ? 'fas fa-check-circle text-green-500' : 'fas fa-exclamation-circle text-red-500'; ?> mr-3 text-xl"></i>
                                        <p><?php echo $message; ?></p>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
                                <div class="border-b border-gray-200">
                                    <nav class="flex -mb-px">
                                        <button
                                            class="tab-btn active py-4 px-6 border-b-2 border-<?php echo $settings['color'] ?> text-<?php echo $settings['color'] ?> font-medium"
                                            data-tab="email">
                                            <i class="fas fa-envelope mr-2"></i>Email
                                        </button>
                                        <button
                                            class="tab-btn py-4 px-6 border-b-2 border-transparent text-gray-500 hover:text-gray-700 font-medium"
                                            data-tab="smtp">
                                            <i class="fas fa-server mr-2"></i>SMTP
                                        </button>
                                        <button
                                            class="tab-btn py-4 px-6 border-b-2 border-transparent text-gray-500 hover:text-gray-700 font-medium"
                                            data-tab="scholarship">
                                            <i class="fas fa-graduation-cap mr-2"></i>Scholarship
                                        </button>
                                        <button
                                            class="tab-btn py-4 px-6 border-b-2 border-transparent text-gray-500 hover:text-gray-700 font-medium"
                                            data-tab="logs">
                                            <i class="fas fa-history mr-2"></i>Logs
                                        </button>
                                    </nav>
                                </div>

                                <div class="tab-content active p-6" id="email">
                                    <div class="max-w-2xl mx-auto">
                                        <h2 class="text-xl font-semibold mb-4 text-gray-800">Send Email Notification
                                        </h2>
                                        <p class="text-gray-600 mb-6">Use this form to send a test email and verify your
                                            email configuration.</p>

                                        <form method="post" class="space-y-4">
                                            <div>
                                                <label for="email"
                                                    class="block text-sm font-medium text-gray-700 mb-1">Recipient Email
                                                    Address</label>
                                                <input type="email" id="email" name="email" required
                                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                                                    placeholder="Enter email address">
                                            </div>

                                            <div class="pt-2">
                                                <button type="submit" name="test_email"
                                                    class="primary-color text-white px-5 py-2 rounded-lg font-medium hover:opacity-90 transition-opacity focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    <i class="fas fa-paper-plane mr-2"></i>Send Test Email
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="tab-content hidden p-6" id="smtp">
                                    <div class="max-w-2xl mx-auto">
                                        <h2 class="text-xl font-semibold mb-4 text-gray-800">SMTP Configuration Test
                                        </h2>
                                        <p class="text-gray-600 mb-6">Test your SMTP server connection with detailed
                                            debugging information.</p>

                                        <form method="post" class="space-y-4">
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                <div>
                                                    <label for="smtp_host"
                                                        class="block text-sm font-medium text-gray-700 mb-1">SMTP
                                                        Host</label>
                                                    <input type="text" id="smtp_host" name="smtp_host"
                                                        value="smtp.gmail.com" readonly
                                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-50 text-gray-500">
                                                </div>
                                                <div>
                                                    <label for="smtp_port"
                                                        class="block text-sm font-medium text-gray-700 mb-1">SMTP
                                                        Port</label>
                                                    <input type="text" id="smtp_port" name="smtp_port" value="587"
                                                        readonly
                                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-50 text-gray-500">
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                <div>
                                                    <label for="smtp_user"
                                                        class="block text-sm font-medium text-gray-700 mb-1">SMTP
                                                        Username</label>
                                                    <input type="text" id="smtp_user" name="smtp_user"
                                                        value="lyrrafe002@gmail.com" readonly
                                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-50 text-gray-500">
                                                </div>
                                                <div>
                                                    <label for="smtp_pass"
                                                        class="block text-sm font-medium text-gray-700 mb-1">SMTP
                                                        Password</label>
                                                    <input type="password" id="smtp_pass" name="smtp_pass"
                                                        value="xgak lkgk lqol kyni" readonly
                                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-50 text-gray-500">
                                                </div>
                                            </div>

                                            <div>
                                                <label for="smtp_test_email"
                                                    class="block text-sm font-medium text-gray-700 mb-1">Test Email
                                                    Address</label>
                                                <input type="email" id="smtp_test_email" name="smtp_test_email" required
                                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                                                    placeholder="Enter recipient email address">
                                            </div>

                                            <div class="pt-2">
                                                <button type="submit" name="test_smtp"
                                                    class="primary-color text-white px-5 py-2 rounded-lg font-medium hover:opacity-90 transition-opacity focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    <i class="fas fa-server mr-2"></i>Test SMTP Connection
                                                </button>
                                            </div>
                                        </form>

                                        <?php if (isset($debug_output)): ?>
                                            <div class="mt-6">
                                                <h3 class="text-sm font-semibold text-gray-700 mb-2">Debug Output</h3>
                                                <div
                                                    class="bg-gray-100 border border-gray-300 rounded-lg p-4 font-mono text-sm overflow-auto max-h-64">
                                                    <pre><?php echo htmlspecialchars($debug_output); ?></pre>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="tab-content hidden p-6" id="scholarship">
                                    <div class="max-w-2xl mx-auto">
                                        <h2 class="text-xl font-semibold mb-4 text-gray-800">Scholarship Notifications
                                        </h2>
                                        <p class="text-gray-600 mb-6">Send notifications to students about scholarship
                                            opportunities and updates.</p>

                                        <form method="post" class="space-y-4">
                                            <div>
                                                <label for="scholarship_id"
                                                    class="block text-sm font-medium text-gray-700 mb-1">Select
                                                    Scholarship</label>
                                                <select id="scholarship_id" name="scholarship_id" required
                                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors">
                                                    <option value="">-- Select Scholarship --</option>
                                                    <?php foreach ($scholarships as $scholarship): ?>
                                                        <option value="<?php echo $scholarship['scholarshipID']; ?>">
                                                            <?php echo $scholarship['name']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <div>
                                                <label for="notification_type"
                                                    class="block text-sm font-medium text-gray-700 mb-1">Notification
                                                    Type</label>
                                                <select id="notification_type" name="notification_type" required
                                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors">
                                                    <option value="new_scholarship">New Scholarship Announcement
                                                    </option>
                                                    <option value="update">Scholarship Update</option>
                                                    <option value="deadline">Application Deadline Reminder</option>
                                                    <option value="approval">Application Status Update</option>
                                                </select>
                                            </div>

                                            <div>
                                                <label for="custom_message"
                                                    class="block text-sm font-medium text-gray-700 mb-1">Custom Message
                                                    (Optional)</label>
                                                <textarea id="custom_message" name="custom_message" rows="4"
                                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                                                    placeholder="Add a custom message to include in the notification..."></textarea>
                                            </div>

                                            <div class="pt-2">
                                                <button type="submit" name="test_scholarship"
                                                    class="primary-color text-white px-5 py-2 rounded-lg font-medium hover:opacity-90 transition-opacity focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    <i class="fas fa-paper-plane mr-2"></i>Send Notification
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="tab-content hidden p-6" id="logs">
                                    <div>
                                        <h2 class="text-xl font-semibold mb-4 text-gray-800">Notification Logs</h2>
                                        <p class="text-gray-600 mb-6">View recent notification activity and delivery
                                            status.</p>

                                        <div class="overflow-x-auto bg-white rounded-lg shadow">
                                            <table class="min-w-full divide-y divide-gray-200">
                                                <thead class="bg-gray-50">
                                                    <tr>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            ID</th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Type</th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Scholarship</th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Recipients</th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200">
                                                    <?php
                                                    // Check if the table exists first
                                                    $table_check = $pdo->query("SHOW TABLES LIKE 'notification_logs'");
                                                    if ($table_check->rowCount() > 0) {
                                                        $logs_stmt = $pdo->query("
                                                            SELECT nl.log_id, nl.notification_type, s.name, nl.recipients_count, nl.date_sent 
                                                            FROM notification_logs nl
                                                            JOIN scholarship s ON nl.scholarship_id = s.scholarshipID
                                                            ORDER BY nl.date_sent DESC
                                                            LIMIT 10
                                                        ");
                                                        $logs = $logs_stmt->fetchAll(PDO::FETCH_ASSOC);

                                                        if (count($logs) > 0) {
                                                            foreach ($logs as $log) {
                                                                echo "<tr class='hover:bg-gray-50'>";
                                                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-900'>{$log['log_id']}</td>";

                                                                // Format notification type nicely
                                                                $type_class = '';
                                                                $type_icon = '';
                                                                switch ($log['notification_type']) {
                                                                    case 'new_scholarship':
                                                                        $type_class = 'bg-green-100 text-green-800';
                                                                        $type_icon = 'fa-plus-circle';
                                                                        $type_text = 'New';
                                                                        break;
                                                                    case 'update':
                                                                        $type_class = 'bg-blue-100 text-blue-800';
                                                                        $type_icon = 'fa-sync';
                                                                        $type_text = 'Update';
                                                                        break;
                                                                    case 'deadline':
                                                                        $type_class = 'bg-yellow-100 text-yellow-800';
                                                                        $type_icon = 'fa-clock';
                                                                        $type_text = 'Deadline';
                                                                        break;
                                                                    case 'approval':
                                                                        $type_class = 'bg-purple-100 text-purple-800';
                                                                        $type_icon = 'fa-check-circle';
                                                                        $type_text = 'Approval';
                                                                        break;
                                                                    default:
                                                                        $type_class = 'bg-gray-100 text-gray-800';
                                                                        $type_icon = 'fa-envelope';
                                                                        $type_text = $log['notification_type'];
                                                                }

                                                                echo "<td class='px-6 py-4 whitespace-nowrap'>";
                                                                echo "<span class='px-2 inline-flex text-xs leading-5 font-semibold rounded-full {$type_class}'>";
                                                                echo "<i class='fas {$type_icon} mr-1'></i> {$type_text}";
                                                                echo "</span>";
                                                                echo "</td>";

                                                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-900'>{$log['name']}</td>";

                                                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-900'>";
                                                                echo "<span class='px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800'>";
                                                                echo "{$log['recipients_count']} recipients";
                                                                echo "</span>";
                                                                echo "</td>";

                                                                echo "<td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>{$log['date_sent']}</td>";
                                                                echo "</tr>";
                                                            }
                                                        } else {
                                                            echo "<tr><td colspan='5' class='px-6 py-4 text-center text-sm text-gray-500'>No notification logs found</td></tr>";
                                                        }
                                                    } else {
                                                        echo "<tr><td colspan='5' class='px-6 py-4 text-center text-sm text-gray-500'>Notification logs table not yet created</td></tr>";
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white rounded-xl shadow-md overflow-hidden p-6 mt-8">
                                <h2 class="text-xl font-semibold mb-4 text-gray-800">Notification System Information
                                </h2>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <h3 class="text-md font-medium text-gray-700 mb-2">Email Configuration</h3>
                                        <ul class="space-y-2 text-sm text-gray-600">
                                            <li class="flex items-center">
                                                <i class="fas fa-server text-gray-400 w-5"></i>
                                                <span class="font-medium mr-2">SMTP Server:</span> smtp.gmail.com
                                            </li>
                                            <li class="flex items-center">
                                                <i class="fas fa-plug text-gray-400 w-5"></i>
                                                <span class="font-medium mr-2">Port:</span> 587
                                            </li>
                                            <li class="flex items-center">
                                                <i class="fas fa-user text-gray-400 w-5"></i>
                                                <span class="font-medium mr-2">Username:</span> lyrrafe002@gmail.com
                                            </li>
                                            <li class="flex items-center">
                                                <i class="fas fa-lock text-gray-400 w-5"></i>
                                                <span class="font-medium mr-2">Authentication:</span> TLS
                                            </li>
                                        </ul>
                                    </div>

                                    <div>
                                        <h3 class="text-md font-medium text-gray-700 mb-2">Notification Types</h3>
                                        <ul class="space-y-2 text-sm text-gray-600">
                                            <li class="flex items-center">
                                                <i class="fas fa-plus-circle text-green-500 w-5"></i>
                                                <span>New Scholarship Announcements</span>
                                            </li>
                                            <li class="flex items-center">
                                                <i class="fas fa-sync text-blue-500 w-5"></i>
                                                <span>Scholarship Updates</span>
                                            </li>
                                            <li class="flex items-center">
                                                <i class="fas fa-clock text-yellow-500 w-5"></i>
                                                <span>Deadline Reminders</span>
                                            </li>
                                            <li class="flex items-center">
                                                <i class="fas fa-check-circle text-purple-500 w-5"></i>
                                                <span>Application Status Updates</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php include "./footer.php"; ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Tab functionality
            const tabButtons = document.querySelectorAll('.tab-btn');
            const tabContents = document.querySelectorAll('.tab-content');

            tabButtons.forEach(button => {
                button.addEventListener('click', function () {
                    // Remove active class from all buttons and contents
                    tabButtons.forEach(btn => {
                        btn.classList.remove('active');
                        btn.classList.remove('text-<?php echo $settings['color'] ?>');
                        btn.classList.remove('border-<?php echo $settings['color'] ?>');
                        btn.classList.add('text-gray-500');
                        btn.classList.add('border-transparent');
                    });

                    tabContents.forEach(content => {
                        content.classList.add('hidden');
                    });

                    // Add active class to clicked button
                    this.classList.add('active');
                    this.classList.remove('text-gray-500');
                    this.classList.add('text-<?php echo $settings['color'] ?>');
                    this.classList.add('border-<?php echo $settings['color'] ?>');

                    // Show corresponding content
                    const tabId = this.getAttribute('data-tab');
                    document.getElementById(tabId).classList.remove('hidden');
                });
            });

            // Form input animations
            const formInputs = document.querySelectorAll('input, select, textarea');
            formInputs.forEach(input => {
                input.addEventListener('focus', function () {
                    this.parentElement.querySelector('label').classList.add('text-indigo-600');
                });

                input.addEventListener('blur', function () {
                    this.parentElement.querySelector('label').classList.remove('text-indigo-600');
                });
            });

            // Button hover effects
            const buttons = document.querySelectorAll('button[type="submit"]');
            buttons.forEach(button => {
                button.addEventListener('mouseenter', function () {
                    this.classList.add('shadow-md');
                    this.style.transform = 'translateY(-1px)';
                });

                button.addEventListener('mouseleave', function () {
                    this.classList.remove('shadow-md');
                    this.style.transform = 'translateY(0)';
                });
            });

            // Notification type change handler
            const notificationTypeSelect = document.getElementById('notification_type');
            const customMessageTextarea = document.getElementById('custom_message');

            if (notificationTypeSelect && customMessageTextarea) {
                notificationTypeSelect.addEventListener('change', function () {
                    const selectedType = this.value;
                    let placeholderText = '';

                    switch (selectedType) {
                        case 'new_scholarship':
                            placeholderText = 'We are pleased to announce a new scholarship opportunity...';
                            break;
                        case 'update':
                            placeholderText = 'Important updates regarding the scholarship program...';
                            break;
                        case 'deadline':
                            placeholderText = 'This is a reminder that the application deadline is approaching...';
                            break;
                        case 'approval':
                            placeholderText = 'Congratulations! Your scholarship application has been...';
                            break;
                        default:
                            placeholderText = 'Add a custom message to include in the notification...';
                    }

                    customMessageTextarea.placeholder = placeholderText;
                });
            }

            // Auto-hide alerts after 5 seconds
            const alerts = document.querySelectorAll('.alert-success, .alert-error');
            if (alerts.length > 0) {
                setTimeout(() => {
                    alerts.forEach(alert => {
                        alert.style.opacity = '0';
                        alert.style.transition = 'opacity 0.5s ease-out';

                        setTimeout(() => {
                            alert.style.display = 'none';
                        }, 500);
                    });
                }, 5000);
            }
        });
    </script>
</body>

</html>