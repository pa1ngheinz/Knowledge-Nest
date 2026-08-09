<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-body-secondary min-vh-100 d-flex align-items-center">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-5 col-xl-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4 p-md-5">
                        <h1 class="h4 text-center mb-1 fw-semibold">Knowledge Nest</h1>
                        <p class="text-center text-muted small mb-4">Create your account</p>

                        <form method="post" action="_actions/Users/create.php">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text"
                                       class="form-control"
                                       id="name"
                                       name="name"
                                       placeholder="Enter your name"
                                       autocomplete="name"
                                       required>
                            </div>

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
                                       autocomplete="new-password"
                                       required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mb-3">Register</button>

                            <p class="text-center text-muted small mb-0">
                                already have an account?
                                <a href="index.php" class="text-decoration-underline">sign in</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>