<?php include "./head.php";
$a = 5;
?>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    .card {
        border: none;
        border-radius: 16px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .card-header {
        background: white;
        color: #2d3436;
        padding: 1.5rem;
        border-bottom: 2px solid #f1f1f1;
        font-size: 1.25rem;
        font-weight: 600;
    }

    .form-control {
        border: 2px solid #edf2f7;
        border-radius: 10px;
        padding: 0.8rem 1rem;
        font-family: 'Poppins', sans-serif;
        transition: all 0.3s ease;
    }

    .form-label {
        font-weight: 500;
        color: #2d3436;
        margin-bottom: 0.5rem;
    }
</style>

<body>
    <?php include "./controls.php";
    if ($roles == 3) {
        echo "<script>window.location.href='index.php'</script>";
    }
    ; ?>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php include "./sidebar.php"; ?>
            <div class="layout-page">
                <?php include "./topbar.php"; ?>

                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <!-- Preview Frame Card -->
                        <div class="card mb-4">
                            <div class="card-header">
                                Website Preview
                            </div>
                            <div class="card-body">
                                <iframe src="http://localhost/cms/" class="img-fluid overflow-scroll"
                                    style="width:100%; height:900px;"></iframe>
                            </div>
                        </div>

                        <!-- CMS Settings Card -->
                        <div class="card">
                            <div class="card-header">
                                Content Management System - Landing Page Settings
                            </div>
                            <div class="card-body">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="">Logo</label>
                                            <input type="file" name="logos" id="" class="form-control">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="">Abbreviation</label>
                                            <input type="text" name="sysabbre" id="" class="form-control"
                                                value="<?php echo $settings['abbreviation'] ?>">
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="">System Name</label>
                                            <input type="text" name="sysname" id="" class="form-control"
                                                value="<?php echo $settings['Name'] ?>">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="">Email</label>
                                            <input type="email" name="sysemail" id="" class="form-control"
                                                value="<?php echo $settings['email'] ?>">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="">Contact number</label>
                                            <input type="number" name="sysnumber" id="" class="form-control"
                                                value="<?php echo $settings['contact'] ?>">
                                        </div>

                                        <div class="col-sm-12">
                                            <label for="">Address</label>
                                            <input type="text" name="sysaddress" id="" class="form-control"
                                                value="<?php echo $settings['address'] ?>">
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="">Landing Page Title</label>
                                            <input type="text" name="hero_title" class="form-control"
                                                value="<?php echo $settings['hero_title'] ?>">
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="">Landing Page Subtitle</label>
                                            <textarea name="hero_subtitle"
                                                class="form-control"><?php echo $settings['hero_subtitle'] ?></textarea>
                                        </div>

                                        <div class="col-sm-6 mb-3">
                                            <label for="">Background Color</label>
                                            <input type="color" name="syscolor" id="" class="form-control"
                                                style="height:38px" value="<?php echo $settings['color'] ?>">
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <label for="">Text Colors</label>
                                            <input type="color" name="textcolor" id="" class="form-control"
                                                style="height:38px" value="<?php echo $settings['text_color'] ?>">
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <label for="">Navbar Background Color</label>
                                            <input type="color" name="navbar_color" class="form-control"
                                                style="height:38px" value="<?php echo $settings['navbar_color'] ?>">
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <label for="">Navbar Font Color</label>
                                            <input type="color" name="navbar_font_color" class="form-control"
                                                style="height:38px"
                                                value="<?php echo $settings['navbar_font_color'] ?>">
                                        </div>

                                        <div class="col-sm-12 mb-3">
                                            <label for="">Mission and Vision</label>
                                            <textarea name="sysdescription" id=""
                                                class="form-control"><?php echo $settings['description'] ?></textarea>
                                        </div>
                                        <div class="col-sm-4">
                                            <button type="submit" class="btn btn-danger"
                                                name="syssetting">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include "./footer.php"; ?>