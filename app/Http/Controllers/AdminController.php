<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Product;
use App\Models\Transaksi;
use App\Models\ItemProduct;
use App\Models\laporans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function dashboardAdmin()
    {
        return view('admin.dashboardAdmin');
    }

    public function home()
    {
        return view('home');
    }

    // public function productAdmin(Request $request)
    // {
    //     $search = $request->input('search');
    //     if ($search) {
    //         $data = Product::where('nama_product', 'like', '%' . $search . '%')->paginate(5);
    //     } else {
    //         $data = Product::paginate(5);
    //     }
    //     return view('admin.product', ['data' => $data]);
    // }


    public function createProductAdmin()
    {
        return view('admin.addproduct');
    }

    // Create
    public function storeProductAdmin(Request $request)
    {
        $file = $request->gambar;
        $fileName = $file->getClientOriginalName();

        $newData = new Product;
        $newData->nama_product = $request->nama_product;
        $newData->gambar = $fileName;
        $newData->url = $request->url;

        $file->move(public_path() . '/gambarProduk', $fileName);
        $newData->save();

        return redirect('/productAdmin')->with('success', 'Product added successfully.');
    }

    public function transaksiAdmin()
    {
        $Transaksi = Transaksi::with('product')->paginate(5);
        return view('admin.transaksi', compact('Transaksi'));
    }

    public function adminTransaksi()
    {
        $product = Product::all();
        return view('admin.addtransaksi', compact('product'));
    }

    public function adminAdd(Request $request)
    {
        $request->validate([
            'product_id' => 'required|string|max:255',
            'quantity' => 'required|numeric',
            'tanggal' => 'required|date',
        ]);
        $newData = new Transaksi();
        $newData->product_id = $request->product_id;
        $newData->quantity = $request->quantity;
        $newData->tanggal = $request->tanggal;
        $newData->save();
        return redirect('/transaksiAdmin');
    }

    public function dataUser()
    {
        $jumlah_user = User::all()->count();
        return view('admin.dataUser')->with('jumlah_user', $jumlah_user);
    }

    public function detailUser()
    {
        $Detail = User::paginate(5);
        return view('admin.detailUser', compact('Detail'));
    }

    public function deleteUser($id)
    {
        $users = User::findorfail($id);
        $users->delete();
        return redirect('/detailUser');
    }

    public function ubahAdminProduct(Request $id_item)
    {
        $product = DB::table('item_products')->find($id_item); // Fetch the product
        return view('admin.editProduct', compact('product')); // Pass product to view
    }

    // Update
    public function editAdminProduct(Request $request, string $id_item)
    {
        // Validation (same as before, but note we're validating the existing data from $product)
        $validatedData = $request->validate([
            'namaProduk' => 'required|string|max:255',
            'gambarProduk' => 'sometimes|image', // Allow image updates, but not required
            'kategori' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
        ]);

        // Handle Image Upload (only if a new image is provided)
        if ($request->hasFile('gambarProduk')) {
            $validatedData['gambarProduk'] = $request->file('gambarProduk')->store('gambarProduk'); // Store image
        }

        // Update the Product (no need to fetch $product again, it's passed in)
        DB::table('item_products')->where('id_item', $id_item)->update($validatedData);

        return redirect('/productAdmin')->with('success', 'Product updated successfully.');
    }

    // Delete
    public function deleteAdminProduct($id)
    {
        $display = DB::table('item_products')->findorfail($id);
        $display->delete();
        return back();
    }

    public function laporan()
    {
        $laporans = laporans::all();
        return view('admin.laporan', compact('laporans'));
    }

    public function productDisplay()
    {
        $display = DB::table('item_products')
            ->join('products', 'item_products.id_products', '=', 'products.id_products')
            ->select('item_products.*', 'products.nama_product')
            ->get();
        return view('admin.product', ['display' => $display]);
    }
}
