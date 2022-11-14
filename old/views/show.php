<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog - Simple post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link href="<?php echo APP_URL; ?>css/main.css" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container">
                <a class="navbar-brand" href="<?php echo APP_URL; ?>">
                    <img src="<?php echo APP_URL; ?>img/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                    Blog
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?php echo APP_URL; ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#!">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#!">Contact</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
<main>
    <div class="container">
        <?php if ( !empty($post) ) : ?>
            <div class="row mt-4 mb-4 gx-5">
                <!-- Post content -->
                <div class="col-12 col-lg-8 mt-2 mb-4">
                    <div class="mb-4">
                        <h1><?php echo $post['title'] ?></h1>
                        <?php
                            $datetime = new DateTime();
                            $date = $datetime->format('Y-m-d');
                            $hour = $datetime->format('H:i:s');
                        ?>
                        <p>
                            <i class="fa-regular fa-calendar-check"></i>
                            <time class="badge bg-secondary"><?php echo $date; ?></time>
                            <i class="fa-regular fa-clock"></i>
                            <time class="badge bg-info"><?php echo $hour; ?></time>
                            by <i class="fa-regular fa-user"></i>
                            <a href="#!"><span class="badge bg-light text-dark"><?php echo getUserById($post['author_id'])['name']; ?></span></a>
                        </p>
                    </div>
                    <div class="mt-4 mb-4">
                        <img src="<?php echo $post['img_url']; ?>" class="img-fluid rounded" alt="...">
                    </div>
                    <div class="mt-4">
                        <?php echo $post['content'] ?>
                    </div>
                </div>
                <!-- Sidebar -->
                <div class="col-12 col-lg-4 mt-2 mb-2 bg-light">
                    <div class="px-4 mt-4">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="latest-tab" data-bs-toggle="tab" data-bs-target="#latest" type="button" role="tab" aria-controls="latest" aria-selected="true">Latest</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="popular-tab" data-bs-toggle="tab" data-bs-target="#popular" type="button" role="tab" aria-controls="popular" aria-selected="false">Popular</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="random-tab" data-bs-toggle="tab" data-bs-target="#random" type="button" role="tab" aria-controls="random" aria-selected="false">Random</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <!-- Latest posts -->
                            <div class="tab-pane fade show active" id="latest" role="tabpanel" aria-labelledby="latest-tab">
                                <h2 class="mt-4">Latest posts</h2>
                                <?php foreach ($latestPosts as $latestPost) : ?>
                                    <div class="row mt-4 mb-4">
                                        <div class="col-12 mt-2 mb-2">
                                            <a href="<?php echo APP_URL; ?>show.php?id=<?php echo $latestPost['id']; ?>">
                                                <h5><?php echo $latestPost['title']; ?></h5>
                                            </a>
                                            <?php
                                                $datetime = new DateTime($latestPost['created_at']);
                                                $date = $datetime->format('Y-m-d');
                                                $hour = $datetime->format('H:i:s');
                                            ?>
                                            <p>
                                                <i class="fa-regular fa-calendar-check"></i>
                                                <time class="badge bg-danger"><?php echo $date; ?></time>
                                                <i class="fa-regular fa-clock"></i>
                                                <time class="badge bg-warning"><?php echo $hour; ?></time>
                                            </p>
                                        </div>
                                        <a href="<?php echo APP_URL; ?>show.php?id=<?php echo $latestPost['id']; ?>">
                                            <div class="col-12 mt-2 mb-2">
                                                <img src="<?php echo $latestPost['img_url']; ?>" class="img-fluid rounded" alt="...">
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <!-- Popular posts -->
                            <div class="tab-pane fade" id="popular" role="tabpanel" aria-labelledby="popular-tab">
                                <br>Popular posts (most commented).<br><br>
                            </div>
                            <!-- Random posts -->
                            <div class="tab-pane fade" id="random" role="tabpanel" aria-labelledby="random-tab">
                                <h2 class="mt-4">Random posts</h2>
                                <?php foreach ($randomPosts as $randomPost) : ?>
                                    <div class="row mt-4 mb-4">
                                        <div class="col-12 mt-2 mb-2">
                                            <a href="<?php echo APP_URL; ?>show.php?id=<?php echo $randomPost['id']; ?>">
                                                <h5><?php echo $randomPost['title']; ?></h5>
                                            </a>
                                            <?php
                                                $datetime = new DateTime($randomPost['created_at']);
                                                $date = $datetime->format('Y-m-d');
                                                $hour = $datetime->format('H:i:s');
                                            ?>
                                            <p>
                                                <i class="fa-regular fa-calendar-check"></i>
                                                <time class="badge bg-danger"><?php echo $date; ?></time>
                                                <i class="fa-regular fa-clock"></i>
                                                <time class="badge bg-warning"><?php echo $hour; ?></time>
                                            </p>
                                        </div>
                                        <a href="<?php echo APP_URL; ?>show.php?id=<?php echo $randomPost['id']; ?>">
                                            <div class="col-12 mt-2 mb-2">
                                                <img src="<?php echo $randomPost['img_url']; ?>" class="img-fluid rounded" alt="...">
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="p-3 mb-4 border bg-success text-center">
                        <a class="text-white" href="#!">Admin Panel</a>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="row mt-4 mb-4">
                <div class="col-12">
                    <p>There are no posts to display.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>
    <footer class="py-3 my-4">
        <div class="container border-top pt-4">
            <p class="text-center text-muted">&copy; <?php echo date('Y'); ?> Company, Inc. All rights reserved.</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>