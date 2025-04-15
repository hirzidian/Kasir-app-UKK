@extends('template')

@section('title', 'Product')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="table-responsive">
            <div class="card-header d-flex justify-content-between align-items-center">
                <a href="#" class="btn btn-info">Buat Product</a>

                <form action="#" method="GET" class="d-flex">
                    <input 
                        type="text" 
                        name="search" 
                        class="form-control me-2" 
                        placeholder="Cari product..." 
                        value="">
                    <button type="submit" class="btn btn-secondary">Cari</button>
                </form>
            </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col"></th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td><img src="https://via.placeholder.com/100" alt="Produk A" width="100"></td>
                        <td>Produk A</td>
                        <td>10.000</td>
                        <td>50</td>
                        <td>
                            <div class="d-flex justify-content-around">
                                <a href="#" class="btn btn-warning">Edit</a>
                                <form action="#" method="post" onsubmit="return confirm('YAKIN BROO')">
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td><img src="https://via.placeholder.com/100" alt="Produk B" width="100"></td>
                        <td>Produk B</td>
                        <td>15.000</td>
                        <td>30</td>
                        <td>
                            <div class="d-flex justify-content-around">
                                <a href="#" class="btn btn-warning">Edit</a>
                                <form action="#" method="post" onsubmit="return confirm('YAKIN BROO')">
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td><img src="https://via.placeholder.com/100" alt="Produk C" width="100"></td>
                        <td>Produk C</td>
                        <td>25.000</td>
                        <td>20</td>
                        <td>
                            <div class="d-flex justify-content-around">
                                <a href="#" class="btn btn-warning">Edit</a>
                                <form action="#" method="post" onsubmit="return confirm('YAKIN BROO')">
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
