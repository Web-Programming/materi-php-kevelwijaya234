@extends('app.master')

@section('title', 'Produk Index')

@section('Sidebar')
    @parent
    @section('submenu-produk')
        <a href="/produk/create" class="list-group-item list-group-item-action ps-4">Tambah Produk</a>
        <a href="/produk/search" class="list-group-item list-group-item-action ps-4">Cari Produk</a>
    @endsection
@endsection

@section('content')
<h1 class = "h3 mb-3">Produk Index</h1>
<p class = "text-muted">Halaman dashboard</p>

    <div class="card">
        <div class="card-body">
            Konten produk bisa ditambah
        </div>
    </div>
@endsection