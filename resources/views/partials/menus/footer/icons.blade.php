<ul class="footer-social">
    @foreach($items as $menu_item)
        <li><a href="{{ $menu_item->link() }}" class="{{ $menu_item->title }}" title="{{ ucwords(str_replace('-', ' ', $menu_item->title)) }}">
            <i class="zmdi zmdi-{{ $menu_item->title }}"></i>
        </a></li>
    @endforeach
</ul>



{{-- <ul class="footer-social">
    <li>
        <a class="facebook" href="#" title="Facebook"><i class="zmdi zmdi-facebook"></i></a>
    </li>
    <li>
        <a class="google-plus" href="#" title="Google Plus"><i class="zmdi zmdi-google-plus"></i></a>
    </li>
    <li>
        <a class="twitter" href="#" title="Twitter"><i class="zmdi zmdi-twitter"></i></a>
    </li>
    <li>
        <a class="rss" href="#" title="RSS"><i class="zmdi zmdi-rss"></i></a>
    </li>
</ul> --}}