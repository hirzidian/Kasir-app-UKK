@extends('noSidebar')
@section('title', 'Edit Product')
@section('content')

    <body>
        <div class="card-body">
            <form class="mx-2 form-horizontal form-material" method="POST" 
                action="{{ route('products.update', $product->id) }}"
                enctype="multipart/form-data" onsubmit="cleanPrice()">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-12">Nama Produk <span class="text-danger">*</span></label>
                            <div class="col-md-12">
                                <input type="text" name="name" class="form-control form-control-line " value="{{ $product->name }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-12">Gambar Produk <span class="text-danger">*</span></label>
                            <div class="col-md-12">
                                <input type="file" name="image" class="form-control form-control-line ">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-12">Harga <span class="text-danger">*</span></label>
                            <div class="col-md-12">
                                <input type="text" name="price" id="price" class="form-control form-control-line "
                                    value="{{ $product->price }}" maxlength="15" oninput="formatPrice(this)">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-12">Stok <span class="text-danger">*</span></label>
                            <div class="col-md-12">
                                <input type="number" name="stock" maxlenght="15" id="stock" class="form-control form-control-line " 
                                    value="{{ $product->stock }}">
                                <small id="stockWarning" class="text-danger" style="display: none;">Stok tidak boleh lebih dari 10 karakter.</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="col text-start">
                        <a href="{{ route('products.index') }}" class="btn btn-secondary w-25">Kembali</a>
                    </div>
                    <div class="col text-end">
                        <button type="submit" class="btn btn-primary w-25">Kirim</button>
                    </div>
                </div>
            </form>
        </div>

        <script>
            function formatPrice(input) {
                let value = input.value.replace(/[^\d]/g, "");  
                if (value) {
                    value = 'Rp ' + value.replace(/\B(?=(\d{3})+(?!\d))/g, "."); 
                }
                input.value = value; 
            }

            function cleanPrice() {
                let priceInput = document.getElementById('price');
                priceInput.value = priceInput.value.replace(/[^\d]/g, "");
            }

            document.getElementById('stock').addEventListener('input', function() {
                let stock = this.value;
                let warning = document.getElementById('stockWarning');
                if (stock.length > 10) {
                    warning.style.display = 'block';
                    this.value = stock.slice(0, 10); 
                } else {
                    warning.style.display = 'none';
                }
            });
        </script>
    </body>

@endsection
