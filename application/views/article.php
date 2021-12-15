<?php
require("../../library/lib_handler.php");
include_once("../controlers/article-controller.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php') ?>
    <title>Blog Post - Start Bootstrap Template</title>
</head>

<body>
    <!-- Responsive navbar-->
    <?php include_once('navbar.php') ?>
    <!-- Page content-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <!-- Post content-->
                <?php 
                foreach ($result as $value) {
                ?>
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1"><?php echo $value['title']; ?></h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2"><?php $phpdate = strtotime($value['created']);
                                                                    $mysqldate = date('g:i a \o\n l jS F Y', $phpdate);
                                                                    echo $mysqldate; ?></div>
                            <!-- Post categories-->
                        <?php
                    }
                    foreach ($results_selected_category as $value) {
                        ?>
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!"><?php echo $value['name']; ?></a>
                        <?php
                    }
                    foreach ($result as $value) { ?>
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded" src="../../assets/images/<?php echo $value['img_link']; ?>" alt="..." /></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="fs-5 mb-4"><?php echo $value['content']; ?></p>
                            <h2 class="fw-bolder mb-4 mt-5">Description</h2>
                            <p class="fs-5 mb-4"><?php echo $value['description']; ?></p>
                        </section>
                    </article>
                <?php } ?>
                <!-- Comments section-->
                <section class="mb-5">
                    <div class="card bg-light">
                        <div class="card-body">
                            <!-- Comment form-->
                            <form class="mb-4" method="POST" action="article.php">
                                <textarea class="form-control" name="comment" rows="3" placeholder="Join the discussion and leave a comment!"></textarea>
                                <div class="d-grid gap-2">
                                    <button type="submit" name="comment_bttn" class="btn btn-primary" type="button">Enter</button>
                                </div>
                            </form>
                            <!-- Comment with nested comments-->

                            <!-- Parent comment-->
                            <?php

                            foreach ($result_comment as $valueComment) {
                            ?>
                                <div class="d-flex mb-4">
                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">
                                            <?php

                                            $result_user = $userObj->getDisplayUserCommentbyid($valueComment['user_id']);
                                            ?></div>
                                        <?php echo $valueComment['comment']; ?>.
                                        <div class="small text-muted"><?php $phpdate = strtotime($valueComment['created']);
                                                                        $mysqldate = date('g:ia \o\n l jS F Y', $phpdate);
                                                                        echo $mysqldate; ?></div>
                                    </div>
                                </div>
                            <?php } ?>
                            <!-- Single comment-->
                            <!-- <div class="d-flex">
                                <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                <div class="ms-3">
                                    <div class="fw-bold">Commenter Name</div>
                                    When I look at the universe and all the ways the universe wants to kill us, I find it hard to reconcile that with statements of beneficence.
                                </div>
                            </div> -->
                        </div>
                    </div>
                </section>
            </div>
            <!-- Side widgets-->
            <?php include_once("sidebar.php"); ?>
        </div>
    </div>
    <!-- Footer-->
    <?php include_once('footer.php'); ?>

</body>

</html>