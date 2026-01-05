<?php

namespace App\Http\Controllers;

use App\Models\Merchandise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class MerchandiseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Merchandise::query();

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('nama_barang', 'like', "%{$search}%")
                  ->orWhere('id_barang', 'like', "%{$search}%")
                  ->orWhere('event_terkait', 'like', "%{$search}%");
        }

        $merchandise = $query->latest()->paginate(5)->withQueryString();
        return view('merchandise.index', compact('merchandise'));
    }

    public function catalog(Request $request)
    {
        $query = Merchandise::query();

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('nama_barang', 'like', "%{$search}%")
                  ->orWhere('event_terkait', 'like', "%{$search}%")
                  ->orWhere('kategori', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
        }

        $merchandise = $query->latest()->paginate(5)->withQueryString();
        return view('merchandise.catalog', compact('merchandise'));
    }

    public function catalogShow(Merchandise $merchandise)
    {
        return view('merchandise.catalog-show', compact('merchandise'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('merchandise.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'id_barang' => 'required|unique:merchandise,id_barang|max:255',
            'nama_barang' => 'required|max:255',
            'event_terkait' => 'required|max:255',
            'deskripsi' => 'nullable|string',
            'kategori' => 'nullable|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ], [
            'id_barang.required' => 'ID Barang wajib diisi',
            'id_barang.unique' => 'ID Barang sudah terdaftar',
            'nama_barang.required' => 'Nama Barang wajib diisi',
            'event_terkait.required' => 'Event Terkait wajib diisi',
            'harga.required' => 'Harga wajib diisi',
            'harga.numeric' => 'Harga harus berupa angka',
            'harga.min' => 'Harga tidak boleh negatif',
            'stok.required' => 'Stok wajib diisi',
            'stok.integer' => 'Stok harus berupa angka bulat',
            'stok.min' => 'Stok tidak boleh negatif',
            'gambar.image' => 'File harus berupa gambar',
            'gambar.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif',
            'gambar.max' => 'Ukuran gambar maksimal 2MB'
        ]);

        // Handle upload gambar
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $namaGambar = time() . '_' . $gambar->getClientOriginalName();
            $gambar->storeAs('merchandise', $namaGambar, 'public');
            $validated['gambar'] = $namaGambar;
        }

        Merchandise::create($validated);

        return redirect()->route('merchandise.index')
            ->with('success', 'Data merchandise berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Merchandise $merchandise)
    {
        return view('merchandise.show', compact('merchandise'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Merchandise $merchandise)
    {
        return view('merchandise.edit', compact('merchandise'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Merchandise $merchandise)
    {
        // Validasi input
        $validated = $request->validate([
            'id_barang' => 'required|max:255|unique:merchandise,id_barang,' . $merchandise->id,
            'nama_barang' => 'required|max:255',
            'event_terkait' => 'required|max:255',
            'deskripsi' => 'nullable|string',
            'kategori' => 'nullable|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ], [
            'id_barang.required' => 'ID Barang wajib diisi',
            'id_barang.unique' => 'ID Barang sudah terdaftar',
            'nama_barang.required' => 'Nama Barang wajib diisi',
            'event_terkait.required' => 'Event Terkait wajib diisi',
            'harga.required' => 'Harga wajib diisi',
            'harga.numeric' => 'Harga harus berupa angka',
            'harga.min' => 'Harga tidak boleh negatif',
            'stok.required' => 'Stok wajib diisi',
            'stok.integer' => 'Stok harus berupa angka bulat',
            'stok.min' => 'Stok tidak boleh negatif',
            'gambar.image' => 'File harus berupa gambar',
            'gambar.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif',
            'gambar.max' => 'Ukuran gambar maksimal 2MB'
        ]);

        // Handle upload gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($merchandise->gambar) {
                Storage::disk('public')->delete('merchandise/' . $merchandise->gambar);
            }
            
            $gambar = $request->file('gambar');
            $namaGambar = time() . '_' . $gambar->getClientOriginalName();
            $gambar->storeAs('merchandise', $namaGambar, 'public');
            $validated['gambar'] = $namaGambar;
        }

        $merchandise->update($validated);

        return redirect()->route('merchandise.index')
            ->with('success', 'Data merchandise berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Merchandise $merchandise)
    {
        // Hapus gambar jika ada
        if ($merchandise->gambar) {
            Storage::disk('public')->delete('merchandise/' . $merchandise->gambar);
        }

        $merchandise->delete();

        return redirect()->route('merchandise.index')
            ->with('success', 'Data merchandise berhasil dihapus!');
    }

    /**
     * Export data to PDF
     */
    public function exportPdf()
    {
        $merchandise = Merchandise::all();
        $pdf = Pdf::loadView('merchandise.pdf', compact('merchandise'));
        
        return $pdf->download('laporan-merchandise-' . date('Y-m-d') . '.pdf');
    }
}
