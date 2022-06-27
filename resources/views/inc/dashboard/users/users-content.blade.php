<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-xl-6">
                <div class="icon-cards-row">
                    <div class="glide dashboard-numbers">
                        <div class="" data-glide-el="track">
                            {{-- class="glide__track" --}}
                            <ul class="glide__slides">
                                {{-- class="glide__slides" --}}
                                <li class="glide__slide">
                                    <a href="#" class="card">
                                        <div class="card-body text-center"><i class="iconsminds-male-female"></i>
                                            <p class="card-text mb-0">Total Number of Users</p>
                                            <p class="lead text-center">
                                                {{ $users->count() }}</p>
                                        </div>
                                    </a>
                                </li>
                                <li class="glide__slide">
                                    <a href="#" class="card">
                                        <div class="card-body text-center"><i class="iconsminds-male"></i>
                                            <p class="card-text mb-0">Males</p>
                                            <p class="lead text-center">{{ $users->where('gender', 'Male')->count() }}
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                <li class="glide__slide">
                                    <a href="#" class="card">
                                        <div class="card-body text-center"><i class="iconsminds-female"></i>
                                            <p class="card-text mb-0">Females</p>
                                            <p class="lead text-center">
                                                {{ $users->where('gender', 'Female')->count() }}
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                <li class="glide__slide">
                                    <a href="#" class="card">
                                        <div class="card-body text-center"><i class="iconsminds-student-hat"></i>
                                            <p class="card-text mb-0">Full-Time Session</p>
                                            <p class="lead text-center">{{ $users->where('session', 'Full-time')->count() }}</p>
                                        </div>
                                    </a>
                                </li>
                                <li class="glide__slide">
                                    <a href="#" class="card">
                                        <div class="card-body text-center"><i class="iconsminds-diploma-2"></i>
                                            <p class="card-text mb-0">Part-Time Session</p>
                                            <p class="lead text-center">{{ $users->where('session', 'Part-time')->count() }}</p>
                                        </div>
                                    </a>
                                </li>
                                <li class="glide__slide">
                                    <a href="#" class="card">
                                        <div class="card-body text-center"><i class="iconsminds-add-user"></i>
                                            <p class="card-text mb-0">Pending Profile Updates</p>
                                            <p class="lead text-center">{{ $unupdatedCount }}</p>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="separator mb-5"></div>
        {{-- Search Bar --}}
        <div style="gap: 20rem;">
            <div class="input-group dataTables_filter " id="DataTables_Table_0_filter">
                <input type="text" class="form-control" aria-label="Text input with dropdown button"
                    aria-controls="DataTables_Table_0" placeholder="Search for Alumni Info Here.....">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown"><i
                            class="iconsminds-download"></i> Download Alumnus Info</button>
                    <div class="dropdown-menu">
                        {{-- <a class="dropdown-item" href="#">As csv file</a>
                        <a class="dropdown-item" href="#">As pdf file</a> --}}
                        <a class="dropdown-item export-btn" href="#">As excel file</a>
                    </div>
                </div>
            </div>

            {{-- <button type="button" class="btn btn-secondary  top-right-button mr-1 dropdown-toggle" data-toggle="dropdown" >Download Alumnus Info</button>
            <div class="dropdown-menu">
                <a href="#" class="dropdown-item"> As csv file</a>
                <a href="#" class="dropdown-item"> As pdf file</a>
                <a href="#" class="dropdown-item"> As excel file</a>
            </div> --}}

        </div>

        {{-- Table --}}
        <div class="row mt-5 mb-4">
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <table class="data-table data-table-feature " id="usersTable">
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>E-mail</th>
                                    <th>Contact</th>
                                    <th>Department</th>
                                    <th>Program of Study</th>
                                    <th>Year of Completion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->firstName }} {{ $user->lastName }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @isset($user->phone)
                                                {{ $user->phone }}
                                                @else
                                                ---
                                                @endisset
                                            </td>
                                            <td>
                                                @isset($user->department_of_study)
                                                {{ $user->department_of_study }}
                                                @else
                                                ---
                                                @endisset
                                            </td>
                                            <td>
                                                @isset($user->program_of_study)
                                                {{ $user->program_of_study }}
                                                @else
                                                ---
                                                @endisset
                                            </td>
                                            <td>
                                                @isset($user->year_of_completion)
                                                    {{ $user->year_of_completion }}
                                                @else
                                                    ---
                                                @endisset
                                            </td>
                                    </tr>
                                @endforeach


                                


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
