<?php
    $title = 'Blog - Edit post';
    $showBanner = false;
    $datetime = new DateTime($post['created_at']);
    $created_at = $datetime->format('Y-m-d H:i:s');
?>

<?php ob_start(); ?>

    <div class="container mt-5 px-4">
        <div class="row">
            <div class="col-12 col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit post</h2>
                        <p>Required fields are marked *</p>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo APP_URL; ?>admin/update.php" method="POST" class="row g-3 form-store">
                            <div class="col-12">
                                <input type="text" name="title" class="form-control" placeholder="Title*" value="<?php echo $post['title']; ?>" required>
                            </div>
                            <div class="col-12">
                                <textarea rows="10" name="content" class="form-control" placeholder="Content*" required><?php echo $post['content']; ?></textarea>
                            </div>
                            <div class="col-md-12">
                                <input type="url" name="img_url" class="form-control" placeholder="URL*" value="<?php echo $post['img_url']; ?>" required>
                            </div>
                            <div class="col-md-12">
                                <input type="datetime-local" name="created_at" class="form-control" value="<?php echo $created_at; ?>" required>
                            </div>
                            <div class="col-12">
                                <a href="<?php echo APP_URL; ?>admin/" class="btn btn-dark">Back</a>
                                <input type="hidden" id="id" name="id" value="<?php echo $post['id']; ?>">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $main = ob_get_clean(); ?>