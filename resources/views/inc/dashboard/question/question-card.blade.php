
@for ($i = 0; $i < count($questions); $i++)

        question
        <div>
            <div class="card question d-flex mb-4 edit-quesiton">
                <div class="d-flex flex-grow-1 min-width-zero">
                    <div
                        class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                        <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1"><span
                                class="heading-number d-inline-block">{{ $i + 1 }}
                            </span><span class="preview-question">{{ $questions[$i]['question'] }}</span></div>
                    </div>
                    <div class="custom-control d-flex custom-checkbox pl-1 align-self-center pr-4"
                        style="flex: 0 0 25%; max-width: 20%; gap: 5px">
                        <div class="col btn btn-outline-theme-3 icon-button edit-button"><i class="simple-icon-pencil"></i>
                        </div>
                        <div class="col btn btn-outline-theme-3 icon-button view-button"><i class="simple-icon-eye"></i>
                        </div>
                        <div class="col btn btn-danger icon-button trash-button"><i class="simple-icon-trash"></i></div>
                        <div class="col btn btn-outline-theme-3 icon-button rotate-icon-click rotate" type="button"
                            data-toggle="collapse" data-target="#q{{ $questions[$i]['id'] }}" aria-expanded="true"
                            aria-controls="q{{ $questions[$i]['id'] }}"><i
                                class="simple-icon-arrow-down with-rotate-icon"></i>
                        </div>
                    </div>
                </div>
                <div class="question-collapse collapse show" id="q{{ $questions[$i]['id'] }}">
                    <div class="card-body pt-0">
                        <div class="edit-mode">

                            <div class="form-group mb-5 que-section"><label>Question</label>
                                
                                <input type="hidden" class="que-num" value="{{ $questions[$i]['id'] }}">
                                <input class="form-control writtenQuestion" type="text"
                                    name="questions[old][{{ $questions[$i]['id'] }}]"
                                    value="{{ $questions[$i]['question'] }}">
                            </div>

                            <div class="separator mb-4"></div>

                            
                            <div class="form-group opt-type"><label class="d-block">Answer Type</label>
                                
                                <select class="form-control select2-single option-type" data-width="100%"
                                    name="questions[old][{{ $questions[$i]['id'] }}][option_type_id]">
                                    
                                    @foreach ($optionTypes as $optionType)
                                        <option value="{{ $optionType->id }}" @if ($questions[$i]['option_type_id'] == $optionType->id) selected @endif>
                                            {{ $optionType->type }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            
                            <div class="form-group ans-form">
                                <div class="grid ans-group" 
                                @if ($questions[$i]['option_type_id'] != 5) style="display: none" @endif>
                                    <label class="d-block">Answers</label>
                                    <div class="answers mb-3 d-flex col">
                                        <div class="col rows">
                                            <h5>Rows</h5>
                                            <div class="sortable">
                                                {{-- @foreach ($survey->options->where('question_id', $questions[$i]['id'])->where('row_column', 'row') as $option)
                                                    <div class="mb-1 position-relative ans">
                                                        <input class="form-control" type="text"
                                                            name="questions[old][{{ $questions[$i]['id'] }}][options][rows][old][{{ $option->id }}]"
                                                            value="{{ $option->option }}" id="{{$option->id}}">
                                                            
                                                        <div class="input-icons"><span class="badge badge-pill handle pr-0 mr-0"><i
                                                                    class="simple-icon-cursor-move"></i> </span><span
                                                                class="badge badge-pill btn del-ans"><i class="simple-icon-trash"></i></span></div>
                                                    </div>
                                                @endforeach --}}
                                            </div>
                                        </div>
                                        <div class="col columns">
                                            <h5>Columns</h5>
                                            <div class="sortable">
                                                {{-- @foreach ($survey->options->where('question_id', $questions[$i]['id'])->where('row_column', 'column') as $option)
                                                    <div class="mb-1 position-relative ans"><input class="form-control" type="text"
                                                            name="questions[old][{{ $questions[$i]['id'] }}][options][columns][old][{{ $option->id }}]"
                                                            value="{{ $option->option }}" id="{{ $option->id }}">
                                                            
                                                        <div class="input-icons"><span class="badge badge-pill handle pr-0 mr-0"><i
                                                                    class="simple-icon-cursor-move"></i> </span><span
                                                                class="badge badge-pill btn del-ans"><i class="simple-icon-trash"></i></span></div>
                                                    </div>
                                                @endforeach --}}
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12 row">
                                        <div class="col text-center row-btn">
                                            <div class="btn btn-outline-primary btn-sm mb-2 grid-row"><i
                                                    class="simple-icon-plus btn-group-icon"></i>
                                                Add
                                                Row</div>
                                        </div>
                                        <div class="col text-center column-btn">
                                            <div class="btn btn-outline-primary btn-sm mb-2 grid-column"><i
                                                    class="simple-icon-plus btn-group-icon"></i>
                                                Add
                                                Column</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="non-grid ans-group" 
                                @if ($questions[$i]['option_type_id'] == 5) style="display: none" @endif>
                                    <label class="d-block">Answers</label>
                                    <div class="answers mb-3 sortable">

                                        {{-- @foreach ($survey->options->where('question_id', $questions[$i]['id']) as $option)
                                            <div class="mb-1 position-relative ans"><input class="form-control" type="text"
                                                    name="questions[old][{{ $questions[$i]['id'] }}][options][old][{{ $option->id }}]"
                                                    value="{{ $option->option }}" id="{{ $option->id }}">
                                                    
                                                <div class="input-icons"><span class="badge badge-pill handle pr-0 mr-0"><i
                                                            class="simple-icon-cursor-move"></i> </span><span
                                                        class="badge badge-pill btn del-ans"><i class="simple-icon-trash"></i></span></div>
                                            </div>
                                        @endforeach --}}

                                    </div>
                                    <div class="text-center">
                                        <div class="btn btn-outline-primary btn-sm mb-2 ans-btn"><i class="simple-icon-plus btn-group-icon"></i> Add
                                            Answer</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="view-mode">
                            <label class="preview-question">
                                
                            </label>
                            
                            <div class="mb-4">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endfor