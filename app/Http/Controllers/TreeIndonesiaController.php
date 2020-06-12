<?php

namespace App\Http\Controllers;

use App\TreeIndonesia;
use App\TreeIndonesiaNested;
use Illuminate\Http\Request;

class TreeIndonesiaController extends Controller
{
    public function __invoke()
    {
        dd('Halaman Tree Indonesia');
    }

    public function startNestedSet()
    {

    }

    public function startRecursive()
    {
        $start = microtime(true);
        $this->recursive(0);
        $time = microtime(true) - $start;

        $endTime = date('H:i:s', $time);
        echo "Waktu yang dibutuhkan : $endTime \n";
        exit();
    }

    public function recursive($parent, $limit = null)
    {
        $items = TreeIndonesia::where('parent', $parent)
                             ->when($limit, function ($query, $limit) {
                                 return $query->limit($limit);
                             })
                             ->get();

        foreach ($items as $item) {
            switch ($item->level) {
                case 'provinsi':
                    $print = '- ';
                    break;
                case 'kabupaten':
                    $print = '-- ';
                    break;
                case 'kecamatan':
                    $print = '--- ';
                    break;
                default:
                    $print = '---- ';
                    break;
            }

            $print .= "$item->level : $item->name <br>";
            echo $print;

            if ($item->level === 'desa') {
                continue;
            }

            $this->recursive($item->id, $limit);
        }
    }
}
