@empty($survey->sections->values()->toArray())
    @for ($i = 0; $i < count($questions); $i++)
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
                        <div class="col btn btn-outline-theme-3 icon-button edit-button"><i
                                class="simple-icon-pencil"></i>
                        </div>
                        <div class="col btn btn-outline-theme-3 icon-button view-button"><i class="simple-icon-eye"></i>
                        </div>
                        @if ($survey->status_id == 1)
                            <div class="col btn btn-danger icon-button trash-button"><i class="simple-icon-trash"></i>
                            </div>
                        @endif
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
                            {{-- <input type="hidden"  ="ques[]" value="{{$i+1}}"> --}}
                            <div class="form-group mb-5 que-section"><label>Question</label>
                                {{-- question --}}
                                <input type="hidden" class="que-num" value="{{ $questions[$i]['id'] }}">
                                <input class="form-control writtenQuestion" type="text"
                                    @if ($survey->status_id != 1) disabled @endif
                                    name="questions[old][{{ $questions[$i]['id'] }}]"
                                    value="{{ $questions[$i]['question'] }}">
                            </div>

                            <div class="separator mb-4"></div>

                            {{-- answer types select --}}
                            <div class="form-group opt-type"><label class="d-block">Answer Type</label>
                                {{-- answer-type --}}
                                <select class="form-control select2-single option-type" data-width="100%"
                                @if ($survey->status_id != 1) disabled @endif
                                    name="questions[old][{{ $questions[$i]['id'] }}][option_type_id]">
                                    {{-- <option label="&nbsp;">&nbsp;</option> --}}
                                    @foreach ($optionTypes as $optionType)
                                        <option value="{{ $optionType->id }}"
                                            @if ($questions[$i]['option_type_id'] == $optionType->id) selected @endif>
                                            {{ $optionType->type }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- possible answers --}}
                            <div class="form-group ans-form">
                                <div class="grid ans-group"
                                    @if ($questions[$i]['option_type_id'] != 5) style="display: none" @endif>
                                    <label class="d-block">Answers</label>
                                    <div class="answers mb-3 d-flex col">
                                        <div class="col rows">
                                            <h5>Rows</h5>
                                            <div class="sortable">
                                                @foreach ($survey->options->where('question_id', $questions[$i]['id'])->where('row_column', 'row') as $option)
                                                    <div class="mb-1 position-relative ans">
                                                        <input class="form-control" type="text"
                                                        @if ($survey->status_id != 1) disabled @endif
                                                            name="questions[old][{{ $questions[$i]['id'] }}][options][rows][old][{{ $option->id }}]"
                                                            value="{{ $option->option }}" id="{{ $option->id }}">
                                                        {{-- <input class="form-control" type="hidden" 
                                                        name="ques[old][{{ $questions[$i]['id'] }}][options][rows][old][{{ $questions[$i]['id'] }}][id]"
                                                        value="{{ $option->id }}"> --}}
                                                        <div class="input-icons"><span
                                                                class="badge badge-pill handle pr-0 mr-0"><i
                                                                    class="simple-icon-cursor-move"></i> </span><span
                                                                class="badge badge-pill btn del-ans"><i
                                                                    class="simple-icon-trash"></i></span></div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col columns">
                                            <h5>Columns</h5>
                                            <div class="sortable">
                                                @foreach ($survey->options->where('question_id', $questions[$i]['id'])->where('row_column', 'column') as $option)
                                                    <div class="mb-1 position-relative ans"><input class="form-control"
                                                            type="text"
                                                            @if ($survey->status_id != 1) disabled @endif
                                                            name="questions[old][{{ $questions[$i]['id'] }}][options][columns][old][{{ $option->id }}]"
                                                            value="{{ $option->option }}" id="{{ $option->id }}">
                                                        {{-- <input class="form-control" type="hidden" 
                                                        name="ques[old][{{ $questions[$i]['id'] }}][options][columns][old][{{ $questions[$i]['id'] }}][id]"
                                                        value="{{ $option->id }}"> --}}
                                                        <div class="input-icons"><span
                                                                class="badge badge-pill handle pr-0 mr-0"><i
                                                                    class="simple-icon-cursor-move"></i> </span><span
                                                                class="badge badge-pill btn del-ans"><i
                                                                    class="simple-icon-trash"></i></span></div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12 row">
                                        <div class="col text-center row-btn">
                                            <div class="btn btn-outline-primary btn-sm mb-2 @if ($survey->status_id == 1) grid-row @endif "><i
                                                    class="simple-icon-plus btn-group-icon"></i>
                                                Add
                                                Row</div>
                                        </div>
                                        <div class="col text-center column-btn">
                                            <div class="btn btn-outline-primary btn-sm mb-2 @if ($survey->status_id == 1) grid-column @endif"><i
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

                                        @foreach ($survey->options->where('question_id', $questions[$i]['id']) as $option)
                                            <div class="mb-1 position-relative ans"><input class="form-control"
                                                @if ($survey->status_id != 1) disabled @endif
                                                    type="text"
                                                    name="questions[old][{{ $questions[$i]['id'] }}][options][old][{{ $option->id }}]"
                                                    value="{{ $option->option }}" id="{{ $option->id }}">
                                                {{-- <input class="form-control" type="hidden" 
                                                name="ques[old][{{ $questions[$i]['id'] }}][options][old][{{ $questions[$i]['id'] }}][id]"
                                                value="{{ $option->id }}"> --}}
                                                <div class="input-icons"><span
                                                        class="badge badge-pill handle pr-0 mr-0"><i
                                                            class="simple-icon-cursor-move"></i> </span><span
                                                        class="badge badge-pill btn del-ans"><i
                                                            class="simple-icon-trash"></i></span></div>
                                            </div>
                                        @endforeach

                                    </div>
                                    <div class="text-center">
                                        <div class="btn btn-outline-primary btn-sm mb-2 @if ($survey->status_id == 1) ans-btn @endif "><i
                                                class="simple-icon-plus btn-group-icon"></i> Add
                                            Answer</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- view --}}
                        <div class="view-mode">
                            <label class="preview-question">
                                {{-- {{ $questions[$i]['question'] }} --}}
                            </label>
                            {{-- 1 - text (single line)
                                                4 - text (multi-line)
                                                                    2 - radio
                                                                    3 - check
                                                                    5 - grid --}}
                            <div class="mb-4">
                                {{-- @if ($questions[$i]['option_type_id'] == 1)
                                                    <input class="form-control" type="text" name="{{ $questions[$i]['id'] }}"
                                                        id="{{ $questions[$i]['id'] }}">
                                                @elseif ($questions[$i]['option_type_id'] == 2)
                                                <textarea class="form-control" name="q{{$questions[$i]['id']}}" id="q{{$questions[$i]['id']}}" cols="30" rows="2"></textarea>

                                                @elseif ($questions[$i]['option_type_id'] == 3)
                                                @foreach ($survey->options->where('question_id', $questions[$i]['id']) as $option)
                                                        <div class="custom-control custom-radio"><input type="radio" id="o{{ $option->id }}"
                                                                name="q{{ $questions[$i]['id'] }}" class="custom-control-input">
                                                            <label class="custom-control-label" for="o{{ $option->id }}">{{ $option->option }}</label>
                                                        </div>
                                                    @endforeach
                                                    

                                                @elseif ($questions[$i]['option_type_id'] == 4)
                                                @foreach ($survey->options->where('question_id', $questions[$i]['id']) as $option)
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" name="" id="o{{ $option->id }}">
                                                            <label for="o{{ $option->id }}" class="custom-control-label">{{ $option->option }}</label>
                                                        </div>

                                                    @endforeach


                                                @else
                                                <div class="row col-12">
                                                    <div class="d-flex flex-column col-2">
                                                        <div style="height: 50px"></div>
                                                        @foreach ($survey->options->where('question_id', $questions[$i]['id']) as $option)
                                                            <div class="text-center">{{ $option->option }}</div>
                                                        @endforeach
                                                    </div>
                                                    <div class="col-10 row" style="flex-wrap: nowrap">
                                                        @foreach ($survey->columns->where('question_id', $questions[$i]['id']) as $column)
                                                            <div class="d-flex flex-column justify-content-between"
                                                                style="width: 100px; height: 100%; min-width:100px">
                                                                <div style="height: 50px"
                                                                    class="d-flex align-items-center justify-content-center w-100">
                                                                    {{ $column->question }}
                                                                </div>
                                                                @foreach ($survey->options->where('question_id', $questions[$i]['id']) as $option)
                                                                    <div class="d-flex justify-content-center"><input type="radio"
                                                                            name="ans[{{ $questions[$i]['id'] }}][{{ $option->id }}]"
                                                                            id="" value="{{ $column->question }}"
                                                                            
                                                                            ></div>
                                                                @endforeach
                                                            </div>
                                                        @endforeach

                                                    </div>
                                                </div>
                                                @endif --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endfor
@else
    @for ($i = 0; $i < count($questions); $i++)
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
                        <div class="col btn btn-outline-theme-3 icon-button edit-button"><i
                                class="simple-icon-pencil"></i>
                        </div>
                        <div class="col btn btn-outline-theme-3 icon-button view-button"><i class="simple-icon-eye"></i>
                        </div>
                        @if ($survey->status_id == 1)
                            <div class="col btn btn-danger icon-button trash-button"><i class="simple-icon-trash"></i>
                            </div>
                        @endif
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
                            {{-- <input type="hidden"  ="ques[]" value="{{$i+1}}"> --}}
                            <div class="form-group mb-5 que-section"><label>Question</label>
                                {{-- question --}}
                                <input type="hidden" class="que-num" value="{{ $questions[$i]['id'] }}">
                                <input class="form-control writtenQuestion" type="text"
                                    @if ($survey->status_id != 1) disabled @endif
                                    name="sections[old][{{ $section_id }}][questions][old][{{ $questions[$i]['id'] }}]"
                                    value="{{ $questions[$i]['question'] }}">
                            </div>

                            <div class="separator mb-4"></div>

                            {{-- answer types select --}}
                            <div class="form-group opt-type"><label class="d-block">Answer Type</label>
                                {{-- answer-type --}}
                                <select class="form-control select2-single option-type" data-width="100%"
                                @if ($survey->status_id != 1) disabled @endif
                                    name="sections[old][{{ $section_id }}][questions][old][{{ $questions[$i]['id'] }}][option_type_id]">
                                    {{-- <option label="&nbsp;">&nbsp;</option> --}}
                                    @foreach ($optionTypes as $optionType)
                                        <option value="{{ $optionType->id }}"
                                            @if ($questions[$i]['option_type_id'] == $optionType->id) selected @endif>
                                            {{ $optionType->type }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- possible answers --}}
                            <div class="form-group ans-form">
                                <div class="grid ans-group"
                                    @if ($questions[$i]['option_type_id'] != 5) style="display: none" @endif>
                                    <label class="d-block">Answers</label>
                                    <div class="answers mb-3 d-flex col">
                                        <div class="col rows">
                                            <h5>Rows</h5>
                                            <div class="sortable">
                                                @foreach ($survey->options->where('question_id', $questions[$i]['id'])->where('row_column', 'row') as $option)
                                                    <div class="mb-1 position-relative ans">
                                                        <input class="form-control" type="text"
                                                        @if ($survey->status_id != 1) disabled @endif
                                                            name="sections[old][{{ $section_id }}][questions][old][{{ $questions[$i]['id'] }}][options][rows][old][{{ $option->id }}]"
                                                            value="{{ $option->option }}" id="{{ $option->id }}">
                                                        {{-- <input class="form-control" type="hidden" 
                                                        name="ques[old][{{ $questions[$i]['id'] }}][options][rows][old][{{ $questions[$i]['id'] }}][id]"
                                                        value="{{ $option->id }}"> --}}
                                                        <div class="input-icons"><span
                                                                class="badge badge-pill handle pr-0 mr-0"><i
                                                                    class="simple-icon-cursor-move"></i> </span><span
                                                                class="badge badge-pill btn del-ans"><i
                                                                    class="simple-icon-trash"></i></span></div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col columns">
                                            <h5>Columns</h5>
                                            <div class="sortable">
                                                @foreach ($survey->options->where('question_id', $questions[$i]['id'])->where('row_column', 'column') as $option)
                                                    <div class="mb-1 position-relative ans"><input class="form-control"
                                                            type="text"
                                                            @if ($survey->status_id != 1) disabled @endif
                                                            name="sections[old][{{ $section_id }}][questions][old][{{ $questions[$i]['id'] }}][options][columns][old][{{ $option->id }}]"
                                                            value="{{ $option->option }}" id="{{ $option->id }}">
                                                        {{-- <input class="form-control" type="hidden" 
                                                        name="ques[old][{{ $questions[$i]['id'] }}][options][columns][old][{{ $questions[$i]['id'] }}][id]"
                                                        value="{{ $option->id }}"> --}}
                                                        <div class="input-icons"><span
                                                                class="badge badge-pill handle pr-0 mr-0"><i
                                                                    class="simple-icon-cursor-move"></i> </span><span
                                                                class="badge badge-pill btn del-ans"><i
                                                                    class="simple-icon-trash"></i></span></div>
                                                    </div>
                                                @endforeach
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

                                        @foreach ($survey->options->where('question_id', $questions[$i]['id']) as $option)
                                            <div class="mb-1 position-relative ans"><input class="form-control"
                                                    type="text"
                                                    @if ($survey->status_id != 1) disabled @endif
                                                    name="sections[old][{{ $section_id }}][questions][old][{{ $questions[$i]['id'] }}][options][old][{{ $option->id }}]"
                                                    value="{{ $option->option }}" id="{{ $option->id }}">
                                                {{-- <input class="form-control" type="hidden" 
                                                name="ques[old][{{ $questions[$i]['id'] }}][options][old][{{ $questions[$i]['id'] }}][id]"
                                                value="{{ $option->id }}"> --}}
                                                <div class="input-icons"><span
                                                        class="badge badge-pill handle pr-0 mr-0"><i
                                                            class="simple-icon-cursor-move"></i> </span><span
                                                        class="badge badge-pill btn del-ans"><i
                                                            class="simple-icon-trash"></i></span></div>
                                            </div>
                                        @endforeach

                                    </div>
                                    <div class="text-center">
                                        <div class="btn btn-outline-primary btn-sm mb-2 ans-btn"><i
                                                class="simple-icon-plus btn-group-icon"></i> Add
                                            Answer</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- view --}}
                        <div class="view-mode">
                            <label class="preview-question">
                                {{-- {{ $questions[$i]['question'] }} --}}
                            </label>
                            {{-- 1 - text (single line)
                                                4 - text (multi-line)
                                                                    2 - radio
                                                                    3 - check
                                                                    5 - grid --}}
                            <div class="mb-4">
                                {{-- @if ($questions[$i]['option_type_id'] == 1)
                                                    <input class="form-control" type="text" name="{{ $questions[$i]['id'] }}"
                                                        id="{{ $questions[$i]['id'] }}">
                                                @elseif ($questions[$i]['option_type_id'] == 2)
                                                <textarea class="form-control" name="q{{$questions[$i]['id']}}" id="q{{$questions[$i]['id']}}" cols="30" rows="2"></textarea>

                                                @elseif ($questions[$i]['option_type_id'] == 3)
                                                @foreach ($survey->options->where('question_id', $questions[$i]['id']) as $option)
                                                        <div class="custom-control custom-radio"><input type="radio" id="o{{ $option->id }}"
                                                                name="q{{ $questions[$i]['id'] }}" class="custom-control-input">
                                                            <label class="custom-control-label" for="o{{ $option->id }}">{{ $option->option }}</label>
                                                        </div>
                                                    @endforeach
                                                    

                                                @elseif ($questions[$i]['option_type_id'] == 4)
                                                @foreach ($survey->options->where('question_id', $questions[$i]['id']) as $option)
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" name="" id="o{{ $option->id }}">
                                                            <label for="o{{ $option->id }}" class="custom-control-label">{{ $option->option }}</label>
                                                        </div>

                                                    @endforeach


                                                @else
                                                <div class="row col-12">
                                                    <div class="d-flex flex-column col-2">
                                                        <div style="height: 50px"></div>
                                                        @foreach ($survey->options->where('question_id', $questions[$i]['id']) as $option)
                                                            <div class="text-center">{{ $option->option }}</div>
                                                        @endforeach
                                                    </div>
                                                    <div class="col-10 row" style="flex-wrap: nowrap">
                                                        @foreach ($survey->columns->where('question_id', $questions[$i]['id']) as $column)
                                                            <div class="d-flex flex-column justify-content-between"
                                                                style="width: 100px; height: 100%; min-width:100px">
                                                                <div style="height: 50px"
                                                                    class="d-flex align-items-center justify-content-center w-100">
                                                                    {{ $column->question }}
                                                                </div>
                                                                @foreach ($survey->options->where('question_id', $questions[$i]['id']) as $option)
                                                                    <div class="d-flex justify-content-center"><input type="radio"
                                                                            name="ans[{{ $questions[$i]['id'] }}][{{ $option->id }}]"
                                                                            id="" value="{{ $column->question }}"
                                                                            
                                                                            ></div>
                                                                @endforeach
                                                            </div>
                                                        @endforeach

                                                    </div>
                                                </div>
                                                @endif --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endfor
@endempty
