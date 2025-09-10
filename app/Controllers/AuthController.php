<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Mahasiswa;

class AuthController extends BaseController
{
    protected Mahasiswa $mahasiswaModel;

    public function __construct(){
        $this->mahasiswaModel = new Mahasiswa();
    }

    public function show_login()
    {
        return view ('auth/login');
    }

    public function login()
    {
        $nim = $this->request->getPost('nim');
        $nama = $this->request->getPost('nama');

        // Debug input
        // dd($nim, $nama);

        $mahasiswa = $this->mahasiswaModel
            ->where('nim', $nim)
            ->where('nama_lengkap', $nama)
            ->first();

        // Debug hasil query
        // dd($mahasiswa);

        if ($mahasiswa) {
            session()->set([
                'mahasiswa_id' => $mahasiswa['mahasiswa_id'],
                'nim' => $mahasiswa['nim'],
                'nama_lengkap' => $mahasiswa['nama_lengkap'],
                'logged_in' => true
            ]);
            return redirect()->to('/');
        } else {
            return redirect()->back()->with('error', 'NIM atau Nama salah!');
        }
    }

    public function logout(){
        session()->destroy();
        return redirect()->to('/login');
    }
}
