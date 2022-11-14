<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title ?></title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <!-- SweetAlert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Styles -->
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
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo APP_URL; ?>admin/"><span class="badge bg-success">Admin Panel</span></a>
                        </li>
                        <?php if( isset($_SESSION['user']) ) : ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo $_SESSION['user']['name'] ?>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="<?php echo APP_URL; ?>logout.php">Logout</a></li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        <?php if ( $showBanner ) : ?>
            <div class="banner">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12 text-center">
                            <h1 class="text-white">Blog Page</h1>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </header>
    <main>
        <?php echo $main ?>
    </main>
    <footer class="py-3 my-4">
        <div class="container border-top pt-4">
            <p class="text-center text-muted">&copy; <?php echo date('Y'); ?> Company, Inc. All rights reserved.</p>
        </div>
    </footer>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- DataTables -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script><script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

    <!-- Scripts -->

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                order: [[3, 'desc']],
            });
        } );
    </script>

    <?php if ( isset($_SESSION['created'])  ) : ?>
        <?php if ( $_SESSION['created'] ) : ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Post created successfully!',
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>
            <?php unset($_SESSION['created']); ?>
        <?php endif; ?>
    <?php endif; ?>

    <?php if ( isset($_SESSION['updated'])  ) : ?>
        <?php if ( $_SESSION['updated'] ) : ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Post updated successfully!',
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>
            <?php unset($_SESSION['updated']); ?>
        <?php endif; ?>
    <?php endif; ?>

    <?php if ( isset($_SESSION['deleted'])  ) : ?>
        <?php if ( $_SESSION['deleted'] ) : ?>
            <script>
                Swal.fire(
                    'deleted!',
                    'Post deleted successfully!',
                    'success'
                );
            </script>
            <?php unset($_SESSION['deleted']); ?>
        <?php endif; ?>
    <?php endif; ?>

    <script>
        $('.form-delete').submit(function(e){
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "This post will be permanently deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete!',
                cancelButtonText: 'No, cancel!',
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>

</body>
</html>
