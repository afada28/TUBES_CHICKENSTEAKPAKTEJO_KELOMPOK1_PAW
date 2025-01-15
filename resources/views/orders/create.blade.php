<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">  
    <title>Buat Pesanan</title>  
</head>  
<body>  
    <div class="container mt-5">  
        <h1>Buat Pesanan</h1>  
        <form action="{{ route('orders.store') }}" method="POST">  
            @csrf  
            <div class="form-group">  
                <label for="customer_name">Nama Pembeli</label>  
                <input type="text" class="form-control" id="customer_name" name="customer_name" required>  
            </div>  
            <input type="hidden" name="product_id" value="{{ $product->id }}">  
            <div class="form-group">  
                <label>Produk</label>  
                <input type="text" class="form-control" value="{{ $product->name }}" disabled>  
            </div>  
            <button type="submit" class="btn btn-success">Pesan</button>  
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali</a>  
        </form>  
    </div>  
</body>  
</html>  
