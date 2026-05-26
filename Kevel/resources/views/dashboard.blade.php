@extends('app.master')
@section('title', 'Dashboard')
@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="mt-4 mb-3">
        <h1>Dashboard</h1>
        <p class="text-muted">Selamat datang, <strong>{{ Auth::user()->name }}</strong>!</p>
    </div>

    {{-- Kartu Statistik --}}
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm text-white bg-primary">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="fs-2 fw-bold">{{ $totalProduct }}</div>
                        <div>Total Produk</div>
                    </div>
                    <i class="bi bi-box-seam fs-1 opacity-50"></i>
                </div>
                <div class="card-footer bg-primary border-0">
                    <a href="{{ url('/produk') }}" class="text-white text-decoration-none small">Lihat semua &rarr;</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm text-white bg-success">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="fs-2 fw-bold">{{ $productTersedia }}</div>
                        <div>Produk Aktif</div>
                    </div>
                    <i class="bi bi-check-circle fs-1 opacity-50"></i>
                </div>
                <div class="card-footer bg-success border-0">
                    <a href="{{ url('/produk') }}" class="text-white text-decoration-none small">Lihat semua &rarr;</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm text-white bg-danger">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="fs-2 fw-bold">{{ $productHabis }}</div>
                        <div>Produk Nonaktif</div>
                    </div>
                    <i class="bi bi-x-circle fs-1 opacity-50"></i>
                </div>
                <div class="card-footer bg-danger border-0">
                    <a href="{{ url('/produk') }}" class="text-white text-decoration-none small">Lihat semua &rarr;</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm text-white bg-warning">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="fs-2 fw-bold">{{ $nilaiStok }}</div>
                        <div>Total Nilai Stok</div>
                    </div>
                    <i class="bi bi-currency-dollar fs-1 opacity-50"></i>
                </div>
                <div class="card-footer bg-warning border-0">
                    <span class="text-white small">Nilai total inventori</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Tabel Produk Terbaru --}}
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">5 Produk Terbaru</h5>
            <a href="{{ url('/produk/create') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-lg me-1"></i>Tambah Produk
            </a>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Kondisi</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($productTerbaru as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td>{{ $product->status === 'new' ? 'Baru' : 'Bekas' }}</td>
                            <td>
                                @if ($product->is_active)
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-danger">Nonaktif</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-3">Belum ada data produk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer text-end">
            <a href="{{ url('/produk') }}" class="btn btn-outline-primary btn-sm">Lihat Semua Produk</a>
        </div>
    </div>
@endsection
