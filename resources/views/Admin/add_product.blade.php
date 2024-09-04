<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blurry Background Effect</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .cover {
            backdrop-filter: blur(2px); /* Adjust the blur effect as needed */
            width: 100%;
            position: absolute; 
          
            z-index: 200;
            height: 70vh;
           
        }
        .form-container {
            position: absolute;
            z-index: 300;
   
        padding: 40px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            border-radius: 8px; 
            box-shadow: 0 0px 0px 2px rgba(0, 0, 0, 0.1);
        }
        .form-group img {
            max-width: 20%;
            height: 100px;
            display: block;
            margin-top: 10px;
        }
       
    </style>
</head>

<body>
    <div class="cover"></div>
    @include('admin/product_list')
    <div class="form-container container">
      <a href="{{route('product')}}">back</a>
        <form action="{{route('product.post')}}" method="POST" enctype="multipart/form-data">
            @if ($errors ->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            
            @endif
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            
            @endif
            @csrf
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" class="form-control" id="name" name="product_name" placeholder="Enter product name" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="Enter price" required>
            </div>
            <div class="form-group">
                <label for="image">Product Image</label>
                <input type="file" class="form-control-file" id="image" name="image" accept="image/*" onchange="previewImage()">
            </div>
            <div class="form-group">
                <img id="imagePreview" src="" alt="Image Preview" style="display:none;">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function previewImage() {
            const file = document.querySelector('#image').files[0];
            const reader = new FileReader();
            reader.onloadend = function () {
                const imagePreview = document.querySelector('#imagePreview');
                imagePreview.src = reader.result;
                imagePreview.style.display = 'block';
            };
            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>

</html>
