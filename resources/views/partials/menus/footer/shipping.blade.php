<ul class="footer-menu">
    @foreach($items as $menu_item)
        <li><a href="{{ $menu_item->link() }}">
            <i class="zmdi zmdi-circle"></i><span>{{ $menu_item->title }}</span>
        </a></li>
    @endforeach
</ul>

<!-- <ul class="footer-menu">
    <li>
        <a href="#"><i class="zmdi zmdi-circle"></i><span>New Products</span></a>
    </li>
    <li>
        <a href="#"><i class="zmdi zmdi-circle"></i><span>Discount Products</span></a>
    </li>
    <li>
        <a href="#"><i class="zmdi zmdi-circle"></i><span>Best Sell Products</span></a>
    </li>
    <li>
        <a href="#"><i class="zmdi zmdi-circle"></i><span>Popular Products</span></a>
    </li>
    <li>
        <a href="#"><i class="zmdi zmdi-circle"></i><span>Manufactirers</span></a>
    </li>
    <li>
        <a href="#"><i class="zmdi zmdi-circle"></i><span>Suppliers</span></a>
    </li>
    <li>
        <a href="#"><i class="zmdi zmdi-circle"></i><span>Special Products</span></a>
    </li>
</ul> -->