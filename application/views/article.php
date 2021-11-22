<?php
require("../../library/lib_handler.php");
include_once("../controlers/article-controller.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Blog Post - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../../assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../../css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#!">My Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="post.php">Post</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page content-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <!-- Post content-->
                <?php $article_obj = new article();
                $result = $article_obj->getIdBlog($_SESSION['blog_id']);



                //xdebug($cat_type_name);

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
                    $categoriesById = new blog_post_categories();
                    $selectedCategories = $categoriesById->displayCategoriesById($_SESSION['blog_id']);

                    $categories_obj = new categories();
                    $categories = $categories_obj->findById($selectedCategories);
                    $results_selected_category = $categories_obj->displayCategoriesFiltered($categories);

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
                            $blog_post_comment_obj = new blog_post_comment();
                            $result_comment = $blog_post_comment_obj->displayAllDataComment($_SESSION['blog_id']);
                            $userObj = new user();
                            //xdebug($result_comment);
                            //echo "__________";
                            //xdebug($result_user);
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
                                        <!-- Child comment 1-->

                                        <!-- Child comment 2-->
                                        <!-- <div class="d-flex mt-4">
                                        <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                        <div class="ms-3">
                                            <div class="fw-bold">Commenter Name</div>
                                            When you put money directly to a problem, it makes a good headline.
                                            <div class="d-flex mt-4">
                                        <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                        <div class="ms-3">
                                            <div class="fw-bold">Commenter Name</div>
                                            And under those conditions, you cannot establish a capital-market evaluation of that enterprise. You can't get investors.
                                        </div>
                                    </div>
                                        </div>
                                    </div> -->
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
            <div class="col-lg-4">
                <!-- Search widget-->
                <div class="card mb-4">
                    <div class="card-header">Search</div>
                    <div class="card-body">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                            <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                        </div>
                    </div>
                </div>
                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <div class="row">

                            <?php
                            $categories_display = new categories();
                            $result = $categories_display->findAll();
                            foreach ($result as $value) {
                            ?>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!"><?php echo $value['name']; ?></a></li>
                                    </ul>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
                <!-- Side widget-->
                <div class="card mb-4">
                    <div class="card-header">Side Widget</div>
                    <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="../../js/scripts.js"></script>

</body>

</html>