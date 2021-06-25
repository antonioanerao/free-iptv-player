<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\IptvList;
use App\Models\LivetvEpg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class M3u8ToJsonController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function generateJson() {
        if(request('make-json') == env('IPTV_MAKE_JSON_SECRET')) {
            /*
            * Special thanks to onigetoc from https://github.com/onigetoc/m3u8-PHP-Parser for this beautiful code
             * to convert .m3u to .json
            */
            header('Content-Type: application/json');

            $m3ufile = file_get_contents(storage_path().'/'.env("IPTV_FILE_NAME"));

            $m3ufile = str_replace('group-title', 'tvgroup', $m3ufile);
            $m3ufile = str_replace("tvg-", "tv", $m3ufile);

            $re = '/#EXTINF:(.+?)[,]\s?(.+?)[\r\n]+?((?:https?|rtmp):\/\/(?:\S*?\.\S*?)(?:[\s)\[\]{};"\'<]|\.\s|$))/';
            $attributes = '/([a-zA-Z0-9\-]+?)="([^"]*)"/';

            preg_match_all($re, $m3ufile, $matches);

            $i = 1;

            $items = array();

            foreach($matches[0] as $list) {

                preg_match($re, $list, $matchList);

                $mediaURL = preg_replace("/[\n\r]/","",$matchList[3]);
                $mediaURL = preg_replace('/\s+/', '', $mediaURL);


                $newdata =  array (
                    'id' => $i++,
                    'tvtitle' => $matchList[2],
                    'tvmedia' => $mediaURL
                );

                preg_match_all($attributes, $list, $matches, PREG_SET_ORDER);

                foreach ($matches as $match) {
                    $newdata[$match[1]] = $match[2];
                }

                $items[] = $newdata;

            }

            //Show the json on the screen
            if(request('show-json') == 'show') {
                echo json_encode($items, true);
            }

            //Store a json file into storage/iptv named list.json
            Storage::disk('iptv')->put('list.json', json_encode($items, true));

            return "ok";
        } else {
            return "error";
        }
    }

    public function storeChannels() {
        if(request('store-channels') == env('IPTV_STORE_CHANNELS_SECRET')) {
            $file = storage_path() . '/iptv/list.json';
            $file = file_get_contents($file);

            $json = json_decode($file, true);

            foreach($json as $j) {

                /*
                 * Get the main group from url (live, series or movies) and
                 * remove url, port, user and pass from url
                 */

                if(str_contains($j['tvmedia'], env('IPTV_LIVE'))){
                    $mainGroup = 'live';
                    $tvmedia = str_replace(env('IPTV_URL').':'.env('IPTV_PORT').'/'.$mainGroup.'/'.
                        env('IPTV_USER').'/'.env('IPTV_PASSWORD').'/', '',$j['tvmedia']);
                } elseif(str_contains($j['tvmedia'], env('IPTV_MOVIE'))){
                    $mainGroup = 'movie';
                    $tvmedia = str_replace(env('IPTV_URL').':'.env('IPTV_PORT').'/'.$mainGroup.'/'.
                        env('IPTV_USER').'/'.env('IPTV_PASSWORD').'/', '',$j['tvmedia']);
                } elseif(str_contains($j['tvmedia'], env('IPTV_SERIES'))){
                    $mainGroup = 'series';
                    $tvmedia = str_replace(env('IPTV_URL').':'.env('IPTV_PORT').'/'.$mainGroup.'/'.
                        env('IPTV_USER').'/'.env('IPTV_PASSWORD').'/', '',$j['tvmedia']);
                }

                IptvList::create([
                    'tvtitle'=>$j['tvtitle'],
                    'tvmedia'=>$tvmedia,
                    'tvid'=>$j['tvid'],
                    'tvname'=>$j['tvname'],
                    'tvlogo'=>$j['tvlogo'],
                    'tvgroup'=>$j['tvgroup'],
                    'maingroup'=>$mainGroup
                ]);
            }

            return "ok";
        } else {
            return "error";
        }
    }

    public function getEpg() {
        if(request('get-epg') == env('IPTV_GET_EPG_SECRET')) {
            LivetvEpg::truncate();
            $path = env('IPTV_URL').':'.env('IPTV_PORT').'/xmltv.php?username='.env('IPTV_USER').'&password='.env('IPTV_PASSWORD');

            $xml=simplexml_load_file($path);
            $me = "sub-title";

            foreach($xml->programme as $item) {

                LivetvEpg::create([
                    'start'=>date("Y-m-d H:i:s", strtotime(substr($item["start"], 0,  -6))),
                    'stop'=>date("Y-m-d H:i:s", strtotime(substr($item["stop"], 0,  -6))),
                    'channel'=>$item["channel"],
                    'title'=>$item->title,
                    'info'=>$item->$me,
                    'desc'=>$item->desc,
                ]);

//            echo "Start : " .date("G:i d.m.Y", strtotime(substr($item["start"], 0,  -6))) . '<br>';
//            echo "End : " .date("G:i d.m.Y", strtotime(substr($item["stop"], 0,  -6))) . '<br>';
//            echo "Channel : ".$item["tvid"]. "<br>";
//            echo "Channel : ".$item["channel"]. "<br>";
//            echo "Title : ".$item->title. "<br>";
//            echo "Info : ".$item->$me. "<br>";
//            echo "Description : ".$item->desc. "<br>";
//            echo "<br>";
            }
            //return IptvList::with('epg')->where('tvtitle', 'like', '%telecine%')->get();

            return "ok";
        } else {
            return "error";
        }
    }
}
