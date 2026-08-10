<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book – Knowledge Nest Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-light">

    <div class="d-flex">

        <!-- Sidebar -->
        <?php include '_includes/navbar.php'; ?>

        <!-- Main -->
        <main class="flex-grow-1 p-4 d-flex align-items-start justify-content-center">
            <div class="w-100" style="max-width: 480px;">
                <div class="mb-4">
                    <h1 class="h4 fw-semibold mb-0">Add Book</h1>
                    <p class="text-muted small mb-0">Fill in the details to add a new book.</p>
                </div>

                <?php if (isset($_GET['errorFile'])) : ?>
                    <div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                        Something's wrong with file or image type!!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>

                <div class="card shadow-sm border-0">
                    <div class="card-body p-4 p-md-5">
                        <form method="post" action="_actions/Books/create-book.php" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="name" class="form-label">Book Name</label>
                                <input type="text"
                                       class="form-control"
                                       id="name"
                                       name="name"
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
                                       required>
                            </div>

                            <div class="mb-3">
                                <label for="author" class="form-label">Author</label>
                                <input type="text"
                                       class="form-control"
                                       id="author"
                                       name="author"
                                       placeholder="Enter author name"
                                       required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mb-2">Add Book</button>
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
