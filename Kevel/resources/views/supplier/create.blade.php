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
            <form action="{{ url('/supplier') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Supplier</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Telepon</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3">{{ old('address') }}</textarea>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ url('/supplier') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
