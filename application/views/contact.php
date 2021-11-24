<?php
require("../../library/lib_handler.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php') ?>
    <title>Blog Post - Start Bootstrap Template</title>
</head>

<body>
    <!-- Responsive navbar-->
    <?php include_once('navbar.php')?>
    <!-- Page content-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8 align-self-start">
                <div class="row">
                    <div class="col-lg-4">
                        <!-- Contact Us header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1">Contact Us</h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-3">We would like to hear from you!</div>
                        </header>
                        <!-- Post content-->
                        <section class="mb-5">
                            <form>
                                <div class="form-group">
                                    <label for="formGroupExampleInput" class="mb-1">Full Name</label>
                                    <input type="text" class="form-control mb-1" id="formGroupExampleInput" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2" class="mb-1">Email</label>
                                    <input type="text" class="form-control mb-1" id="formGroupExampleInput2" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1" class="mb-1">Message</label>
                                    <textarea class="form-control mb-1" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary mt-2">Submit</button>
                            </form>
                        </section>
                    </div>
                    <div class="col-lg-4"></div>
                </div>
            </div>
            <!-- Side widgets-->
            <?php include_once("sidebar.php"); ?>
        </div>
    </div>
    <!-- Footer-->
    <?php include_once('footer.php'); ?>
</body>

</html>