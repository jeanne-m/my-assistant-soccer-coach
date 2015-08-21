<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">My Assistant Soccer Coach</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li {{ $currentRoute === 'home' ? 'class=active' : '' }}><a href="{{ route('home') }}">Home</a></li>
                <li {{ $currentRoute === 'about' ? 'class=active' : '' }}><a href="{{ route('about') }}">About</a></li>
                <li {{ $currentRoute === 'contact' ? 'class=active' : '' }}><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (auth()->guest())
                    @if ($currentRoute === 'auth.login')
                        <li><a href="{{ route('auth.register') }}">Register</a></li>
                    @else
                        <li><a href="{{ route('auth.login') }}">Login</a></li>
                    @endif
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Hello, {{ auth()->user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('profile.show') }}">My Profile</a></li>
                            <li role="separator" class="divider"></li>
                            @if (auth()->user()->admin)
                                <li><a href="{{ route('admin.age-group.index') }}">Manage Age Groups</a></li>
                                <li><a href="{{ route('admin.focus.index') }}">Manage Foci</a></li>
                                <li><a href="{{ route('admin.principle.index') }}">Manage Principles</a></li>
                                <li><a href="{{ route('admin.stage.index') }}">Manage Stages</a></li>
                                <li><a href="{{ route('admin.drill.index') }}">Manage Drills</a></li>
                                <li><a href="{{ route('admin.user.index') }}">Manage Users</a></li>
                                <li role="separator" class="divider"></li>
                            @endif
                            <li><a href="{{ route('auth.logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
