<style>
    span[class="select2 select2-container select2-container--bootstrap select2-container--below select2-container--open"] {
        width: 100% !important;
    }

    .profile-banner {
        width: 100% !important;
        height: 450px;
        max-height: 450px;
        border: #00558d solid 2px;
        border-radius: 1rem !important;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }

    .img-border {
        border: #00558d solid 2px !important;
    }

    .nav-link:hover {
        cursor: pointer;
    }

    @media (min-width: 280px) and (max-width: 900px) {
        .profile-banner {
            width: 100% !important;
            height: auto;
        }

        .img-border {
            position: absolute;
            top: -3rem;
            width: 30%;
            height: 20%;
        }

    }
</style>
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-tabs separator-tabs ml-0 mb-5" role="tablist">
                    <li class="nav-item"><a class="nav-link active" id="first-tab" data-toggle="tab" href="#first"
                            role="tab" aria-controls="first" aria-selected="true">YOUR PROFILE</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show active" id="first" role="tabpanel" aria-labelledby="first-tab">
                        <div class="row">
                            <div class="col-12 mb-5"><img class="profile-banner profile-banner-card"
                                    src="{{ asset('img/profiles/atulogo.png') }}"></div>
                            <div class="col-12 col-lg-5 col-xl-4 col-left">
                                <a href="#" class="lightbox"><img alt="Profile"
                                        src="{{ asset('img/profiles/profile-icon-atu.png') }}"
                                        class="img-thumbnail card-img social-profile-img img-border"></a>
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="text-center pt-4">
                                            <div style=" padding: 10px">
                                                <div style="margin: 0 auto;" role="progressbar"
                                                    class="progress-bar-circle position-relative" data-color="#922c88"
                                                    data-trailcolor="#d7d7d7" aria-valuemax="100"
                                                    aria-valuenow="{{ ($updateProgress / 7) * 100 }}"
                                                    data-show-percent="true"></div>
                                            </div>
                                            <span class="badge badge-pill badge-primary mb-1">Progress Update</span>
                                            <span
                                                class="badge badge-pill badge-success mb-1">{{ $updateProgress }}/7</span>
                                        </div>
                                        <p class="list-item-heading pt-2">{{ auth()->user()->firstName }}
                                            {{ auth()->user()->lastName }} {{ auth()->user()->otherName }}</p>

                                        <div class="d-flex">
                                            <p class="mb-3">Email: &nbsp;</p>
                                            <p class="mb-3">{{ auth()->user()->email }}</p>
                                        </div>
                                        <div class="d-flex">
                                            <p class="mb-3">Gender: &nbsp;</p>
                                            <p class="mb-3">{{ auth()->user()->gender }}</p>
                                        </div>
                                        <div class="d-flex">
                                            <p class="mb-3">Session: &nbsp;</p>
                                            <p class="mb-3">{{ auth()->user()->session }}</p>
                                        </div>
                                        <div class="d-flex">
                                            <p class="mb-3">Phone number: &nbsp;</p>
                                            <p class="mb-3">{{ auth()->user()->phone }}</p>
                                        </div>
                                        <div class="d-flex">
                                            <p class="mb-3">Program of study: &nbsp;</p>
                                            <p class="mb-3">{{ auth()->user()->program_of_study }}</p>
                                        </div>
                                        <div class="d-flex">
                                            <p class="mb-3">Department of study: &nbsp;</p>
                                            <p class="mb-3">{{ auth()->user()->department_of_study }}</p>
                                        </div>
                                        <div class="d-flex">
                                            <p class="mb-3">Year of completion: &nbsp;</p>
                                            <p class="mb-3">{{ auth()->user()->year_of_completion }}</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-7 col-xl-8 col-right">
                                <div class="card mb-4">
                                    <div class="card-body">

                                        <ul class="nav nav-tabs separator-tabs ml-0 mb-5" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="profile-toggler">UPDATE PROFILE</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="password-toggler"
                                                    href="{{ route('alumnus.password') }}">CHANGE PASSWORD</a>
                                            </li>

                                        </ul>

                                        <div class="tab-content">

                                            <div class="tab-pane show active" id="profile-content-section"
                                                role="tabpanel" aria-labelledby="first-tab">
                                                <form class="tooltip-right-bottom mob-view" novalidate method="POST"
                                                    action="{{ route('alumnus.profile.update') }}">
                                                    @csrf
                                                    <div class="form-group has-float-label"><input
                                                            class="@error('firstName') border-danger @enderror form-control"
                                                            name="firstName" value="{{ auth()->user()->firstName }}"
                                                            autocomplete="off">
                                                        <span>First Name</span>
                                                        @error('firstName')
                                                            <div class="invalid-tooltip d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group has-float-label"><input
                                                            class="@error('lastName') border-danger @enderror form-control"
                                                            name="lastName" value="{{ auth()->user()->lastName }}"
                                                            autocomplete="off">
                                                        <span>Last Name</span>
                                                        @error('lastName')
                                                            <div class="invalid-tooltip d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group has-float-label"><input class="form-control"
                                                            name="otherName" value="{{ auth()->user()->otherName }}"
                                                            autocomplete="off">
                                                        <span>Other Name (optional)</span>
                                                    </div>
                                                    <div class="form-group has-float-label">
                                                        <input
                                                            class="@error('email') border-danger @enderror form-control"
                                                            name="email" value="{{ auth()->user()->email }}"
                                                            autocomplete="off">
                                                        <span>E-mail</span>
                                                        @error('email')
                                                            <div class="invalid-tooltip d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group has-float-label">
                                                        <select id="inputState" class="form-control select2-single"
                                                            name="gender">
                                                            <option>Choose...</option>
                                                            <option value="Male"
                                                                @if (strtolower(auth()->user()->gender) == 'male') selected @endif>Male
                                                            </option>
                                                            <option value="Female"
                                                                @if (strtolower(auth()->user()->gender) == 'female') selected @endif>Female
                                                            </option>
                                                        </select>
                                                        <span>Gender</span>
                                                    </div>
                                                    <div class="form-group has-float-label">
                                                        <select id="inputState" class="form-control select2-single"
                                                            name="session">
                                                            <option>Choose...</option>
                                                            <option value="Full-time"
                                                                @if (strtolower(auth()->user()->session) == 'full-time') selected @endif>Full
                                                                Time</option>
                                                            <option value="Part-time"
                                                                @if (strtolower(auth()->user()->session) == 'part-time') selected @endif>Part
                                                                Time</option>
                                                        </select>
                                                        <span>Session</span>
                                                    </div>
                                                    <div class="form-group has-float-label">
                                                        <input type="tel" class="form-control" name="phone"
                                                            value="{{ auth()->user()->phone }}" autocomplete="off">
                                                        <span>Phone number</span>
                                                    </div>

                                                    <div class="form-group has-float-label">
                                                        <select class="form-control select2-single"
                                                            name="program_of_study" required data-width="100%">
                                                            <option></option>
                                                            @foreach ($all_programs_of_study as $program_of_study)
                                                                <option
                                                                    @if (auth()->user()->program_of_study == $program_of_study) selected @endif
                                                                    value="{{ $program_of_study }}">
                                                                    {{ $program_of_study }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span>Program Studied</span>
                                                    </div>

                                                    {{-- Department --}}
                                                    <div class="form-group has-float-label">
                                                        <select class="form-control select2-single"
                                                            name="department_of_study" required data-width="100%">
                                                            <option></option>

                                                            @foreach ($all_departments_of_study as $department_of_study)
                                                                <option
                                                                    @if (auth()->user()->department_of_study == $department_of_study) selected @endif
                                                                    value="{{ $department_of_study }}">
                                                                    {{ $department_of_study }}</option>
                                                            @endforeach

                                                        </select><span>Department of study</span>
                                                    </div>
                                                    {{-- Year of completion --}}
                                                    <div class="form-group has-float-label">
                                                        <select class="form-control select2-single"
                                                            name="year_of_completion" required data-width="100%">
                                                            <option></option>

                                                            @for ($year = $last_year; $year >= 2000; $year--)
                                                                <option
                                                                    @if (auth()->user()->year_of_completion == $year) selected @endif
                                                                    value="{{ $year }}">{{ $year }}
                                                                </option>
                                                            @endfor
                                                            <option @if (auth()->user()->year_of_completion == 'Before 2000') selected @endif
                                                                value="Before 2000">Before 2000</option>

                                                        </select><span>Year of completion</span>
                                                    </div>
                                                    <button type="submit"
                                                        class="btn btn-primary float-right">Update</button>

                                                </form>
                                            </div>
                                            {{-- <div class="tab-pane show" id="password-section" role="tabpanel"
                                                aria-labelledby="second-tab">
                                                <form class="tooltip-right-bottom mob-view" novalidate method="POST"
                                                    action="{{ route('alumnus.password.update') }}">
                                                    @csrf
                                                    <div class="form-group has-float-label">
                                                        <input name="old_password"
                                                            class="@error('old_password') border-danger @enderror form-control"
                                                            type="password" required>
                                                        <span>Old Password</span>
                                                        @error('old_password')
                                                            <div class="invalid-tooltip d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group has-float-label">
                                                        <input name="password"
                                                            class="@error('password') border-danger @enderror form-control"
                                                            type="password" required>
                                                        <span>New Password</span>
                                                        @error('password')
                                                            <div class="invalid-tooltip d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group has-float-label"><input
                                                            name="password_confirmation" class="form-control"
                                                            type="password" required>
                                                        <span>Confirm Password</span>
                                                    </div>
                                                    <button type="submit"
                                                        class="btn btn-primary float-right">Update</button>
                                                </form>
                                            </div> --}}
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</main>

@include('footer')
