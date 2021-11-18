<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{ asset('font/iconsmind-s/css/iconsminds.css') }}">
    <link rel="stylesheet" href="{{ asset('font/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.rtl.only.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/component-custom-switch.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dore.dark.bluenavy.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <link rel="stylesheet" href="{{ asset('css/vendor/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/select2-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/jquery.contextMenu.min.css') }}">
    <style>
        .theme-button {
            display: none;
        }

    </style>
    @yield('style')
</head>

<body @yield('body-id') @yield('body-class')>
    @yield('nav')

    @yield('side-bar')

    <main>
        <div class="container-fluid">
            <div class="row app-row">
                <div class="col-12">
                    <div class="mb-2">
                        <h1>Surveys</h1>
                        <div class="top-right-button-container"><button type="button" id="add-new-btn"
                                class="btn btn-primary btn-lg top-right-button mr-1" data-toggle="modal"
                                data-backdrop="static" data-target="#exampleModalRight">ADD NEW</button>
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
                                <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item"
                                        href="#">Action</a> <a class="dropdown-item" href="#">Another action</a></div>
                            </div>
                        </div>
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
                        <div class="collapse d-md-block" id="displayOptions">
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
                        </div>
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
        @yield('side-menu')
    </main>


    {{-- @yield('menu') --}}


    <script src="{{ asset('js/vendor/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/vendor/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/vendor/select2.full.js') }}"></script>
    <script src="{{ asset('js/vendor/mousetrap.min.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery.contextMenu.min.js') }}"></script>
    <script src="{{ asset('js/dore.script.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    
    @yield('script')
</body>

</html>
