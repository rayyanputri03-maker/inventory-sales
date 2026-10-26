<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Baru - StockHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Input Transaksi Penjualan</h4>
                    </div>
                    <div class="card-body">
                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <form action="{{ route('sales.store') }}" method="POST">
                            @csrf
                            <div id="items-wrapper">
                                <div class="row mb-3 item-row">
                                    <div class="col-md-6">
                                        <label class="form-label">Produk</label>
                                        <select name="items[0][product_id]" class="form-select" required>
                                            <option value="">-- Pilih Produk --</option>
                                            @foreach($products as $product)
                                                <option value="{{ $product->id }}">
                                                    {{ $product->name }} (Stok: {{ $product->stock }} | Rp {{ number_format($product->price, 0, ',', '.') }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Jumlah (Qty)</label>
                                        <input type="number" name="items[0][quantity]" class="form-control" min="1" value="1" required>
                                    </div>
                                    <div class="col-md-2 d-flex align-items-end">
                                        <button type="button" class="btn btn-danger remove-row w-100" disabled>Hapus</button>
                                    </div>
                                </div>
                            </div>

                            <button type="button" id="add-item" class="btn btn-secondary btn-sm mb-3">+ Tambah Produk Lain</button>

                            <hr>
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('sales.index') }}" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-success">Simpan Transaksi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let itemIndex = 1;
        document.getElementById('add-item').addEventListener('click', function() {
            let wrapper = document.getElementById('items-wrapper');
            let firstRow = wrapper.querySelector('.item-row');
            let newRow = firstRow.cloneNode(true);

            newRow.querySelector('select').name = `items[${itemIndex}][product_id]`;
            newRow.querySelector('select').value = '';
            newRow.querySelector('input').name = `items[${itemIndex}][quantity]`;
            newRow.querySelector('input').value = 1;
            
            let removeBtn = newRow.querySelector('.remove-row');
            removeBtn.removeAttribute('disabled');
            removeBtn.addEventListener('click', function() {
                newRow.remove();
            });

            wrapper.appendChild(newRow);
            itemIndex++;
        });
    </script>
</body>
</html>