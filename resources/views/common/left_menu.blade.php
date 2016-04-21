<?php
$menu_items = [
    [
        'href' => '/events',
        'icon'  => 'ico-calendar',
        'id'  => 'event'
    ],
];

?>
<ul class="topmenu topmenu-responsive" data-toggle="menu">
    <li>
        <a href="/" data-target="#dashboard" data-parent=".topmenu">
            <span class="figure"><i class="ico-home2"></i></span>
            <span class="text">{{ trans( 'app.menu.home' ) }}</span>
        </a>
    </li>


    @foreach ($menu_items as $menu_item)
    <li>
        <a href="{{ $menu_item['href'] or 'javascript:void(0);' }}" data-parent=".topmenu" data-toggle="submenu">
            <span class="figure"><i class="{{ $menu_item['icon'] }}"></i></span>
            <span class="text">{{ trans( 'app.menu.' . $menu_item['id']) }}</span>
            @if ( isset( $menu_item['label']) )
                <span class="number"><span class="label label-danger">{{$menu_item['label']}}</span></span>
            @endif
        </a>
    </li>
    @endforeach

    <li >
        <a href="javascript:void(0);" data-toggle="submenu" data-target="#admin" data-parent=".topmenu">
            <span class="figure"><i class="ico-grid"></i></span>
            <span class="text">{{ trans( 'app.menu.admin' ) }}</span>
            <span class="arrow"></span>
        </a>
        <!-- START 2nd Level Menu -->
        <ul id="admin" class="submenu collapse ">
            <li class="submenu-header ellipsis">Panel Administratora</li>
            <li >
                <a href="/units">
                    <span class="text">Przedszkola</span>
                </a>
            </li>

            <li >
                <a href="/register">
                    <span class="text">Utwórz konto</span>
                </a>
            </li>

        </ul>
        <!--/ END 2nd Level Menu -->
    </li>
</ul>
