<div class="header">
    <div class="header-left">
        <div class="menu-icon dw dw-menu"></div>
    </div>
    <div class="header-right">
        <!---
        <div class="dashboard-setting user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                    <i class="dw dw-settings2"></i>
                </a>
            </div>
        </div>
        --->
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <span class="user-icon">
                        @if (Auth::user()->gambar != null)
                            <img src="{{ asset('images/' . Auth::user()->gambar) }}" alt="">
                        @else
                            @php
                                $i = rand(1, 6);
                                $avatar_name = 'avatar' . $i . '.png';
                            @endphp
                            <img src="https://bootdey.com/img/Content/avatar/{{ $avatar_name }}" alt="">
                        @endif
                    </span>
                    <span class="user-name">Hello, {{ Auth::user()->name }} !</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="{{ route('profile.show', Auth::user()->id) }}"><i
                            class="dw dw-user1"></i> Profile</a>
                    <a class="dropdown-item" href="{{ route('profile.edit', Auth::user()->id) }}"><i
                            class="dw dw-settings2"></i> Setting</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="dw dw-logout"></i>{{ __('Log Out') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
