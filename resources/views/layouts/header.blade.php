<header>
    <nav class="navbar navbar-expand-md navbar-light  bg-success ">
        <div class="container">
            <a class="navbar-brand text-light" href="{{ url('/') }}">
                <i class="fas fa-seedling">{{ config('app.name', 'ninaite') }}</i>
            </a>
            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
        
        
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                
                </ul>
                
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('register') }}">{{ __('新規登録') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{route('farms.index')}}">農園一覧をみる<span class="sr-only">(current)</span></a>
                    </li>
                    @endif
                    
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                    
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    
                      <li class="nav-item dropdown">
                        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{route('users.show', ['user' => Auth::user()->id]) }}">プロフィール<span class="sr-only">(current)</span></a>
                                </li>
                    
                                <li class="nav-item active">
                                    <a href="{{ route('users.chat_rooms.index', ['user' => Auth::id()]) }}" class="nav-link text-light">チャットメッセージを確認<span class="sr-only">(current)</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>
