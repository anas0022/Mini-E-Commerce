<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }

        .container {
        
        
            text-align: center;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 50px;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 50px;
        }

        .btn-primary:hover,
        .btn-secondary:hover {
            opacity: 0.9;
        }

        .card {
            margin: 15px 0;
            border: none;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .card img {
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            width: 100%;
            height: auto;
        }

        .card-body {
            text-align: center;
        }

        .card-body p {
            margin-bottom: 10px;
        }

        .card-body .btn {
            margin-top: 10px;
        }

        @media (max-width: 576px) {
            .container {
                padding: 20px;
            }

            .btn-primary,
            .btn-secondary {
                padding: 8px 16px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>


<body class="d-flex  justify-content-center align-items-center vh-100">

    <div class="container">
        @if (!Auth::check())
            <h1 class="mb-4">Welcome to Our Website!</h1>
            <p class="mb-4">Please register or login to continue.</p>
            <a href="/register" class="btn btn-primary mr-2">Register</a>
            <a href="/login" class="btn btn-secondary mr-2">Login</a>
            <a href="/admin/dashboard" class="btn btn-primary">Admin Page</a>
        @else
        @if (session('success') )
<div class="alert alert-success" role="alert">
    {{ session('success') }}
    </div>
@endif
            <h2 class="mb-4">Products</h2>
            @if ($products->isNotEmpty())
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-md-4">
                        <form class="card" action="{{ route('order') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" value="{{ $user->id }}" name="user_id">
    <input type="hidden" value="{{ $product->product_name }}" name="product_name">
    <input type="hidden" value="{{ $product->price }}" name="price">
    <input type="hidden" value="{{ $product->image }}" name="image">
    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->product_name }}">
    <div class="card-body">
        <p class="card-title">{{ $product->product_name }}</p>
        <p class="card-text">$ {{ $product->price }}</p>
        <button type="submit" class="btn btn-primary">Buy Now</button>
    </div>
</form>

                        </div>
                    @endforeach
                </div>
            @else
                <h2>No Products Available</h2>
            @endif
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
