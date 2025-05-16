<?php
include "./head.php";
$a = 8;
?>

<body>
    <?php include "./controls.php"; ?>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php include "./sidebar.php"; ?>
            <div class="layout-page">
                <?php include "./topbar.php"; ?>
                <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
                    rel="stylesheet">
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="bulletin-header">
                            <!-- Add Font Awesome CDN -->
                            <link rel="stylesheet"
                                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

                            <div class="bulletin-header">
                                <i class="fas fa-bullhorn bulletin-icon"></i>
                                <h2 class="bulletin-title">Bulletin Board</h2>
                                <p class="bulletin-subtitle">Stay updated with the latest announcements</p>
                            </div>

                            <div class="bulletin-grid">
                                <?php foreach ($bulletins as $bulletin): ?>
                                    <div class="bulletin-card">
                                        <div class="bulletin-tag <?php echo strtolower($bulletin['type']); ?>">
                                            <?php
                                            $icon = '';
                                            switch (strtolower($bulletin['type'])) {
                                                case 'important':
                                                    $icon = 'fa-exclamation-circle';
                                                    break;
                                                case 'announcement':
                                                    $icon = 'fa-bell';
                                                    break;
                                                case 'notice':
                                                    $icon = 'fa-info-circle';
                                                    break;
                                            }
                                            ?>
                                            <i class="fas <?php echo $icon; ?> me-2"></i>
                                            <?php echo $bulletin['type']; ?>
                                        </div>
                                        <div class="bulletin-content">
                                            <p><?php echo $bulletin['descriptions']; ?></p>
                                        </div>
                                        <div class="bulletin-footer">
                                            <span class="bulletin-date">
                                                <i class="fas fa-calendar-alt me-2"></i>
                                                <?php echo date('F d, Y', strtotime($bulletin['date_created'])); ?>
                                            </span>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <style>
                                :root {
                                    --primary: #800000;
                                    --text-dark: #2d3436;
                                    --text-light: #636e72;
                                    --bg-light: #f5f6fa;
                                }

                                .bulletin-header {
                                    text-align: center;
                                    margin-bottom: 3rem;
                                    position: relative;
                                }

                                .bulletin-icon {
                                    font-size: 2.5rem;
                                    color: var(--primary);
                                    margin-bottom: 1rem;
                                    animation: bounce 2s infinite;
                                }

                                body {
                                    font-family: 'Poppins', sans-serif;
                                }

                                .bulletin-title {
                                    font-family: 'Poppins', sans-serif;
                                    font-weight: 700;
                                }

                                .bulletin-subtitle {
                                    font-family: 'Poppins', sans-serif;
                                    font-weight: 400;
                                }

                                .bulletin-tag {
                                    font-family: 'Poppins', sans-serif;
                                    font-weight: 600;
                                }

                                .bulletin-content {
                                    font-family: 'Poppins', sans-serif;
                                    font-weight: 400;
                                }

                                .bulletin-footer {
                                    font-family: 'Poppins', sans-serif;
                                    font-weight: 400;
                                }

                                .bulletin-grid {
                                    display: grid;
                                    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                                    gap: 1.5rem;
                                    padding: 1rem;
                                }

                                .bulletin-card {
                                    background: white;
                                    border-radius: 16px;
                                    padding: 1.5rem;
                                    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
                                    transition: all 0.3s ease;
                                    position: relative;
                                    overflow: hidden;
                                }

                                .bulletin-card:hover {
                                    transform: translateY(-5px);
                                    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
                                }

                                .bulletin-card::before {
                                    content: '';
                                    position: absolute;
                                    top: 0;
                                    left: 0;
                                    width: 4px;
                                    height: 100%;
                                    background: var(--primary);
                                    opacity: 0;
                                    transition: opacity 0.3s ease;
                                }

                                .bulletin-card:hover::before {
                                    opacity: 1;
                                }

                                .bulletin-tag {
                                    display: inline-flex;
                                    align-items: center;
                                    padding: 0.5rem 1rem;
                                    border-radius: 20px;
                                    font-size: 0.875rem;
                                    font-weight: 600;
                                    margin-bottom: 1rem;
                                }

                                .bulletin-tag.important {
                                    background: #fee2e2;
                                    color: #991b1b;
                                }

                                .bulletin-tag.announcement {
                                    background: #e0e7ff;
                                    color: #3730a3;
                                }

                                .bulletin-tag.notice {
                                    background: #fef3c7;
                                    color: #92400e;
                                }

                                .bulletin-content {
                                    color: var(--text-dark);
                                    line-height: 1.6;
                                    margin-bottom: 1.5rem;
                                }

                                .bulletin-footer {
                                    display: flex;
                                    align-items: center;
                                    color: var(--text-light);
                                    font-size: 0.9rem;
                                }

                                .bulletin-date {
                                    display: flex;
                                    align-items: center;
                                }

                                @keyframes bounce {

                                    0%,
                                    100% {
                                        transform: translateY(0);
                                    }

                                    50% {
                                        transform: translateY(-10px);
                                    }
                                }

                                @media (max-width: 768px) {
                                    .bulletin-grid {
                                        grid-template-columns: 1fr;
                                    }

                                    .bulletin-title {
                                        font-size: 2rem;
                                    }
                                }
                            </style>

                            <?php include "./footer.php"; ?>