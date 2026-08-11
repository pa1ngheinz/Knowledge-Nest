<header class="px-4 d-flex align-items-center justify-content-between"
        style="height: 60px; background-color: #0d6efd;">

    <span class="fw-bold fs-5 text-white">📚 Knowledge Nest</span>

    <div class="d-flex align-items-center gap-3">
        <span class="text-white small fw-semibold"><?= $_SESSION['user']->name ?></span>

        <div class="rounded-circle d-flex align-items-center justify-content-center text-white"
             style="width: 36px; height: 36px; background-color: #6c757d; font-size: 14px; flex-shrink: 0; cursor: pointer;"
             data-bs-toggle="modal"
             data-bs-target="#userProfileModal"
             role="button">
            <i class="fa-solid fa-user"></i>
        </div>
    </div>

</header>

<!-- Profile popup Modal -->
<div class="modal fade" id="userProfileModal" tabindex="-1" aria-labelledby="userProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userProfileModalLabel">User Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="username" class="form-label fw-semibold">Username</label>
                    <input type="text" id="username" class="form-control" value="<?= $_SESSION['user']->name ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email</label>
                    <input type="email" id="email" class="form-control" value="<?= $_SESSION['user']->email?>" readonly>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="_actions/Users/logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</div>

