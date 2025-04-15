@extends('template')
@section('title', 'User')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <a href="{{ route('user.create') }}" class="mb-3 btn btn-info">Buat User</a>
                <form action="#" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" placeholder="Cari User..." value="">
                    <button type="submit" class="btn btn-secondary">Cari</button>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data Statis -->
                        <tr>
                            <th scope="row">1</th>
                            <td>John Doe</td>
                            <td>johndoe@example.com</td>
                            <td>Admin</td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    <a href="#" class="btn btn-warning">Edit</a>
                                    <form action="#" method="post">
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this user?')" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jane Smith</td>
                            <td>janesmith@example.com</td>
                            <td>User</td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    <a href="#" class="btn btn-warning">Edit</a>
                                    <form action="#" method="post">
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this user?')" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <!-- Data Statis Selesai -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
