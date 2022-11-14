<?php
    $title = 'Blog - Create post';
    $showBanner = false;
?>

<?php ob_start(); ?>

    <div class="container mt-5 px-4">
        <div class="row">
            <div class="col-12 col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h2>Create post</h2>
                        <p>Required fields are marked *</p>
                    </div>
                    <div class="card-body">
                        <?php if ( isset($_SESSION['errors']) ) : ?>
                            <div class="alert alert-danger">
                                <?php $errors = $_SESSION['errors'];  ?>
                                <?php foreach ( $errors as $error ) : ?>
                                    <?php echo "- $error<br>"; ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <form action="<?php echo APP_URL; ?>admin/store.php" method="POST" class="row g-3 form-store">
                            <div class="col-12">
                                <input type="text" name="title" class="form-control" placeholder="Title*" required>
                            </div>
                            <div class="col-12">
                                <textarea rows="10" name="content" class="form-control" placeholder="Content*" required></textarea>
                            </div>
                            <div class="col-md-12">
                                <input type="url" name="img_url" class="form-control" placeholder="URL*" required>
                            </div>
                            <div class="col-md-12">
                                <input type="datetime-local" name="created_at" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <a href="<?php echo APP_URL; ?>admin/" class="btn btn-dark">Back</a>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $main = ob_get_clean(); ?>