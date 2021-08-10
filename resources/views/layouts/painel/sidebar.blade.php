<!-- Left Sidebar Starts -->
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="" id="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect waves-primary">
                        <i class="ti-home"></i><span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.generateJson') }}?make-json={{ env('IPTV_MAKE_JSON_SECRET') }}" target="_blank" class="waves-effect waves-primary">
                        <i class="fa fa-list"></i><span> Generate Json </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.storeChannels') }}?store-channels={{ env('IPTV_STORE_CHANNELS_SECRET') }}" target="_blank" class="waves-effect waves-primary">
                        <i class="fa fa-list-alt"></i><span> Store Channels </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.getepg') }}?get-epg={{ env('IPTV_GET_EPG_SECRET') }}" target="_blank" class="waves-effect waves-primary">
                        <i class="fa fa-list-alt"></i><span> Get EPG </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Left Sidebar End -->
