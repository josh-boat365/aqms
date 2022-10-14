{{-- style for question cards --}}

<style type="text/css">
    .card-style {
        width: 100% !important;
        margin: 0 auto;
    }

    .grid-contents {
        width: 50%;
    }

    span[class="select2 select2-container select2-container--bootstrap"],
    span[class="select2 select2-container select2-container--bootstrap select2-container--above"] {
        width: 100% !important;
    }

    /* .grid-radio-btn {
        position: relative;
        top: -12px;
    } */
    /* 01212188d Nya@557 */
    /* #q3>div>div>div>div>div.col-10.row.grid-column-group>div>input .grid-radio-btn {
        position: relative;
        top: -12px;
    } */

    #q3>div>div>div>div>div.col-10.row.grid-column-group .grid-radio-btn {
        position: relative;
        top: -12px;
    }

    @media (min-width: 280px) and (max-width: 1000px) {
        .card-style {
            position: relative;
            left: -1.2rem;
            /* max-width: 100%; */
            width: 23rem;
            /* font-size: 50%; */

        }

        .col-font,
        .row-font {
            font-size: 70%;
            width: 4rem;
            font-weight: 800;
        }

        .f2 {
            flex-wrap: wrap;
            -webkit-box-flex: 0;
            -ms-flex: 0 0 25%;
            flex: 0 0 25%;
            max-width: 25%;
        }




    }
</style>


@php
$i = 0;
@endphp

@foreach ($questions as $question)
    <div class="col-12">
        <div class="card question d-flex mb-4 col-mmd-5 card-style">
            <div class="d-flex flex-grow-1 min-width-zero">
                <div
                    class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                    <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1"><span
                            class="heading-number d-inline-block">

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
                                <input class="form-control trim" type="text" name="ans[{{ $question->id }}]"
                                    value="@foreach ($responses as $response) @if ($response->question_id == $question->id){{ $response->response }} @endif @endforeach">
                            @elseif ($question->option_type_id == 2)
                                <textarea class="form-control" name="ans[{{ $question->id }}]" cols="30" rows="2">
                        @foreach ($responses as $response)
@if ($response->question_id == $question->id)
{{ $response->response }}
@endif
@endforeach 
</textarea>
                            @elseif ($question->option_type_id == 3)
                                @foreach ($survey->options->where('question_id', $question->id) as $option)
                                    <div class="custom-control custom-radio"><input value="{{ $option->option }}"
                                            type="radio" id="o{{ $option->id }}"
                                            @foreach ($responses as $response) @if ($response->option_id == $option->id) checked @endif @endforeach
                                            name="ans[{{ $question->id }}]" class="custom-control-input">
                                        <label class="custom-control-label"
                                            for="o{{ $option->id }}">{{ $option->option }}</label>
                                    </div>
                                @endforeach
                            @elseif ($question->option_type_id == 4 && $survey->options->where('question_id', $question->id)->count() > 0)
                                <select name="ans[{{ $question->id }}]" class="form-control drop-down ">
                                    @foreach ($survey->options->where('question_id', $question->id) as $option)
                                        <option
                                            @foreach ($responses as $response) @if ($response->question_id == $question->id && $response->response == $option->option) selected @endif @endforeach
                                            value="{{ $option->option }}">{{ $option->option }}
                                        </option>
                                    @endforeach
                                </select>
                            @elseif ($question->option_type_id == 5)
                                @foreach ($survey->options->where('question_id', $question->id) as $option)
                                    <div class="custom-control custom-checkbox">
                                        <input value="{{ $option->option }}" class="custom-control-input"
                                            type="checkbox"
                                            @foreach ($responses as $response) @if ($response->option_id == $option->id) checked @endif @endforeach
                                            name="ans[{{ $question->id }}][{{ $option->id }}]"
                                            id="o{{ $option->id }}">
                                        <label for="o{{ $option->id }}"
                                            class="custom-control-label">{{ $option->option }}</label>
                                    </div>
                                @endforeach
                            @else
                                {{-- Grid question type  --}}
                                <div class="row col-12 grid-option-group">
                                    <div class="d-flex flex-column" style="width: 62px !important">
                                        <div style="height: 64px"></div>
                                        @foreach ($question->options->where('row_column', 'row') as $option)
                                            <div class="text-center mb-2 grid- row-font"
                                                style="font-size: 80%;position: relative; top: -5px;">
                                                {{ $option->option }}</div>
                                        @endforeach
                                    </div>
                                    <div class="col-10 row grid-column-group" style="flex-wrap: nowrap">
                                        @foreach ($question->options->where('row_column', 'column') as $columnOption)
                                            <div class="d-flex flex-column justify-content-between grid-column"
                                                style="width: 100%; height: 100%; min-width: 100px">
                                                <div class="d-flex align-items-center justify-content-center w-100 col-font"
                                                    style="font-size:80%; height: 50px;">{{ $columnOption->option }}
                                                </div>

                                                @foreach ($question->options->where('row_column', 'row') as $option)
                                                    <div class="d-flex justify-content-center mb-2 check-box">
                                                        <input type="radio" class="grid-radio-btn"
                                                            name="ans[{{ $question->id }}][{{ $option->id }}]"
                                                            value="{{ $columnOption->option }}"
                                                            @foreach ($responses as $response) {{ $response->response }} @if ($response->response == $columnOption->option) @if ($response->option_id == $option->id) checked @endif @endif @endforeach>
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
