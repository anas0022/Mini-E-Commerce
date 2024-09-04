<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        h3 {
            color: #343a40;
            border-bottom: 2px solid #343a40;
            padding-bottom: 10px;
        }
        p {
            font-size: 1.2rem;
            color: #6c757d;
        }
        strong {
            color: #007bff;
            font-size: 1.3rem;
        }
        .navbar {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    @include('Admin/nav')

    <div class="container mt-5">
        <h3>Orders Overview</h3>
        <p>Total Orders: <strong>{{ $orderCount }}</strong></p>
    </div>
    <div class="container mt-5">
        <h3>Product Overview</h3>
        <p>Total Products: <strong>{{ $productsCount }}</strong></p>
    </div>

  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
