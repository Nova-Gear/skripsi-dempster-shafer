<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UserExport;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
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

    public function index(Request $request)
    {
        if ($request->has('search')) {  // Pemilihan jika ingin melakukan pencarian
            $user = User::where('name', 'like', '%' . $request->search . '%')
                ->orwhere('email', 'like', '%' . $request->search . '%')
                ->orwhere('role', 'like', '%' . $request->search . '%')
                ->paginate();
            return view('Admin.User.index', compact('user'))->with('i', (request()->input('page', 1) - 1) * 5);
        } else {  // Pemilihan jika tidak melakukan pencarian
            //fungsi eloquent menampilkan data menggunakan pagination
            $user = User::all();  // MenPagination menampilkan 5 data
            return view('Admin.User.index', compact('user'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.User.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('images'), $imageName);

        $user = new User([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gambar' => $imageName,
        ]);

        $user->save();

        Alert::success('Success', 'Data User Berhasil Ditambahkan');
        return redirect()->route('user.index');
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
        return view('Admin.User.show', compact('user'));
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
        return view('Admin.User.edit', compact('user'));
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
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //fungsi eloquent untuk menghapus data
        User::find($id)->delete();
        Alert::success('Success', 'Data user berhasil dihapus');
        return redirect()->route('user.index');
    }

    // public function laporan()
    // {
    //     $user = User::all();
    //     $pdf = PDF::loadview('Admin.User.laporan', compact('user'));
    //     return $pdf->stream();
    // }

    // public function laporanExcel(Request $request)
    // {
    //     return Excel::download(new UserExport, 'Admin.User.xlsx');
    // }

    public function EditPassword($id)
    {
        $user = User::find($id);
        return view('Admin.User.PasswordEdit', compact('user'));
    }

    public function UpdatePassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|string|min:5|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user = User::find($id);
        $user->password = Hash::make($request->password);
        $user->save();

        Alert::success('Success', 'Password successfully changed!');
        return redirect()->route('admin.user.edit', $user->id);
    }
}
