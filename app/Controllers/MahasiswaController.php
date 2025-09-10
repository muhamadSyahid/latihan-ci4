<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\Mahasiswa;

class MahasiswaController extends ResourceController
{
    protected Mahasiswa $mahasiswaModel;
    protected int $paginate = 10;

    public function __construct(){
        $this->mahasiswaModel = new Mahasiswa();
    }
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
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

        return view('mahasiswa/index', $data);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        $mahasiswa = $this->mahasiswaModel->find($id);

        if (!$mahasiswa) {
            return redirect()->to('/mahasiswa')
                ->with('msg', 'Data mahasiswa tidak ditemukan.')
                ->with('error', true);
        }

        return view('mahasiswa/show', ['mahasiswa' => $mahasiswa, 'title' => 'Detail Mahasiswa']);
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        return view('mahasiswa/form', ['title' => 'Form Tambah Mahasiswa']);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $validation = \Config\Services::validation();
        $rules = [
            'nama' => 'required',
            'nim' => 'required|min_length[9]|is_unique[biodata.nim]',
            'jk' => 'required|in_list[L,P]',
            'tl' => 'required|valid_date[Y-m-d]'
        ];
        $messages = [
            'nama' => [
                'required' => 'Nama wajib diisi.'
            ],
            'nim' => [
                'required' => 'NIM wajib diisi.',
                'min_length' => 'NIM harus 9 karakter.',
                'is_unique' => 'NIM sudah terdaftar.'
            ],
            'jk' => [
                'required' => 'Jenis kelamin wajib diisi.',
                'in_list' => 'Jenis kelamin harus L atau P.'
            ],
            'tl' => [
                'required' => 'Tanggal lahir wajib diisi.',
                'valid_date' => 'Format tanggal lahir tidak valid.'
            ]
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $this->mahasiswaModel->save([
            'nama_lengkap' => request()->getPost('nama'),
            'nim' => request()->getPost('nim'),
            'jenis_kelamin' => request()->getPost('jk'),
            'tanggal_lahir' => request()->getPost('tl'),
        ]);
        return redirect()->to('/mahasiswa')->with('msg', 'Data mahasiswa berhasil disimpan.');
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        $mahasiswa = $this->mahasiswaModel->find($id);
        if (!$mahasiswa) {
            return redirect()->to('/mahasiswa')
                ->with('msg', 'Data mahasiswa tidak ditemukan.')
                ->with('error', true);
        }

        $data = [
            'title' => 'Form Edit Mahasiswa',
            'mahasiswa' => $mahasiswa,
        ];

        return view('mahasiswa/form', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        $mahasiswa = $this->mahasiswaModel->find($id);
        if (!$mahasiswa) {
            return redirect()->to('/mahasiswa')
            ->with('msg', 'Data mahasiswa tidak ditemukan.')
            ->with('error', true);
        }

        $validation = \Config\Services::validation();
        $rules = [
            'nama' => 'required',
            'nim' => 'required|min_length[9]|is_unique[mahasiswa.nim]',
            'jk' => 'required|in_list[L,P]',
            'tl' => 'required|valid_date[Y-m-d]'
        ];
        $messages = [
            'nama' => [
                'required' => 'Nama wajib diisi.'
            ],
            'nim' => [
                'required' => 'NIM wajib diisi.',
                'min_length' => 'NIM harus 9 karakter.',
                'is_unique' => 'NIM sudah terdaftar.'
            ],
            'jk' => [
                'required' => 'Jenis kelamin wajib diisi.',
                'in_list' => 'Jenis kelamin harus L atau P.'
            ],
            'tl' => [
                'required' => 'Tanggal lahir wajib diisi.',
                'valid_date' => 'Format tanggal lahir tidak valid.'
            ]
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        
        $result = $this->mahasiswaModel->update($id, [
            'nama_lengkap' => request()->getPost('nama'),
            'nim' => request()->getPost('nim'),
            'jenis_kelamin' => request()->getPost('jk'),
            'tanggal_lahir' => request()->getPost('tl'),
        ]);
        return redirect()->to('/mahasiswa')->with('msg', 'Data mahasiswa berhasil diupdate.');
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        $mahasiswa = $this->mahasiswaModel->find($id);
        if (!$mahasiswa) {
            return redirect()->to('/mahasiswa')
                ->with('msg', 'Data mahasiswa tidak ditemukan.')
                ->with('error', true);
        }

        $this->mahasiswaModel->delete($id);
        return redirect()->to('/mahasiswa')->with('msg', 'Data mahasiswa berhasil dihapus.');
    }
}
