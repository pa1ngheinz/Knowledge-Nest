<?php
    session_start();
    include_once("vendor/autoload.php");

    use Database\DbConnection;
    use Database\BooksTable;

    $booksTable = new BooksTable(new DbConnection());
    $allBooks = $booksTable->getAll();
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
                <h1 class="h4 fw-semibold mb-0">Manage Books <span class="badge text-bg-primary"><?= count($allBooks) ?></h1>
                <a href="add-book.php" class="btn btn-primary">
                    + Add Book
                </a>
            </div>

            <?php if (isset($_GET['successAdding'])) : ?>
                <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                    Added successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>

            <?php if (isset($_GET['successDeleting'])) : ?>
                <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                    Deleted successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>

            <?php if (isset($_GET['successUpdating'])) : ?>
                <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                    Updated successfully.
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
                                <th scope="col">Status</th>
                                <th scope="col">Created At</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1; ?>
                            <?php foreach($allBooks as $book): ?>
                            <tr>
                                <td><?= $count ?></td>
                                <td><?= $book->name ?></td>
                                <td><img src="images/<?= $book->image ?>" alt="Book Cover" class="rounded" style="width:50px; height:65px; object-fit:cover;"></td>
                                <td><?= $book->author ?></td>
                                <td><span class="badge bg-success"><?= $book->status ?></span></td>
                                <td><?= $book->created_at ?></td>
                                <td class="text-center">
                                    <a href="edit-book.php?id=<?= $book->id ?>" class="btn btn-sm btn-primary me-1">Edit</a>
                                    <a href="_actions/Books/delete-book.php?id=<?= $book->id ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this book?')">Delete</a>
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
