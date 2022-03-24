{{-- style for question cards --}}

{{-- <style type="text/css">
    .card-style {
        width: 100% !important;
        margin: 0 auto;
    }

    /* .grid-contents{
        width: 50%;
    } */

    @media (min-width: 320px) and (max-width: 672px) {
        .card-style {
            position: relative;
            left: -11%;
            max-width: 100%;
            min-width: 18rem;
            font-size: 75%;

        }

        .f2 {
            flex-wrap: wrap;
            -webkit-box-flex: 0;
            -ms-flex: 0 0 25%;
            flex: 0 0 25%;
            max-width: 25%;
        }


    }

</style> --}}

@for ($i = 0; $i < count($questions); $i++)

@foreach ($questions as $question)
<div class="col-12">
    <div class="card question d-flex mb-4 col-mmd-5 card-style">
        <div class="d-flex flex-grow-1 min-width-zero">
            <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1"><span class="heading-number d-inline-block">{{ ++$i }}
                    </span></div>
            </div>
        </div>
        <div class="question-collapse collapse show" id="q{{ $survey->questions[$i]->id }}">
            <div class="card-body pt-0">
                {{-- view --}}
                <div class="view-mode">
                    <label class="preview-question">{{ $question->question }}</label>

                    <div class="mb-4">

                        @if ($question->option_type_id == 1)
                         <input class="form-control trim" type="text" name="ans[{{ $question->id }}]" value="@foreach ($responses as $response) @if ($response->question_id == $question->id){{ $response->response }} @endif @endforeach">
                        @elseif ($question->option_type_id == 2)
                         <textarea class="form-control" name="ans[{{ $question->id }}]" cols="30" rows="2">
                        @foreach ($responses as $response)@if ($response->question_id == $question->id)
                        {{ $response->response }}
                        @endif @endforeach
                        </textarea> 
                        @elseif ($question->option_type_id == 3)
                        @foreach ($survey->options->where('question_id', $question->id) as $option)
                        <div class="custom-control custom-radio"><input value="{{ $option->option }}" type="radio" id="o{{ $option->id }}" 
                            {{-- @foreach ($responses as $response) @if ($response->response == $option->option) checked @endif
                            @endforeach --}}
                            name="ans[{{ $question->id }}][{{ $option->id }}]" class="custom-control-input">
                            <label class="custom-control-label" for="o{{ $option->id }}">{{ $option->option }}</label>
                        </div>
                        @endforeach
                        @elseif ($question->option_type_id == 4 && $survey->options->where('question_id', $question->id)->count() > 0)
                        <select name="ans[{{ $question->id }}]" class="form-control drop-down">
                            @foreach ($survey->options->where('question_id', $question->id) as $option)
                            <option 
                            {{-- @foreach ($responses as $response) @if ($response->response == $option->option) selected @endif @endforeach  --}}
                                value="{{ $option->option }}">{{ $option->option }}
                            </option>
                            @endforeach
                        </select>
                        @elseif ($question->option_type_id == 5)
                        @foreach ($survey->options->where('question_id', $question->id) as $option)
                        
                        <div class="custom-control custom-checkbox">
                            <input value="{{ $option->option }}" class="custom-control-input" type="checkbox" 
                            {{-- @foreach ($responses as $response) @if ($response->response == $option->option) checked @endif @endforeach --}}
                            name="ans[{{ $question->id }}][{{ $option->id }}]"
                            id="o{{ $option->id }}">
                            <label for="o{{ $option->id }}" class="custom-control-label">{{ $option->option }}</label>
                        </div>

                        @endforeach
                        @else

                        <div class="row col-12">
                            <div class="d-flex flex-column col-2">
                                <div style="height: 50px"></div>
                                @foreach ($question->options->where('row_column', 'row') as $option)

                                <div class="text-center mb-2">{{ $option->option }}</div>
                                @endforeach
                            </div>
                            <div class="col-10 row" style="flex-wrap: nowrap">
                                @foreach ($question->options->where('row_column', 'column') as $columnOption)
                                <div class="d-flex flex-column justify-content-between" style="width: 100%; height: 100%; min-width: 100px">
                                    <div class="d-flex align-items-center justify-content-center w-100" style="height: 50px">{{ $columnOption->option }}</div>

                                    @foreach ($question->options->where('row_column', 'row') as $option)
                                    <div class="d-flex justify-content-center mb-2 check-box">
                                        <input type="radio" name="ans[{{ $question->id }}][{{ $option->id }}]" value="{{ $columnOption->option }}" @foreach ($responses as $response) {{$response->response}} @if ($response->response == $columnOption->option) @if ($response->option_id == $option->id) checked @endif @endif @endforeach>
                                    </div>
                                    @endforeach
                                </div>
                                @endforeach

                            </div>
                        </div>

                        @endif
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
@endforeach

    
    <!-- </div>
    </div> -->

@endfor