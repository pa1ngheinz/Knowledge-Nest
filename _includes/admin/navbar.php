<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<nav id="sidebar" class="d-flex flex-column flex-shrink-0 p-3 bg-dark text-white" style="width: 240px; min-height: 100vh;">
    <a href="admin.php" class="d-flex align-items-center justify-content-center mb-3 mb-md-0 text-white text-decoration-none">
        <span class="fs-5 fw-semibold">Admin Panel</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">

        <!-- Books Dropdown -->
        <li class="nav-item">
            <a href="#booksSubmenu"
               class="nav-link text-white d-flex align-items-center gap-2"
               data-bs-toggle="collapse"
               role="button"
               aria-expanded="true">
                <i class="fa-solid fa-book"></i>
                Manage Books
                <i class="fa-solid fa-chevron-down ms-auto" style="font-size: 11px;"></i>
            </a>

            <div class="collapse show" id="booksSubmenu">
                <ul class="btn-toggle-nav list-unstyled ps-3 mt-1">
                    <li>
                        <a href="admin.php"
                           class="nav-link rounded <?= in_array(basename($_SERVER['PHP_SELF']), ['admin.php', 'add-book.php', 'edit-book.php']) ? 'active' : 'text-white' ?>">
                         Books
                        </a>
                    </li>
                    <li>
                        <a href="borrowings.php"
                           class="nav-link rounded <?= basename($_SERVER['PHP_SELF']) === 'borrowings.php' ? 'active' : 'text-white' ?>">
                        Borrowings
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Users Dropdown -->
        <li class="nav-item">
            <a href="#usersSubmenu"
               class="nav-link text-white d-flex align-items-center gap-2"
               data-bs-toggle="collapse"
               role="button"
               aria-expanded="true">
                <i class="fa-solid fa-users"></i>
                Manage Users
                <i class="fa-solid fa-chevron-down ms-auto" style="font-size: 11px;"></i>
            </a>

            <div class="collapse show" id="usersSubmenu">
                <ul class="btn-toggle-nav list-unstyled ps-3 mt-1">
                    <li>
                        <a href="users.php"
                           class="nav-link rounded <?= in_array(basename($_SERVER['PHP_SELF']), ['users.php', 'add-user.php', 'edit-user.php']) ? 'active' : 'text-white' ?>">
                            Users
                        </a>
                    </li>
                    <li>
                        <a href="roles.php"
                           class="nav-link rounded <?= in_array(basename($_SERVER['PHP_SELF']), ['roles.php', 'add-role.php', 'edit-role.php']) ? 'active' : 'text-white' ?>">
                            Roles
                        </a>
                    </li>
                </ul>
            </div>
        </li>

    </ul>
</nav>
