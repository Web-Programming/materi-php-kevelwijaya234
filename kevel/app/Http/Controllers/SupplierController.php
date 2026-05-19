<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $suppliers = [
        //     [
        //         'id' => 1,
        //         'name' => 'PT Sumber Makmur',
        //         'phone' => '021-12345678',
        //         'address' => 'Jl. Sudirman No. 123, Jakarta Pusat'
        //     ],
        //     [
        //         'id' => 2,
        //         'name' => 'CV Mitra Jaya',
        //         'phone' => '022-87654321',
        //         'address' => 'Jl. Raya Bandung No. 45, Bandung'
        //     ],
        //     [
        //         'id' => 3,
        //         'name' => 'UD Sejahtera Bersama',
        //         'phone' => '031-11223344',
        //         'address' => 'Jl. Pemuda No. 67, Surabaya'
        //     ],
        //     [
        //         'id' => 4,
        //         'name' => 'PT Global Supplier',
        //         'phone' => '024-99887766',
        //         'address' => 'Jl. Pandanaran No. 89, Semarang'
        //     ],
        //     [
        //         'id' => 5,
        //         'name' => 'CV Cahaya Abadi',
        //         'phone' => '0274-556677',
        //         'address' => 'Jl. Malioboro No. 12, Yogyakarta'
        //     ]
        // ];

        // return view('supplier.index', [
        //     'title' => 'Daftar Supplier',
        //     'suppliers' => $suppliers
        // ]);

        return view('supplier.index',[
            'title' => 'Daftar Supplier',
            'suppliers' => Supplier::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supplier.create',[ 'title' => 'Tambah Supplier']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'phone' => 'nullable|max:20',
            'address' => 'nullable'
        ]);

        Supplier::create($validatedData);

        return redirect('/supplier')->with('success', 'Supplier berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('supplier.detail', [
            'title' => 'Detail Supplier',
            'supplier' => Supplier::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return view('supplier.edit', [
            'title' => 'Edit Supplier',
            'supplier' => Supplier::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'phone' => 'nullable|max:20',
            'address' => 'nullable'
        ]);

        $supplier = Supplier::findOrFail($id);
        $supplier->update($validatedData);

        return redirect('/supplier')->with('success', 'Supplier berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return redirect('/supplier')->with('success', 'Supplier berhasil dihapus!');
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        
        if ($query) {
            $suppliers = Supplier::where('name', 'like', "%{$query}%")
                               ->orWhere('phone', 'like', "%{$query}%")
                               ->orWhere('address', 'like', "%{$query}%")
                               ->paginate(10)->appends(['q' => $query]);
        } else {
            $suppliers = collect(); // return empty collection if no search
        }

        return view('supplier.search', [
            'title' => 'Cari Supplier',
            'suppliers' => $suppliers,
            'query' => $query
        ]);
    }
}
