<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="navbar nav_title text-center slogan-logo">
                    <a class="clear" href="#">
                        <span class="clear">
                            <strong id="system-name">DASHBOARD</strong>
                        </span>
                    </a>
                </div>
            </li>
            @if (Auth::check() && Auth::user()->isAdmin())
                <li class="{!! activeClass(['users.index']) !!}">
                    {!! Html::linkAction('Admin\UserController@index', trans('common.navigator.user')) !!}
                </li>
            @endif
        </ul>
    </div>
</nav>
