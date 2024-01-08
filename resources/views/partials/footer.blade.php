@php
    
$catalog = config('db.catalog');
$dcComics = config('db.dcComics');
$shop = config('db.shop');
$dc = config('db.dc');
$sites = config('db.sites');
$socials = config('db.socials');
@endphp


<div class="catalog-bg" id='catalog'>
    <div class="container">
        <ul class="nav d-flex justify-content-between align-items-center">
            @foreach($catalog as $item)
            <li class="nav-item">
                <div class="d-flex align-items-center">
                    <img src="{{Vite::asset($item['image'])}}" alt="{{$item['text']}}">
                    <a class="nav-link text-uppercase" href="{{$item['url']}}">{{ $item['text'] }}</a>

                </div>

            </li>
            @endforeach
        </ul>
    </div>

</div>
<footer id="footer-first">
    <section class="dc-bg py-4">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="row">
                <div class="col-4">
                    <h5 class="text-uppercase">Dc Comics</h5>
                    <ul>
                        @foreach($dcComics as $item)
                        <li>
                            <a href="{{$item['url']}}">{{ $item['text'] }}</a>
                        </li>
                        @endforeach
                    </ul>
                    <h5 class="text-uppercase">Shop</h5>
                    <ul>
                        @foreach($shop as $item)
                        <li>
                            <a href="{{$item['url']}}">{{ $item['text'] }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-4">
                    <h5 class="text-uppercase">Dc</h5>
                    <ul>
                        @foreach($dc as $item)
                        <li>
                            <a href="{{$item['url']}}">{{ $item['text'] }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-4">
                    <h5 class="text-uppercase">Sites</h5>
                    <ul>
                        @foreach($sites as $site)
                        <li>
                            <a href="{{$site['url']}}">{{ $site['text'] }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <img src="{{Vite::asset('resources/img/dc-logo-bg.png')}}" alt="logo">
        </div>
    </section>
</footer>
<section class="d-flex" id='footer-end'>
    <div class="container d-flex justify-content-between align-items-center">
        <button class="btn text-uppercase">Sign-up Now!</button>
        <ul class="nav align-items-center">
            <li class="text-uppercase nav-item me-4">Follow Us</li>
            @foreach($socials as $social)
            <li class="nav-item me-3">
                <img src="{{Vite::asset($social['image'])}}" alt="social">
            </li>
            @endforeach
        </ul>
    </div>

</section>