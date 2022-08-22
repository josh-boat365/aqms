<style>
    .orderby-btn {
        width: 15%;
        height: 2.2rem;
    }

    .orderby-search {
        height: 2.2rem !important;
        width: 30rem;
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
                            data-toggle="modal" data-backdrop="static" data-target="#exampleModalRight"
                            style="margin-top:2.9rem">ADD
                            NEW</button>

                        <div class="modal fade modal-right" id="exampleModalRight" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalRight" aria-hidden="true">
                            @yield('survey-form')
                        </div>

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
                                        <div class="dropdown-item survey-filter all">View All</div>
                                        <div class="dropdown-item survey-filter archive">Archived</div>
                                        <div class="dropdown-item survey-filter draft">Drafted</div>
                                        <div class="dropdown-item survey-filter deployed">Deployed</div>
                                    </div>

                                </div>
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
