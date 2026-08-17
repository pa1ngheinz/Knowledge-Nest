<?php 
    session_start();

    include_once("vendor/autoload.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library | Knowledge Nest</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-light">

    <?php include '_includes/header.php'; ?>

    <div class="d-flex">
        <?php include '_includes/user/navbar.php'; ?>

        <main class="flex-grow-1 p-4">
            <div class="mb-4">
                <h1 class="h3 fw-bold mb-1">Library</h1>
                <p class="text-muted mb-0">Discover your next favorite book.</p>
            </div>

            <div class="row g-4">
                <div class="col-12 col-sm-6 col-lg-3">
                    <article class="card h-100 shadow-sm border-0">
                        <img src="images/Il grande Gatsby - Riassunto.jpg" class="card-img-top" alt="The Great Gatsby book cover" style="height: 260px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h2 class="h5 card-title">The Great Gatsby</h2>
                            <p class="card-text text-muted mb-2">F. Scott Fitzgerald</p>
                            <span class="badge text-bg-success align-self-start mb-3">Available</span>
                            <button type="button" class="btn btn-primary mt-auto">Borrow</button>
                        </div>
                    </article>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <article class="card h-100 shadow-sm border-0">
                        <img src="images/Kokoro by Natsume Soseki.jpg" class="card-img-top" alt="Kokoro book cover" style="height: 260px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h2 class="h5 card-title">Kokoro</h2>
                            <p class="card-text text-muted mb-2">Natsume Soseki</p>
                            <span class="badge text-bg-success align-self-start mb-3">Available</span>
                            <button type="button" class="btn btn-primary mt-auto">Borrow</button>
                        </div>
                    </article>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <article class="card h-100 shadow-sm border-0">
                        <img src="images/_The Catcher in the Rye_ auf Englisch kaufen.jpg" class="card-img-top" alt="The Catcher in the Rye book cover" style="height: 260px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h2 class="h5 card-title">The Catcher in the Rye</h2>
                            <p class="card-text text-muted mb-2">J. D. Salinger</p>
                            <span class="badge text-bg-warning align-self-start mb-3">Borrowed</span>
                            <button type="button" class="btn btn-outline-secondary mt-auto" disabled>Borrowed</button>
                        </div>
                    </article>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <article class="card h-100 shadow-sm border-0">
                        <img src="images/The Sea Wolf_ A Collector’s Edition Featuring Original Illustrations and Jack London’s Biography.jpg" class="card-img-top" alt="The Sea Wolf book cover" style="height: 260px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h2 class="h5 card-title">The Sea Wolf</h2>
                            <p class="card-text text-muted mb-2">Jack London</p>
                            <span class="badge text-bg-success align-self-start mb-3">Available</span>
                            <button type="button" class="btn btn-primary mt-auto">Borrow</button>
                        </div>
                    </article>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <article class="card h-100 shadow-sm border-0">
                        <img src="images/This Book and I Could Be Friends.jpg" class="card-img-top" alt="This Book and I Could Be Friends book cover" style="height: 260px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h2 class="h5 card-title">This Book and I Could Be Friends</h2>
                            <p class="card-text text-muted mb-2">Megan Wagner Lloyd</p>
                            <span class="badge text-bg-success align-self-start mb-3">Available</span>
                            <button type="button" class="btn btn-primary mt-auto">Borrow</button>
                        </div>
                    </article>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <article class="card h-100 shadow-sm border-0">
                        <img src="images/austin butler, the bikeriders.jpg" class="card-img-top" alt="The Bikeriders book cover" style="height: 260px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h2 class="h5 card-title">The Bikeriders</h2>
                            <p class="card-text text-muted mb-2">Danny Lyon</p>
                            <span class="badge text-bg-danger align-self-start mb-3">Unavailable</span>
                            <button type="button" class="btn btn-outline-secondary mt-auto" disabled>Unavailable</button>
                        </div>
                    </article>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <article class="card h-100 shadow-sm border-0">
                        <img src="images/IMG_0572.PNG" class="card-img-top" alt="The Silent Reader book cover" style="height: 260px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h2 class="h5 card-title">The Silent Reader</h2>
                            <p class="card-text text-muted mb-2">Clara Bennett</p>
                            <span class="badge text-bg-success align-self-start mb-3">Available</span>
                            <button type="button" class="btn btn-primary mt-auto">Borrow</button>
                        </div>
                    </article>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <article class="card h-100 shadow-sm border-0">
                        <img src="images/default.jpg" class="card-img-top" alt="The Last Chapter book cover" style="height: 260px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h2 class="h5 card-title">The Last Chapter</h2>
                            <p class="card-text text-muted mb-2">Olivia Stone</p>
                            <span class="badge text-bg-success align-self-start mb-3">Available</span>
                            <button type="button" class="btn btn-primary mt-auto">Borrow</button>
                        </div>
                    </article>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
</body>
</html>
