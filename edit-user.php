<?php
    session_start();

    include_once("vendor/autoload.php");

    use Database\DbConnection;
    use Database\UsersTable;
    use Helpers\Auth;
    use Helpers\HTTP;

    $currentUser =Auth::check();

    if($currentUser->role !== "Admin"){
        HTTP::redirect("index.php", "unauthorized=1");
    }

    $usersTable = new UsersTable(new DbConnection());

    $id = $_GET['id'];

    $user = $usersTable->getOne($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Page</title>
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
        <main class="flex-grow-1 p-4 d-flex align-items-start justify-content-center">
            <div class="w-100" style="max-width: 480px;">
                <div class="mb-4">
                    <h1 class="h4 fw-semibold mb-0">Edit User</h1>
                    <p class="text-muted small mb-0">Fill in the details to edit user.</p>
                </div>

                <div class="card shadow-sm border-0">
                    <div class="card-body p-4 p-md-5">
                        <form method="post" action="_actions/Users/update-user.php">
                            <input type="hidden" name="id" value="<?= $user->id ?>">

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text"
                                       class="form-control"
                                       id="name"
                                       name="name"
                                       value="<?= $user->name ?>"
                                       placeholder="Enter your name"
                                       autocomplete="name"
                                       required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email"
                                       class="form-control"
                                       id="email"
                                       name="email"
                                       value="<?= $user->email ?>"
                                       placeholder="Enter your email"
                                       autocomplete="email"
                                       required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mb-3">Update</button>
                            <a href="users.php" class="btn btn-outline-secondary w-100">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
