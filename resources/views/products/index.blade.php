<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">  
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">  
    <title>Menu Produk</title>  
</head>  
<body>  
    <div class="container mt-5">  
        <h1>Menu Produk</h1>  
        @if (session('success'))  
            <div class="alert alert-success">{{ session('success') }}</div>  
        @endif  
        <table id="productTable" class="table">  
            <thead>  
                <tr>  
                    <th>ID</th>  
                    <th>Nama Produk</th>  
                    <th>Harga</th>  
                    <th>Aksi</th>  
                </tr>  
            </thead>  
            <tbody>  
                @foreach ($products as $product)  
                    <tr>  
                        <td>{{ $product->id }}</td>  
                        <td>{{ $product->name }}</td>  
                        <td>{{ $product->price }}</td>  
                        <td>  
                            <a href="{{ route('orders.create', $product->id) }}" class="btn btn-primary">Pesan</a>  
                        </td>  
                    </tr>  
                @endforeach  
            </tbody>  
        </table>  
    </div>  
  
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>  
    <script>  
        $(document).ready(function() {  
            $('#productTable').DataTable();  
        });  
    </script>  
</body>  
</html>  
