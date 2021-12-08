<main>
    <div class="container-fluid">
        <div class="row app-row">
            <div class="col-12">
                <div class="mb-2">
                    <h1>Surveys</h1>
                    
                    <div class="modal fade modal-right" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New</h5><button
                                        type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
                                                    class="custom-control-label"
                                                    for="customCheck1">Completed</label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer"><button type="button" class="btn btn-outline-primary"
                                        data-dismiss="modal">Cancel</button> <button type="button"
                                        class="btn btn-primary">Submit</button></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-2"><a class="btn pt-0 pl-0 d-inline-block d-md-none" data-toggle="collapse"
                        href="#displayOptions" role="button" aria-expanded="true"
                        aria-controls="displayOptions">Display
                        Options <i class="simple-icon-arrow-down align-middle"></i></a>
                    {{-- <div class="collapse d-md-block" id="displayOptions">
                        <div class="d-block d-md-inline-block">
                            <div class="btn-group float-md-left mr-1 mb-1"><button
                                    class="btn btn-outline-dark btn-xs dropdown-toggle" type="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Order
                                    By</button>
                                <div class="dropdown-menu"><a class="dropdown-item" href="#">Action</a> <a
                                        class="dropdown-item" href="#">Another action</a></div>
                            </div>
                            <div class="search-sm d-inline-block float-md-left mr-1 mb-1 align-top"><input
                                    placeholder="Search..."></div>
                        </div>
                    </div> --}}
                </div>
                <div class="separator mb-5"></div>
                <div class="list disable-text-selection" data-check-all="checkAll">
                    @yield('survey-tiles')
                    {{-- <div class="card d-flex flex-row mb-3">
                        <div class="d-flex flex-grow-1 min-width-zero">
                            <div
                                class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                                <a class="list-item-heading mb-0 truncate w-40 w-xs-100 mt-0"
                                    href="Apps.Survey.html"><i class="simple-icon-refresh heading-icon"></i> <span
                                        class="align-middle d-inline-block">Developer Survey</span></a>
                                <p class="mb-0 text-muted text-small w-15 w-xs-100">Personal</p>
                                <p class="mb-0 text-muted text-small w-15 w-xs-100">11.08.2018</p>
                                <div class="w-15 w-xs-100"><span class="badge badge-pill badge-secondary">ON
                                        HOLD</span></div>
                            </div><label class="custom-control custom-checkbox mb-1 align-self-center mr-4"><input
                                    type="checkbox" class="custom-control-input"> <span
                                    class="custom-control-label">&nbsp;</span></label>
                        </div>
                    </div>
                    <div class="card d-flex flex-row mb-3">
                        <div class="d-flex flex-grow-1 min-width-zero">
                            <div
                                class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                                <a class="list-item-heading mb-0 truncate w-40 w-xs-100 mt-0"
                                    href="Apps.Survey.html"><i class="simple-icon-refresh heading-icon"></i> <span
                                        class="align-middle d-inline-block">Designer Survey</span></a>
                                <p class="mb-0 text-muted text-small w-15 w-xs-100">Store</p>
                                <p class="mb-0 text-muted text-small w-15 w-xs-100">14.07.2018</p>
                                <div class="w-15 w-xs-100"><span
                                        class="badge badge-pill badge-secondary">PROCESSED</span></div>
                            </div><label class="custom-control custom-checkbox mb-1 align-self-center mr-4"><input
                                    type="checkbox" class="custom-control-input"> <span
                                    class="custom-control-label">&nbsp;</span></label>
                        </div>
                    </div>
                    <div class="card d-flex flex-row mb-3">
                        <div class="d-flex flex-grow-1 min-width-zero">
                            <div
                                class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                                <a class="list-item-heading mb-0 truncate w-40 w-xs-100 mt-0"
                                    href="Apps.Survey.html"><i class="simple-icon-check heading-icon"></i> <span
                                        class="align-middle d-inline-block">Backend Survey</span></a>
                                <p class="mb-0 text-muted text-small w-15 w-xs-100">Store</p>
                                <p class="mb-0 text-muted text-small w-15 w-xs-100">09.04.2018</p>
                                <div class="w-15 w-xs-100"><span class="badge badge-pill badge-secondary">ON
                                        HOLD</span></div>
                            </div><label class="custom-control custom-checkbox mb-1 align-self-center mr-4"><input
                                    type="checkbox" class="custom-control-input"> <span
                                    class="custom-control-label">&nbsp;</span></label>
                        </div>
                    </div> --}}
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