{{-- //TODO: side bar not opening when clicked from different section --}}
<div class="menu">
    <div class="main-menu">
        <div class="scroll">
            <ul class="list-unstyled">
                {{-- <li id="dashboard-section"><a href="#dashboard"><i class="iconsminds-shop-4"></i> <span>Dashboards</span></a></li> --}}
                <li id="survey-section"><a href="#surveys"><i class="iconsminds-check"></i> Surveys</a></li>
                <li id="user-section"><a href="{{ route('users.index') }}"><i class="simple-icon-people"></i>Users</a></li>
                <li id="submission-section"><a href="{{route('submissions.index')}}"><i class="iconsminds-bar-chart-4"></i>Submissions</a></li>
                <li id=""><a href="{{route('dashboard.profile')}}"><i class="simple-icon-people"></i>Profile</a></li>
            </ul>
        </div>
    </div>
    <div class="sub-menu">
        <div class="scroll">
            {{-- Dashboard's side-bar --}}
            <ul class="list-unstyled" data-link="dashboard">

                {{-- <li><a href="{{ route('analytics.index') }}"><i class="simple-icon-pie-chart"></i> <span --}}
                            {{-- class="d-inline-block">Analytics</span></a></li> --}}
            </ul>

            {{-- Survey's side-bar --}}
            <ul class="list-unstyled" data-link="surveys" id="surveys">
                <li><a href="{{route('dashboard.index')}}"><i class="simple-icon-eye"></i> <span class="d-inline-block">View All Surveys</span></a>
                </li>

                {{-- drafts drop down --}}
                @if ($surveys->where('status_id', 1)->count() > 0)
                    <li><a href="#" data-toggle="collapse" data-target="#collapseAuthorization" aria-expanded="true"
                            aria-controls="collapseAuthorization" class="rotate-arrow-icon opacity-50"><i
                                class="simple-icon-arrow-down"></i> <span class="d-inline-block">Drafts</span></a>
                        <div id="collapseAuthorization" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                @foreach ($surveys->where('status_id', 1) as $survey)
                                    <li><a href="{{ url('/dashboard/surveys/' . $survey->id) }}"><i
                                                class="simple-icon-clock"></i> <span
                                                class="d-inline-block">{{ $survey->name }}</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                @endif

                {{-- archived drop down --}}
                @if ($surveys->where('status_id', 3)->count() > 0)
                    <li><a href="#" data-toggle="collapse" data-target="#collapseProduct" aria-expanded="true"
                            aria-controls="collapseProduct" class="rotate-arrow-icon opacity-50"><i
                                class="simple-icon-arrow-down"></i> <span class="d-inline-block">Archived</span></a>
                        <div id="collapseProduct" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                @foreach ($surveys->where('status_id', 3) as $survey)
                                    <li><a href="{{ url('/dashboard/surveys/' . $survey->id) }}"><i
                                                class="simple-icon-drawer"></i> <span
                                                class="d-inline-block">{{ $survey->name }}</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                @endif

                {{-- deployed drop down --}}
                @if ($surveys->where('status_id', 2)->count() > 0)
                    <li><a href="#" data-toggle="collapse" data-target="#collapseProfile" aria-expanded="true"
                            aria-controls="collapseProfile" class="rotate-arrow-icon opacity-50"><i
                                class="simple-icon-arrow-down"></i> <span class="d-inline-block">Deployed</span></a>
                        <div id="collapseProfile" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                @foreach ($surveys->where('status_id', 2) as $survey)
                                    <li><a href="{{ url('/dashboard/surveys/' . $survey->id) }}"><i
                                                class="iconsminds-yes"></i> <span
                                                class="d-inline-block">{{ $survey->name }}</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                @endif

            </ul>

        </div>
    </div>
</div>
