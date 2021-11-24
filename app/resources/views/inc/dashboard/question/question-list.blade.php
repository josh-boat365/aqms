<div class="col-12 col-lg-8">
    <div class="sortable-survey">

        @include('inc.dashboard.question.question-card', ['survey', $survey])

        {{-- <div>
            <div class="card question d-flex mb-4 edit-quesiton">
                <div class="d-flex flex-grow-1 min-width-zero">
                    <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                        <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1"><span class="heading-number d-inline-block">1 </span>Age</div>
                    </div>
                    <div class="custom-control custom-checkbox pl-1 align-self-center pr-4"><button class="btn btn-outline-theme-3 icon-button edit-button"><i class="simple-icon-pencil"></i></button> <button class="btn btn-outline-theme-3 icon-button view-button"><i class="simple-icon-eye"></i></button>                                                        <button class="btn btn-outline-theme-3 icon-button rotate-icon-click rotate" type="button" data-toggle="collapse" data-target="#q1" aria-expanded="true" aria-controls="q1"><i class="simple-icon-arrow-down with-rotate-icon"></i></button></div>
                </div>
                <div class="question-collapse collapse show" id="q1">
                    <div class="card-body pt-0">
                        <div class="edit-mode">
                            <div class="form-group mb-3"><label>Title</label> <input class="form-control" type="text" value="Age"></div>
                            <div class="form-group mb-5"><label>Question</label> <input class="form-control" type="text" value="How old are you?"></div>
                            <div class="separator mb-4"></div>
                            <div class="form-group"><label class="d-block">Answer Type</label> <select class="form-control select2-single" data-width="100%"><option label="&nbsp;">&nbsp;</option><option value="0">Text Input</option><option value="1" selected="selected">Single Select</option><option value="2">Multiple Select</option><option value="3">Checkbox</option><option value="4">Radiobutton</option></select></div>
                            <div class="form-group"><label class="d-block">Answers</label>
                                <div class="answers mb-3 sortable">
                                    <div class="mb-1 position-relative"><input class="form-control" type="text" value="18-24">
                                        <div class="input-icons"><span class="badge badge-pill handle pr-0 mr-0"><i class="simple-icon-cursor-move"></i> </span><span class="badge badge-pill"><i class="simple-icon-ban"></i></span></div>
                                    </div>
                                    <div class="mb-1 position-relative"><input class="form-control" type="text" value="24-30">
                                        <div class="input-icons"><span class="badge badge-pill handle pr-0 mr-0"><i class="simple-icon-cursor-move"></i> </span><span class="badge badge-pill"><i class="simple-icon-ban"></i></span></div>
                                    </div>
                                    <div class="mb-1 position-relative"><input class="form-control" type="text" value="30-40">
                                        <div class="input-icons"><span class="badge badge-pill handle pr-0 mr-0"><i class="simple-icon-cursor-move"></i> </span><span class="badge badge-pill"><i class="simple-icon-ban"></i></span></div>
                                    </div>
                                    <div class="mb-1 position-relative"><input class="form-control" type="text" value="40-50">
                                        <div class="input-icons"><span class="badge badge-pill handle pr-0 mr-0"><i class="simple-icon-cursor-move"></i> </span><span class="badge badge-pill"><i class="simple-icon-ban"></i></span></div>
                                    </div>
                                    <div class="mb-1 position-relative"><input class="form-control" type="text" value="50+">
                                        <div class="input-icons"><span class="badge badge-pill handle pr-0 mr-0"><i class="simple-icon-cursor-move"></i> </span><span class="badge badge-pill"><i class="simple-icon-ban"></i></span></div>
                                    </div>
                                </div>
                                <div class="text-center"><button type="button" class="btn btn-outline-primary btn-sm mb-2"><i class="simple-icon-plus btn-group-icon"></i> Add Answer</button></div>
                            </div>
                        </div>
                        <div class="view-mode"><label>How old are you?</label> <select class="form-control select2-single" data-width="100%"><option label="&nbsp;">&nbsp;</option><option value="0">18-24</option><option value="1">24-30</option><option value="2">30-40</option><option value="3">40-50</option><option value="4">50+</option></select></div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="card question d-flex mb-4 edit-quesiton">
                <div class="d-flex flex-grow-1 min-width-zero">
                    <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                        <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1"><span class="heading-number d-inline-block">2 </span>Gender</div>
                    </div>
                    <div class="custom-control custom-checkbox pl-1 align-self-center pr-4"><button class="btn btn-outline-theme-3 icon-button edit-button"><i class="simple-icon-pencil"></i></button> <button class="btn btn-outline-theme-3 icon-button view-button"><i class="simple-icon-eye"></i></button>                                                        <button class="btn btn-outline-theme-3 icon-button rotate-icon-click" type="button" data-toggle="collapse" data-target="#q2" aria-expanded="false" aria-controls="q2"><i class="simple-icon-arrow-down with-rotate-icon"></i></button></div>
                </div>
                <div class="collapse question-collapse" id="q2">
                    <div class="card-body pt-0">
                        <div class="edit-mode">
                            <div class="form-group mb-3"><label>Title</label> <input class="form-control" type="text" value="Gender"></div>
                            <div class="form-group mb-5"><label>Question</label> <input class="form-control" type="text" value="What is your gender?"></div>
                            <div class="separator mb-4"></div>
                            <div class="form-group"><label class="d-block">Answer Type</label> <select class="form-control select2-single" data-width="100%"><option label="&nbsp;">&nbsp;</option><option value="0">Text Input</option><option value="1">Single Select</option><option value="2">Multiple Select</option><option value="3">Checkbox</option><option value="4" selected="selected">Radiobutton</option></select></div>
                            <div class="form-group"><label class="d-block">Answers</label>
                                <div class="answers mb-3 sortable">
                                    <div class="mb-1 position-relative"><input class="form-control" type="text" value="Male">
                                        <div class="input-icons"><span class="badge badge-pill handle pr-0 mr-0"><i class="simple-icon-cursor-move"></i> </span><span class="badge badge-pill"><i class="simple-icon-ban"></i></span></div>
                                    </div>
                                    <div class="mb-1 position-relative"><input class="form-control" type="text" value="Female">
                                        <div class="input-icons"><span class="badge badge-pill handle pr-0 mr-0"><i class="simple-icon-cursor-move"></i> </span><span class="badge badge-pill"><i class="simple-icon-ban"></i></span></div>
                                    </div>
                                    <div class="mb-1 position-relative"><input class="form-control" type="text" value="Other">
                                        <div class="input-icons"><span class="badge badge-pill handle pr-0 mr-0"><i class="simple-icon-cursor-move"></i> </span><span class="badge badge-pill"><i class="simple-icon-ban"></i></span></div>
                                    </div>
                                </div>
                                <div class="text-center"><button type="button" class="btn btn-outline-primary btn-sm mb-2"><i class="simple-icon-plus btn-group-icon"></i> Add Answer</button></div>
                            </div>
                        </div>
                        <div class="view-mode"><label>What is your gender?</label>
                            <div class="mb-4">
                                <div class="custom-control custom-radio"><input type="radio" id="customRadio1" name="customRadio" class="custom-control-input"> <label class="custom-control-label" for="customRadio1">Male</label></div>
                                <div class="custom-control custom-radio"><input type="radio" id="customRadio2" name="customRadio" class="custom-control-input"> <label class="custom-control-label" for="customRadio2">Female</label></div>
                                <div class="custom-control custom-radio"><input type="radio" id="customRadio3" name="customRadio" class="custom-control-input"> <label class="custom-control-label" for="customRadio3">Other</label></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="card question d-flex mb-4 edit-quesiton">
                <div class="d-flex flex-grow-1 min-width-zero">
                    <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                        <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1"><span class="heading-number d-inline-block">3 </span>Work</div>
                    </div>
                    <div class="custom-control custom-checkbox pl-1 align-self-center pr-4"><button class="btn btn-outline-theme-3 icon-button edit-button"><i class="simple-icon-pencil"></i></button> <button class="btn btn-outline-theme-3 icon-button view-button"><i class="simple-icon-eye"></i></button>                                                        <button class="btn btn-outline-theme-3 icon-button rotate-icon-click" type="button" data-toggle="collapse" data-target="#q3" aria-expanded="false" aria-controls="q3"><i class="simple-icon-arrow-down with-rotate-icon"></i></button></div>
                </div>
                <div class="collapse question-collapse" id="q3">
                    <div class="card-body pt-0">
                        <div class="edit-mode">
                            <div class="form-group mb-3"><label>Title</label> <input class="form-control" type="text" value="Work"></div>
                            <div class="form-group mb-5"><label>Question</label> <input class="form-control" type="text" value="What is your employment status?"></div>
                            <div class="separator mb-4"></div>
                            <div class="form-group"><label class="d-block">Answer Type</label> <select class="form-control select2-single" data-width="100%"><option label="&nbsp;">&nbsp;</option><option value="0">Text Input</option><option value="1" selected="selected">Single Select</option><option value="2">Multiple Select</option><option value="3">Checkbox</option><option value="4">Radiobutton</option></select></div>
                            <div class="form-group"><label class="d-block">Answers</label>
                                <div class="answers mb-3 sortable">
                                    <div class="mb-1 position-relative"><input class="form-control" type="text" value="Employed for wages">
                                        <div class="input-icons"><span class="badge badge-pill handle pr-0 mr-0"><i class="simple-icon-cursor-move"></i> </span><span class="badge badge-pill"><i class="simple-icon-ban"></i></span></div>
                                    </div>
                                    <div class="mb-1 position-relative"><input class="form-control" type="text" value="Self-employed">
                                        <div class="input-icons"><span class="badge badge-pill handle pr-0 mr-0"><i class="simple-icon-cursor-move"></i> </span><span class="badge badge-pill"><i class="simple-icon-ban"></i></span></div>
                                    </div>
                                    <div class="mb-1 position-relative"><input class="form-control" type="text" value="Out of work and looking for work">
                                        <div class="input-icons"><span class="badge badge-pill handle pr-0 mr-0"><i class="simple-icon-cursor-move"></i> </span><span class="badge badge-pill"><i class="simple-icon-ban"></i></span></div>
                                    </div>
                                    <div class="mb-1 position-relative"><input class="form-control" type="text" value="Retired">
                                        <div class="input-icons"><span class="badge badge-pill handle pr-0 mr-0"><i class="simple-icon-cursor-move"></i> </span><span class="badge badge-pill"><i class="simple-icon-ban"></i></span></div>
                                    </div>
                                </div>
                                <div class="text-center"><button type="button" class="btn btn-outline-primary btn-sm mb-2"><i class="simple-icon-plus btn-group-icon"></i> Add Answer</button></div>
                            </div>
                        </div>
                        <div class="view-mode"><label>What is your employment status?</label> <select class="form-control select2-single" data-width="100%"><option label="&nbsp;">&nbsp;</option><option value="0">Employed for wages</option><option value="1">Self-employed</option><option value="2">Out of work and looking for work</option><option value="3">Retired</option></select></div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="card question d-flex mb-4 edit-quesiton">
                <div class="d-flex flex-grow-1 min-width-zero">
                    <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                        <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1"><span class="heading-number d-inline-block">4 </span>Coding</div>
                    </div>
                    <div class="custom-control custom-checkbox pl-1 align-self-center pr-4"><button class="btn btn-outline-theme-3 icon-button edit-button"><i class="simple-icon-pencil"></i></button> <button class="btn btn-outline-theme-3 icon-button view-button"><i class="simple-icon-eye"></i></button>
                        <button class="btn btn-outline-theme-3 icon-button rotate-icon-click" type="button" data-toggle="collapse" data-target="#q4" aria-expanded="false" aria-controls="q4"><i class="simple-icon-arrow-down with-rotate-icon"></i></button>
                    </div>
                </div>
                <div class="collapse question-collapse" id="q4">
                    <div class="card-body pt-0">
                        <div class="edit-mode">
                            <div class="form-group mb-3"><label>Title</label> <input class="form-control" type="text" value="Coding"></div>
                            <div class="form-group mb-5"><label>Question</label> <input class="form-control" type="text" value="What programming languages do you use?"></div>
                            <div class="separator mb-4"></div>
                            <div class="form-group"><label class="d-block">Answer Type</label> <select class="form-control select2-single" data-width="100%"><option label="&nbsp;">&nbsp;</option><option value="0">Text Input</option><option value="1">Single Select</option><option value="2">Multiple Select</option><option value="3" selected="selected">Checkbox</option><option value="4">Radiobutton</option></select></div>
                            <div class="form-group"><label class="d-block">Answers</label>
                                <div class="answers mb-3 sortable">
                                    <div class="mb-1 position-relative"><input class="form-control" type="text" value="Python">
                                        <div class="input-icons"><span class="badge badge-pill handle pr-0 mr-0"><i class="simple-icon-cursor-move"></i> </span><span class="badge badge-pill"><i class="simple-icon-ban"></i></span></div>
                                    </div>
                                    <div class="mb-1 position-relative"><input class="form-control" type="text" value="JavaScript">
                                        <div class="input-icons"><span class="badge badge-pill handle pr-0 mr-0"><i class="simple-icon-cursor-move"></i> </span><span class="badge badge-pill"><i class="simple-icon-ban"></i></span></div>
                                    </div>
                                    <div class="mb-1 position-relative"><input class="form-control" type="text" value="PHP">
                                        <div class="input-icons"><span class="badge badge-pill handle pr-0 mr-0"><i class="simple-icon-cursor-move"></i> </span><span class="badge badge-pill"><i class="simple-icon-ban"></i></span></div>
                                    </div>
                                    <div class="mb-1 position-relative"><input class="form-control" type="text" value="Java">
                                        <div class="input-icons"><span class="badge badge-pill handle pr-0 mr-0"><i class="simple-icon-cursor-move"></i> </span><span class="badge badge-pill"><i class="simple-icon-ban"></i></span></div>
                                    </div>
                                    <div class="mb-1 position-relative"><input class="form-control" type="text" value="C#">
                                        <div class="input-icons"><span class="badge badge-pill handle pr-0 mr-0"><i class="simple-icon-cursor-move"></i> </span><span class="badge badge-pill"><i class="simple-icon-ban"></i></span></div>
                                    </div>
                                </div>
                                <div class="text-center"><button type="button" class="btn btn-outline-primary btn-sm mb-2"><i class="simple-icon-plus btn-group-icon"></i> Add Answer</button></div>
                            </div>
                        </div>
                        <div class="view-mode"><label>What programming languages do you use?</label>
                            <div class="mb-4">
                                <div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="lang1"> <label class="custom-control-label" for="lang1">Python</label></div>
                                <div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="lang2"> <label class="custom-control-label" for="lang2">JavaScript</label></div>
                                <div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="lang3"> <label class="custom-control-label" for="lang3">PHP</label></div>
                                <div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="lang4"> <label class="custom-control-label" for="lang4">Java</label></div>
                                <div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="lang5"> <label class="custom-control-label" for="lang5">C#</label></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <div class="text-center"><button type="button" class="btn btn-outline-primary btn-sm mb-2 add-que"><i
                class="simple-icon-plus btn-group-icon"></i> Add Question</button></div>
</div>
