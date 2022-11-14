<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog with PHP</title>
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
        <div class="banner">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 text-center">
                        <h1 class="text-white">Blog Page</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <?php if ( count($posts) > 0 ) : ?>
                <?php foreach ($posts as $post) : ?>
                    <div class="row mt-4 mb-4">
                        <div class="col-12 col-lg-6 mt-2 mb-2">
                            <img src="<?php echo $post['img_url']; ?>" class="img-fluid rounded" alt="...">
                        </div>
                        <div class="col-12 col-lg-6 mt-2 mb-2">
                            <h2><?php echo $post['title']; ?></h2>
                            <p>
                                <i class="fa-regular fa-clock"></i>
                                <span class="badge bg-info"><?php echo $post['created_at']; ?></span>
                                by <i class="fa-regular fa-user"></i>
                                <a href="#!"><span class="badge bg-light text-dark"><?php echo getUserById($post['author_id'])['name']; ?></span></a>
                            </p>
                            <p><?php echo substr($post['content'], 0, 100); ?>...</p>
                            <a href="#!" class="btn btn-danger mt-2">Read more</a>
                        </div>
                    </div>
                <?php endforeach; ?>
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