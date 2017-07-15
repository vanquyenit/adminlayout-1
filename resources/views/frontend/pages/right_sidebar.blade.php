<div class="col-md-3 col-sm-12" style="padding: 0px;">
<div class="col-md-12 col-sm-12">
    <div class="list-group">
        <a href="{{ route('getCart') }}" class="list-group-item active">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            @if(Auth::check())
                @if($cart)
                    <span class="badge">{!! Cart::content()->count() !!}</span>
                @endif
            @endif
            &nbsp; Giỏ hàng
        </a>
        <div class="row list_book" style="padding: 10px 10px 4px 10px;">
            @if(Auth::check())
                @if($cart)
                    <p class="text-center" style="font-weight: bold;">{!! "Đã có" . "&nbsp" .Cart::content()->count(). " sách &nbsp" . "trong giỏ hàng" !!}</p>
                @endif
            @else
                <p class="text-center">Giỏ hàng đang rỗng</p>
            @endif
        </div>
    </div>
</div>
<div class="col-md-12 col-sm-12">
    <div class="list-group">
        <a href="#" class="list-group-item active">
            <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
            &nbsp; Danh mục sách
        </a>
        <div class="row list_book">
            <ul class="user_info">
                <?php
                    $cate = DB::table('categories')->where('parent_id', 0)->get();
                ?>
                @foreach($cate as $value)
                    <li><a href="{{ route('getBookCate', ['id' => $value->id, 'slug' => $value->alias]) }}">{!! $value->name !!}</a></li>
                    <div>
                        <ul>
                            <?php $menu_lv2 = DB::table('categories')->where('parent_id', $value->id)->get(); ?>
                            @foreach($menu_lv2 as $item_lv2)
                                <li><a href="{{ route('getBookCate', ['id' => $item_lv2->id, 'slug' => $item_lv2->alias]) }}">{!! $item_lv2->name !!}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </ul>
        </div>
    </div>
</div>

</div>