<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function importMovies() {
        $file = storage_path() . '/movies_epg.txt';

        $linecount = 0;
        $handle = fopen($file, "r");
        while(!feof($handle)){
            $line = fgets($handle);
            $linecount++;

            $p1 = explode('tvg-name="', $line);
            $p2 = explode('"',$p1[1]);

//            echo $p2[0] . '<br>'; // tvg-name
//            echo $p2[2] . '<br>'; // tvg-logo
//            echo $p2[4] . '<br>'; // group-title
//            echo $p2[6] . '<br>'; // idMovie

            Movie::create([
                'tvg-name' => $p2[0],
                'tvg-logo' => $p2[2],
                'group-title' => $p2[4],
                'id-movie' => $p2[6],
            ]);
        }

        fclose($handle);
    }
}
