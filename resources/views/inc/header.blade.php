<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <a  class="my-0 mr-md-auto badge badge-primary" href="/" >
        <h5 class=" font-weight-normal">WebTest</h5>
    </a>

    <nav class="my-2 my-md-0 mr-md-3">
        <form action="{{ route('search') }}" method="post" class="form-inline mt-2 mt-md-0">
            @csrf
            <input id="search" name="search" class="form-control mr-sm-2" type="text" placeholder="Работаю некорректно..." aria-label="Search">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Поиск</button>
        </form>
    </nav>
    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Войти</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <a class="dropdown-item" href="{{ route('my-pastes') }}">
                        My pastes
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
</div>
