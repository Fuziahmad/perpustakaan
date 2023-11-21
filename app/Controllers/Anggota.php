<?php

namespace App\Controllers;

use \App\Models\Users_Model;
use \App\Models\Auth_Groups_Users_Model;

class Anggota extends BaseController
{
    private $model;
    private $modelGroupUsers;
    public function __construct()
    {
        $this->model = new Users_Model;
        $this->modelGroupUsers = new Auth_Groups_Users_Model;
    }

    public function index()
    {
        $data['title'] = 'Daftar Anggota';
        $data['getData'] = $this->model->getUsers();
        echo view('header_view', $data);
        echo view('anggota_view', $data);
        echo view('footer_view', $data);
    }

    public function profil()
    {
        if (!logged_in()) {
            return redirect()->to('login');
        }


        $data['title'] = 'Profil';
        $data['getData'] = $this->model->getUsers(user()->id);
        echo view('header_view', $data);
        echo view('profil_view', $data);
        echo view('footer_view', $data);
    }

    public function updateProfil($id)
    {

        $anggota = $this->model->getUsers($id);

        $data = [
            'id' => $id,
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'nama' => $this->request->getPost('nama'),
            'jk' => $this->request->getPost('jk'),
            'alamat' => $this->request->getPost('alamat'),
        ];

        $rules = [
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harap di isi',
                ]
            ],
            'jk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harap di isi',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harap di isi',
                ]
            ],
        ];

        // Cek jika ada perubahan pada email
        if ($anggota['email'] != $data['email']) {
            $rules['email'] = [
                'rules' => 'required|is_unique[users.email,email,' . $id . ']|valid_email',
                'errors' => [
                    'required' => '{field} harap di isi',
                    'is_unique' => '{field} sudah terdaftar',
                    'valid_email' => '{field} tidak valid',
                ]
            ];
        }

        // Cek jika ada perubahan pada username
        if ($anggota['username'] != $data['username']) {
            $rules['username'] = [
                'rules' => 'required|is_unique[users.username,username,' . $id . ']|min_length[3]',
                'errors' => [
                    'required' => '{field} harap di isi',
                    'is_unique' => '{field} sudah terdaftar',
                    'min_length' => '{field} minimal 3 karakter',
                ]
            ];
        }

        if (!$this->validate($rules)) {
            return redirect()->to('Anggota/profil/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->model->setUsers($data);

        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to(base_url('anggota/profil'));
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Anggota',

        ];

        echo view('header_view', $data);
        echo view('tambah_anggota', $data);
        echo view('footer_view', $data);
    }

    public function editAnggota($id)
    {
        if (!logged_in()) {
            return redirect()->to('login');
        }

        if (!in_groups('admin')) {
            return redirect()->to(base_url('buku'));
        }

        $data = [
            'title' => 'Edit Anggota',
            'getData' => $this->model->getUsers($id)

        ];

        echo view('header_view', $data);
        echo view('update_anggota', $data);
        echo view('footer_view', $data);
    }


    public function updateAnggota($id)
    {
        $anggota = $this->model->getUsers($id);

        $data = [
            'id' => $id,
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'nama' => $this->request->getPost('nama'),
            'jk' => $this->request->getPost('jk'),
            'alamat' => $this->request->getPost('alamat'),
            'status' => $this->request->getPost('status')
        ];

        $rules = [
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harap di isi',
                ]
            ],
            'jk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harap di isi',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harap di isi',
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harap di isi',
                ]
            ],
        ];

        // Cek jika ada perubahan pada email
        if ($anggota['email'] != $data['email']) {
            $rules['email'] = [
                'rules' => 'required|is_unique[users.email,email,' . $id . ']|valid_email',
                'errors' => [
                    'required' => '{field} harap di isi',
                    'is_unique' => '{field} sudah terdaftar',
                    'valid_email' => '{field} tidak valid',
                ]
            ];
        }

        // Cek jika ada perubahan pada username
        if ($anggota['username'] != $data['username']) {
            $rules['username'] = [
                'rules' => 'required|is_unique[users.username,username,' . $id . ']|min_length[3]',
                'errors' => [
                    'required' => '{field} harap di isi',
                    'is_unique' => '{field} sudah terdaftar',
                    'min_length' => '{field} minimal 3 karakter',
                ]
            ];
        }

        if (!$this->validate($rules)) {
            return redirect()->to('Anggota/editAnggota/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->model->setUsers($data);

        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to(base_url('anggota'));
    }

    public function deleteAnggota($id)
    {
        if (!logged_in()) {
            return redirect()->to('login');
        }

        if (!in_groups('admin')) {
            return redirect()->to(base_url('buku'));
        }

        $anggota = $this->model->find($id);

        if (!$anggota) {
            session()->setFlashdata('pesan', "Data tidak ditemukan");
        } else {
            $this->modelGroupUsers->deleteGroupUsers($id);
            $this->model->deleteUser($id);
            session()->setFlashdata('pesan', "Data berhasil dihapus");
        }

        return redirect()->to(base_url('anggota'));
    }
}
