@extends('app.master')

@section('title', $title)

@section('sidebar')
    @parent
@section('submenu-supplier')
    <a href="/supplier/create"
        class="list-group-item list-group-item-action ps-4 
         {{ request()->is('supplier/create') ? 'active' : '' }}">Tambah
        Supplier</a>
    <a href="/supplier/search"
        class="list-group-item list-group-item-action ps-4 
         {{ request()->is('supplier/search') ? 'active' : '' }}">Cari
        Supplier</a>
@endsection
@endsection

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">{{ $title }}</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $supplier->name }}</h5>
            <p class="card-text"><strong>Telepon:</strong> {{ $supplier->phone ?? '-' }}</p>
            <p class="card-text"><strong>Alamat:</strong> {{ $supplier->address ?? '-' }}</p>
            
            <a href="{{ url('/supplier/' . $supplier->id . '/edit') }}" class="btn btn-primary">Edit</a>
            <a href="{{ url('/supplier') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
