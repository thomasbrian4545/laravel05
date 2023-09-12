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
        echo "Method concat()"."<br>";
        echo $operasi->concat([34, 8]);
        echo "<br>";
    }

    public function collectionEmpat()
    {
    }

    public function collectionLima()
    {
    }

    public function collectionEnam()
    {
    }
}
