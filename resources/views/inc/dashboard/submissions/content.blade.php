<style>
    .orderby-btn{
        width: 15%;
        height: 2.2rem;
    }
    .orderby-search{
        height: 2.2rem !important;
        width: 30rem;
    }
</style>
<main>
    <div class="container-fluid">
        <div class="row app-row">
            <div class="col-12">
                <div class="mb-2">
                    <h1>Submissions</h1>
                    <div class="top-right-button-container">
                        {{-- <button type="button" id="add-new-btn"
                            class="btn btn-primary btn-lg top-right-button mr-1" data-toggle="modal"
                            data-backdrop="static" data-target="#exampleModalRight">ADD NEW</button> --}}
                        {{-- <div class="modal fade modal-right @error('title') show @enderror" id="exampleModalRight" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalRight" @error('title') style="display: block; padding-right: 17px;" @enderror @error('title') aria-modal="true" @enderror aria-hidden="true"> --}}
                        {{-- <div class="modal fade modal-right show" id="exampleModalRight" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalRight" style="display: block; padding-right: 17px;" aria-modal="true" > --}}
                        <div class="modal fade modal-right" id="exampleModalRight" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalRight" aria-hidden="true">
                            @yield('survey-form')
                        </div>
                    
                    </div>
                </div>
                
                <div class="separator mb-5"></div>
                @include('inc.dashboard.dashboard-welcome')
                {{-- Survey Tile Header --}}
                <div class="card mb-5 tile-header">
                    <div class=" card-body row">
                        <div class="col-3">
                            <h5 class="font-weight-bold h5">Survey</h5>
                        </div>

                        <div class="col-3 text-center">
                            <h5 class="font-weight-bold h5">Submissions</h5>
                        </div>
                    </div>
                </div>
                <div class="list disable-text-selection" data-check-all="checkAll">
                    @yield('submission-tiles')
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
        </div><a class="app-menu-button d-inline-block d-xl-none" href="#"><i class="simple-icon-options"></i></a>
    </div>

</main>
@include('footer')
