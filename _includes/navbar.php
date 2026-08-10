<nav id="sidebar" class="d-flex flex-column flex-shrink-0 p-3 bg-dark text-white" style="width: 240px; min-height: 100vh;">
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-5 fw-semibold">📚 Knowledge Nest</span>
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
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                    <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                </svg>
                Books
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-chevron-down ms-auto" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/>
                </svg>
            </a>

            <div class="collapse show" id="booksSubmenu">
                <ul class="btn-toggle-nav list-unstyled ps-3 mt-1">
                    <li>
                        <a href="admin.php"
                           class="nav-link rounded <?= in_array(basename($_SERVER['PHP_SELF']), ['admin.php', 'add-book.php', 'edit-book.php']) ? 'active' : 'text-white' ?>">
                            Manage Books
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

    </ul>
</nav>
