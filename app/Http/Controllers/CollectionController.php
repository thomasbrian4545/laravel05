<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function collectionSatu()
    {
        $collection = collect([1, 9, 3, 4, 5, 3, 5, 7]);
        echo "<pre>";
        var_dump($collection);
        echo "</pre>";
        dump($collection);
        echo $collection;
    }

    public function collectionDua()
    {
        $collection = collect([1, 9, 3, 4, 5, 3, 5, 7]);
        echo $collection[2];
        echo "<br>";
        foreach ($collection as $value) {
            echo "$value ";
        }
        echo "<br>";

        // Collection dari berbagai tipe data
        $collection = collect(["Mawar", "Anggrek", "Dahlia", 5, 7, 9]);
        echo $collection;
        echo "<br>";

        // Collection dari associative array
        $collection = collect([
            "nama" => "Brian",
            "sekolah" => "SMAK St. Thomas Aquino",
            "umur" => 31
        ]);
        echo $collection;
        echo "<br>";

        // Dump antar array dan associative array
        $varA = [1, 2, 3];
        $varB = ["0" => 1, "1" => 2, "2" => 3];
        dump($varA === $varB);
        echo "<br>";

        // Perbandingan collection array dan associative array
        $varC = collect([1, 2, 3]);
        $varD = collect([0 => 1, 1 => 2, 2 => 3]);
        echo $varC;
        echo "<br>";
        echo $varD;
        echo "<br>";
        dump($varC === $varD);
        echo "<br>";

        // Perbandingan collection array tidak berurutan
        $varE = collect([1, 2, 3]);
        $varF = collect([3 => 1, 4 => 2, 5 => 3]);
        echo $varE;
        echo "<br>";
        echo $varF;
        echo "<br>";
    }

    public function collectionTiga()
    {
        // Operasi matematis
        $operasi = collect([3, 9, 2, 22, 9, 0]);
        echo $operasi->sum();
        echo "<br>";
        echo $operasi->avg();
        echo "<br>";
        echo $operasi->max();
        echo "<br>";
        echo $operasi->min();
        echo "<br>";
        echo $operasi->median();
        echo "<br>";

        // Method random()
        echo $operasi->random();
        echo "<br>";

        // Method concat()
        echo "Method concat()" . "<br>";
        echo $operasi->concat([34, 8]);
        echo "<br>";

        // Method contains()
        $baru = $operasi->concat([34, 8]);
        dump($baru->contains(34));

        // Method unique()
        echo $operasi->unique();
        echo "<br>";

        // Method all()
        echo $operasi;
        echo "<br>";
        dump($operasi->all());

        // Method first() dan last()
        echo "Nilai pertama adalah " . $operasi->first();
        echo "<br>";
        echo "Nilai terakhir adalah " . $operasi->last();
        echo "<br>";

        // Method count() dan sort()
        echo "Jumlah data adalah " . $operasi->count();
        echo "<br>";
        echo "Diurutkan menjadi " . $operasi->sort();
        echo "<br>";
    }

    public function collectionEmpat()
    {
        $collection = collect([
            "nama" => "Thomas",
            "kota" => "Sidoarjo",
            "umur" => 31
        ]);

        // Ambil nilai berdasarkan key
        echo $collection->get("umur");
        echo "<br>";

        // Nilai default jika key tidak ditemukan
        echo $collection->get("ijazah", "Magister Komputer");
        echo "<br>";

        // Memeriksa ada key atau tidak
        dump($collection->has("pekerjaan"));
        echo "<br>";

        // Ganti isi collection
        $hasil = $collection->replace([
            "kota" => "Surabaya"
        ]);
        echo $hasil;
        echo "<br>";

        // Menghapus salah satu element di collection
        $hasil = $collection->forget("kota");
        echo $hasil;
        echo "<br>";

        // Membalik key dengan value dan sebaliknya
        $hasil = $collection->flip();
        echo $hasil;
        echo "<br>";

        // Ambil semua key
        $hasil = $collection->keys();
        echo $hasil;
        echo "<br>";

        // Ambil semua value
        $hasil = $collection->values();
        echo $hasil;
        echo "<br>";

        // Mencari nilai, mengembalikan key
        echo $collection->search("Thomas");
        echo "<br>";

        // Foreach pada collection
        foreach ($collection as $key => $value) {
            echo "$key: $value <br>";
        }
        echo "<br>";

        // Cara penulisan selain foreach
        $collection->each(function ($val, $key) {
            echo "$key: $val <br>";
        });
    }

    public function collectionLima()
    {
        $collection = collect([
            ['namaProduk' => 'Laptop A', 'harga' => 59990000],
            ['namaProduk' => 'Smartphone B', 'harga' => 1599000],
            ['namaProduk' => 'Speaker C', 'harga' => 350000],
        ]);

        dump($collection);

        // Urut berdasarkan key harga
        dump($collection->sortBy('harga'));

        // Urut berdasarkan key harga
        dump($collection->sortByDesc('harga'));

        // Urutkan berdasarkan key harga dan tampilkan sebagai array
        dump($collection->sortBy('harga')->all());

        // Urutkan berdasarkan key harga dan tampilkan menggunakan method each()
        $collection->sortBy('harga')->each(function ($val, $key) {
            echo $val['namaProduk'] . '<br>';
        });

        // Method filter untuk harga < 2000000
        $hasil = $collection->filter(function ($val, $key) {
            return $val['harga'] < 2000000;
        });
        dump($hasil);

        // Cari element key dengan harga bernilai 350000
        dump($collection->where('harga', 350000));

        // Cari element key dengan harga >= 1000000
        dump($collection->where('harga', '>=', 1000000));

        // Hasil pencarian berisi 1 element
        // $hasil = $collection->where('harga', 350000)->first();
        $hasil = $collection->firstWhere('harga', 350000);
        echo $hasil['namaProduk'] . "<br>";
        echo "<hr>";

        // Hasil gabungan method where dan all untuk hasil lebih dari 1 element
        // dan menjadi array untuk di looping dengan foreach
        $hasil = $collection->where('harga', '>=', 1000000)->all();
        foreach ($hasil as $val) {
            echo $val['namaProduk'] . "<br>";
        }
        echo "<hr>";

        // Cari element dengan harga diantara 100_000 - 2_000_000
        $hasil = $collection->whereBetween('harga', [100_000, 2_000_000])->all();
        foreach ($hasil as $value) {
            echo $value['namaProduk'] . "<br>";
        }
        echo "<hr>";

        // Cari element dengan harga tidak diantara 100_000 - 2_000_000
        $hasil = $collection->whereNotBetween('harga', [100_000, 2_000_000])->all();
        foreach ($hasil as $value) {
            echo $value['namaProduk'] . "<br>";
        }
        echo "<hr>";

        // Cari element dengan harga 1_599_000, 2_999_000 atau 3_999_000
        dump($collection->whereIn('harga', [1_599_000, 2_999_000, 3_999_000]));

        // Cari element dengan harga selain 1_599_000, 2_999_000 atau 3_999_000
        dump($collection->whereNotIn('harga', [1_599_000, 2_999_000, 3_999_000]));

        // Ambil namaProduk dari semua element
        dump($collection->pluck('namaProduk'));
    }

    public function collectionEnam()
    {
        $siswa00 = new \stdClass();
        $siswa00->nama = "Rian";
        $siswa00->sekolah = "SMK Pelita Ibu";
        $siswa00->jurusan = "IPA";

        $siswa01 = new \stdClass();
        $siswa01->nama = "Nova";
        $siswa01->sekolah = "SMA 2 Kota Baru";
        $siswa01->jurusan = "IPA";

        $siswa02 = new \stdClass();
        $siswa02->nama = "Rudi";
        $siswa02->sekolah = "MA Al Hidayah";
        $siswa02->jurusan = "IPS";

        $siswas = collect([
            0 => $siswa00,
            1 => $siswa01,
            2 => $siswa02,
        ]);

        dump($siswas);

        // Cara mengakses nilai collection
        echo $siswas[1]->nama;
        echo "<br>";
        echo $siswas[2]->sekolah;

        echo "<hr>";

        // Perulangan foreach untuk menampilkan data
        foreach ($siswas as $siswa) {
            echo $siswa->nama . "<br>";
        }

        echo "<hr>";

        // Tampilkan nama sekolah dari siswa bernama Rudi
        $siswa = $siswas->where('nama', 'Rudi')->first();
        echo $siswa->sekolah;

        echo "<hr>";

        // Method get()
        $siswa = $siswas->get(2);
        echo "$siswa->nama, $siswa->sekolah, $siswa->jurusan";

        echo "<hr>";

        // Method groupBy()
        $hasil = $siswas->groupBy('jurusan');
        dump($hasil);

        echo "<hr>";

        // Tampilkan nama yang mengambil jurusan IPA
        $hasil = $siswas->groupBy('jurusan')->get('IPA')->pluck('nama')->all();
        dump($hasil);
        // echo $hasil[0];
        echo implode(', ', $hasil);
    }

    public function exercise()
    {
        $matkul00 = new \stdClass();
        $matkul00->namaMatkul = "Sistem Operasi";
        $matkul00->jumlahSks = 3;
        $matkul00->semester = 3;

        $matkul01 = new \stdClass();
        $matkul01->namaMatkul = "Algoritma dan Pemrograman";
        $matkul01->jumlahSks = 4;
        $matkul01->semester = 1;

        $matkul02 = new \stdClass();
        $matkul02->namaMatkul = "Kalkulus Dasar";
        $matkul02->jumlahSks = 2;
        $matkul02->semester = 1;

        $matkul03 = new \stdClass();
        $matkul03->namaMatkul = "Basis Data";
        $matkul03->jumlahSks = 2;
        $matkul03->semester = 3;

        $matkuls = collect([$matkul00, $matkul01, $matkul02, $matkul03]);

        $hasil = $matkuls->groupBy('semester')->get(3)->pluck('namaMatkul')->all();
        echo "Nama mata kuliah di semester 3: " . implode(', ', $hasil);
        echo "<br>";

        $matkulsSem3 = $matkuls->where('semester', 3);
        $stringMatkul = "";
        foreach ($matkulsSem3 as $matkul) {
            $stringMatkul .= $matkul->namaMatkul . ", ";
        }

        echo $stringMatkul . "<br>";
        echo 'Nama mata kuliah di semester 3: ' . substr($stringMatkul, 0, -2);
        echo "<hr>";

        $matkulsSort = $matkuls->sortByDesc('jumlahSks');
        $stringMatkul = "";
        foreach ($matkulsSort as $matkul) {
            $stringMatkul .= "$matkul->namaMatkul ($matkul->jumlahSks), ";
        }
        echo 'Nama mata kuliah: ' . substr($stringMatkul, 0, -2);
    }
}
