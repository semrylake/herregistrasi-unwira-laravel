<?php

namespace App\Http\Controllers;

use App\Models\{User, Fakultas, Prodi, RegisMahasiswa};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, DB, File, Storage};


class AdminController extends Controller
{
    public function __construct()
    {
        $this->User = new User();
    }

    public function admin()
    {
        $user = User::all()->where('level', 'admin');
        $data = [
            "judul" => "Admin",
            "admin" => $user,
        ];
        return view('admin.admin', $data);
    }

    public function update_user(Request $request, $slug)
    {
        // $file = Request()->foto;

        // $request->validate([
        //     'password' => 'min:8',
        //     'foto' => 'image|file',
        // ]);
        // if (File::size($file) > 1024) {
        //     return redirect()->back()->with('file_large', 'Ukuran File Yang Diupload Terlalu Besar.');
        // }
        if ($request->file('foto')) {

            if (Auth::user()->foto) {
                Storage::delete(Auth::user()->foto);
                $foto = $request->file('foto')->store('foto-user');
            } else {
                $foto = Auth::user()->foto;
            }
        } else {
            $foto = Auth::user()->foto;
        }

        if ($request->password) {
            $request->validate([
                'password' => 'min:8',
            ]);
            $password = $request->password;
        } else {
            $password = Auth::user()->password;
        }

        $data = [
            'name' => $request->name,
            'password' => $password,
            'jk' => $request->jk,
            'foto' => $foto,
        ];

        $this->User->updateUser(Auth::user()->id, $data);
        return redirect()->back()->with('user_data_update', 'Data berhasil dihapus.');
    }

    public function dashboardAdmin()
    {

        if (Auth::user()->level == "admin") {
            return redirect('/dashboard-admin');
        } elseif (Auth::user()->level == "pegawai") {
            return redirect('/dashboard-pegawai-baak');
        }
    }
    public function dashboardAdminUser()
    {
        $user = User::all();
        $fakultas = Fakultas::all();
        $prodi = Prodi::all();
        $data = [
            "judul" => "Dashboard",
            "user" => $user,
            "fakultas" => $fakultas,
            "prodi" => $prodi,
        ];
        return view('admin.dashboard', $data);
    }
    public function myprofile()
    {
        $profile = User::where('id', Auth::user()->id)->first();
        $data = [
            "judul" => "My Profile",
            "profile" => $profile
        ];
        return view('admin.myprofile', $data);
    }

    public function tambah_admin()
    {
        return view(
            'admin.add_admin',
            [
                "judul" => "Tambah Admin"
            ]
        );
    }
    public function store_admin(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate(
            [
                'name' => 'required',
                'nip' => 'required|unique:users,nip|min:8',
                'jk' => 'required',
                'password' => 'required|min:8',
                'foto' => 'required|image|file|max:1024',
            ]
        );

        if ($request->file('foto')) {
            $validate['foto'] = $request->file('foto')->store('foto-user');
        }
        $validate['password'] = bcrypt($request->password);
        $validate['level'] = "admin";
        User::create($validate);
        return redirect()->back()->with('psn', 'Data berhasil disimpan.');
    }

    public function edit_admin($nip)
    {
        $admin = User::where('nip', $nip)->first();
        if (!$admin) {
            return abort('404');
        }
        $data = [
            "judul" => "Edit Admin",
            "admin" => $admin,
        ];
        return view('admin.edit_admin', $data);
    }

    public function update_admin(Request $request, $nip)
    {
        $admin = User::where('nip', $nip)->first();

        $request->validate([
            'foto' => 'image|file|max:1024',
        ]);

        if ($request->nip != $admin->nip) {
            $request->validate([
                'nip' => 'unique:users,nip|min:8',
            ]);
            $nip = $request->nip;
        } else {
            $nip = $admin->nip;
        }

        if ($request->password) {
            $request->validate([
                'password' => 'min:8',
            ]);
            $password = bcrypt($request->password);
        } else {
            $password = $admin->password;
        }

        if ($request->file('foto')) {
            $foto = $request->file('foto')->store('foto-user');
            Storage::delete($admin->foto);
        } else {
            $foto = $admin->foto;
        }

        $data = [
            'name' => $request->name,
            'nip' => $nip,
            'password' => $password,
            'foto' => $foto,
        ];
        $this->User->updateUser($admin->id, $data);
        return redirect()->back()->with('psn', 'Data berhasil diupdate.');
    }

    public function destroy_admin($nip)
    {
        $admin = User::where('nip', $nip)->first();
        DB::table('users')->where('id', $admin->id)->delete();
        Storage::delete($admin->foto);
        if ($admin->id == Auth::user()->id) {
            return redirect('/auth');
        } else {
            return redirect()->back()->with('del_msg', 'Data berhasil dihapus.');
        }
    }

    public function pegawai_loket()
    {
        $pegloket = User::all()->where('level', 'pegawai');
        $data = [
            "judul" => "Pegawai Loket",
            "pegloket" => $pegloket,
        ];
        return view('admin.pegawai-loket.index', $data);
    }
    public function tambah_pegawai()
    {
        // $pegloket = User::all()->where('level', 'pegawai');
        $data = [
            "judul" => "Pegawai Loket",
        ];
        return view('admin.pegawai-loket.tambah', $data);
    }
    public function store_pegawai(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate(
            [
                'name' => 'required',
                'nip' => 'required|unique:users,nip|min:8',
                'jk' => 'required',
                'password' => 'required|min:8',
                'foto' => 'required|image|file|max:1024',
            ]
        );

        if ($request->file('foto')) {
            $validate['foto'] = $request->file('foto')->store('foto-pegawai-loket');
        }
        $validate['password'] = bcrypt($request->password);
        $validate['level'] = "pegawai";
        User::create($validate);
        return redirect()->back()->with('psn', 'Data berhasil disimpan.');
    }
    public function edit_pegawai($nip)
    {
        $pegawai = User::where('nip', $nip)->first();
        if (!$pegawai) {
            return abort('404');
        }
        $data = [
            "judul" => "Pegawai Loket",
            "pegawai" => $pegawai,
        ];
        return view('admin.pegawai-loket.edit', $data);
    }
    public function update_pegawai(Request $request, $nip)
    {
        $pegawai = User::where('nip', $nip)->first();

        $request->validate([
            'foto' => 'image|file|max:1024',
        ]);

        if ($request->nip != $pegawai->nip) {
            $request->validate([
                'nip' => 'unique:users,nip|min:8',
            ]);
            $nip = $request->nip;
        } else {
            $nip = $pegawai->nip;
        }

        if ($request->password) {
            $request->validate([
                'password' => 'min:8',
            ]);
            $password = bcrypt($request->password);
        } else {
            $password = $pegawai->password;
        }

        if ($request->file('foto')) {
            $foto = $request->file('foto')->store('foto-pegawai-loket');
            Storage::delete($pegawai->foto);
        } else {
            $foto = $pegawai->foto;
        }

        $data = [
            'name' => $request->name,
            'nip' => $nip,
            'password' => $password,
            'foto' => $foto,
        ];
        $this->User->updateUser($pegawai->id, $data);
        return redirect()->back()->with('psn', 'Data berhasil diupdate.');
    }
    public function destroy_pegawai($nip)
    {
        $admin = User::where('nip', $nip)->first();
        DB::table('users')->where('id', $admin->id)->delete();
        Storage::delete($admin->foto);
        if ($admin->id == Auth::user()->id) {
            return redirect('/auth');
        } else {
            return redirect()->back()->with('del_msg', 'Data berhasil dihapus.');
        }
    }

    public function herregistrasi_mahasiswa()
    {
        $regismahasiswa = RegisMahasiswa::all()->sortBy('status');
        $data = [
            "judul" => "Herregistrasi Mahasiswa",
            "regismahasiswa" =>  $regismahasiswa,
        ];
        return view('admin.regis-mahasiswa.index', $data);
    }
    public function herregistrasi_mahasiswa_baru($id)
    {
        $dataregis = RegisMahasiswa::where('id', $id)->first();
        if (!$dataregis) {
            return abort('404');
        }

        $data = [
            'judul' => 'Detail Herregistrasi',
            'dataregis' => $dataregis,
        ];
        return view('admin.regis-mahasiswa.info', $data);
    }
    public function destroy_regis($id)
    {
        $regis = RegisMahasiswa::where('id', $id)->first();
        DB::table('regis_mahasiswas')->where('id', $id)->delete();
        Storage::delete($regis->bukti_regis);
        return redirect()->back()->with('del_msg', 'Data berhasil dihapus.');
    }
}
