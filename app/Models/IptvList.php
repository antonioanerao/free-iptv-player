<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IptvList extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function listMainGroup($mainGroup) {
        return IptvList::select()
            ->where('maingroup', '=', $mainGroup)
            ->get();
    }

    public function groups($mainGroup = '') {
        if(empty($mainGroup)) {
            $groups = IptvList::select('tvgroup')
                ->distinct()
                ->get();
        } else {
            $groups = IptvList::select('tvgroup')
                ->where('maingroup', '=', $mainGroup)
                ->distinct()
                ->get();
        }

        return $groups;
    }

    public function epg() {
        return $this->hasMany(LivetvEpg::class, 'channel', 'tvid')
            ->orderBy('id', 'asc');
    }

    public function searchMovieApi($title) {
        $desc = '';
        $title = str_replace(' ', '+', $title);
        $title = str_replace('(', '', $title);
        $title = str_replace(')', '', $title);
        $title =  preg_replace('/(19|20)[0-9][0-9]/', '', $title);
        $title = IptvList::removerAcentos($title);
        $title = str_replace('++', '+', $title);
        $jsonUrl = 'https://api.themoviedb.org/3/search/movie?api_key='.
            env('THE_MOVIE_DB_API_KEY').'&language='.
            env('APP_LANG').'&query='.$title.'&page=1&include_adult=false';

        $file = file_get_contents($jsonUrl);
        $json = json_decode($file, true);

        foreach($json['results'] as $j) {
            $desc = $j['overview']; break;
        }

        return $desc;
    }

     public static function removerAcentos($string) {
        return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),
            explode(" ","a A e E i I o O u U n N"),$string);
    }
}
