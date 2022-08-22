<main>
    <div class="container-fluid">
        <div class="row app-row">
            <div class="col-12">
                <div class="mb-2">
                    <h1>Surveys</h1>
                    <div class="top-right-button-container"><button type="button" id="add-new-btn"
                            class="btn btn-primary btn-lg top-right-button mr-1" data-toggle="modal" data-backdrop="static"
                            data-target="#exampleModalRight">ADD NEW</button>

                        <div class="modal fade modal-right" id="exampleModalRight" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalRight" aria-hidden="true">
                            @yield('survey-form')
                        </div>

                    </div>


                </div>
            </div>
        </div>

        <div class="separator mb-5"></div>

        @yield('survey-tile-header')

        <div class="list disable-text-selection" data-check-all="checkAll">

            @yield('survey-tiles')

        </div>
    </div>
    </div>
    </div>
    @yield('right-bar')
</main>
