<?php

namespace App\Http\Controllers;

use App\Models\IptvList;

/**
 * @property IptvList iptvList
 */
class IptvListController extends Controller
{

    public function __construct(IptvList $iptvList) {
        $this->iptvList = $iptvList;
    }

    public function liveTvGroups() {
        $channels = $this->iptvList->where('maingroup', 'live')
            ->select('tvgroup')
            ->groupBy('tvgroup')
            ->paginate(28);
        return view('channels.liveTvGroups', compact('channels'));
    }

    public function groupChannels($tvgroup) {
        $channels = $this->iptvList->where('tvgroup', $tvgroup)
            ->distinct()
            ->paginate(20);

        return view('channels.liveTvChannels', compact('channels'));
    }

    public function moviesGroups() {
        $moviesGroups = $this->iptvList->where('maingroup', 'movie')
            ->select('tvgroup')
            ->groupBy('tvgroup')
            ->paginate(28);

        return view('movies.moviesGroups', compact('moviesGroups'));
    }

    public function moviesGroupsList($tvgroup) {
        $movies = $this->iptvList->where('tvgroup', $tvgroup)
            ->distinct()
            ->paginate(28);

        return view('movies.moviesChannels', compact('movies'));
    }

    public function seriesGroups() {
        $seriesGroups = $this->iptvList->where('maingroup', 'series')
            ->select('tvgroup')
            ->groupBy('tvgroup')
            ->paginate(28);

        return view('series.seriesGroups', compact('seriesGroups'));
    }

    public function seriesGroupsList($tvgroup) {
        $series = $this->iptvList->where('tvgroup', $tvgroup)
            ->distinct()
            ->paginate(28);

        return view('series.seriesChannels', compact('series'));
    }

    public function search() {
        $searchSeries = IptvList::select('tvgroup')
            ->where('tvtitle', 'like', '%'.request('s').'%')
            ->where('maingroup', '=', 'series')
            ->distinct()
            ->get();

        $searchMovies = IptvList::where('tvtitle', 'like', '%'.request('s').'%')
            ->where('maingroup', '=', 'movie')
            ->get();

        $searchLiveTv = IptvList::where('tvtitle', 'like', '%'.request('s').'%')
            ->where('maingroup', '=', 'live')
            ->get();


        return view('search', compact('searchSeries', 'searchMovies', 'searchLiveTv'));
    }
}
