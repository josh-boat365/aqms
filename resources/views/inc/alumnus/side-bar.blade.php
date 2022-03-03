<div class="menu">
    <div class="main-menu">
        <div class="scroll">
            <ul class="list-unstyled">
                <li id="survey-section" class=""><a href="#survey"><i class="iconsminds-check"></i> Surveys</a></li>
                <li id="" class=""><a href="{{ route('alumnus.profile') }}"><i class="simple-icon-people"></i>Profile</a></li>
                {{-- <li><a href="#ui"><i class="iconsminds-pantone"></i> UI</a></li>
                <li><a href="#menu"><i class="iconsminds-three-arrow-fork"></i> Menu</a></li>
                <li><a href="Blank.Page.html"><i class="iconsminds-bucket"></i> Blank Page</a></li>
                <li><a href="https://dore-jquery-docs.coloredstrategies.com/" target="_blank"><i
                            class="iconsminds-library"></i> Docs</a></li> --}}
            </ul>
        </div>
    </div>
    <div class="sub-menu">
        <div class="scroll">
            <ul class="list-unstyled" data-link="survey" id="survey">
                <li><a href="{{route('home')}}"><i class="simple-icon-eye"></i> <span class="d-inline-block">View All Surveys</span></a>
                    @foreach ($surveys as $survey)
                            <li><a href="{{url('/home/surveys/' . $survey->id)}}"><i class="iconsminds-check"></i> <span
                                class="d-inline-block">{{$survey->name}}</span></a></li>
                            @endforeach
                </li>
               
            </ul>
            
        </div>
    </div>
</div>
