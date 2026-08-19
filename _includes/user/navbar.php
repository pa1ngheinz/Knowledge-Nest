<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<nav class="d-flex flex-column flex-shrink-0 p-3 bg-dark text-white" style="width: 240px; min-height: 100vh;">
    <a href="home.php" class="d-flex align-items-center justify-content-center mb-3 text-white text-decoration-none">
        <span class="fs-5 fw-semibold">EXPAND YOUR POV</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column gap-2">
        <li class="nav-item">
            <a href="home.php" class="nav-link d-flex align-items-center gap-2 <?= basename($_SERVER['PHP_SELF']) === 'home.php'? 'active' : 'text-white' ?>">
                <i class="fa-solid fa-book-open"></i>
                Library
            </a>
        </li>
        <li class="nav-item">
            <a href="my-books.php" class="nav-link text-white d-flex align-items-center gap-2 <?= basename($_SERVER['PHP_SELF']) === 'my-books.php'? 'active' : 'text-white' ?>">
                <i class="fa-solid fa-book"></i>
                My Books
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-white d-flex align-items-center gap-2">
                <i class="fa-solid fa-heart"></i>
                Wishlist
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-white d-flex align-items-center gap-2">
                <i class="fa-solid fa-clock-rotate-left"></i>
                History
            </a>
        </li>
    </ul>
</nav>
