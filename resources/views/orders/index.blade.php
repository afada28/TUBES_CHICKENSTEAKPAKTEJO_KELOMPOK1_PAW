<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">  
    <title>Daftar Pesanan</title>  
</head>  
<body>  
    <div class="container mt-5">  
        <h1>Daftar Pesanan</h1>  
        @if (session('success'))  
            <div class="alert alert-success">{{ session('success') }}</div>  
        @endif  
        <table class="table">  
            <thead>  
                <tr>  
                    <th>ID</th>  
                    <th>Nama Pembeli</th>  
                    <th>Produk</th>  
                    <th>Status</th>  
                    <th>Aksi</th>  
                </tr>  
            </thead>  
            <tbody>  
                @foreach ($orders as $order)  
                    <tr>  
                        <td>{{ $order->id }}</td>  
                        <td>{{ $order->customer_name }}</td>  
                        <td>{{ $order->product->name }}</td>  
                        <td>{{ $order->status }}</td>  
                        <td>  
                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">  
                                @csrf  
                                @method('DELETE')  
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin membatalkan pesanan ini?')">Batalkan</button>  
                            </form>  
                        </td>  
                    </tr>  
                @endforeach  
            </tbody>  
        </table>  
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali ke Menu</a>  
    </div>  
</body>  
</html>  
