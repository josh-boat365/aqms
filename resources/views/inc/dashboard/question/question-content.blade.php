<main>
    <div class="container-fluid">
        <div class="row app-row">
            <div class="col-12 survey-app">
                <div class="mb-2">
                    <h1>{{$survey->name}}</h1>
                    {{-- <div class="text-zero top-right-button-container"><button type="button"
                            class="btn btn-lg btn-outline-primary dropdown-toggle dropdown-toggle-split top-right-button top-right-button-single"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ACTIONS</button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a> <a
                                class="dropdown-item" href="#">Another action</a></div>
                    </div> --}}
                </div>
                <ul class="nav nav-tabs separator-tabs ml-0 mb-5" role="tablist">
                    <li class="nav-item"><a class="nav-link active" id="first-tab" data-toggle="tab" href="#first"
                            role="tab" aria-controls="first" aria-selected="true">CREATE QUESTIONS</a></li>
                    {{-- <li class="nav-item"><a class="nav-link" id="third-tab" data-toggle="tab" href="#third"
                            role="tab" aria-controls="third" aria-selected="false">RESULTS</a></li> --}}
                </ul>
                <div class="tab-content mb-4">
                    <div class="tab-pane show active" id="first" role="tabpanel" aria-labelledby="first-tab">
                        <div class="row " id="question-summary-list">
                            @yield('question-summary')
                            @yield('question-list', )
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    <div class="app-menu">
        <div class="p-4 h-100">
            <div class="scroll">
                <p class="text-muted text-small">Status</p>
                <ul class="list-unstyled mb-5">
                    @yield('stat')
                </ul>
                {{-- <p class="text-muted text-small">Categories</p>
                <ul class="list-unstyled mb-5">
                    <li>
                        <div class="custom-control custom-checkbox mb-2"><input type="checkbox" class="custom-control-input"
                                id="category1"> <label class="custom-control-label" for="category1">Development</label>
                        </div>
                    </li>
                    <li>
                        <div class="custom-control custom-checkbox mb-2"><input type="checkbox" class="custom-control-input"
                                id="category2"> <label class="custom-control-label" for="category2">Workplace</label></div>
                    </li>
                    <li>
                        <div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input"
                                id="category3"> <label class="custom-control-label" for="category3">Hardware</label></div>
                    </li>
                </ul>
                <p class="text-muted text-small">Labels</p>
                <div>
                    <p class="d-sm-inline-block mb-1"><a href="#"><span
                                class="badge badge-pill badge-outline-primary mb-1">NEW FRAMEWORK</span></a></p>
                    <p class="d-sm-inline-block mb-1"><a href="#"><span
                                class="badge badge-pill badge-outline-theme-3 mb-1">EDUCATION</span></a></p>
                    <p class="d-sm-inline-block mb-1"><a href="#"><span
                                class="badge badge-pill badge-outline-secondary mb-1">PERSONAL</span></a></p>
                </div> --}}
            </div>
        </div><a class="app-menu-button d-inline-block d-xl-none" href="#"><i class="simple-icon-options"></i></a>
    </div>
    
</main>
