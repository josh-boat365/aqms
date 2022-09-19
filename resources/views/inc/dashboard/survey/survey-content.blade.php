<style>
    .orderby-btn {
        width: 15%;
        height: 2.2rem;
    }

    .orderby-search {
        height: 2.2rem !important;
        width: 30rem;
    }

    #add-new-btn {
        margin-top: 3rem;
    }
</style>
<main>
    <div class="container-fluid">
        <div class="row app-row">
            <div class="col-12">
                <div class="mb-2">
                    <h1>Surveys</h1>
                    <div class="top-right-button-container">
                        <button type="button" id="add-new-btn" class="btn btn-primary btn-lg top-right-button mr-1"
                            data-toggle="modal" data-backdrop="static" data-target="#exampleModalRight">ADD NEW</button>
                        <div class="modal fade modal-right" id="exampleModalRight" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalRight" aria-hidden="true">
                            @yield('survey-form')
                        </div>


                        {{-- Message for Warnings --}}
                        <div class="modal fade " id="deployWarning" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog bg-transparent" role="document">
                                <div class="modal-content" style="border-radius:1rem; ">
                                    <div class="modal-header bg-danger text-white">
                                        <h3 class="modal-title">WARNING!</h3><button type="button" class="close"
                                            data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <h3>Deployed surveys can't be further edited</h3>
                                        <br>
                                        <br>
                                        {{-- <h6>Click on date field to set date.</h6> --}}
                                        <label class="form-group has-float-label">
                                            @yield('exp-date-input')
                                            {{-- <input class="form-control datepicker exp-date"
                                                    placeholder=" enter expiration date"> --}}
                                            <span>Expiration Date</span>
                                        </label>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('survey.deploy') }}" method="post" id="deploy-form">
                                            <input type="hidden" name="_method" value="PUT">
                                            <input type="hidden" name="survey_id" class="survey_id">
                                            <input type="hidden" name="date" id="date_input_submit" class="date">
                                            @csrf

                                            <input style="display: none" id="dep_btn" type="submit" value="Deploy"
                                                class="btn btn-secondary deploy-btn">
                                        </form>
                                        <button type="button" class="btn btn-danger"
                                            data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade " id="archiveWarning" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog bg-transparent" role="document">
                                <div class="modal-content" style="border-radius:1rem; ">
                                    <div class="modal-header bg-danger text-white">
                                        <h3 class="modal-title">WARNING!</h3><button type="button" class="close"
                                            data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <h3>Responses to this survey will be no longer accepted</h3>
                                        <br>

                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('survey.archive') }}" method="post" id="archive-form">
                                            <input type="hidden" name="_method" value="PUT">
                                            <input type="hidden" name="survey_id" class="survey_id">
                                            {{-- <input type="hidden" name="date" class="date"> --}}
                                            @csrf

                                            <input type="submit" value="Archive" class="btn btn-secondary archive-btn">
                                        </form>
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade " id="deleteWarning" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog bg-transparent" role="document">
                                <div class="modal-content" style="border-radius:1rem; ">
                                    <div class="modal-header bg-danger text-white">
                                        <h3 class="modal-title">WARNING!</h3><button type="button" class="close"
                                            data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <h3>All data will be lost</h3>
                                        <br>

                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('survey.delete') }}" method="post" id="delete-form">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="survey_id" class="survey_id">
                                            {{-- <input type="hidden" name="date" class="date"> --}}
                                            @csrf

                                            <input type="submit" value="Delete" class="btn btn-danger archive-btn">
                                        </form>
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- </div> --}}

                    </div>
                    <div class="mb-2"><a class="btn pt-0 pl-0 d-inline-block d-md-none" data-toggle="collapse"
                            href="#displayOptions" role="button" aria-expanded="true"
                            aria-controls="displayOptions">Display
                            Options <i class="simple-icon-arrow-down align-middle"></i></a>
                        <div class="collapse d-md-block" id="displayOptions">
                            <div class="d-flex">
                                <div class="btn-group orderby-btn float-md-left mr-1 mb-1">
                                    <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">view
                                        all</button>
                                    <div class="dropdown-menu">
                                        {{-- <a class="dropdown-item" href="#">Archive</a>
                                        <a class="dropdown-item" href="#">Draft</a>
                                        <a class="dropdown-item" data-toggle="modal" href="#archiveWarning">Deployed</a> --}}
                                        <div class="dropdown-item survey-filter all">View All</div>
                                        <div class="dropdown-item survey-filter archive">Archived</div>
                                        <div class="dropdown-item survey-filter draft">Drafted</div>
                                        <div class="dropdown-item survey-filter deployed">Deployed</div>
                                    </div>

                                </div>
                                {{-- <div class="search-sm  d-inline-block float-md-left mr-1 mb-1 align-top">
                                    <input class="orderby-search" placeholder="Search...">
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="separator mb-5"></div>

                    @if (!session()->has('success') && !$errors->any())
                        @include('inc.dashboard.dashboard-welcome')
                    @endif

                    {{-- Survey Tile Header --}}
                    <div class="card mb-5 tile-header">
                        <div class=" card-body row">
                            <div class="col-3">
                                <h5 class="font-weight-bold h5">Title</h5>
                            </div>

                            <div class="col-3">
                                <h5 class="font-weight-bold h5">Date Created</h5>
                            </div>

                            <div class="col-3">
                                <h5 class="font-weight-bold h5">Expiration Date</h5>
                            </div>

                            <div class="col-3">
                                <h5 class="font-weight-bold h5">Status</h5>
                            </div>

                        </div>
                    </div>
                    <div class="list disable-text-selection survey-list" data-check-all="checkAll">
                        @yield('survey-tiles')

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

                </div>
            </div><a class="app-menu-button d-inline-block d-xl-none" href="#"><i
                    class="simple-icon-options"></i></a>
        </div>

</main>
@include('footer')
