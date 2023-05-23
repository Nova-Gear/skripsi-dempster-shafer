<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //menampilkan detail data dengan menemukan berdasarkan id User
        $user = User::find($id);
        return view('Profile.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //menampilkan detail data dengan menemukan berdasarkan id User untuk diedit
        $user = User::find($id);
        return view('Profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //melakukan validasi data
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'nullable|string|min:5',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::find($id);

        //fungsi eloquent untuk mengupdate data inputan kita
        if ($request->file('gambar') == '') {
            $user->name = $request->get('name');
            $user->username = $request->get('username');
            $user->email = $request->get('email');
            $user->save();
        } else {
            if ($user->gambar && file_exists(storage_path('app/public/' . $user->gambar))) {
                \Storage::delete(['public/' . $user->gambar]);
            }
            // $image_name = $request->file('gambar')->store('images', 'public');

            $image_name = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('images'), $image_name);
            $user->gambar = $image_name;
            $user->name = $request->get('name');
            $user->username = $request->get('username');
            $user->email = $request->get('email');
            $user->save();
        }

        if ($request->filled('password')) {
            $user->password = Hash::make($request->get('password'));
            $user->save();
        }

        //jika data berhasil diupdate, akan kembali ke halaman utama
        Alert::success('Success', 'Data User Berhasil Diupdate');
        return redirect()->route('profile.show', ['profile' => $user->id]);
        return redirect()->route('index');
    }
}
