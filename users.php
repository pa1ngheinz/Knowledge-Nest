<?php
    include_once("vendor/autoload.php");

    use Database\DbConnection;
    use Database\UsersTable;
    
    $usersTable = new UsersTable(new DbConnection());

    $allUsers = $usersTable->getAll();
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

    <div class="d-flex">

        <!-- Sidebar -->
        <?php include '_includes/navbar.php'; ?>

        <!-- Main -->
        <main class="flex-grow-1 p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h1 class="h4 fw-semibold mb-0">Manage Users</h1>
                <a href="add-book.php" class="btn btn-primary">
                    + Add User
                </a>
            </div>
            
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
                                        <a href="" class="btn btn-warning">edit</a>
                                        <a href="" class="btn btn-danger">delete</a>
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Dropdown button
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        </ul>
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
