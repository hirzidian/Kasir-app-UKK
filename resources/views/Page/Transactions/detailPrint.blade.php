@extends('template')

@section('title', 'Penjualan')

@section('style')
    <style>
        .invoice-price {
            background: #f0f3f4;
            display: table;
            width: 100%;
        }

        .invoice-price .invoice-price-left,
        .invoice-price .invoice-price-right {
            display: table-cell;
            padding: 20px;
            font-size: 20px;
            font-weight: 600;
            width: 75%;
            position: relative;
            vertical-align: middle;
        }

        .invoice-price .invoice-price-left .sub-price {
            display: table-cell;
            vertical-align: middle;
            padding: 0 20px;
        }

        .invoice-price small {
            font-size: 12px;
            font-weight: 400;
            display: block;
        }

        .invoice-price .invoice-price-row {
            display: table;
            float: left;
        }

        .invoice-price .invoice-price-right {
            width: 25%;
            background: #2d353c;
            color: #fff;
            font-size: 28px;
            text-align: right;
            vertical-align: bottom;
            font-weight: 300;
        }

        .invoice-price .invoice-price-right small {
            display: block;
            opacity: .6;
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 12px;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row bg-light px-3 py-4 gutters">
        <div class="col-12">
            <div class="card p-4">
                <div class="card-body p-0">
                    <div class="invoice-container">
                        <div class="invoice-header mb-4">
                            <div class="row mb-3">
                                <div class="col-12 d-flex justify-content-between">
                                    <div>
                                        <a href="#" class="btn btn-primary">Unduh (.pdf)</a>
                                        <a href="#" class="btn btn-secondary">Kembali</a>
                                    </div>
                                    <div class="text-end">
                                        <div><strong>Invoice - #00123</strong></div>
                                        <div>14 April 2025</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-9">
                                    <address>
                                        <b>08123456789</b><br>
                                        MEMBER SEJAK : 10 Januari 2024<br>
                                        MEMBER POIN : 320
                                    </address>
                                </div>
                            </div>
                        </div>

                        <div class="invoice-body mb-4">
                            <div class="table-responsive">
                                <table class="table custom-table m-0">
                                    <thead>
                                        <tr>
                                            <th>Produk</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Sub Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Teh Botol</td>
                                            <td>Rp. 5.000</td>
                                            <td>2</td>
                                            <td>Rp. 10.000</td>
                                        </tr>
                                        <tr>
                                            <td>Indomie Goreng</td>
                                            <td>Rp. 3.500</td>
                                            <td>3</td>
                                            <td>Rp. 10.500</td>
                                        </tr>
                                        <tr>
                                            <td>Roti Coklat</td>
                                            <td>Rp. 7.000</td>
                                            <td>1</td>
                                            <td>Rp. 7.000</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="invoice-price">
                            <div class="invoice-price-left">
                                <div class="invoice-price-row">
                                    <div class="sub-price">
                                        <small>POIN DIGUNAKAN</small>
                                        <span class="text-inverse">5.000</span>
                                    </div>
                                    <div class="sub-price">
                                        <small>KASIR</small>
                                        <span class="text-inverse">Admin Aulia</span>
                                    </div>
                                    <div class="sub-price">
                                        <small>KEMBALIAN</small>
                                        <span class="text-inverse">Rp. 2.000</span>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-price-right">
                                <small>TOTAL</small>
                                <span class="d-block text-decoration-line-through">Rp. 27.500</span>
                                <span class="fw-bold">Rp. 22.500</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>
@endsection
