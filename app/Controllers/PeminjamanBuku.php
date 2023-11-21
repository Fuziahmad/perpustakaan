<?php

namespace App\Controllers;
use App\Models\Users_Model;
use App\Models\Buku_Model;
use App\Models\Peminjaman_Buku_Model;
use CodeIgniter\I18n\Time;

class peminjamanBuku extends BaseController
{
    protected $modelUsers;
    protected $modelBuku;
    protected $modelPeminjaman;
    public function __construct()
    {
        $this->modelUsers = new Users_Model;
        $this->modelBuku = new Buku_Model;
        $this->modelPeminjaman = new Peminjaman_Buku_Model;
    }

    public function index()
    {
        $data['title'] = 'Daftar Peminjaman Buku';
        $data['getData'] = $this->modelPeminjaman->getPeminjaman();


        echo view('header_view', $data);
        echo view('pinjaman_buku', $data);
        echo view('footer_view', $data);
    }

    public function detail($id)
    {
        if(!logged_in()){
            return redirect()->to('login');
        }
        
        if(!in_groups('admin')){
            return redirect()->to(base_url('buku'));
        }


        $data['title'] = 'Daftar Peminjaman Buku';
        $data['getData'] = $this->modelPeminjaman->getPeminjaman($id);
        
        session()->setFlashdata('id', $id);
        echo view('header_view', $data);
        echo view('detail_peminjaman_buku', $data);
        echo view('footer_view', $data);
    }

    public function kembali($id)
    {
        if(!logged_in()){
            return redirect()->to('login');
        }
        
        if(!in_groups('admin')){
            return redirect()->to(base_url('buku'));
        }
        $data = [
            'status' => 'Kembali',
            'kembali' => Time::today()
        ];
        
        $this->modelPeminjaman->kembali($id, $data);

        session()->setFlashdata('pesan', "Data Berhasil di Ubah");
        return redirect()->to(base_url('PeminjamanBuku/detail/'.session()->getFlashdata('id')));
        
    }

    
}
