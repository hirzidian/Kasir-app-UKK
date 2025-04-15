@extends('noSidebar')
@section('title', 'Buat Product')
@section('content')

    <body>
        <div class="card-body">
            <form class="mx-2 form-horizontal form-material" method="POST" action="{{ route('products.store') }}" 
                enctype="multipart/form-data" onsubmit="cleanPrice()">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-12">Nama Product <span class="text-danger">*</span></label>
                            <div class="col-md-12">
                                <input type="text" name="name" class="form-control form-control-line" placeholder="Nama Product" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-12">Gambar Product <span class="text-danger">*</span></label>
                            <div class="col-md-12">
                                <input type="file" name="image" class="form-control form-control-line" placeholder="Gambar Product" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-12">Harga <span class="text-danger">*</span></label>
                            <div class="col-md-12">
                                <input type="text" name="price" id="price" class="form-control form-control-line" placeholder="Harga" oninput="formatPrice(this)" maxlength="15" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-12">Stock <span class="text-danger">*</span></label>
                            <div class="col-md-12">
                                <input type="text" name="stock" id="stock" class="form-control form-control-line" placeholder="Stock" maxlength="15" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="col text-start">
                        <a href="{{ route('products.index') }}" class="btn btn-secondary w-25">Kembali</a>
                    </div>
                    <div class="col text-end">
                        <button type="submit" class="btn btn-primary w-25" id="submitBtn">Kirim</button>
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
        </script>
    </body>

@endsection
