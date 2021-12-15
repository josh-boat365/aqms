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
                    <h1>Surveys</h1>
                    <div class="top-right-button-container">
                        <button type="button" id="add-new-btn"class="btn btn-primary btn-lg top-right-button mr-1" data-toggle="modal" data-backdrop="static" data-target="#exampleModalRight">ADD NEW</button>
                        {{-- <div class="modal fade modal-right @error('title') show @enderror" id="exampleModalRight" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalRight" @error('title') style="display: block; padding-right: 17px;" @enderror @error('title') aria-modal="true" @enderror aria-hidden="true"> --}}
                        {{-- <div class="modal fade modal-right show" id="exampleModalRight" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalRight" style="display: block; padding-right: 17px;" aria-modal="true" > --}}
                        <div class="modal fade modal-right" id="exampleModalRight" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalRight" aria-hidden="true" >
                            @yield('survey-form')
                        </div>
                        <div class="btn-group">
                            <div class="btn btn-primary btn-lg pl-4 pr-0 check-button"><label
                                    class="custom-control custom-checkbox mb-0 d-inline-block"><input
                                        type="checkbox" class="custom-control-input" id="checkAll"> <span
                                        class="custom-control-label">&nbsp;</span></label></div><button
                                type="button" class="btn btn-lg btn-primary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                                    class="sr-only">Toggle Dropdown</span></button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Archive</a> 
                                <a class="dropdown-item" href="#">Draft</a>
                                <a class="dropdown-item" data-toggle="modal" href="#deployWarning">Deployed</a>
                            </div>

                              {{-- Message for Deployed Status --}} 
                                 <div class="modal fade "  id="deployWarning" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog bg-transparent" role="document">
                                        <div class="modal-content" style="border-radius:1rem; ">
                                            <div class="modal-header">
                                                <h5 class="modal-title" >Hi There.....</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
                                            <div class="modal-body">
                                                <h1>Are you sure of deploying this survey?</h1>
                                                <h2>If yes then kindly set an expiration date for this survey.</h2>
                                                <h6>Click on date field to set date.</h6>
                                                <label class="form-group has-float-label">
                                                    <input class="form-control datepicker" placeholder=""> 
                                                    <span>Date</span>
                                                </label> 
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Deploy</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                        </div>
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
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Order
                                    By</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Archive</a>
                                    <a class="dropdown-item" href="#">Draft</a>
                                    <a class="dropdown-item" data-toggle="modal"  href="#deployWarning">Deployed</a>
                                </div>
                              
                            </div>
                            <div class="search-sm  d-inline-block float-md-left mr-1 mb-1 align-top">
                                <input class="orderby-search" placeholder="Search...">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="separator mb-5"></div>
                @include('inc.dashboard.dashboard-welcome')
                {{-- Survey Tile Header  --}}
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