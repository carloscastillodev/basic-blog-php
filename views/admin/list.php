<?php
    $title = 'Blog - Manage posts';
    $showBanner = false;
?>

<?php ob_start(); ?>

    <div class="container mt-5 px-4">
        <?php if ( count($posts) > 0 ) : ?>
            <div class="card">
                <div class="card-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <h2>Manage posts</h2>
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                                <a href="<?php echo APP_URL; ?>admin/create.php" class="btn btn-primary"><i class="fa-regular fa-plus"></i> Create new post</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped table-bordered table-hover" style="width:100%">
                            <thead class="table-dark">
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Title</th>
                                    <th class="text-center">Author</th>
                                    <th class="text-center">Created at</th>
                                    <th class="text-center">Edit</th>
                                    <th class="text-center">Delete</th>
                                </tr>
                            </thead>
                            <tfoot class="table-dark">
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Author</th>
                                <th class="text-center">Created at</th>
                                <th class="text-center">Edit</th>
                                <th class="text-center">Delete</th>
                            </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($posts as $post) : ?>
                                    <tr>
                                        <td class="text-center"><?php echo $post['id']; ?></td>
                                        <td><?php echo $post['title']; ?></td>
                                        <td><?php echo getUserById($post['author_id'])['name']; ?></td>
                                        <?php
                                            $datetime = new DateTime($post['created_at']);
                                            $date = $datetime->format('Y-m-d');
                                        ?>
                                        <td><?php echo $date; ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo APP_URL; ?>admin/edit.php?id=<?php echo $post['id']; ?>" class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                                        </td>
                                        <td class="text-center">
                                            <form action="<?php echo APP_URL; ?>admin/delete.php" method="POST" class="form-delete">
                                                <input type="hidden" id="id" name="id" value="<?php echo $post['id']; ?>">
                                                <button type="submit" class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
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