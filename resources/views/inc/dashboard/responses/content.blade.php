<main>
    <div class="container-fluid">
        <div class="row app-row">
            <div class="col-12 survey-app">
                <div class="mb-2">
                    {{-- <h1>{{$survey->name}}</h1> --}}
                    <!-- <div class="text-zero top-right-button-container">
                        <button type="button" class="btn btn-lg btn-outline-primary dropdown-toggle dropdown-toggle-split top-right-button top-right-button-single" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ACTIONS</button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a> <a
                                class="dropdown-item" href="#">Another action</a></div>
                    </div> -->
                </div>
                <ul class="nav nav-tabs separator-tabs ml-0 mb-5" role="tablist">
                   
                    <li class="nav-item">
                        <a class="nav-link active" id="third-tab" data-toggle="tab" href="#third" role="tab" aria-controls="third" aria-selected="false">SUBMITTED RESPONSES</a>
                    </li>

                     <li class="nav-item">
                         <a class="nav-link " id="fourth-tab" data-toggle="tab" href="#fourth" role="tab" aria-controls="fourth" aria-selected="true">QUESTION ANALYTICS</a>
                        </li>

                     <li class="nav-item">
                         <a class="nav-link " id="fifth-tab" data-toggle="tab" href="#fifth" role="tab" aria-controls="fifth" aria-selected="true">SURVEY ANALYSIS</a>
                        </li>

                            
                </ul>
                <div class="tab-content mb-4">
                    <div class="tab-pane show active" id="third" role="tabpanel" aria-labelledby="third-tab">
                        <div class="row">
                            <div class="col-lg-4 col-12 mb-4">

                                @yield('alumni-list')                                                          
                            </div>
                            <div class="col-12 col-lg-8">

                                @yield('question-list')
                            </div>
                        </div>
                    </div>
                    {{-- Analytics for Responses --}}
                    <div class="tab-pane show" id="fourth" role="tabpanel" aria-labelledby="fourth-tab">
                        <div class="row justify-content-center">
                            {{-- <div class="col-lg-4 col-12 mb-4">

                            </div> --}}
                            <div class="col-10 " >
                                @include('inc.dashboard.responses.res-ques-list')                                                         
                            
                                @include('inc.dashboard.responses.res-ques-analytics')
                            </div>
                        </div>
                    </div>
                    {{-- Survey Level Analytics --}}
                    <div class="tab-pane show" id="fifth" role="tabpanel" aria-labelledby="fifth-tab">
                        <div class="d-flex" style="gap: 34rem;" >
                                 <h1>Survey Level Analytics</h1>
                                 <button type="button" id="add-new-btn" style="position: relative; bottom: 0.7rem; padding: 1rem !impoart; width: 18%; height: 20%;" class="btn btn-primary  top-right-button mr-1 dropdown-toggle" data-toggle="dropdown" >Download Survey Report</button>
                                    <div class="dropdown-menu">
                                        <a href="#" class="dropdown-item"> As csv file</a>
                                        <a href="#" class="dropdown-item"> As pdf file</a>
                                        <a href="#" class="dropdown-item"> As excel file</a>
                                    </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-12 mb-4">
                                @include('inc.dashboard.survey-level-analysis.survey-analysis-table')
                                @include('inc.dashboard.survey-level-analysis.survey-analysis') 
                            </div>
                           
                        </div>
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
                <!-- {{-- <p class="text-muted text-small">Categories</p>
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
                </div> --}} -->
            </div>
        </div><a class="app-menu-button d-inline-block d-xl-none" href="#"><i class="simple-icon-options"></i></a>
    </div>

</main>
@include('footer')