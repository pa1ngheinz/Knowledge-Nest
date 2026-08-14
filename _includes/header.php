<?php use Helpers\XSS; ?>

<header class="px-4 d-flex align-items-center justify-content-between"
        style="height: 60px; background-color: #0d6efd;">

    <span class="fw-bold fs-5 text-white">📚 Knowledge Nest</span>

    <div class="d-flex align-items-center gap-3">
        <span class="text-white small fw-semibold"><?= XSS::prevent($_SESSION['user']->name) ?></span>

        <button type="button" class="p-0 border-0 bg-transparent rounded-circle"
                style="width: 36px; height: 36px; flex-shrink: 0; cursor: pointer; overflow: hidden;"
                data-bs-toggle="modal"
                data-bs-target="#userProfileModal"
                aria-label="Open profile">
            <?php if(isset($_SESSION['user']->image)) :?>
            <img src="images/<?= XSS::prevent($_SESSION['user']->image) ?>" alt="Defalut" style="width: 100%; height: 100%; object-fit: cover;">
            <?php else :?>
            <img src="images/default.jpg" alt="Defalut" style="width: 100%; height: 100%; object-fit: cover;">
            <?php endif ?>
        </button>
    </div>

</header>

<!-- Profile popup Modal -->
<div class="modal fade" id="userProfileModal" tabindex="-1" aria-labelledby="userProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userProfileModalLabel">My Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="_actions/Users/upload.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= XSS::prevent($_SESSION['user']->id) ?>">

                <div class="modal-body">
                    <div class="text-center mb-4">
                        <?php if(isset($_SESSION['user']->image)) :?>
                        <img src="images/<?= XSS::prevent($_SESSION['user']->image) ?>" alt="Default profile photo" class="rounded-circle border" style="width: 112px; height: 112px; object-fit: cover;">
                        <?php else :?>
                        <img src="images/default.jpg" alt="Default profile photo" class="rounded-circle border" style="width: 112px; height: 112px; object-fit: cover;">
                        <?php endif ?>
                    </div>
                    <div class="mb-3">
                        <label for="profilePhoto" class="form-label fw-semibold">Profile photo</label>
                        <input class="form-control" type="file" name="image" id="profilePhoto" accept="image/*">
                        <div class="form-text">Choose a new photo to update your profile.</div>
                    </div>
                    <div class="border rounded-3 p-3 bg-light">
                        <div class="mb-2">
                            <span class="small text-muted d-block">Name</span>
                            <span class="fw-semibold"><?= XSS::prevent($_SESSION['user']->name) ?></span>
                        </div>
                        <div>
                            <span class="small text-muted d-block">Email</span>
                            <span class="fw-semibold"><?= XSS::prevent($_SESSION['user']->email) ?></span>
                        </div>
                    </div>
                </div>

                <div class="modal-footer d-flex justify-content-between">
                    <a href="_actions/Users/logout.php" class="btn btn-danger" onclick="return confirm('Are you sure do you want to logout?')">Logout</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
