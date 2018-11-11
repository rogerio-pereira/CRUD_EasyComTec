<!-- Right Side Of Navbar -->
<ul class="navbar-nav ml-auto">
    <!-- Authentication Links -->
    @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
    @else
        {{--Candidate--}}
        <li class="nav-item">
            <a href="{{route('admin.candidates.index')}}"  class="nav-link">
                Candidates
            </a>
        </li>
        {{--Skils--}}
        <li class="nav-item">
            <a href="{{route('admin.skills.index')}}"  class="nav-link">
                Skills
            </a>
        </li>
        {{--Interviews--}}
        <li class="nav-item">
            <a href="{{route('admin.interviews.index')}}"  class="nav-link">
                Interviews
            </a>
        </li>
        {{--User--}}
        <li class="nav-item dropdown">
            <a id="navbarDropdownLogout" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownLogout">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" id='logout'>
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    @endguest
</ul>