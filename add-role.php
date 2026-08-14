<?php
    session_start();

    include_once("vendor/autoload.php");

    use Helpers\Auth;
    use Helpers\HTTP;
    use Helpers\CSRF;

    $currentUser =Auth::check();

    if($currentUser->role === "User"){
        HTTP::redirect("index.php", "unauthorized=1");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Role Page</title>
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
                    <h1 class="h4 fw-semibold mb-0">Add Role</h1>
                    <p class="text-muted small mb-0">Fill in the details to add a new role.</p>
                </div>

                <div class="card shadow-sm border-0">
                    <div class="card-body p-4 p-md-5">
                        <form method="post" action="_actions/Users/create-role.php">
                            <input type="hidden" name="csrf_token" value="<?= CSRF::csrf_token() ?>">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text"
                                       class="form-control"
                                       id="name"
                                       name="name"
                                       placeholder="Enter role name"
                                       autocomplete="name"
                                       required>
                            </div>

                            <div class="mb-4">
                                <label for="value" class="form-label">Role's Value</label>
                                <input type="number"
                                       class="form-control"
                                       id="value"
                                       name="value"
                                       placeholder="Enter a number"
                                       autocomplete="new-value"
                                       required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mb-3">Create</button>
                            <a href="roles.php" class="btn btn-outline-secondary w-100">Cancel</a>
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
