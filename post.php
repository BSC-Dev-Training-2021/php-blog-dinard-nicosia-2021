<?php
require("./library/lib_handler.php");
include_once("./controler/post-controller.php");
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
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#!">My Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
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
            <div class="col-lg-8 align-self-start">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Contact Us header-->
                        <header class="mb-8">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1">Create a new blog entry</h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-3">Express your mind!</div>
                        </header>
                        <!-- Post content-->
                        <section class="mb-5">
                            <form method="POST" action="post.php" enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Title</span>
                                    <input type="text" name="title" class="form-control" placeholder="Enter title...">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Description </span>
                                    <textarea name="description" class="form-control" aria-label="With textarea"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1" class="mb-1">Content</label>
                                    <textarea name="content" class="form-control mb-1" id="exampleFormControlTextarea1" rows="5"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Upload Image</label>
                                    <input name="img_link" class="form-control" type="file" id="formFile">
                                </div>

                                <?php
                                $blogPostObj = new categories();
                                $resultCategories = $blogPostObj->displayCategories();
                                foreach ($resultCategories as $value) {
                                ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="<?php echo $value['id']; ?>" name="category[]" id="flexCheckChecked<?php echo ($value['id']) ?> ">
                                        <label class="form-check-label" for="flexCheckChecked<?php echo ($value['id']) ?> ">
                                            <?php echo $value['name']; ?>
                                        </label>
                                    </div>
                                <?php } ?>
                                <button type="submit" name="submit_bttn" class="btn btn-primary mt-2">Post</button>
                            </form>
                        </section>
                    </div>
                    <div class="col-lg-4"></div>
                </div>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Search widget-->
                <div class="card mb-4">
                    <div class="card-header">Search</div>
                    <div class="card-body">
                        <div class="input-group">
                            <form action="post.php" method="POST">
                                <input name="blog_input" class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <button type="submit" name="post_bttn" class="btn btn-primary" id="button-search" type="button">Go!</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#!">Web Design</a></li>
                                    <li><a href="#!">HTML</a></li>
                                    <li><a href="#!">Freebies</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#!">JavaScript</a></li>
                                    <li><a href="#!">CSS</a></li>
                                    <li><a href="#!">Tutorials</a></li>
                                </ul>
                            </div>
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
    <script src="js/scripts.js"></script>
</body>

</html>