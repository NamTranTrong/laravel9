<div class="col-lg-3 d-none d-lg-block">
    <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100 collapsed" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
        <h6 class="m-0">Categories</h6>
        <i class="fa fa-angle-down text-dark"></i>
    </a>
    <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" href="{{asset('eshopper-1.0.0/shop.html#navbar-vertical#navbar-vertical')}}" style="width: calc(100% - 30px); z-index: 1;" id="navbar-vertical">
        <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
            @foreach ($categories as $category)
                @if ($category->CategoryChild->count())
                    <div class="nav-item dropdown">
                        <a href="{{route('product.list',['slug'=> $category->slug,'id' => $category->id])}}" class="nav-link" data-toggle="dropdown">
                            {{$category->name}}
                            <i class="fa fa-angle-down float-right mt-1"></i>
                        </a>   
                        <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                            @foreach ($category->CategoryChild as $categoryChild )
                                <a href="{{route('product.list',['slug' => $categoryChild->slug,'id' => $category->id])}}" class="dropdown-item">{{$categoryChild->name}}</a>
                            @endforeach
                        </div>
                    </div>
                @else
                <a href="{{route('product.list',['slug'=> $category->slug,'id' => $category->id])}}" class="nav-link">
                    {{$category->name}}
                </a> 
                @endif
            @endforeach
        </div>
    </nav>
</div>