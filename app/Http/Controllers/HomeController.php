<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\IptvList;
use App\Models\Movie;
use Illuminate\Http\Request;

/**
 * @property IptvList iptvList
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(IptvList $iptvList)
    {
        $this->middleware('CustomAuth');
        $this->iptvList = $iptvList;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $movies = $this->iptvList
            ->where('id', '=', env('IPTV_INDEX_MOVIE_1'))
            ->orWhere('id', '=', env('IPTV_INDEX_MOVIE_2'))
            ->orWhere('id', '=', env('IPTV_INDEX_MOVIE_3'))
            ->orWhere('id', '=', env('IPTV_INDEX_MOVIE_4'))
            ->get();

        $channels = $this->iptvList
            ->where('id', env('IPTV_INDEX_LIVETV_1'))
            ->orWhere('id', env('IPTV_INDEX_LIVETV_2'))
            ->orWhere('id', env('IPTV_INDEX_LIVETV_3'))
            ->orWhere('id', env('IPTV_INDEX_LIVETV_4'))
            ->get();

        $series = $this->iptvList
            ->where('id', env('IPTV_INDEX_SERIE_1'))
            ->orWhere('id', env('IPTV_INDEX_SERIE_2'))
            ->orWhere('id', env('IPTV_INDEX_SERIE_3'))
            ->orWhere('id', env('IPTV_INDEX_SERIE_4'))
            ->orderBy('id', 'desc')
            ->get();

        $slides = $this->iptvList
            ->where('id', env('IPTV_SLIDE_01'))
            ->orWhere('id', env('IPTV_SLIDE_02'))
            ->orWhere('id', env('IPTV_SLIDE_03'))
            ->get();

        $slideSide = $this->iptvList
            ->where('id', env('IPTV_SLIDE_SIDE_01'))
            ->orWhere('id', env('IPTV_SLIDE_SIDE_02'))
            ->get();

        return view('index', compact('channels', 'movies', 'series', 'slides', 'slideSide'));
    }
}
