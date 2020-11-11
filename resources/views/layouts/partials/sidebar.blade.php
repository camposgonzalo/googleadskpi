@php
    $path = explode('/', request()->path());
    $path[1] = (array_key_exists(1, $path)> 0)?$path[1]:'';
    $path[2] = (array_key_exists(2, $path)> 0)?$path[2]:'';
@endphp
<div class="left-sidenav">
    <ul class="metismenu left-sidenav-menu">
        <li class="{{ ($path[0] === '')?'mm-active':'' }}">
            <a href="{{route('home')}}"><i class="ti-bar-chart"></i><span>Dashboard</span><span
                    class="menu-arrow"></span></a>
        </li>
        <li class="{{ ($path[0] === 'ads-campaign')?'mm-active':'' }}">
            <a href="{{route('campaign.index')}}"><i class="fab fa-google"></i><span>Campañas</span><span
                    class="menu-arrow"></span></a>
        </li>
        <li class="{{ ($path[0] === 'ads-request')?'mm-active':'' }}">
            <a href="{{route('request.index')}}"><i class="ti-ticket"></i><span>Solicitudes</span><span
                    class="menu-arrow"></span></a>
        </li>
        <li class="{{ ($path[0] === 'ads-billing')?'mm-active':'' }}">
            <a href="{{route('billing.index')}}"><i class="ti-file"></i><span>Facturación</span><span
                    class="menu-arrow"></span></a>
        </li>
        <li class="{{ ($path[0] === 'ads-user')?'mm-active':'' }}">
            @if ($vc_user->role === 'admin')
                <a href="{{route('user.index')}}"><i class="icon dripicons-user-group"></i><span>Usuarios</span>
                    <span class="menu-arrow"></span></a>
            @endif
        </li>
    </ul>
</div>
