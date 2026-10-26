<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi - StockHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Detail Transaksi</h4>
                        <span class="badge bg-primary fs-6">{{ $sale->sale_number }}</span>
                    </div>
                    <div class="card-body">
                        <p class="mb-1"><strong>Tanggal Transaksi:</strong> {{ $sale->created_at->format('d F Y, H:i') }} WIB</p>
                        <hr>
                        
                        <table class="table table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Harga Satuan</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sale->items as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->product->name ?? 'Produk Dihapus' }}</td>
                                        <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" class="text-end"><strong>Total:</strong></td>
                                    <td><strong>Rp {{ number_format($sale->total_amount, 0, ',', '.') }}</strong></td>
                                </tr>
                            </tfoot>
                        </table>

                        <a href="{{ route('sales.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>