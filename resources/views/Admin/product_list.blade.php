<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
 
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-list {
            padding: 20px;
        }
        .card {
            margin-bottom: 20px;
            padding: 10px;
        }
        img{
            height: 200px;
          width: 100%;
        }
    </style>
</head>
<body>
    @include('admin/nav')

    <div class="container product-list">
        <a href="{{ route('add_product') }}" class="btn btn-primary mb-3">Add Product</a>

        @if ($products->isNotEmpty())
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="Product Image">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->product_name }}</h5>
                                <p class="card-text">Price: ${{ $product->price }}</p>
                                <a href="{{ route('update_product', $product->id) }}" class="btn btn-warning">Update Product</a>
                                <form action="{{ route('delete_product', $product->id) }}" method="post" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete Product</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No products available.</p>
        @endif
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
