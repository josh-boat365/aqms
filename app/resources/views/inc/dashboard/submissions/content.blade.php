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
                        {{-- <div class="btn-group">
                            <div class="btn btn-primary btn-lg pl-4 pr-0 check-button"><label
                                    class="custom-control custom-checkbox mb-0 d-inline-block"><input type="checkbox"
                                        class="custom-control-input" id="checkAll"> <span
                                        class="custom-control-label">&nbsp;</span></label></div>
                                        <button type="button"
                                class="btn btn-lg btn-primary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                                    class="sr-only">Toggle Dropdown</span></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a></div>
                        </div> --}}
                    </div>
                    {{-- <div class="modal fade modal-right" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New</h5><button type="button"
                                        class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group"><label>Title</label> <input type="text"
                                                class="form-control" placeholder=""></div>
                                        <div class="form-group"><label>Details</label> <textarea
                                                class="form-control" rows="2"></textarea></div>
                                        <div class="form-group"><label>Category</label> <select
                                                class="form-control select2-single" data-width="100%">
                                                <option label="&nbsp;">&nbsp;</option>
                                                <option value="Flexbox">Flexbox</option>
                                                <option value="Sass">Sass</option>
                                                <option value="React">React</option>
                                            </select></div>
                                        <div class="form-group"><label>Labels</label> <select
                                                class="form-control select2-multiple" multiple="multiple"
                                                data-width="100%">
                                                <option value="New Framework">New Framework</option>
                                                <option value="Education">Education</option>
                                                <option value="Personal">Personal</option>
                                            </select></div>
                                        <div class="form-group"><label>Status</label>
                                            <div class="custom-control custom-checkbox"><input type="checkbox"
                                                    class="custom-control-input" id="customCheck1"> <label
                                                    class="custom-control-label" for="customCheck1">Completed</label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer"><button type="button" class="btn btn-outline-primary"
                                        data-dismiss="modal">Cancel</button> <button type="button"
                                        class="btn btn-primary">Submit</button></div>
                            </div>
                        </div>
                    </div> --}}
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