<?php
/**
 * Scholarship Notification Service
 * 
 * This file contains functions for sending notifications about scholarships
 * to eligible users using the existing email configuration.
 */

// Make sure we have access to the database connection
if (!isset($pdo)) {
    require_once "../central_control.php";
}

// Add PHPMailer namespace imports if not already included
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * Sends scholarship notification emails to eligible users
 * 
 * @param string $type The type of notification ('new_scholarship' or 'update')
 * @param int $scholarshipID The ID of the scholarship
 * @param string $custom_message Optional custom message to include
 * @return bool Whether the emails were sent successfully
 */
function send_scholarship_notification($type, $scholarshipID, $custom_message = '') {
    global $pdo;
    
    try {
        // Get scholarship details
        $stmt = $pdo->prepare("SELECT name, date_start, date_end, description, scholarID, sector FROM scholarship WHERE scholarshipID = :scholarshipID");
        $stmt->bindParam(':scholarshipID', $scholarshipID, PDO::PARAM_INT);
        $stmt->execute();
        $scholarship = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$scholarship) {
            return false;
        }
        
        // Get system settings
        $settings_stmt = $pdo->prepare("SELECT Name FROM settings WHERE settingsID = 1");
        $settings_stmt->execute();
        $settings = $settings_stmt->fetch(PDO::FETCH_ASSOC);
        $system_name = $settings['Name'];
        
        // Get all verified student users
        $users_stmt = $pdo->prepare("SELECT email, first_name, last_name FROM users WHERE roles = 3 AND status = 'verified' AND account_verifyer = 1");
        $users_stmt->execute();
        $users = $users_stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $success_count = 0;
        
        foreach ($users as $user) {
            // Personalize the message
            $personalized_greeting = "Dear " . $user['first_name'] . " " . $user['last_name'] . ",";
            
            // Set up email subject and HTML message
            if ($type == 'new_scholarship') {
                $subject = "New Scholarship Opportunity: " . $scholarship['name'];
                $html_message = "
                    <html>
                    <head>
                        <style>
                            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                            .header { background-color: #800000; color: white; padding: 10px 20px; text-align: center; }
                            .content { padding: 20px; background-color: #f9f9f9; }
                            .scholarship-details { border-left: 4px solid #800000; padding: 10px 20px; margin: 15px 0; }
                            .button { display: inline-block; background-color: #800000; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; }
                            .footer { font-size: 12px; color: #666; margin-top: 30px; text-align: center; }
                        </style>
                    </head>
                    <body>
                        <div class='container'>
                            <div class='header'>
                                <h2>New Scholarship Opportunity</h2>
                            </div>
                            <div class='content'>
                                <p>$personalized_greeting</p>
                                <p>We are pleased to inform you about a new scholarship opportunity that you may be eligible for:</p>
                                
                                <div class='scholarship-details'>
                                    <h3>{$scholarship['name']}</h3>
                                    <p><strong>Scholarship ID:</strong> {$scholarship['scholarID']}</p>
                                    <p><strong>Sector:</strong> {$scholarship['sector']}</p>
                                    <p><strong>Application Period:</strong> {$scholarship['date_start']} to {$scholarship['date_end']}</p>
                                    <p><strong>Description:</strong><br>{$scholarship['description']}</p>
                                </div>
                                
                                <p style='margin-top: 25px;'>
                                    <a href='http://{$_SERVER['HTTP_HOST']}/scholars/index.php?view_scholarship={$scholarship['scholarID']}' class='button'>
                                        View Scholarship Details
                                    </a>
                                </p>
                                
                                <p>For more information, please log in to your scholarship portal account.</p>
                                <p>Best regards,<br>The $system_name Scholarship Team</p>
                            </div>
                            <div class='footer'>
                                <p>This is an automated message, please do not reply to this email.</p>
                            </div>
                        </div>
                    </body>
                    </html>
                ";
            } else {
                $subject = "Scholarship Update: " . $scholarship['name'];
                $html_message = "
                    <html>
                    <head>
                        <style>
                            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                            .header { background-color: #800000; color: white; padding: 10px 20px; text-align: center; }
                            .content { padding: 20px; background-color: #f9f9f9; }
                            .scholarship-details { border-left: 4px solid #800000; padding: 10px 20px; margin: 15px 0; }
                            .update-note { background-color: #fff3cd; border-left: 4px solid #ffc107; padding: 10px 20px; margin: 15px 0; }
                            .button { display: inline-block; background-color: #800000; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; }
                            .footer { font-size: 12px; color: #666; margin-top: 30px; text-align: center; }
                        </style>
                    </head>
                    <body>
                        <div class='container'>
                            <div class='header'>
                                <h2>Scholarship Update</h2>
                            </div>
                            <div class='content'>
                                <p>$personalized_greeting</p>
                                <p>There has been an update to the following scholarship:</p>
                                
                                <div class='scholarship-details'>
                                    <h3>{$scholarship['name']}</h3>
                                    <p><strong>Scholarship ID:</strong> {$scholarship['scholarID']}</p>
                                    <p><strong>Application Period:</strong> {$scholarship['date_start']} to {$scholarship['date_end']}</p>
                                </div>
                ";
                
                if (!empty($custom_message)) {
                    $html_message .= "
                                <div class='update-note'>
                                    <p><strong>Important Note:</strong></p>
                                    <p>$custom_message</p>
                                </div>
                    ";
                }
                
                $html_message .= "
                                <p style='margin-top: 25px;'>
                                    <a href='http://{$_SERVER['HTTP_HOST']}/scholars/index.php?view_scholarship={$scholarship['scholarID']}' class='button'>
                                        View Scholarship Details
                                    </a>
                                </p>
                                
                                <p>For more information, please log in to your scholarship portal account.</p>
                                <p>Best regards,<br>The $system_name Scholarship Team</p>
                            </div>
                            <div class='footer'>
                                <p>This is an automated message, please do not reply to this email.</p>
                            </div>
                        </div>
                    </body>
                    </html>
                ";
            }
            
            // Try to send the email using PHPMailer directly with the specified SMTP settings
            try {
                $mail = new PHPMailer(true);
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth = true;                                   //Enable SMTP authentication
                $mail->Username = 'lyrrafe002@gmail.com';                     //SMTP username
                $mail->Password = 'xgak lkgk lqol kyni';                               //SMTP password
                $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                $mail->Port = 587;
                
                // Set sender and recipient
                $mail->setFrom('lyrrafe002@gmail.com', $system_name);
                $mail->addAddress($user['email'], $user['first_name'] . ' ' . $user['last_name']);
                
                // Set email content
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body = $html_message;
                
                $mail->send();
                $success_count++;
            } catch (Exception $e) {
                // Log the error but continue with other recipients
                error_log("Failed to send notification to {$user['email']}: " . $e->getMessage());
            }
        }
        
        return ($success_count > 0);
    } catch (Exception $e) {
        error_log("Error in send_scholarship_notification: " . $e->getMessage());
        return false;
    }
}

/**
 * Test function to verify email functionality
 * 
 * @param string $email Email address to send test to
 * @return bool Whether the test email was sent successfully
 */
function test_notification_email($email) {
    try {
        $subject = "Test Email from Scholarship System";
        $html_message = "
            <html>
            <head>
                <style>
                    body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                    .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                    .header { background-color: #800000; color: white; padding: 10px 20px; text-align: center; }
                    .content { padding: 20px; background-color: #f9f9f9; }
                    .footer { font-size: 12px; color: #666; margin-top: 30px; text-align: center; }
                </style>
            </head>
            <body>
                <div class='container'>
                    <div class='header'>
                        <h2>Test Email</h2>
                    </div>
                    <div class='content'>
                        <p>This is a test email from the scholarship system.</p>
                        <p>If you received this email, the notification system is working correctly.</p>
                        <p>Current time: " . date('Y-m-d H:i:s') . "</p>
                    </div>
                    <div class='footer'>
                        <p>This is an automated message, please do not reply to this email.</p>
                    </div>
                </div>
            </body>
            </html>
        ";
        
        // Use PHPMailer directly with the specified SMTP settings
        $mail = new PHPMailer(true);
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'lyrrafe002@gmail.com';                     //SMTP username
        $mail->Password = 'xgak lkgk lqol kyni';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port = 587;
        
        // Set sender and recipient
        $mail->setFrom('lyrrafe002@gmail.com', 'Scholarship System');
        $mail->addAddress($email);
        
        // Set email content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $html_message;
        
        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Error in test_notification_email: " . $e->getMessage());
        return false;
    }
}
?>
