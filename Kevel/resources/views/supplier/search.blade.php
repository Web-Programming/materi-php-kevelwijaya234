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

    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ url('/supplier/search') }}" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari berdasarkan nama, telepon, atau alamat supplier..." name="q" value="{{ $query ?? '' }}">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>

    @if(isset($query) && $query != '')
        @if($suppliers->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Supplier</th>
                            <th>Telepon</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suppliers as $index => $supplier)
                            <tr>
                                <td>{{ $suppliers->firstItem() + $index }}</td>
                                <td>{{ $supplier->name }}</td>
                                <td>{{ $supplier->phone }}</td>
                                <td>{{ $supplier->address }}</td>
                                <td>
                                    <a href="{{ url('/supplier/' . $supplier->id) }}" class="btn btn-sm btn-info">Detail</a>
                                    <a href="{{ url('/supplier/' . $supplier->id . '/edit') }}" class="btn btn-sm btn-primary">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $suppliers->links() }}
            </div>
        @else
            <div class="alert alert-warning">Tidak ada supplier yang ditemukan untuk pencarian "{{ $query }}".</div>
        @endif
    @endif
</div>
@endsection
