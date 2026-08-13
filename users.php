<?php
    session_start();

    include_once("vendor/autoload.php");

    use Database\DbConnection;
    use Database\UsersTable;
    use Database\RolesTable;
    use Helpers\Auth;
    use Helpers\HTTP;

    $currentUser =Auth::check();

    var_dump($currentUser); 

    if($currentUser->role === "User"){
        HTTP::redirect("index.php", "unauthorized=1");
    }

    $usersTable = new UsersTable(new DbConnection());
    $rolesTable = new RolesTable(new DbConnection());

    $allUsers = $usersTable->getAll();
    $allRoles = $rolesTable->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Books Page</title>
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
                <h1 class="h4 fw-semibold mb-0">Manage Users <span class="badge text-bg-primary"><?= count($allUsers) ?></span></h1>
                <a href="add-user.php" class="btn btn-primary">
                    + Add User
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

            <?php if (isset($_GET['successRoleChange'])) : ?>
                <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                    Role was successfully changed.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>

            <?php if (isset($_GET['risk'])) : ?>
                <div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                    You won't be able to access admin page if you change!!
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
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Created At</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $count = 1 ?>
                            <?php foreach($allUsers as $user):?>
                            <tr>
                                <td><?= $count ?></td>
                                <td><?= $user->name ?></td>
                                <td><?= $user->email ?></td>
                                <td><?= $user->role ?></td>
                                <td><?= $user->created_at ?></td>
                                <td class="d-flex justify-content-center">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle mx-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Change role
                                        </button>
                                        <ul class="dropdown-menu">
                                            <?php foreach($allRoles as $role) :?>
                                            <li><a class="dropdown-item" href="_actions/Users/change-role.php?id=<?= $user->id ?>&value=<?= $role->value ?>"><?= $role->name ?></a></li>
                                            <?php endforeach ?>
                                        </ul>

                                        <a href="edit-user.php?id=<?= $user->id ?>" class="btn btn-primary mx-2">Edit</a>

                                        <?php if($_SESSION['user']->id !== $user->id) :?>
                                        <a href="_actions/Users/delete-user.php?id=<?= $user->id ?>" class="btn btn-danger" onclick="return confirm('Are you sure do you want to delete?')">Delete</a>
                                        <?php else : ?>
                                        <div class="text-success text-decoration-underline d-inline-block fs-5">Current</div>
                                        <?php endif ?>
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
