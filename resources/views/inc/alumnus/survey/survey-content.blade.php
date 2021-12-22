<style>
    .tile-header h5{
        width: 142%;
        padding: 0;
        margin: 0;
    }
</style>
<main>
    <div class="container-fluid">
        <div class="row app-row">
            <div class="col-12">
                <div class="mb-2">
                    <h1>Surveys</h1>
                </div>
               
                <div class="separator mb-5"></div>
                
                @include('welcome')
                  {{-- Survey Tile Header  --}}
                  <div class="card mb-5 tile-header">
                    <div class=" card-body row">
                        <div class="col-3">
                            <h5 class="font-weight-bold h5">Title</h5>
                        </div>

                        <div class="col-3">
                            <h5 class="font-weight-bold h5">Progress</h5>
                        </div>

                        <div class="col-3">
                            <h5 class="font-weight-bold h5">Expiration Date</h5>
                        </div>

                        <div class="col-3">
                            <h5 class="font-weight-bold h5">Status</h5>
                        </div>

                    </div>
                </div>
                <div class="list disable-text-selection" data-check-all="checkAll">
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
        </div><a class="app-menu-button d-inline-block d-xl-none" href="#"><i class="simple-icon-options"></i></a>
    </div>
    
</main>

@include('footer')