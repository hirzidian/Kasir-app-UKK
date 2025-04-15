@extends('noSidebar')
@section('title', 'Edit Product')
@section('content')

<div class="card-body">
    <form class="mx-2 form-horizontal form-material" method="POST" action="#" enctype="multipart/form-data" onsubmit="cleanPrice()">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-12">Nama Produk <span class="text-danger">*</span></label>
                    <div class="col-md-12">
                        <input type="text" name="name" class="form-control form-control-line" value="Contoh Produk">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-12">Gambar Produk <span class="text-danger">*</span></label>
                    <div class="col-md-12">
                        <input type="file" name="image" class="form-control form-control-line">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-12">Harga <span class="text-danger">*</span></label>
                    <div class="col-md-12">
                        <input type="text" name="price" id="price" class="form-control form-control-line" value="Rp 10.000" oninput="formatPrice(this)">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-12">Stok <span class="text-danger">*</span></label>
                    <div class="col-md-12">
                        <input type="number" name="stock" class="form-control form-control-line" value="50">
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-between">
            <div class="col text-start">
                <a href="#" class="btn btn-secondary w-25">Kembali</a>
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
</script>

@endsection
