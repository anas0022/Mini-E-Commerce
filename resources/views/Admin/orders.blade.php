<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
 
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .page-title {
            margin-bottom: 40px;
            font-weight: bold;
            color: #343a40;
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .card-text {
            font-size: 16px;
        }
    </style>
</head>
<body>
    @include('admin/nav')

    <div class="container mt-5">
        <h3 class="page-title">All Orders</h3>


        <form action="{{ route('orders') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search by customer name" value="{{ request('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </div>
        </form>

        @if ($orders->isNotEmpty())
            <div class="row">
                @foreach ($orders as $order)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <img src="{{ asset('storage/'.$order->image) }}" class="card-img-top" alt="{{ $order->product_name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $order->product_name }}</h5>
                                <p class="card-text">Price: $ {{ $order->price }}</p>
                                <p class="card-text">Ordered By: {{ $order->user->name }}</p>
                                <p class="card-text">Order Date: {{ $order->created_at->format('d M Y') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

      
            <div class="d-flex justify-content-center">
                {{ $orders->appends(['search' => request('search')])->links() }}
            </div>
        @else
            <h1 class="text-center text-danger">No orders found</h1>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
