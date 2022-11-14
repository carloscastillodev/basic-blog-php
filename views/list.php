<?php
    $title = 'Blog - List of posts';
    $showBanner = true;
?>

<?php ob_start(); ?>

    <div class="container mt-5 px-4">
        <?php if ( count($posts) > 0 ) : ?>
            <?php foreach ($posts as $post) : ?>
                <div class="row mt-4 mb-4">
                    <div class="col-12 col-lg-6 mt-2 mb-2">
                        <img src="<?php echo $post['img_url']; ?>" class="img-fluid rounded" alt="...">
                    </div>
                    <div class="col-12 col-lg-6 mt-2 mb-2">
                        <h2><?php echo $post['title']; ?></h2>
                        <p>
                            <?php
                                $datetime = new DateTime($post['created_at']);
                                $date = $datetime->format('Y-m-d');
                                $hour = $datetime->format('H:i:s');
                            ?>
                            <i class="fa-regular fa-calendar-check"></i>
                            <time class="badge bg-secondary"><?php echo $date; ?></time>
                            <i class="fa-regular fa-clock"></i>
                            <time class="badge bg-info"><?php echo $hour; ?></time>
                            by <i class="fa-regular fa-user"></i>
                            <a href="#!"><span class="badge bg-light text-dark"><?php echo getUserById($post['author_id'])['name']; ?></span></a>
                        </p>
                        <p><?php echo substr($post['content'], 0, 100); ?>...</p>
                        <a href="<?php echo APP_URL; ?>show.php?id=<?php echo $post['id']; ?>" class="btn btn-danger mt-2">Read more</a>
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

<?php $main = ob_get_clean(); ?>

<?php include 'base.php' ?>