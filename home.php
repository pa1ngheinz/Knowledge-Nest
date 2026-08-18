<?php 
    session_start();

    include_once("vendor/autoload.php");

    use Database\DbConnection;
    use Database\BooksTable;
    use Helpers\XSS;
    use Helpers\CSRF;

    $booksTable = new BooksTable(new DbConnection());
    $allBooks = $booksTable->getAll();

    //filtering available books
    $availableBooks = array_filter($allBooks, function ($book) {
        return $book->status === "Available";
    });
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library | Knowledge Nest</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
          <link rel="stylesheet" href="styles/style.css">
</head>
<body class="bg-light">

    <?php include '_includes/header.php'; ?>

    <div class="d-flex">
        <?php include '_includes/user/navbar.php'; ?>

        <main class="flex-grow-1 p-4">
            <div class="mb-4">
                <h1 class="h3 fw-bold mb-1">Books Available <span class="badge bg-primary"><?= count($availableBooks) ?></span></h1>
            </div>

            <?php if (isset($_GET['successBorrowing'])) : ?>
                <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                    Borrowed successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>

            <div class="row g-4">
                <?php foreach($allBooks as $book): ?>
                <div class="col-12 col-sm-6 col-lg-3">
                    <article class="card h-100 shadow-sm border-0">
                        <img src="images/<?= XSS::prevent($book->image) ?>" class="card-img-top" alt="<?= XSS::prevent($book->name) ?>" style="height: 260px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h2 class="h5 card-title"><?= XSS::prevent($book->name) ?></h2>
                            <p class="card-text text-muted mb-2"><?= XSS::prevent($book->author) ?></p>

                            <?php if($book->status === "Available"): ?>
                            <span class="badge text-bg-success align-self-start mb-3"><?= XSS::prevent($book->status) ?></span>
                            <?php else: ?>
                                <span class="badge text-bg-danger align-self-start mb-3"><?= XSS::prevent($book->status) ?></span>
                            <?php endif ?>

                            <?php if($book->status === "Available"): ?>
                            <form action="_actions/Borrowings/create-borrowing.php" method="post">
                                <input type="hidden" name="book_id" value="<?= XSS::prevent($book->id) ?>">
                                <input type="hidden" name="csrf_token" value="<?= CSRF::csrf_token() ?>">

                                <button type="submit" class="btn btn-primary mt-auto w-100">Borrow</button>
                            </form>
                            <?php else: ?>
                            <button type="button" class="btn btn-secondary cursor-crosshair mt-auto">Unavailable</button>
                            <?php endif ?>
                        </div>
                    </article>
                </div>
                <?php endforeach ?>

            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
</body>
</html>
