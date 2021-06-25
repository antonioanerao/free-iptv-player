<!-- Left Sidebar Starts -->
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="" id="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ route('index') }}" class="waves-effect waves-primary">
                        <i class="ti-home"></i><span> Home </span>
                    </a>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect waves-primary">
                        <i class="fa fa-users"></i><span> Users</span>
                        <span class="menu-arrow"></span>
                    </a>

                    <ul class="list-unstyled">
                        <li><a href="{{ route('admin.users.index') }}">Users</a></li>
                        <li><a href="{{ route('admin.users.create') }}">Create</a></li>
                    </ul>
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
