<div class="sidebar-menu">
    <!-- BEGIN SIDEBAR MENU ITEMS-->
    <ul class="menu-items">
        <li class="m-t-20 {{($menu_item['parent_menu']== 'dashboard')?'active':null}}">
            <a href="{{route('home')}}" class="detailed">
                <span class="title">Dashboard</span>

            </a>
            <span class="icon-thumbnail"><i class="pg-icon">home</i></span>
        </li>
        <li class="{{(@$menu_item['parent_menu']== 'scrap_product')?'active':null}}">
            <a href="{{route('scrap_product')}}"><span class="title">Scrap Product</span></a>
            <span class="icon-thumbnail"><i class="pg-icon">grid</i></span>
        </li>

        <li class="{{(@$menu_item['parent_menu']== 'node_setting')?'active':null}}">
            <a href="{{route('node_setting')}}"><span class="title">Node Setting</span></a>
            <span class="icon-thumbnail"><i class="pg-icon">grid</i></span>
        </li>
        
        
    </ul>
    <div class="clearfix"></div>
</div>
