<?php include "./head.php";
?>

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
                                <h3>System Description</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6 border-end">
                                        <div class="d-flex justify-content-center">
                                            <img src="../assets/images/logo/<?php echo $settings['Logo'] ?>" alt=""
                                                class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <h5>System Name : <?php echo $settings['Name'] ?></h5>
                                        <h5>Abbreviation : <?php echo $settings['abbreviation'] ?></h5>
                                        <h5>Email : <?php echo $settings['email'] ?></h5>
                                        <h5>Contact Number : <?php echo $settings['contact'] ?></h5>
                                        <hr>
                                        <h5>Description</h5>
                                        <p> <?php echo $settings['description'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <?php include "./footer.php"; ?>