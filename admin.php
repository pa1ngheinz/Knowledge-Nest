<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Books – Knowledge Nest Admin</title>
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
                <h1 class="h4 fw-semibold mb-0">Manage Books</h1>
                <a href="add-book.php" class="btn btn-primary">
                    + Add Book
                </a>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-body p-0">
                    <table class="table table-hover table-bordered mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Author</th>
                                <th scope="col">Status</th>
                                <th scope="col">Created At</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>The Great Gatsby</td>
                                <td><img src="https://placehold.co/50x65" alt="Book Cover" class="rounded" style="width:50px; height:65px; object-fit:cover;"></td>
                                <td>F. Scott Fitzgerald</td>
                                <td><span class="badge bg-success">Available</span></td>
                                <td>2026-01-10</td>
                                <td class="text-center">
                                    <a href="edit-book.php?id=1" class="btn btn-sm btn-warning me-1">Edit</a>
                                    <a href="delete-book.php?id=1" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>To Kill a Mockingbird</td>
                                <td><img src="https://placehold.co/50x65" alt="Book Cover" class="rounded" style="width:50px; height:65px; object-fit:cover;"></td>
                                <td>Harper Lee</td>
                                <td><span class="badge bg-secondary">Borrowed</span></td>
                                <td>2026-02-14</td>
                                <td class="text-center">
                                    <a href="edit-book.php?id=2" class="btn btn-sm btn-warning me-1">Edit</a>
                                    <a href="delete-book.php?id=2" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>1984</td>
                                <td><img src="https://placehold.co/50x65" alt="Book Cover" class="rounded" style="width:50px; height:65px; object-fit:cover;"></td>
                                <td>George Orwell</td>
                                <td><span class="badge bg-success">Available</span></td>
                                <td>2026-03-05</td>
                                <td class="text-center">
                                    <a href="edit-book.php?id=3" class="btn btn-sm btn-warning me-1">Edit</a>
                                    <a href="delete-book.php?id=3" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
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
