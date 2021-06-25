<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\ChannelGroup;

class ChannelController extends Controller
{
    private Channel $channel;
    private ChannelGroup $chanelGroup;

    public function __construct(Channel $channel, ChannelGroup $channelGroup) {
        $this->channel = $channel;
        $this->chanelGroup = $channelGroup;
    }

    public function importChannelsEpg() {
       $file = storage_path() . '/channels_epg.txt';

        $linecount = 0;
        $handle = fopen($file, "r");
        while(!feof($handle)){
            $line = fgets($handle);
            $linecount++;

            $p1 = explode('tvg-id="', $line);
            $p2 = explode('"',$p1[1]);

            // $p2[0] = tvg-id
            // $p2[2] = tvg-name
            // $p2[4] = tvg-logo
            // $p2[6] = group-title
            // $p2[8] = idCanal


            Channel::create([
                'tvg-id' => $p2[0],
                'tvg-name' => $p2[2],
                'tvg-logo' => $p2[4],
                'group-title' => $p2[6],
                'id-channel' => $p2[8],
            ]);
        }

        fclose($handle);
    }

    public function list($idChannel) {
        $channels = $this->chanelGroup->with('channels')->findOrFail($idChannel);
        return view('channel.list', compact('channels'));
    }
}
