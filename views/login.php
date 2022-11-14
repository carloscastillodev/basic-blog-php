<?php
    $title = 'Admin Panel - Login';
    $showBanner = false;
?>

<?php ob_start(); ?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <?php if ( $errors ) : ?>
                        <div class="alert alert-danger">
                            <?php foreach ( $errors as $error ) : ?>
                                <?php echo "- $error<br>"; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <form method="POST" action="http://localhost/blog-basic-r1/login.php">
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" required autocomplete="email" autofocus>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-dark">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $main = ob_get_clean(); ?>

<?php include 'base.php' ?>