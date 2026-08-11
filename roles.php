<?php
    session_start();

    include_once("vendor/autoload.php");

    use Database\DbConnection;
    use Database\RolesTable;
    use Helpers\Auth;
    use Helpers\HTTP;

    $currentUser =Auth::check();

    if($currentUser->role !== "Admin"){
        HTTP::redirect("index.php", "unauthorized=1");
    }

    $rolesTable = new RolesTable(new DbConnection());

    $allRoles = $rolesTable->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Roles Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-light">

    <!-- Header -->
    <?php include '_includes/header.php'; ?>

    <div class="d-flex">

        <!-- Sidebar -->
        <?php include '_includes/admin/navbar.php'; ?>

        <!-- Main -->
        <main class="flex-grow-1 p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h1 class="h4 fw-semibold mb-0">Manage Roles <span class="badge text-bg-primary"><?= count($allRoles) ?></span></h1>
                <a href="add-role.php" class="btn btn-primary">
                    + Add Role
                </a>
            </div>

            <?php if (isset($_GET['successAdding'])) : ?>
                <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                    Added successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>

            <?php if (isset($_GET['successUpdating'])) : ?>
                <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                    Updated successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>
            
            <?php if (isset($_GET['successDeleting'])) : ?>
                <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                    Deleted successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>
            
            <div class="card shadow-sm border-0">
                <div class="card-body p-0">
                    <table class="table table-hover table-bordered mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Value</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Updated At</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $count = 1 ?>
                            <?php foreach($allRoles as $role):?>
                            <tr>
                                <td><?= $count ?></td>
                                <td><?= $role->name ?></td>
                                <td><?= $role->value ?></td>
                                <td><?= $role->created_at ?></td>
                                <td><?= $role->updated_at ?></td>
                                <td class="d-flex justify-content-center">
                                        <a href="edit-user.php?id=<?= $role->id ?>" class="btn btn-primary mx-2">Edit</a>

                                        <a href="_actions/Users/delete-user.php?id=<?= $role->id ?>" class="btn btn-danger" onclick="return confirm('Are you sure do you want to delete?')">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <?php $count++ ?>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
