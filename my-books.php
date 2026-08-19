<?php
    session_start();

    include_once("vendor/autoload.php");

    use Database\DbConnection;
    use Database\BorrowingsTable;
    use Helpers\Auth;
    use Helpers\XSS;
    use Helpers\CSRF;

    $currentUser =Auth::check();

    $borrowingsTable = new BorrowingsTable(new DbConnection());

    $allBorrowings = $borrowingsTable->getAllByUser($currentUser->id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrowings | Knowledge Nest</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-light">

    <!-- Header -->
    <?php include '_includes/header.php'; ?>

    <div class="d-flex">

        <!-- Sidebar -->
        <?php include '_includes/user/navbar.php'; ?>

        <!-- Main -->
        <main class="flex-grow-1 p-4">

            <div class="d-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 fw-bold mb-0">Borrowing Books <span class="badge text-bg-primary"><?= count($allBorrowings) ?></span></h1>
            </div>

            <?php if (isset($_GET['successAdding'])) : ?>
                <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                    Added successfully.
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
                                <th scope="col">Image</th>
                                <th scope="col">Author</th>
                                <th scope="col">Borrowed By</th>
                                <th scope="col">Borrwed At</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1; ?>
                            <?php foreach($allBorrowings as $borrowing): ?>
                            <tr>
                                <td><?= $count ?></td>
                                <td><?= XSS::prevent($borrowing->name) ?></td>
                                <td><img src="images/<?= XSS::prevent($borrowing->image) ?>" alt="Book Cover" class="rounded" style="width:50px; height:65px; object-fit:cover;"></td>
                                <td><?= XSS::prevent($borrowing->author) ?></td>
                                <td><?= XSS::prevent($borrowing->user) ?></td>
                                <td><?= XSS::prevent($borrowing->borrowed_at) ?></td>
                                <td>
                                    <form action="_actions/Borrowings/delete-borrowing.php" method="post">
                                        <input type="hidden" name="id" value="<?= XSS::prevent($borrowing->id) ?>">
                                        <input type="hidden" name="book_id" value="<?= XSS::prevent($borrowing->book_id) ?>">
                                        <input type="hidden" name="csrf_token" value="<?= CSRF::csrf_token() ?>">
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to return this book?')">Return Back</button>
                                    </form>
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
