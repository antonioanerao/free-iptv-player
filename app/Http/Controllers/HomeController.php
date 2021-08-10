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
            ->where('id', '=', 5590)
            ->orWhere('id', '=', 5582)
            ->orWhere('id', '=', 5607)
            ->orWhere('id', '=', 5617)
            ->get();

        $channels = $this->iptvList
            ->where('id', 635)->orWhere('id', 629)->orWhere('id', 646)->orWhere('id', 643)->get();

        $series = $this->iptvList
            ->where('id', 30810)->orWhere('id', 33717)->orWhere('id', 38398)
            ->orWhere('id', 45399)
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
