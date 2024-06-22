<header class="topbar-nav">
    <nav class="navbar navbar-expand fixed-top">
        <ul class="navbar-nav mr-auto align-items-center">
            <li class="nav-item">
                <a class="nav-link toggle-menu" href="javascript:void();">
                    <i class="icon-menu menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <form class="search-bar" style="display: flex">
                    <input type="text" name="q" value="{{ request()->query()['q']  ?? '' }}" class="form-control" placeholder="Enter keywords">
                    <button type="submit" class="btn btn-light"><i class="icon-magnifier"></i></button>
                </form>
            </li>
            <li>

                @stack('navigation')
            </li>
        </ul>

        <ul class="navbar-nav align-items-center right-nav-link">
            <li class="nav-item">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
                    <span class="user-profile"><img src="{{ asset('assets/admin.jpg') }}" class="img-circle"
                            alt="user avatar" /></span>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li class="dropdown-item user-details">
                        <a href="javaScript:void();">
                            <div class="media">
                                <div class="avatar">
                                    <img class="align-self-start mr-3" src="{{ asset('assets/admin.jpg') }}"
                                        alt="user avatar" />
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-2 user-title">{{ auth()->user()->name }}</h6>
                                    <p class="user-subtitle">{{ auth()->user()->email }}</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="dropdown-divider"></li>
                    {{-- <li class="dropdown-item">
                        <i class="icon-envelope mr-2"></i> Inbox
                    </li>  --}}
                    <li class="dropdown-divider"></li>
                    <li class="dropdown-item">
                        <a href="{{ route('profile.edit') }}"><i class="icon-wallet mr-2"></i> Account</a>
                    </li>
                    {{-- <li class="dropdown-divider"></li>
                        <li class="dropdown-item">
                            <i class="icon-settings mr-2"></i> Setting
                        </li> --}}
                    <li class="dropdown-divider"></li>
                    <li class="dropdown-item">
                        <a href="{{ route('logout') }}"><i class="icon-power mr-2"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
