<div class="row border-bottom">
    <nav class="navbar navbar-static-top white-bg" role="navigation">
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <span class="m-r-sm text-muted welcome-message">{{ trans('common.navigator.welcome') . Auth::user()->name ?? ''}}.</span>
            </li>
            <li>
                <a href="{{ url('/logout') }}" class="logout-btn"
                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"> Logout</i>
                </a>

                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </nav>
</div>
