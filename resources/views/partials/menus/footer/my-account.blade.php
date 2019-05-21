<ul class="footer-menu">
    @foreach($items as $menu_item)
        <li><a href="{{ $menu_item->link() }}">
            <i class="zmdi zmdi-circle"></i><span>{{ $menu_item->title }}</span>
        </a></li>
    @endforeach
</ul>


{{-- <ul class="footer-menu">
    <li>
        <a href="#"><i class="zmdi zmdi-circle"></i><span>My Account</span></a>
    </li>
    <li>
        <a href="#"><i class="zmdi zmdi-circle"></i><span>My Wishlist</span></a>
    </li>
    <li>
        <a href="#"><i class="zmdi zmdi-circle"></i><span>My Cart</span></a>
    </li>
    <li>
        <a href="#"><i class="zmdi zmdi-circle"></i><span>Sign In</span></a>
    </li>
    <li>
        <a href="#"><i class="zmdi zmdi-circle"></i><span>Registration</span></a>
    </li>
    <li>
        <a href="#"><i class="zmdi zmdi-circle"></i><span>Check out</span></a>
    </li>
    <li>
        <a href="#"><i class="zmdi zmdi-circle"></i><span>Oder Complete</span></a>
    </li>
</ul> --}}