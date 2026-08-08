<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-body-secondary min-vh-100 d-flex align-items-center">
    <div class="container py-4">
        <?php if (!empty($_GET['success'])) : ?>
            <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                Register successfull.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif ?>
        
        <?php if (!empty($_GET['error'])) : ?>
            <div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                Incorrect Email and Password!!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif ?>

        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-5 col-xl-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4 p-md-5">
                        <h1 class="h4 text-center mb-1 fw-semibold">Knowledge Nest</h1>
                        <p class="text-center text-muted small mb-4">Sign in to your account</p>

                        <form method="post" action="_actions/Users/login.php">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email"
                                       class="form-control"
                                       id="email"
                                       name="email"
                                       placeholder="Enter your email"
                                       autocomplete="email"
                                       required>
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password"
                                       class="form-control"
                                       id="password"
                                       name="password"
                                       placeholder="Enter your password"
                                       autocomplete="current-password"
                                       required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mb-3">Login</button>

                            <p class="text-center text-muted small mb-0">
                                doesn't have an account?
                                <a href="register.php" class="text-decoration-none">sign up</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>