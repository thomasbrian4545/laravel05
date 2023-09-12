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
    }

    public function collectionTiga()
    {
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
