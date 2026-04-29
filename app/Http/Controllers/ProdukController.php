<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProdukController extends Controller
{
    /**
     * Menampilkan daftar semua produk/layanan.
     */
    public function index(): View
    {
        $produks = Produk::latest()->get(); // Menggunakan latest() agar urutan lebih rapi

        return view('produk.index', compact('produks'));
    }

    /**
     * Menampilkan form untuk menambah produk baru.
     */
    public function create(): View
    {
        return view('produk.create');
    }

    /**
     * Menyimpan data produk ke database.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'deskripsi' => 'required',
        ]);

        Produk::create($validated);

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil ditambahkan dengan estetik!');
    }

    /**
     * Menampilkan form edit untuk produk tertentu.
     */
    public function edit(Produk $produk): View
    {
        return view('produk.edit', compact('produk'));
    }

    /**
     * Memperbarui data produk.
     */
    public function update(Request $request, Produk $produk): RedirectResponse
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'deskripsi' => 'required',
        ]);

        $produk->update($validated);

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Menghapus produk dari database.
     */
    public function destroy(Produk $produk): RedirectResponse
    {
        $produk->delete();

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk telah dihapus.');
    }
}
