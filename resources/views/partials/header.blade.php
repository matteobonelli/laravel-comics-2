@php
$navbar = config('db.navbar'); 

@endphp

<header class="container my-4" id='mainheader'>
    <div class="d-flex justify-content-between align-items-center">
        <img src="{{Vite::asset('resources/img/dc-logo.png')}}" alt="logo">
        <ul class="nav nav-underline">
            <li class="nav-item mx-1">
                <a class="nav-link text-uppercase {{Route::currentRouteName() == 'home' ? 'active' : ''}}" href="{{route('home')}}">Home</a>
            </li>
            <li class="nav-item mx-1">
                <a class="nav-link text-uppercase {{Route::currentRouteName() == 'comics.index' ? 'active' : ''}}" href="{{route('comics.index')}}">Comics</a>
            </li>
            @foreach($navbar as $navitem)
            <li class="nav-item mx-1">
                <a class="nav-link text-uppercase" href="{{$navitem['url']}}">{{$navitem['text']}}</a>
            </li>
            @endforeach
        </ul>
        <form class="d-flex">
            <div class="btn-container">
                <input type="search" placeholder="Search">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            
            
          </form>
    </div>


</header>

<div class="jumbo-container">
</div>