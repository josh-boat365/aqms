@for ($i = 0; $i < count($survey->questions); $i++)

    <div>
        <div class="card question d-flex mb-4 edit-quesiton">
            <div class="d-flex flex-grow-1 min-width-zero">
                <div
                    class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                    <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1"><span
                            class="heading-number d-inline-block">{{ $i + 1 }}
                        </span><span class="preview-question">{{ $survey->questions[$i]->question }}</span></div>
                </div>
                <div class="custom-control custom-checkbox pl-1 align-self-center pr-4"><button
                        class="btn btn-outline-theme-3 icon-button edit-button"><i
                            class="simple-icon-pencil"></i></button>
                    <button class="btn btn-outline-theme-3 icon-button view-button"><i
                            class="simple-icon-eye"></i></button>
                    <button class="btn btn-outline-theme-3 icon-button rotate-icon-click rotate" type="button"
                        data-toggle="collapse" data-target="#q{{ $survey->questions[$i]->id }}" aria-expanded="true"
                        aria-controls="q{{ $survey->questions[$i]->id }}"><i
                            class="simple-icon-arrow-down with-rotate-icon"></i></button>
                </div>
            </div>
            <div class="question-collapse collapse show" id="q{{ $survey->questions[$i]->id }}">
                <div class="card-body pt-0">
                    <div class="edit-mode">
                        <div class="form-group mb-5"><label>Question</label>
                            <input class="form-control writtenQuestion" type="text" value="{{ $survey->questions[$i]->question }}">
                        </div>

                        <div class="separator mb-4"></div>

                        {{-- answer types select --}}
                        {{-- Todo: get options from database --}}
                        <div class="form-group opt-type"><label class="d-block">Answer Type</label>
                            <select class="form-control select2-single option-type" data-width="100%">
                                <option label="&nbsp;">&nbsp;</option>
                                @foreach ($optionTypes as $optionType)
                                    <option value="{{ $optionType->id }}" 
                                        @if ($survey->questions[$i]->option_type_id == $optionType->id)
                                        selected
                                        @endif>{{ $optionType->type }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- possible answers --}}
                        <div class="form-group ans-form"><label class="d-block">Answers</label>
                            <div class="answers mb-3 sortable">

                                @foreach ($survey->options->where('question_id', $survey->questions[$i]->id) as $option)
                                    <div class="mb-1 position-relative ans"><input class="form-control" type="text"
                                            value="{{ $option->option }}">
                                        <div class="input-icons"><span class="badge badge-pill handle pr-0 mr-0"><i
                                                    class="simple-icon-cursor-move"></i> </span><span class="badge badge-pill btn del-ans"><i
                                                    class="simple-icon-trash"></i></span></div>
                                    </div>
                                @endforeach

                            </div>
                            <div class="text-center"><button type="button" class="btn btn-outline-primary btn-sm mb-2 ans-btn"><i
                                        class="simple-icon-plus btn-group-icon"></i> Add Answer</button></div>
                        </div>
                    </div>

                    {{-- view --}}
                    <div class="view-mode">
                        <label class="preview-question">
                            {{-- {{ $survey->questions[$i]->question }} --}}
                        </label>
                        {{-- 1 - text (single line)
                            4 - text (multi-line)
                                                2 - radio
                                                3 - check
                                                5 - grid --}}
                        <div class="mb-4">
                            {{-- @if ($survey->questions[$i]->option_type_id == 1)
                                <input class="form-control" type="text" name="{{ $survey->questions[$i]->id }}"
                                    id="{{ $survey->questions[$i]->id }}">
                            @elseif ($survey->questions[$i]->option_type_id == 2)
                            <textarea class="form-control" name="q{{$survey->questions[$i]->id}}" id="q{{$survey->questions[$i]->id}}" cols="30" rows="2"></textarea>

                            @elseif ($survey->questions[$i]->option_type_id == 3)
                            @foreach ($survey->options->where('question_id', $survey->questions[$i]->id) as $option)
                                    <div class="custom-control custom-radio"><input type="radio" id="o{{ $option->id }}"
                                            name="q{{ $survey->questions[$i]->id }}" class="custom-control-input">
                                        <label class="custom-control-label" for="o{{ $option->id }}">{{ $option->option }}</label>
                                    </div>
                                @endforeach
                                

                            @elseif ($survey->questions[$i]->option_type_id == 4)
                            @foreach ($survey->options->where('question_id', $survey->questions[$i]->id) as $option)
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" name="" id="o{{ $option->id }}">
                                        <label for="o{{ $option->id }}" class="custom-control-label">{{ $option->option }}</label>
                                    </div>

                                @endforeach


                            @else
                                    comming soon!
                            @endif --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endfor
