<nav class="nav-headerMenu">
    <ul class="clearfix">
        @foreach ($categories as $category)
            <li @if ($category->categoryChild->count()) class="has-child" @endif>{{ $category->name }}
                @if ($category->categoryChild->count())
                    <i class="fas fa-sort-down fa-xs" style="margin:0 0 3px 5px"></i>
                @endif
                <ul class="menu-child">
                    @if ($category->categoryChild->count())
                        @foreach ($category->categoryChild as $categoryChildItem)
                            <li class="lv2-title">
                                <a href="">{{ $categoryChildItem->name }}</a>
                                <ul class="menu-child-lv3">
                                    @if ($categoryChildItem->categoryChild->count())
                                        @foreach ($categoryChildItem->categoryChild as $categoryChildItemLv2)
                                            <li class="lv3-title">
                                                <a href="">{{ $categoryChildItemLv2->name }}</a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </li>
        @endforeach
    </ul>
</nav>
