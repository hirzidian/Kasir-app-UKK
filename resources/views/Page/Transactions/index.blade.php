@extends('template')

@section('title', 'Penjualan')

@section('content')

<div class="card-body">
    {{-- Tombol Export untuk Admin --}}
    <div class="mb-3 row text-start">
        <div class="col-auto">
            <a href="{{ route('excel.print') }}" class="btn btn-info">Export Penjualan (.xlsx)</a>
        </div>
    </div>

    {{-- Tombol Tambah Penjualan untuk Petugas --}}
    @if (Auth::user()->role == 'petugas')
    <div class="col-auto text-end mb-3">
        <a href="{{ route('transactions.show') }}" class="btn btn-primary">Tambah Penjualan</a>
    </div>
    @endif

    {{-- Table Wrapper --}}
    <div id="salesTable_wrapper" class="dataTables_wrapper no-footer">
        <div class="d-flex justify-content-between mb-3">
            <div>
                <label>
                    Tampilkan
                    <select name="salesTable_length" class="form-select form-select-sm">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    entri
                </label>
            </div>

            {{-- Pencarian (opsional, bisa diaktifkan kembali) --}}
            {{--
            <div>
                <label>
                    Cari:
                    <input type="search" class="form-control form-control-sm" placeholder="Search...">
                </label>
            </div>
            --}}
        </div>

        {{-- Tabel Penjualan --}}
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Pelanggan</th>
                    <th>Tanggal Penjualan</th>
                    <th>Total Harga</th>
                    <th>Dibuat Oleh</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transactions as $transaction)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $transaction->customer->name ?? 'NON-MEMBER' }}</td>
                    <td>{{ $transaction->created_at->format('d M Y') }}</td>
                    <td>Rp. {{ number_format($transaction->total_price ?? $transaction->total, 0, ',', '.') }}</td>
                    <td>{{ $transaction->user->name ?? 'Tidak Diketahui' }}</td>
                    <td>
                        <div class="d-flex justify-content-around">
                            <a href="{{ route('transactions.sale.print', $transaction->id) }}" class="btn btn-warning">Lihat</a>
                            <a href="{{ route('pdf.print', $transaction->id) }}" class="btn btn-info">Unduh Bukti</a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data penjualan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
