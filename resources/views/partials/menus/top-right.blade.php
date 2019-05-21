<ul class="main-menu text-center">
    @foreach($items as $menu_item)
        <li>
            <a href="{{ $menu_item->link() }}">
                {{ $menu_item->title }}
            </a>
        </li>
    @endforeach
</ul>



<ul class="link f-right">
                                    
{{--
<li>
    <a href="my-account-2.html">
        <i class="zmdi zmdi-account"></i> My Account
    </a>
</li> --}} 
@guest
<li>
    <a href="{{ route('register') }}">
        <i class="zmdi zmdi-account-add"></i> Sign Up
    </a>
</li>
<li onclick="myFunction()" id="loginForum">
    <a href="{{ route('login') }}">
        <i class="zmdi zmdi-lock"></i> Login
    </a>
</li>
@else
<li>
    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
        <i class="zmdi zmdi-minus-circle"></i> {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</li>
@endguest
<li>
    <a href="{{ route('cart.index') }}">
        <i class="zmdi zmdi-shopping-cart"></i> Cart @if(Cart::instance('default')->count() > 0) ({{ Cart::instance('default')->count() }}) @endif

    </a>
</li>
</ul>