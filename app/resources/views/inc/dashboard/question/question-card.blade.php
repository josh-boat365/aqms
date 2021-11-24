
@for ($i = 0; $i < count($survey->questions); $i++)
    
    <div>
        <div class="card question d-flex mb-4 edit-quesiton">
            <div class="d-flex flex-grow-1 min-width-zero">
                <div
                    class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                    <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1"><span class="heading-number d-inline-block">{{ $i + 1 }}
                        </span>{{ $survey->questions[$i]->question }}</div>
                </div>
                <div class="custom-control custom-checkbox pl-1 align-self-center pr-4"><button
                        class="btn btn-outline-theme-3 icon-button edit-button"><i class="simple-icon-pencil"></i></button>
                    <button class="btn btn-outline-theme-3 icon-button view-button"><i class="simple-icon-eye"></i></button>
                    <button class="btn btn-outline-theme-3 icon-button rotate-icon-click rotate" type="button"
                        data-toggle="collapse" data-target="#{{$survey->questions[$i]->id}}" aria-expanded="true" aria-controls="{{$survey->questions[$i]->id}}"><i
                            class="simple-icon-arrow-down with-rotate-icon"></i></button>
                </div>
            </div>
            <div class="question-collapse collapse show" id="{{$survey->questions[$i]->id}}">
                <div class="card-body pt-0">
                    <div class="edit-mode">
                        <div class="form-group mb-5"><label>Question</label>
                            <input class="form-control" type="text" value="{{$survey->questions[$i]->question}}">
                        </div>
    
                        <div class="separator mb-4"></div>
    
                        {{-- answer types select --}}
                        <div class="form-group"><label class="d-block">Answer Type</label>
                            <select class="form-control select2-single" data-width="100%">
                                <option label="&nbsp;">&nbsp;</option>
                                <option value="0"  @if ($survey->questions[$i]->option_type_id == '1')
                                    selected
                                @endif>Text Input</option>
                                <option value="1"  @if ($survey->questions[$i]->option_type_id == '2')
                                    selected
                                @endif>Single Select</option>
                                <option value="2" @if ($survey->questions[$i]->option_type_id == '3')
                                    selected
                                @endif>Multiple Select</option>
                                <option value="3" @if ($survey->questions[$i]->option_type_id == '4')
                                    selected
                                @endif>Checkbox</option>
                                <option value="4" @if ($survey->questions[$i]->option_type_id == '5')
                                    selected
                                @endif>Radiobutton</option>
                            </select>
                        </div>
    
                        {{-- possible answers --}}
                        <div class="form-group"><label class="d-block">Answers</label>
                            <div class="answers mb-3 sortable">
    
                                @foreach ($survey->options->where('question_id', $survey->questions[$i]->id) as $option)
                                <div class="mb-1 position-relative"><input class="form-control" type="text" value="{{$option->option}}">
                                    <div class="input-icons"><span class="badge badge-pill handle pr-0 mr-0"><i
                                                class="simple-icon-cursor-move"></i> </span><span
                                            class="badge badge-pill btn del-ans"><i class="simple-icon-ban"></i></span></div>
                                </div>
                                @endforeach
                                
                            </div>
                            <div class="text-center"><button type="button" class="btn btn-outline-primary btn-sm mb-2 ans-btn"><i
                                        class="simple-icon-plus btn-group-icon"></i> Add Answer</button></div>
                        </div>
                    </div>
    
                    {{-- view --}}
                    <div class="view-mode">
                        <label>How old are you?</label> 
                        <select class="form-control select2-single"
                            data-width="100%">
                            <option label="&nbsp;">&nbsp;</option>
                            <option value="0">18-24</option>
                            <option value="1">24-30</option>
                            <option value="2">30-40</option>
                            <option value="3">40-50</option>
                            <option value="4">50+</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    
@endfor
