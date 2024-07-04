<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log; 

class SessionControl extends Controller
{

    //beranda login
    public function beranda()
    {
        return view('login.beranda');
    }

    //fungsi login
    public function login()
    {
        return view('login.login');
    }

    public function fungsiLogin(Request $request){
        $request->validate([
            'email'=> 'required',
            'password'=>'required'
        ], [
            'email.required'=> 'Email wajib diisi',
            'password.required'=>'Password wajib diisi',
        ]);

        $infoLogin = [
            'email' => $request->email,
            'password' =>$request->password,
        ];

        if(Auth::attempt($infoLogin)){
            if(Auth::user()->level == 'Admin'){
                return redirect('/dashboardAdmin');
            }
            if(Auth::user()->level == 'Operator'){
                return redirect('/dashboardOperator');
            }
            if(Auth::user()->level == 'Pengguna'){
                return redirect('/dashboardPengguna');
            }

        }
    }

    //fungsi logout
    public function logout(){
        Auth::logout();
        return redirect('');
    }

    //fungsi register
    public function register(){
        return view('login.register');
    }

    public function create(Request $request)
    {
        
        // Flash data untuk penggunaan satu kali
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);

        //Validasi request baru
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ],[
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email harus valid',
            'email.unique' => 'Email sudah digunakan',
            'password.required' => 'Password harus diisi'
        ]);

        // Prepare the data to be saved
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
        ];
        

        //Membuat user baru 
        try {
            $user = new User($data);
            $user->save();
            return redirect('/')->with('success', 'User created successfully.');
        } catch (\Exception $e) {
            Log::error('Error creating user: ' . $e->getMessage());
            return back()->with('error', 'Failed to create user: ' . $e->getMessage());
        }
    }
    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
