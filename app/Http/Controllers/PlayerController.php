<?php

namespace App\Http\Controllers;

use App\Models\IptvList;

/**
 * @property IptvList iptvList
 */
class PlayerController extends Controller
{
    public function __construct(IptvList $iptvList) {
        $this->middleware('CustomAuth');
        $this->iptvList = $iptvList;
    }

    public function player() {
        $video = IptvList::where('id', '=', request('id'))->first();

        if($video->maingroup == 'movie') {
            $desc = $video->searchMovieApi($video->tvtitle);
            return view('players.player', compact('video', 'desc'));
        } else {
            return view('players.player', compact('video'));
        }
    }

    public function player2() {
        $video = IptvList::where('id', '=', request('id'))->first();






        if($video->maingroup == 'movie') {
            $desc = $video->searchMovieApi($video->tvtitle);
            return view('players.player2', compact('video', 'desc'));
        } else {
            return view('players.player2', compact('video'));
        }
    }
}
