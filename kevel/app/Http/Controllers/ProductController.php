<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $title    = "Daftar Produk";
        $products = Product::paginate(10);
        return view('produk.index', compact('title', 'products'));
    }

    public function create()
    {
        $title = "Tambah Produk";
        return view('produk.create', compact('title'));
    }

    public function store(Request $request)
    {
        // Validasi input dengan pesan error dalam Bahasa Indonesia
        $validated = $request->validate(
            [
                'name' => 'required|string|max:100',
                'price' => 'required|numeric|min:0',
                'description' => 'nullable|string',
                'status' => 'required|in:new,used',
                'is_active' => 'nullable|boolean',
                'release_date' => 'nullable|date',
            ],[
                'name.required' => 'Nama produk wajib diisi.',
                'name.max' => 'Nama produk maksimal 100 karakter.',
                'price.required' => 'Harga produk wajib diisi.',
                'price.numeric' => 'Harga produk harus berupa angka.',
                'price.min' => 'Harga produk tidak boleh negatif.',
                'status.required' => 'Status produk wajib dipilih.',
                'status.in' => 'Status produk harus new atau used.',
                'release_date.date' => 'Format tanggal rilis tidak valid.',
            ]);

        // Checkbox is_active: jika tidak dicentang, nilainya 0
        $validated['is_active'] = $request->has('is_active') ? 1 : 0;
        Product::create($validated);
        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $title   = "Detail Produk";
        $product = Product::findOrFail($id);

        return view('produk.detail', compact('title', 'product'));
    }

    public function edit(string $id)
    {
        $title   = "Edit Produk";
        $product = Product::findOrFail($id);

        return view('produk.edit', compact('title', 'product'));
    }

    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        // Validasi input dengan pesan error dalam Bahasa Indonesia
        $validated = $request->validate(
            [
                'name' => 'required|string|max:100',
                'price' => 'required|numeric|min:0',
                'description' => 'nullable|string',
                'status' => 'required|in:new,used',
                'is_active' => 'nullable|boolean',
                'release_date' => 'nullable|date',
            ],[
                'name.required' => 'Nama produk wajib diisi.',
                'name.max' => 'Nama produk maksimal 100 karakter.',
                'price.required' => 'Harga produk wajib diisi.',
                'price.numeric' => 'Harga produk harus berupa angka.',
                'price.min' => 'Harga produk tidak boleh negatif.',
                'status.required' => 'Status produk wajib dipilih.',
                'status.in'         => 'Status produk harus new atau used.',
                'release_date.date' => 'Format tanggal rilis tidak valid.',
            ]);

        // Checkbox is_active: jika tidak dicentang, nilainya 0
        $validated['is_active'] = $request->has('is_active') ? 1 : 0;

        $product->update($validated);

        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }


    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil dihapus.');
    }

    /**
     * Search produk berdasarkan nama atau deskripsi.
     */
    public function search(Request $request)
    {
        $query = $request->input('q');

        if ($query) {
            $products = Product::where('name', 'like', "%{$query}%")
                               ->orWhere('description', 'like', "%{$query}%")
                               ->paginate(10)
                               ->appends(['q' => $query]);
        } else {
            $products = collect();
        }

        return view('produk.search', [
            'title'    => 'Cari Produk',
            'products' => $products,
            'query'    => $query,
        ]);
    }
}
