<?php

namespace App\Http\Controllers;

use App\Models\Pengiriman;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    public function index()
{
    // Ambil data pengiriman dari database
    $pengiriman = Pengiriman::all();

    // Kirim data pengiriman ke view
    return view('admin.pengiriman.home', compact('pengiriman'));
}
public function indexForUser()
{
    // Ambil semua data pengiriman dari database
    $pengiriman = Pengiriman::all();

    // Kirim data pengiriman ke view
    return view('user.pengiriman.index', compact('pengiriman'));
}
    public function create(){
        return view('admin.pengiriman.create');
    }
    // app/Http/Controllers/PengirimanController.php

public function store(Request $request)
{
    $request->validate([
        'material_id' => 'required',
        'tanggal_kirim' => 'required|date',
        'tanggal_selesai' => 'required|date',
        'estimasi' => 'required',
        'status_pengiriman' => 'required',
        'order_id' => 'required',
    ]);

    Pengiriman::create($request->all());

    return redirect()->route('admin.pengiriman')
        ->with('success', 'Pengiriman berhasil ditambahkan.');
}
public function edit($id)
{
    $pengiriman = Pengiriman::findOrFail($id);
    return view('admin.pengiriman.edit', compact('pengiriman'));
}
public function update(Request $request, $id)
{
    // Validasi input
    $validated = $request->validate([
        'material_id' => 'required|integer',
        'tanggal_kirim' => 'required|date',
        'tanggal_selesai' => 'required|date',
        'estimasi' => 'required|string',
        'status_pengiriman' => 'required|string',
        'order_id' => 'required|integer',
    ]);

    // Cari pengiriman berdasarkan ID
    $pengiriman = Pengiriman::findOrFail($id);

    // Update data pengiriman
    $pengiriman->update([
        'material_id' => $validated['material_id'],
        'tanggal_kirim' => $validated['tanggal_kirim'],
        'tanggal_selesai' => $validated['tanggal_selesai'],
        'estimasi' => $validated['estimasi'],
        'status_pengiriman' => $validated['status_pengiriman'],
        'order_id' => $validated['order_id'],
    ]);

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('admin.pengiriman')->with('success', 'Pengiriman updated successfully!');
}
public function destroy($id)
{
    // Cari pengiriman berdasarkan ID
    $pengiriman = Pengiriman::findOrFail($id);

    // Hapus pengiriman
    $pengiriman->delete();

    // Redirect kembali ke halaman pengiriman dengan pesan sukses
    return redirect()->route('admin.pengiriman')->with('success', 'Pengiriman berhasil dihapus!');
}

}
