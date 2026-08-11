<?php
    include_once("vendor/autoload.php");

    use Database\DbConnection;
    use Database\BooksTable;

    $booksTable = new BooksTable(new DbConnection());

    $id = $_GET['id'];

    $result = $booksTable->getOne($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book Page</title>
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
                    <h1 class="h4 fw-semibold mb-0">Edit Book</h1>
                    <p class="text-muted small mb-0">Fill in the details to edit the book.</p>
                </div>

                <?php if (isset($_GET['errorFile'])) : ?>
                    <div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                        Something's wrong with file or image type!!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>

                <div class="card shadow-sm border-0">
                    <div class="card-body p-4 p-md-5">
                        <form method="post" action="_actions/Books/update-book.php" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $result->id ?>">

                            <div class="mb-3">
                                <label for="name" class="form-label">Book Name</label>
                                <input type="text"
                                       class="form-control"
                                       id="name"
                                       name="name"
                                       value="<?= $result->name ?>"
                                       placeholder="Enter book name"
                                       required>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Book Image</label>
                                <input type="file"
                                       class="form-control"
                                       id="image"
                                       name="image"
                                       accept="image/*"
                                >
                            </div>

                            <div class="mb-3">
                                <label for="author" class="form-label">Author</label>
                                <input type="text"
                                       class="form-control"
                                       id="author"
                                       value="<?= $result->author ?>"
                                       name="author"
                                       placeholder="Enter author name"
                                       required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mb-2">Update Book</button>
                            <a href="admin.php" class="btn btn-outline-secondary w-100">Cancel</a>
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
