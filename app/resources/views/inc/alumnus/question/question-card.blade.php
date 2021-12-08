@for ($i = 0; $i < count($survey->questions); $i++)

    <div class="@if ($survey->questions[$i]->option_type_id == 5) col @else col-8 @endif">
        <div class="card question d-flex mb-4 edit-quesiton">
            <div class="d-flex flex-grow-1 min-width-zero">
                <div
                    class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                    <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1"><span
                            class="heading-number d-inline-block">{{ $i + 1 }}
                        </span></div>
                </div>

            </div>
            <div class="question-collapse collapse show" id="q{{ $survey->questions[$i]->id }}">
                <div class="card-body pt-0">
                    {{-- view --}}
                    <div class="edit-mode">
                        <label class="preview-question">
                            {{ $survey->questions[$i]->question }}
                        </label>
                        {{-- 1 - text (single line)
                            4 - text (multi-line)
                                                2 - radio
                                                3 - check
                                                5 - grid --}}
                        <div class="mb-4">
                            @if ($survey->questions[$i]->option_type_id == 1)
                                <input class="form-control" type="text" name="ans[{{ $survey->questions[$i]->id }}]"
                                    @foreach ($responses->where('question_id', $survey->questions[$i]->id)->get() as $response)
                                value="{{ $response->response }}"
                            @endforeach
                            >
                        @elseif ($survey->questions[$i]->option_type_id == 2)
                            <textarea class="form-control" name="ans[{{ $survey->questions[$i]->id }}]" cols="30"
                                rows="2">@foreach ($responses->where('question_id', $survey->questions[$i]->id)->get() as $response){{ $response->response }} @endforeach
                                </textarea>

                        @elseif ($survey->questions[$i]->option_type_id == 3)
                            @foreach ($survey->options->where('question_id', $survey->questions[$i]->id) as $option)
                                <div class="custom-control custom-radio"><input value="{{ $option->option }}"
                                        type="radio" id="o{{ $option->id }}"
                                        name="ans[{{ $survey->questions[$i]->id }}]" class="custom-control-input"
                                        {{-- @foreach ($responses->where('question_id', $survey->questions[$i]->id)->get() as $response)
                                            @if ($response->response == $option->option)
                                                checked
                                            @endif
                                        @endforeach --}}>
                                    <label class="custom-control-label"
                                        for="o{{ $option->id }}">{{ $option->option }}</label>
                                </div>
                            @endforeach


                        @elseif ($survey->questions[$i]->option_type_id == 4)
                            @foreach ($survey->options->where('question_id', $survey->questions[$i]->id) as $option)
                                <div class="custom-control custom-checkbox">
                                    <input value="{{ $option->option }}" class="custom-control-input" type="checkbox"
                                        name="ans[{{ $survey->questions[$i]->id }}][]" id="o{{ $option->id }}"
                                        @foreach ($responses->where('question_id', $survey->questions[$i]->id)->get() as $response)
                                    @if ($response->response == $option->option)
                                        checked
                                    @endif
                            @endforeach>
                            <label for="o{{ $option->id }}"
                                class="custom-control-label">{{ $option->option }}</label>
                        </div>

@endforeach


@else
<div class="row col-12">
    {{-- <div class="col-12 row">
                                    <div class="col-2"></div>
                                    <div class="col-10">

                                    </div>
                                </div> --}}
    <div class="d-flex flex-column col-2">
        <div style="height: 50px"></div>
        {{-- sub questions --}}
        @foreach ($survey->options->where('question_id', $survey->questions[$i]->id) as $option)
            <div class="text-center">{{ $option->option }}</div>
        @endforeach
        {{-- <div>row 1</div>
                                    <div>row 1</div>
                                    <div>row 1</div> --}}
    </div>
    <div class="col-10 row" style="flex-wrap: nowrap">
        @foreach ($survey->columns->where('question_id', $survey->questions[$i]->id) as $column)
            <div class="d-flex flex-column justify-content-between" style="width: 100px; height: 100%; min-width:100px">
                <div style="height: 50px" class="d-flex align-items-center justify-content-center w-100">
                    {{ $column->question }}</div>
                {{-- sub question id --}}
                @foreach ($survey->options->where('question_id', $survey->questions[$i]->id) as $option)
                    <div class="d-flex justify-content-center"><input type="radio"
                            name="ans[{{ $survey->questions[$i]->id }}][{{$option->id}}]" id="" value="{{$column->question}}"></div>
                @endforeach
                {{-- <div class="d-flex justify-content-center"><input type="radio"
                        name="ans[{{ $survey->questions[$i]->id }}]" id=""></div>
                <div class="d-flex justify-content-center"><input type="radio"
                        name="ans[{{ $survey->questions[$i]->id }}]" id=""></div> --}}
            </div>
        @endforeach
        {{-- headers --}}

        {{-- buttons --}}

    </div>
</div>
@endif
</div>
</div>
</div>
</div>
</div>

@endfor
