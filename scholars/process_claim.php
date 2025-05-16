<?php
require_once "../central_control.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $application_id = $_POST['application_id'];

    try {
        $pdo->beginTransaction();

        // Update claim status in scholarship_applications
        $update = $pdo->prepare("UPDATE scholarship_applications 
                                SET claimed = 1 
                                WHERE applicationsID = :application_id");
        $update->bindParam(':application_id', $application_id);
        
        if ($update->execute()) {
            $pdo->commit();
            echo json_encode(['success' => true]);
        } else {
            throw new Exception('Failed to update claim status');
        }
    } catch (Exception $e) {
        $pdo->rollBack();
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
}
