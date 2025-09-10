<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Mahasiswa;

class HelloWorld extends BaseController
{
    protected Mahasiswa $mahasiswaModel;
    protected int $paginate = 10;

    public function __construct(){
        $this->mahasiswaModel = new Mahasiswa();
    }
    public function index()
    {
        $mahasiswa = $this->mahasiswaModel->paginate($this->paginate, 'mahasiswa');
        $data = [
            'title' => 'Data Mahasiswa',
            'pager' => $this->mahasiswaModel->pager,
            'paginate' => $this->paginate,
            'current_page' => request()->getVar('page_mahasiswa') ?? 1,
            'mahasiswa' => $mahasiswa,
        ];
        return view('hello-world', $data);
    }
}
