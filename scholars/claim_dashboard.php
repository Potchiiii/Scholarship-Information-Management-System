<?php include "./head.php"; ?>
<body>
    <?php include "./controls.php"; ?>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php include "./sidebar.php"; ?>
            <div class="layout-page">
                <?php include "./topbar.php"; ?>
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0"><i class="fas fa-money-check-alt me-2"></i>Scholarship Claims</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="claimsTable" class="display">
                                        <thead>
                                            <tr>
                                                <th>Scholar Name</th>
                                                <th>Scholarship</th>
                                                <th>Amount</th>
                                                <th>Claim Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $claims = $pdo->query("
                                                SELECT 
                                                    CONCAT(u.first_name, ' ', u.last_name) as scholar_name,
                                                    s.name as scholarship_name,
                                                    sc.claimed_amount,
                                                    sc.claim_date,
                                                    sc.claim_status
                                                FROM scholarship_claims sc
                                                JOIN scholarship_applications sa ON sc.application_id = sa.applicationsID
                                                JOIN users u ON sa.userID = u.userID
                                                JOIN daily_scholarship ds ON sa.dailyscholarshipID = ds.dailyscholarshipID
                                                JOIN scholarship s ON ds.scholarshipID = s.scholarshipID
                                                ORDER BY sc.claim_date DESC
                                            ")->fetchAll();

                                            foreach($claims as $claim): ?>
                                            <tr>
                                                <td><?= $claim['scholar_name'] ?></td>
                                                <td><?= $claim['scholarship_name'] ?></td>
                                                <td>₱<?= number_format($claim['claimed_amount'], 2) ?></td>
                                                <td><?= date('F j, Y g:i A', strtotime($claim['claim_date'])) ?></td>
                                                <td>
                                                    <span class="status-badge status-approved">
                                                        <i class="fas fa-check-circle me-2"></i>
                                                        <?= ucfirst($claim['claim_status']) ?>
                                                    </span>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "./footer.php"; ?>
    
    <script>
        $(document).ready(function() {
            $('#claimsTable').DataTable({
                order: [[3, 'desc']]
            });
        });
    </script>
</body>