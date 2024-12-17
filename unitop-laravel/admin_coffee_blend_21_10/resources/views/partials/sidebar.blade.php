<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="index.html"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">UI elements</li><!-- /.menu-title -->
                <li class="get_active">
                    <a href="{{route('category.index')}}"><i class="fa-solid fa-icons"></i>&nbsp;&nbsp;Category </a>
                </li>
                <li class="get_active">
                    <a href="{{route('menu.index')}}"><i class="fa-solid fa-layer-group"></i>&nbsp;&nbsp;Menu </a>
                </li>
                <li class="get_active">
                    <a href="{{route('product.index')}}"><i class="fa-solid fa-mug-saucer"></i>&nbsp;&nbsp;Product </a>
                </li>
                <li class="get_active">
                    <a href="{{route('slider.index')}}"><i class="fa-solid fa-video"></i>&nbsp;&nbsp;Slider </a>
                </li>
                <li class="get_active">
                    <a href="{{route('setting.index')}}"><i class="fa-solid fa-gears"></i>&nbsp;&nbsp;Setting </a>
                </li>
                <li class="get_active">
                    <a href="{{route('user.index')}}"><i class="fa-solid fa-users"></i>&nbsp;&nbsp;User </a>
                </li>
                <li class="get_active">
                    <a href="{{route('role.index')}}"><i class="fa-solid fa-users-gear"></i>&nbsp;&nbsp;Role </a>
                </li>
                <li class="get_active menu-item-has-children dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="fa-solid fa-user-lock"></i>&nbsp;&nbsp;Permission</a>
                    <ul class="sub-menu children dropdown-menu"><li class="subtitle"> <i class="menu-icon fa fa-th"></i>Forms</li>
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('permission.index')}}">List & Add Permission</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->