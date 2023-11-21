<?php

namespace App\Controllers;
use App\Models\Buku_Model;
use CodeIgniter\Controller;
use Faker\Factory;
use CodeIgniter\I18n\Time;


class FakerController extends Controller
{


    public function buku()
    {
        $model =  new Buku_Model;
        $faker = Factory::create('id_ID');

        for($i = 1; $i<=10; $i++){
            // Contoh penggunaan Faker untuk menghasilkan data palsu
            $data = [
                'judul_buku' => $faker->sentence,
                'pengarang' => $faker->name,
                'penerbit' => $faker->company,

            ];
    
          $model->setBuku($data);
        }
        $totalRows = $model->countAll();
        echo '<h1?>Data Buku berhasil ditambahkan pada: ' . Time::now() . 'dengan jumlah'.--$i.'</h1><br>';
        echo 'Jumlah data saat ini: ' . $totalRows;
    }


}
