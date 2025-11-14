<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Menampilkan daftar aset (READ + SEARCH + DASHBOARD)
     */
    public function index(Request $request)
    {
        $query = Asset::query(); // Mulai query

        // Logika PENCARIAN
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('name', 'like', "%$search%")
                  ->orWhere('category', 'like', "%$search%")
                  ->orWhere('status', 'like', "%$search%")
                  ->orWhere('location', 'like', "%$search%");
        }

        // Ambil data (setelah difilter) dan paginasi
        $assets = $query->latest()->paginate(10);

        // Data untuk Dashboard
        $dashboardStats = [
            'total_assets' => Asset::count(),
            'total_quantity' => Asset::sum('quantity'),
            'categories' => Asset::distinct('category')->count('category'),
            'locations' => Asset::distinct('location')->count('location'),
        ];

        return view('assets.index', compact('assets', 'dashboardStats'));
    }

    /**
     * Menampilkan form untuk menambah aset baru
     */
    public function create()
    {
        return view('assets.create');
    }

    /**
     * Menyimpan aset baru ke database
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
        ]);

        Asset::create($validated);

        return redirect()->route('assets.index')
                         ->with('success', 'Aset baru berhasil ditambahkan.');
    }


    /**
     * Menampilkan form untuk mengedit aset
     */
    public function edit(Asset $asset)
    {
        return view('assets.edit', compact('asset'));
    }

    /**
     * Menyimpan perubahan aset ke database
     */
    public function update(Request $request, Asset $asset)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
        ]);

        $asset->update($validated);

        return redirect()->route('assets.index')
                         ->with('success', 'Data aset berhasil diperbarui.');
    }

    /**
     * Menghapus aset dari database
     */
    public function destroy(Asset $asset)
    {
        $asset->delete();

        // [BARIS INI DIUBAH] dari 'success' menjadi 'warning'
        return redirect()->route('assets.index')
                         ->with('warning', 'Aset berhasil dihapus.');
    }
}