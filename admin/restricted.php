<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Restricted</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .restricted-card {
            max-width: 500px;
            text-align: center;
        }
        .restricted-card .icon {
            font-size: 4rem;
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="card restricted-card shadow">
        <div class="card-body">
            <div class="icon mb-4">
                <i class="bi bi-lock-fill"></i>
            </div>
            <h1 class="card-title text-danger">Access Denied</h1>
            <p class="card-text text-muted">
                You do not have permission to access this page. If you believe this is an error, please contact the administrator.
            </p>
            <a href="adsbarg.com" class="btn btn-primary mt-3">Go to Homepage</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
