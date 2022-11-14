<?php
$title = 'Blog - Simple post';
$showBanner = false;
?>

<?php ob_start(); ?>

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
                            <i class="fa-regular fa-comment"></i>
                            <span class="badge bg-warning text-dark"><?php echo getCommentsNumber($post['id']); ?></span>
                        </p>
                    </div>
                    <div class="mt-4 mb-4">
                        <img src="<?php echo $post['img_url']; ?>" class="img-fluid rounded" alt="...">
                    </div>
                    <div class="mt-4">
                        <?php echo $post['content'] ?>
                    </div>
                    <!-- Comments -->
                    <div class="mb-4 mt-4 pt-4">
                        <h3>Comments</h3>
                    </div>
                    <div class="mt-4">
                        <?php if ( count($comments) > 0 ) : ?>
                            <?php echo showComments($comments); ?>
                        <?php else : ?>
                            <div class="row mt-4 mb-4">
                                <div class="col-12">
                                    <p>There are no comments for this post.</p>
                                </div>
                            </div>
                        <?php endif; ?>
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
                        <a class="text-white" href="<?php echo APP_URL; ?>admin/">Admin Panel</a>
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

<?php $main = ob_get_clean(); ?>

<?php include 'base.php' ?>