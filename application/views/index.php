<?php
require("../../library/lib_handler.php");
require_once("../controlers/index-controller.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php') ?>
    <title>My Blog - Home</title>
</head>

<body>
    <!-- Responsive navbar-->
    <?php include_once('navbar.php') ?>
    <!-- Page header with logo and tagline-->
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Welcome to Blog Home!</h1>
                <p class="lead mb-0">A Bootstrap 5 starter layout for your next blog homepage</p>
            </div>
        </div>
    </header>
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <?php
                if ($result) {
                    foreach ($result as $value) {
                ?>
                        <!-- Featured blog post-->
                        <div class="card mb-4">
                            <a href="#!"><img class="card-img-top" src="../../assets/images/<?php echo $value['img_link']; ?>" alt="..." /></a>
                            <div class="card-body">
                                <div class="small text-muted"><?php $phpdate = strtotime($value['created']);
                                                                $mysqldate = date('g:ia \o\n l jS F Y', $phpdate);
                                                                echo $mysqldate; ?></div>
                                <h2 class="card-title"><?php echo $value['title']; ?></h2>
                                <p class="card-text"><?php echo $value['description']; ?></p>
                                <form action="article.php" method="POST">
                                    <input type="hidden" name="blog_id" value="<?php echo $value['id']; ?>">
                                    <button class="btn btn-primary" name="read_more_bttn" type="submit">Read more →</button>
                                </form>

                            </div>
                        </div>
                    <?php

                    }
                } else {
                    ?>
                    <div class="card mb-4">
                        <h2>There's no items in Category selected</h2>
                    </div>
                <?php
                }
                ?>
                <!-- Nested row for non-featured blog posts-->
                <div class="row">

                    <!-- Blog post-->
                    <?php
                    foreach ($AllBlogs as $value) {
                    ?>
                        <div class="col-lg-6">
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="../../assets/images/<?php echo $value['img_link']; ?>" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted"><?php $phpdate = strtotime($value['created']);
                                                                    $mysqldate = date('g:ia \o\n l jS F Y', $phpdate);
                                                                    echo $mysqldate; ?></div>
                                    <h2 class="card-title h4"><?php echo $value['title']; ?></h2>
                                    <p class="card-text"><?php echo $value['description']; ?></p>
                                    <form action="article.php" method="POST">
                                        <input type="hidden" name="blog_id" value="<?php echo $value['id']; ?>">
                                        <button class="btn btn-primary" name="read_more_bttn" type="submit">Read more →</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- Blog post-->
                </div>
                <!-- Pagination-->
                <nav aria-label="Pagination">
                    <hr class="my-0" />
                    <ul class="pagination justify-content-center my-4">
                        <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
                        <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                        <li class="page-item"><a class="page-link" href="#!">2</a></li>
                        <li class="page-item"><a class="page-link" href="#!">3</a></li>
                        <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                        <li class="page-item"><a class="page-link" href="#!">15</a></li>
                        <li class="page-item"><a class="page-link" href="#!">Older</a></li>
                    </ul>
                </nav>
            </div>
            <!-- Side widgets-->
            <?php include_once("sidebar.php"); ?>
        </div>
    </div>
    <!-- Footer-->
    <?php include_once('footer.php'); ?>
</body>

</html>