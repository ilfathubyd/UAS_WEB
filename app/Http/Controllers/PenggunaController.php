<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\product;
use App\Models\transaksi;
use App\Models\LaporanUsr; // Sesuaikan dengan model LaporanUsr Anda
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class PenggunaController extends Controller
{
    public function dashboardPengguna()
    {
        $images = Storage::disk('public')->files('images/carousel');
        $imageUrls = array_map(function ($image) {
            return asset('storage/' . $image);
        }, $images);

        $products = DB::table('products')->get();
        $user = Auth::user();

        return view('pengguna.dashboardPengguna', [
            'images' => $imageUrls,
            'user' => $user,
            'products' => $products,
        ]);
    }

    public function productPengguna(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $data = Product::where('namaproduk', 'like', '%' . $search . '%')->paginate(5);
        } else {
            $data = Product::paginate(5);
        }
        return view('pengguna.product', ['data' => $data]);
    }

    public function transaksiPengguna()
    {
        $Transaksi = transaksi::with('product')->paginate(5);
        return view('pengguna.transaksi', compact('Transaksi'));
    }

    public function createTransaksi()
    {
        $product = product::all();
        return view('pengguna.addtransaksi', compact('product'));
    }
    public function storeTransaksi(Request $request)
    {
        $request->validate([
            'product_id' => 'required|string|max:255',
            // 'harga' => 'required|string|max:255',
            'quantity' => 'required|numeric',
            // 'totalharga' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);
        $newData = new transaksi();
        $newData->product_id = $request->product_id;
        // $newData->harga = $request->harga;
        $newData->quantity = $request->quantity;
        // $newData->totalharga = $request->totalharga;
        $newData->tanggal = $request->tanggal;
        $newData->save();
        return redirect('/transaksiPengguna');
    }

    public function destroyPengguna(string $id)
    {
        $data = transaksi::findorfail($id);
        $data->delete();
        return back();
    }

    // ProductController.php
    public function buyProduct($url)
    {
        $data = DB::table('products')
            ->join('item_products', 'products.id_products', '=', 'item_products.id_products')
            ->where('products.url', $url)
            ->select('products.*', 'item_products.*') // Pilih semua kolom dari kedua tabel
            ->first();

        $user = Auth::user();

        return view('product.' . $data->url, [
            'user' => $user,
            'data' => $data
        ]);
    }

    public function history()
    {
        $laporans = DB::table('laporan_usr')->get();
        $user = Auth::user();
        return view('pengguna.history', [
            'user' => $user,
            'laporans' => $laporans
        ]);
    }

    public function saveOrder(Request $request)
    {
        // Validasi (sesuai kebutuhan)

        $laporanUsr = new LaporanUsr();
        $laporanUsr->riot_id = $request->input('riotID_hidden');
        $laporanUsr->harga = $request->input('harga_hidden');
        $laporanUsr->metode_pembayaran = $request->input('metode_hidden');
        $laporanUsr->total = $request->input('total_hidden');
        // ... atribut lainnya yang perlu disimpan

        $laporanUsr->save();

        return redirect('/history')->with('success', 'Order saved successfully!');
    }
}