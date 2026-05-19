@extends('app.master')

@section('title', $title)

@section('sidebar')
    @parent
@section('submenu-produk')
    <a href="/produk/create"
        class="list-group-item list-group-item-action ps-4
         {{ request()->is('produk/create') ? 'active' : '' }}">Tambah
        Produk</a>
    <a href="/produk/search"
        class="list-group-item list-group-item-action ps-4
         {{ request()->is('produk/search') ? 'active' : '' }}">Cari
        Produk</a>
@endsection
@endsection

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">{{ $title }}</h1>

    {{-- Form Pencarian --}}
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ url('/produk/search') }}" method="GET">
                <div class="input-group">
                    <input type="text"
                           class="form-control"
                           placeholder="Cari berdasarkan nama atau deskripsi produk..."
                           name="q"
                           value="{{ $query ?? '' }}"
                           autofocus>
                    <button class="btn btn-primary" type="submit">
                        <i class="bi bi-search"></i> Cari
                    </button>
                    @if (!empty($query))
                        <a href="{{ url('/produk/search') }}" class="btn btn-outline-secondary">Reset</a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    {{-- Hasil Pencarian --}}
    @if (isset($query) && $query !== '')
        @if ($products instanceof \Illuminate\Support\Collection)
            {{-- $products is empty collection (no query) --}}
            <div class="alert alert-info">Masukkan kata kunci untuk mencari produk.</div>
        @elseif ($products->count() > 0)
            <p class="text-muted">
                Ditemukan <strong>{{ $products->total() }}</strong> produk untuk kata kunci
                "<strong>{{ $query }}</strong>".
            </p>

            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Aktif</th>
                            <th>Tanggal Rilis</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                            <tr>
                                <td>{{ $products->firstItem() + $loop->index }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ Str::limit($item->description, 50) }}</td>
                                <td>Rp {{ number_format($item->price, 2, ',', '.') }}</td>
                                <td>
                                    @if ($item->status === 'new')
                                        <span class="badge bg-success">Baru</span>
                                    @else
                                        <span class="badge bg-secondary">Bekas</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->is_active)
                                        <span class="badge bg-primary">Aktif</span>
                                    @else
                                        <span class="badge bg-danger">Nonaktif</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $item->release_date
                                        ? \Carbon\Carbon::parse($item->release_date)->format('d M Y')
                                        : '-' }}
                                </td>
                                <td>
                                    <a href="{{ route('produk.show', $item->id) }}" class="btn btn-sm btn-info">Detail</a>
                                    <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('produk.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $products->links() }}
            </div>
        @else
            <div class="alert alert-warning">
                Tidak ada produk yang ditemukan untuk kata kunci "<strong>{{ $query }}</strong>".
            </div>
        @endif
    @endif
</div>
@endsection
