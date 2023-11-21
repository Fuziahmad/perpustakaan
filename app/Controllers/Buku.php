<?php

namespace App\Controllers;

use \App\Models\Buku_Model;
use \App\Models\Pinjam_Buku_Model;
use \App\Models\Peminjaman_Buku_Model;
use CodeIgniter\I18n\Time;

class Buku extends BaseController
{

    private $modelBuku;
    private $modelPinjam;
    private $modelPeminjaman;

    public function __construct()
    {
        $this->modelBuku = new Buku_Model;
        $this->modelPinjam = new Pinjam_Buku_Model;
        $this->modelPeminjaman = new Peminjaman_Buku_Model;
    }
    public function index()
    {
        $data['title'] = 'Daftar Buku';
        $data['getData'] = $this->modelBuku->getBuku();


        echo view('header_view', $data);
        echo view('buku_view', $data);
        echo view('footer_view', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Buku'
        ];

        echo view('header_view', $data);
        echo view('tambah_buku', $data);
        echo view('footer_view', $data);
    }


    public function createBuku()
    {
        $data = [
            'judul_buku' =>  $this->request->getVar('judul_buku'),
            'pengarang' =>  $this->request->getVar('pengarang'),
            'penerbit' =>  $this->request->getVar('penerbit')
        ];

        $this->modelBuku->setBuku($data);
        session()->setFlashdata('pesan', "Data Berhasil di tambah");
        return redirect()->to(base_url('/'));
    }

    public function editBuku($id)
    {
        if (!logged_in()) {
            return redirect()->to('login');
        }

        if (!in_groups('admin')) {
            return redirect()->to(base_url('buku'));
        }

        $data = [
            'title' => 'Edit Buku',
            'getData' => $this->modelBuku->getBuku($id)

        ];


        echo view('header_view', $data);
        echo view('update_buku', $data);
        echo view('footer_view', $data);
    }

    public function updateBuku($id)
    {

        $data = [

            'judul_buku' => $this->request->getPost('judul_buku'),
            'pengarang' => $this->request->getPost('pengarang'),
            'penerbit' => $this->request->getPost('penerbit')
        ];


        $this->modelBuku->updateBuku($id, $data);

        session()->setFlashdata('pesan', "Data Berhasil di Ubah");
        return redirect()->to(base_url('/'));
    }

    public function deleteBuku($id)
    {
        if (!logged_in()) {
            return redirect()->to('login');
        }

        if (!in_groups('admin')) {
            return redirect()->to(base_url('buku'));
        }

        $buku = $this->modelBuku->find($id);

        if (!$buku) {
            session()->setFlashdata('pesan', "Data tidak ditemukan");
        } else {
            $this->modelBuku->deleteBuku($id);
            session()->setFlashdata('pesan', "Data berhasil dihapus");
        }

        return redirect()->to(base_url('/'));
    }


    public function bukuSaya()
    {
        $data = [
            'title' => 'Buku Saya',
            'getData' => $this->modelBuku->bukuSaya(),
            'jumlahPeminjaman' => $this->modelPeminjaman->JumlahPeminjaman()
        ];

        echo view('header_view', $data);
        echo view('buku_saya', $data);
        echo view('footer_view', $data);
    }

    public function pinjamBuku($id)
    {
        if (!logged_in()) {
            return redirect()->to('login');
        }


        $buku = $this->modelBuku->find($id);

        if (!$buku) {
            session()->setFlashdata('pesan', "Data tidak ditemukan");
        } else {
            $data = [
                'id_user' => user()->id,
                'kd_buku' =>  $id,
                'pinjam' =>  Time::today(),
                'status' => 'Di Pinjam'
            ];

            $this->modelPinjam->pinjamBuku($data);
            session()->setFlashdata('pesan', "Berhasil Meminjam Buku " . $buku['judul_buku']);
        }

        return redirect()->to(base_url('/'));
    }
}
