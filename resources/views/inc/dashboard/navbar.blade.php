<style type="text/css">
    @media (min-width: 280px)and (max-width: 900px) {
        .navbar {
            width: 100%;
            justify-content: space-between;
        }

        nav .navbar-right {
            /* position: relative; */
            right: -58%;
            bottom: 1.7rem;
        }

        nav .atu-icon {
            position: relative;
            right: 5rem;
        }

        nav .atu-icon a img {
            width: 45%;
        }
    }
</style>

<nav class="navbar fixed-top">
    <div class="d-flex align-items-center navbar-left"><a href="#" class="menu-button d-none d-md-block"><svg
                class="main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 17">
                <rect x="0.48" y="0.5" width="7" height="1" />
                <rect x="0.48" y="7.5" width="7" height="1" />
                <rect x="0.48" y="15.5" width="7" height="1" />
            </svg> <svg class="sub" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 17">
                <rect x="1.56" y="0.5" width="16" height="1" />
                <rect x="1.56" y="7.5" width="16" height="1" />
                <rect x="1.56" y="15.5" width="16" height="1" />
            </svg> </a>
        <a href="#" class="menu-button-mobile d-xs-block d-sm-block d-md-none"><svg
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 17">
                <rect x="0.5" y="0.5" width="25" height="1" />
                <rect x="0.5" y="7.5" width="25" height="1" />
                <rect x="0.5" y="15.5" width="25" height="1" />
            </svg></a>
        <div class="search" data-search-path="Pages.Search03d2.html?q="><input placeholder="Search..."> <span
                class="search-icon"><i class="simple-icon-magnifier"></i></span>
        </div>

    </div>
    <div class="atu-icon" style=" width:8rem">
        <a href="">
            <img src="/img/custom/atulogo.png" height="100%" width="90%" alt="">
        </a>
    </div>
    <div class="navbar-right">
        <div class="header-icons d-inline-block align-middle">


            <div class="position-relative d-inline-block">
                <button class="header-icon btn btn-empty" type="button" id="notificationButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="simple-icon-bell"></i>
                    <span class="count">{{ $notifications->count() }}</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right mt-3 position-absolute" id="notificationDropdown"
                    style="width: 25rem">
                    <div class="scroll">

                        @foreach ($notifications->get() as $notification)
                            <div class="d-flex flex-row mb-2 pb-3 separator"
                                style="background-color: #fdfdfd; padding: 0.5rem;">
                                {{-- <a href="#">
                                    <img src="{{ asset('img/profiles/atu-logo-round.png') }}" alt="Notification Image"
                                        class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle">

                                </a> --}}
                                <div class="pl-3">
                                    @if ($notification->notification_type_id == 2)
                                        <a href="{{ url('/dashboard/submissions/' . $notification->survey_id) }}">
                                        @else
                                            <a href="">
                                    @endif
                                    <div class="d-flex"
                                        style="position: relative; top: 0.7rem; right: 1rem; gap: 0.8rem;">
                                        @if ($notification->notification_type_id == 1)
                                            <p class="font-weight-medium badge badge-pill badge-secondary">
                                                New user:
                                            </p>
                                        @elseif($notification->notification_type_id == 2)
                                            <p class="font-weight-medium badge badge-pill badge-success">
                                                New survey:
                                            </p>
                                        @endif
                                        @if ($notification->notification_type_id == 1)
                                            <p class="font-weight-medium ">
                                                @foreach ($users->where('id', $notification->user_id) as $user)
                                                    {{ $user->firstName }}
                                                @endforeach
                                            </p>
                                        @elseif($notification->notification_type_id == 2)
                                            <p class="font-weight-medium "> - @foreach ($allSurveys->where('id', $notification->survey_id) as $survey)
                                                    {{ $survey->name }}
                                                @endforeach
                                            </p>
                                        @endif
                                        <p class="text-muted  text-small">
                                            {{-- {{ $notification->created_at->format('d/m/y') }} --}}
                                            {{ $notification->created_at->format('l jS \of F Y h:i:s A') }}
                                            {{-- ({{ $notification->created_at->format(' h : s ') }})</p> --}}
                                            {{-- format('l jS \of F Y h:i:s A') --}}
                                    </div>

                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>
        <div class="user d-inline-block"><button class="btn btn-empty p-0" type="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"><span class="name">{{ auth()->user()->firstName }}
                    {{ auth()->user()->lastName }}</span> <span><img alt="Profile Picture"
                        src="{{ asset('img/profiles/atu-logo-round.png') }}"></span></button>
            <div class="dropdown-menu dropdown-menu-right mt-3">
                <a class="dropdown-item" href="{{ route('dashboard.profile') }}">Profile</a>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <input class="dropdown-item" type="submit" value="Log out">
                </form>
                {{-- <a class="dropdown-item" href="#">Sign out</a></div> --}}
            </div>
        </div>
    </div>
    @if (session()->has('success'))
        <div style="left: 50%; transform: translate(-50%); top: 110%; display:none; z-index: 99999" id="notification"
            class="position-absolute py-4 px-3 bg-success container col-5 text-white text-center justify-content-center rounded">
            <h3 class="m-0">
                {{ session('success') }}
            </h3>
        </div>
    @endif
    @if (session()->has('error'))
        <div style="left: 50%; transform: translate(-50%); top: 110%; display:none; z-index: 99999" id="notification"
            class="position-absolute py-4 px-3 bg-danger container col-5 text-white text-center justify-content-center rounded">
            <h3 class="m-0">
                {{ session('error') }}
            </h3>
        </div>
    @endif
</nav>
