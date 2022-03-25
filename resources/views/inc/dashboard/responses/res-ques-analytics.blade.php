<style>
    .card-matrixChoice {
        height: 28% !important;
    }

    .chart-body {
        height: 40vh;
    }

    .chart-radio {
        width: 79%;
        margin: 0 auto;
        position: relative;
        bottom: 8.2rem;
    }

    .num-response {
        position: relative;
        bottom: 2.2rem;
        left: 4.4rem;
    }

    .chart-checkbox {
        width: 92%;
        margin: 0 auto;
        position: relative;
        right: 2rem;
        bottom: 2.2rem;
    }

    .toggle-chart {
        position: relative;
        z-index: 2;
    }

    .toggled-table {
        position: relative;
        top: 7rem;
        left: -1rem;
    }

    .table-scroll-q {
        height: 40vh;
        overflow-x: auto;
        overflow-y: auto;
    }

    .t-head-q {
        background-color: #00365a;
        color: white;
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
    }

    .alyt-table-q td {
        border: 1px solid gray;
    }

    .active{
        display: block !important;
    }

</style>

@for ($i = 0; $i < count($survey->questions); $i++)
@php
$ind = 1;
@endphp
    @if ($survey->questions[$i]->option_type_id == 1 || $survey->questions[$i]->option_type_id == 2)
        <div class="card question d-flex mb-4 card-style">
            <div class="d-flex flex-grow-1 min-width-zero">
                <div
                    class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                    <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1">
                        <span class="heading-number d-inline-block">{{ $i + 1 }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="question-collapse collapse show" id="q{{ $survey->questions[$i]->id }}">
                <div class="card-body pt-0">
                    {{-- view --}}
                    <div class="edit-mode">
                        <label class="preview-question">
                            {{ $survey->questions[$i]->question }}
                        </label>
                        <div class="mb-4">
                            <p class="list-item-heading">All Responses</p>
                            <div class="scroll h-100  mt-2" style="max-height: 500px">
                                <div class="">
                                    @foreach ($allResponses->where('question_id', $survey->questions[$i]->id) as $response)
                                        <p class="mb-0 alumnus-hover alumnus-hover" title="something">
                                            {{ $response->response }}</p>
                                        <div style="background-color:white; height: 3px"></div>
                                    @endforeach




                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif ($survey->questions[$i]->option_type_id == 3)
        <div class="card question d-flex mb-4 card-style">
            <div class="d-flex flex-grow-1 min-width-zero">
                <div
                    class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                    <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1">
                        <span class="heading-number d-inline-block">{{ $i + 1 }}
                        </span>
                    </div>
                    <!-- Toggle view for chart -->
                    <div class="custom-control toggle-chart custom-checkbox pl-1 align-self-center pr-0">
                        <button class="btn btn-outline-theme-3 icon-button chart-btn" id="{{$survey->questions[$i]->id}}">
                            <i class="iconsminds-pie-chart-3"></i>
                        </button>
                    </div>
                    <!-- Toggle view for table -->
                    <div class="custom-control toggle-chart custom-checkbox pl-1 align-self-center pr-0">
                        <button class="btn btn-outline-theme-3 icon-button table-btn" id="{{$survey->questions[$i]->id}}">
                            <i class="iconsminds-align-justify-all"></i>
                        </button>
                    </div>
                    <!-- button for copying/downloading     -->
                    <div class="custom-control custom-checkbox pl-1 align-self-center pr-4">
                        <button class="btn btn-outline-theme-3 icon-button" data-toggle="dropdown">
                            <i class="iconsminds-files"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"
                                style="padding-left:20px">Download</a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">copy chart</a>
                                <a href="#" class="dropdown-item"> As jpeg file</a>
                                <a href="#" class="dropdown-item"> As excel file</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="num-response">
                <h6>{{ $survey->responses->where('question_id', $survey->questions[$i]->id)->count() }} @if ($survey->responses->where('question_id', $survey->questions[$i]->id)->count() == 1)
                        response
                    @else
                        responses
                    @endif
                </h6>
            </div>
            <div class="question-collapse collapse show" id="q{{ $survey->questions[$i]->id }}">
                <div class="card-body pt-0">

                    <div class="edit-mode">
                        <label class="preview-question">
                            {{ $survey->questions[$i]->question }}
                        </label>
                        <div id="chart-{{$survey->questions[$i]->id}}" style="display: none" class="active mb-4">
                            <canvas id="radio-{{ $i }}"></canvas>
                        </div>
                        <div style="display: none" id="table-{{$survey->questions[$i]->id}}">
                            <table class="col-12 table table-hover alyt-table-q">
                                <thead class="t-head-q">
                                    <tr>
                                        <th class="col-1">#</th>
                                        <th class="col-3">Number of respondents</th>
                                        <th class="col-8">Answer</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($survey->questions[$i]->options as $option)
                                        <tr>
                                            <td>{{$ind++}}</td>
                                            <td>{{$survey->responses->where('question_id', $survey->questions[$i]->id)->where('option_id', $option->id)->count()}}</td>
                                            <td>{{$option->option}}</td>
                                        </tr>
                                     @endforeach


                                </tbody>
                                {{-- <tbody> --}}
                                {{-- <tr>
                                        <td>1</td>
                                        <td>50</td>
                                        <td>Male</td>
                                    </tr> --}}
                                {{-- @for ($s = 1; $s <= $survey->options->where('question_id', $survey->questions[$i]->id)->count(); $s++)
                                        <tr>
                                        <td>{{$s}}</td>
                                        <td>{{$survey->responses->where('question_id', $survey->questions[$i]->id)->where('response', $survey->options->where('question_id', $survey->questions[$i]->id))->count()}}</td>
                                    </tr>
                                    @endfor --}}

                                {{-- </tbody> --}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @elseif ($survey->questions[$i]->option_type_id == 4)
        <div class="card question d-flex mb-4 card-style">
            <div class="d-flex flex-grow-1 min-width-zero">
                <div
                    class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                    <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1">
                        <span class="heading-number d-inline-block">{{ $i + 1 }}
                        </span>
                    </div>
                    <!-- Toggle view for chart -->
                    <div class="custom-control toggle-chart custom-checkbox pl-1 align-self-center pr-0">
                        <button class="btn btn-outline-theme-3 icon-button chart-btn" id="{{$survey->questions[$i]->id}}">
                            <i class="iconsminds-pie-chart-3"></i>
                        </button>
                    </div>
                    <!-- Toggle view for table -->
                    <div class="custom-control toggle-chart custom-checkbox pl-1 align-self-center pr-0">
                        <button class="btn btn-outline-theme-3 icon-button table-btn" id="{{$survey->questions[$i]->id}}">
                            <i class="iconsminds-align-justify-all"></i>
                        </button>
                    </div>
                    <!-- button for copying/downloading     -->
                    <div class="custom-control custom-checkbox pl-1 align-self-center pr-4">
                        <button class="btn btn-outline-theme-3 icon-button" data-toggle="dropdown">
                            <i class="iconsminds-files"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"
                                style="padding-left:20px">Download</a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">copy chart</a>
                                <a href="#" class="dropdown-item"> As jpeg file</a>
                                <a href="#" class="dropdown-item"> As excel file</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="question-collapse collapse show" id="q{{ $survey->questions[$i]->id }}">
                <div class="card-body pt-0">
                    {{-- view --}}
                    <div class="edit-mode">
                        <label class="preview-question">
                            {{ $survey->questions[$i]->question }}
                        </label>
                        <div id="chart-{{$survey->questions[$i]->id}}" style="display: none" class="active mb-4">
                            <canvas id="drop-{{ $i }}"></canvas>
                        </div>
                        <div style="display: none" id="table-{{$survey->questions[$i]->id}}">
                            <table class="col-12 table table-hover alyt-table-q">
                                <thead class="t-head-q">
                                    <tr>
                                        <th class="col-1">#</th>
                                        <th class="col-3">Number of respondents</th>
                                        <th class="col-8">Answer</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($survey->questions[$i]->options as $option)
                                        <tr>
                                            <td>{{$ind++}}</td>
                                            <td>{{$survey->responses->where('question_id', $survey->questions[$i]->id)->where('response', $option->option)->count()}}</td>
                                            <td>{{$option->option}}</td>
                                        </tr>
                                     @endforeach


                                </tbody>
                                {{-- <tbody> --}}
                                {{-- <tr>
                                        <td>1</td>
                                        <td>50</td>
                                        <td>Male</td>
                                    </tr> --}}
                                {{-- @for ($s = 1; $s <= $survey->options->where('question_id', $survey->questions[$i]->id)->count(); $s++)
                                        <tr>
                                        <td>{{$s}}</td>
                                        <td>{{$survey->responses->where('question_id', $survey->questions[$i]->id)->where('response', $survey->options->where('question_id', $survey->questions[$i]->id))->count()}}</td>
                                    </tr>
                                    @endfor --}}

                                {{-- </tbody> --}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif ($survey->questions[$i]->option_type_id == 5)
        <div class="card question d-flex mb-4 card-style">
            <div class="d-flex flex-grow-1 min-width-zero">
                <div
                    class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                    <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1">
                        <span class="heading-number d-inline-block">{{ $i + 1 }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="question-collapse collapse show" id="q{{ $survey->questions[$i]->id }}">
                <div class="card-body pt-0">
                    {{-- view --}}
                    <div class="edit-mode">
                        <label class="preview-question">
                            {{ $survey->questions[$i]->question }}
                        </label>
                        <div class="mb-4">
                            <canvas id="check-{{ $i }}"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif ($survey->questions[$i]->option_type_id == 6)
        <div class="card question d-flex mb-4 card-style">
            <div class="d-flex flex-grow-1 min-width-zero">
                <div
                    class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                    <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1">
                        <span class="heading-number d-inline-block">{{ $i + 1 }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="question-collapse collapse show" id="q{{ $survey->questions[$i]->id }}">
                <div class="card-body pt-0">
                    {{-- view --}}
                    <div class="edit-mode">
                        <label class="preview-question">
                            {{ $survey->questions[$i]->question }}
                        </label>
                        <div class="mb-4">
                            <canvas id="grid-{{ $i }}"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endfor

{{-- text (single/multi line) --}}
{{-- <div class="card mb-4" style="top: 115px; z-index: 0">
    <div class="card-body">
        <div class="d-flex">
            <i class="iconsminds-repeat-2 h4"></i> &nbsp;
            <p class="list-item-heading" style="position: relative; top:0.66rem">Textual Responses</p>
        </div>
        <div class="separator mb-3"></div>
        <div>
            <p class="list-item-heading" style="position: relative; top:0.66rem">Question 1</p>
        </div>
        <div class="scroll h-100  mt-2" style="max-height: 500px">
            <div class="alumnus-hover  ">
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>



            </div>

        </div>
        <div class="separator mb-3"></div>
        <div>
            <p class="list-item-heading" style="position: relative; top:0.66rem">Question 2</p>
        </div>
        <div class="scroll h-100  mt-2" style="max-height: 500px">
            <div class="alumni  alumnus-hover ">
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
                <p class="mb-0">The is Lord is Goood and all the Time God is good.</p>
                <div style="background-color:white; height: 3px"></div>
            </div>

        </div>

    </div>
</div> --}}

{{-- radio --}}
{{-- <div class="card question d-flex mb-4 edit-quesiton">
    <div class="d-flex flex-grow-1 min-width-zero">
        <div
            class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
            <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1">
                <span class="heading-number d-inline-block">3 </span>Radio Choice Type
            </div>
        </div>
        <!-- Toggle view for chart -->
        <div class="custom-control toggle-chart custom-checkbox pl-1 align-self-center pr-0">
            <button class="btn btn-outline-theme-3 icon-button" id="twelveth-tab" data-toggle="tab" href="#twelveth"
                role="tab" aria-controls="twelveth" aria-selected="false">
                <i class="iconsminds-pie-chart-3"></i>
            </button>
        </div>
        <!-- Toggle view for table -->
        <div class="custom-control toggle-chart custom-checkbox pl-1 align-self-center pr-0">
            <button class="btn btn-outline-theme-3 icon-button" id="thirteenth-tab" data-toggle="tab" href="#thirteenth"
                role="tab" aria-controls="thirteenth" aria-selected="false">
                <i class="iconsminds-align-justify-all"></i>
            </button>
        </div>
        <!-- button for copying/downloading     -->
        <div class="custom-control custom-checkbox pl-1 align-self-center pr-4">
            <button class="btn btn-outline-theme-3 icon-button" data-toggle="dropdown">
                <i class="iconsminds-files"></i>
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="padding-left:20px">Download</a>
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item">copy chart</a>
                    <a href="#" class="dropdown-item"> As jpeg file</a>
                    <a href="#" class="dropdown-item"> As excel file</a>
                </div>
            </div>
        </div>
    </div>
    <div class="num-response">
        <h6>20 responses</h6>
    </div>
    <div class="chart-radio card-body chart-body pt-0">
        <div class="tab-content mb-4">
            <div class="tab-pane show active" id="twelveth" role="tabpanel" aria-labelledby="twelvwth-tab">
                <div class="row">
                    <canvas id="radioChoice"></canvas>
                </div>
            </div>


            <div class="tab-pane show" id="thirteenth" role="tabpanel" aria-labelledby="thirteenth-tab">
                <div class=" col-12">
                    <div class="toggled-table table-scroll-q">
                        <table class="col-12 table table-hover alyt-table-q">
                            <thead class="t-head-q">
                                <tr>
                                    <th class="col-1">#</th>
                                    <th class="col-3">Number of respondents</th>
                                    <th class="col-8">Answer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>50</td>
                                    <td>Male</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>50</td>
                                    <td>Female</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>50</td>
                                    <td>Prefer Not to say</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>50</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, nisi!</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>50</td>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>50</td>
                                    <td>Lorem ipsum dolor sit.</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>50</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam quas excepturi non
                                        fugiat quis veritatis temporibus, voluptate, nulla quam animi perspiciatis
                                        labore eum? Tenetur voluptatibus, nobis quaerat nam accusantium delectus.</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>50</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, explicabo.
                                    </td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>50</td>
                                    <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>50</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam voluptas error
                                        vel unde nemo vitae ipsa minima quae doloribus, et ea provident aliquid
                                        obcaecati! Vero quae harum vitae qui non?</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>50</td>
                                    <td>Male</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>50</td>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td>50</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing.</td>
                                </tr>
                                <tr>
                                    <td>14</td>
                                    <td>50</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div> --}}

{{-- checkbox --}}
{{-- <div class="card question d-flex mb-4 edit-quesiton">
    <div class="d-flex flex-grow-1 min-width-zero">
        <div
            class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
            <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1">
                <span class="heading-number d-inline-block">5 </span>Checkbox Type
            </div>
        </div>

        <!-- Toggle view for chart -->
        <div class="custom-control toggle-chart custom-checkbox pl-1 align-self-center pr-0">
            <button class="btn btn-outline-theme-3 icon-button" id="sixth-tab" data-toggle="tab" href="#sixth"
                role="tab" aria-controls="sixth" aria-selected="false">
                <i class="simple-icon-chart"></i>
            </button>
        </div>
        <!-- Toggle view for table -->
        <div class="custom-control toggle-chart custom-checkbox pl-1 align-self-center pr-0">
            <button class="btn btn-outline-theme-3 icon-button" id="seventh-tab" data-toggle="tab" href="#seventh"
                role="tab" aria-controls="seventh" aria-selected="false">
                <i class="iconsminds-align-justify-all"></i>
            </button>
        </div>

        <div class="custom-control custom-checkbox pl-1 align-self-center pr-4">
            <button class="btn btn-outline-theme-3 icon-button" data-toggle="dropdown">
                <i class="iconsminds-files"></i>
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="padding-left:20px">Download</a>
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item">Copy chart</a>
                    <a href="#" class="dropdown-item">As jpeg file</a>
                    <a href="#" class="dropdown-item">As excel file</a>
                </div>
            </div>
        </div>
    </div>
    <div class="num-response">
        <h6>15 responses</h6>
    </div>
    <div class="chart-checkbox card-body chart-body pt-0">
        <canvas id="checkboxChoice"></canvas>

    </div>

</div> --}}

{{-- dropdown --}}
{{-- <div class="card question d-flex mb-4 edit-quesiton">
    <div class="d-flex flex-grow-1 min-width-zero">
        <div
            class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
            <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1">
                <span class="heading-number d-inline-block">6 </span>Dropdwon Choice Type
            </div>
        </div>

        <!-- Toggle view for chart -->
        <div class="custom-control toggle-chart custom-checkbox pl-1 align-self-center pr-0">
            <button class="btn btn-outline-theme-3 icon-button" id="eighth-tab" data-toggle="tab" href="#eighth"
                role="tab" aria-controls="eighth" aria-selected="false">
                <i class="iconsminds-pie-chart-3"></i>
            </button>
        </div>
        <!-- Toggle view for table -->
        <div class="custom-control toggle-chart custom-checkbox pl-1 align-self-center pr-0">
            <button class="btn btn-outline-theme-3 icon-button" id="nineth-tab" data-toggle="tab" href="#nineth"
                role="tab" aria-controls="nineth" aria-selected="false">
                <i class="iconsminds-align-justify-all"></i>
            </button>
        </div>


        <div class="custom-control custom-checkbox pl-1 align-self-center pr-4">
            <button class="btn btn-outline-theme-3 icon-button" data-toggle="dropdown">
                <i class="iconsminds-files"></i>
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="padding-left:20px">Download</a>
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item">Copy chart</a>
                    <a href="#" class="dropdown-item">As jpeg file</a>
                    <a href="#" class="dropdown-item">As excel file</a>
                </div>
            </div>
        </div>
    </div>
    <div class="num-response">
        <h6>10 responses</h6>
    </div>
    <div class="chart-radio card-body chart-body pt-0">
        <canvas id="dropdownChoice"></canvas>
    </div>

</div> --}}

{{-- Grid --}}
{{-- <div class="card card-matrixChoice question d-flex mb-4 edit-quesiton">
    <div class="d-flex flex-grow-1 min-width-zero">
        <div
            class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
            <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1">
                <span class="heading-number d-inline-block">2</span>Matrix Choice Type
            </div>
        </div>

        <!-- Toggle view for chart -->
        <div class="custom-control toggle-chart custom-checkbox pl-1 align-self-center pr-0">
            <button class="btn btn-outline-theme-3 icon-button" id="tenth-tab" data-toggle="tab" href="#tenth"
                role="tab" aria-controls="tenth" aria-selected="false">
                <i class="simple-icon-chart"></i>
            </button>
        </div>
        <!-- Toggle view for table -->
        <div class="custom-control toggle-chart custom-checkbox pl-1 align-self-center pr-0">
            <button class="btn btn-outline-theme-3 icon-button" id="eleventh-tab" data-toggle="tab" href="#eleventh"
                role="tab" aria-controls="eleventh" aria-selected="false">
                <i class="iconsminds-align-justify-all"></i>
            </button>
        </div>


        <div class="custom-control custom-checkbox pl-1 align-self-center pr-4">
            <button class="btn btn-outline-theme-3 icon-button" data-toggle="dropdown">
                <i class="iconsminds-files"></i>
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="padding-left:20px">Download</a>
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item">Copy chart</a>
                    <a href="#" class="dropdown-item">As jpeg file</a>
                    <a href="#" class="dropdown-item">As excel file</a>
                </div>
            </div>
        </div>
    </div>
    <div class="num-response">
        <h6>30 responses</h6>
    </div>
    <div class="chart card-body chart-body pt-0">
        <canvas id="matrixChoice"></canvas>

    </div>

</div> --}}



{{-- Pie chart for radio choice response type --}}
<script>
    // const data = {
    //     labels: [
    //         // 'Male', 'Female', 'Prefer Not to say', 'other', 'He', 'She', 'Him', 'With', 'Are',
    //         // 'josh', 'josh is the best of all time', 'kay is a mentor at casvalabs', 'i am happy about it',
    //         // 'python'

    //     ],
    //     datasets: [{
    //         data: [20, 60, 10, 5, 23, 34, 56, 12, 23, 24, 11, 12, 13, 14],
    //         backgroundColor: [
    //             'rgba(255, 99, 132, 0.2)',
    //             'rgba(255, 159, 64, 0.2)',
    //             'rgba(255, 205, 86, 0.2)',
    //             'rgba(75, 192, 192, 0.2)',
    //             'rgba(54, 162, 235, 0.2)',
    //             'rgba(153, 102, 255, 0.2)',
    //             'rgba(201, 203, 207, 0.2)',
    //             //added colors
    //             'rgba(99, 225, 222, 0.2)',
    //             'rgba(255, 73, 112, 0.2)',
    //             'rgba(149, 149, 149, 0.2)',
    //             'rgba(142, 77, 250, 0.2)',
    //             'rgba(80, 19, 192, 0.2)',
    //             'rgba(19, 225, 82, 0.2)',
    //             'rgba(225, 69, 0, 0.2)'
    //         ],
    //         borderColor: [
    //             'rgb(255, 99, 132)',
    //             'rgb(255, 159, 64)',
    //             'rgb(255, 205, 86)',
    //             'rgb(75, 192, 192)',
    //             'rgb(54, 162, 235)',
    //             'rgb(153, 102, 255)',
    //             'rgb(201, 203, 207)',
    //             //added colors
    //             'rgb(99, 225, 222)',
    //             'rgb(255, 73, 112)',
    //             'rgb(149, 149, 149)',
    //             'rgb(142, 77, 250)',
    //             'rgb(80, 19, 192)',
    //             'rgb(19, 225, 82)',
    //             'rgb(225, 69, 0)'
    //         ],
    //         borderWidth: 2,
    //         hoverOffset: 5,
    //         // datalabels:{
    //         //     align: 'top',
    //         //     anchor: 'end',
    //         //     offset: 8
    //         // }
    //     }, ],

    // };

    // //config for pie chart with radio choices
    // const config_radio = {
    //     type: 'doughnut',
    //     data: data,
    //     options: {
    //         responsive: true,
    //         plugins: {
    //             legend: {
    //                 display: true,
    //                 position: "right"
    //             },
    //             tooltip: {
    //                 enabled: true
    //             },
    //             datalabels: {
    //                 align: 'center',
    //                 formatter: (value, context) => {
    //                     //console.log(value)
    //                     //console.log(context.chart.data.datasets[0].data)
    //                     const datapoints = context.chart.data.datasets[0].data;

    //                     function totalSum(total, datapoint) {
    //                         return total + datapoint;
    //                     }
    //                     const totalValue = datapoints.reduce(totalSum, 0);
    //                     const percentageValue = (value / totalValue * 100).toFixed(0);
    //                     const displayData = [`${value}`, `(${percentageValue}%)`]
    //                     return displayData;
    //                 }
    //             }
    //         },
    //     },
    //     plugins: [ChartDataLabels]
    // };

    // //config for bar chart with checkbox type choices
    // const config_checkbox = {
    //     type: 'bar',
    //     data,
    //     options: {
    //         responsive: true,
    //         plugins: {
    //             labels: {
    //                 render: 'percentage',
    //                 showActualPercentages: true,
    //                 precision: 0
    //             },
    //             legend: {
    //                 display: false,
    //                 position: "right"
    //             },
    //             //     datalabels:{
    //             //     formatter: (value, datainfo) =>{
    //             //     console.log(value)
    //             //     console.log(datainfo.chart.data.datasets[1].data)
    //             //     const datavalues = datainfo.chart.data.datasets[1].data;
    //             //     function totalSum( total, datavalues){
    //             //         return total + datavalues;
    //             //     }
    //             //     const totalValue1 = datavalues.reduce(totalSum, 0);
    //             //     const percentageValue1 = (value/ totalValue1 * 100).toFixed(0);
    //             //     const displayData1 = [`${value}`,`(${percentageValue1}%)`]
    //             //     return displayData;
    //             // }

    //             // }
    //         },
    //         tooltip: {
    //             enabled: true,
    //         },

    //         indexAxis: 'y',
    //         scales: {
    //             y: {
    //                 beginAtZero: true
    //             }
    //         },

    //     },
    //     plugins: [ChartDataLabels]
    // };

    // //config for muti-bar chart for matrix/grid choice response type
    // const config_matrix = {
    //     type: 'bar',
    //     data: {
    //         labels: [
    //             'Practical skills', 'Subject knowledge', 'Creativity and innovation',
    //             'Critical thinking skills', 'Educational background', 'Programme of study',
    //             'Work experience', 'Basic computer literacy', 'Oral communication', 'Team work',
    //             'Written communication', 'Entrepreneurial skills', 'Ethics (Loyalty, integrity)',
    //         ],
    //         datasets: [{
    //                 label: 'Not Important',
    //                 data: [20, 60, 10, 5, 23, 34, 56, 12, 23, 24, 11, 12, 13],
    //                 backgroundColor: [
    //                     'rgba(255, 99, 132, 0.2)',

    //                 ],
    //                 borderColor: [
    //                     'rgb(225, 99, 132)',

    //                 ],
    //                 borderWidth: 2,
    //                 hoverOffset: 5,


    //             }, {
    //                 label: 'Fairly Important',
    //                 data: [10, 50, 70, 15, 13, 24, 36, 2, 63, 84, 31, 19, 73],
    //                 backgroundColor: [
    //                     'rgba(54, 162, 235, 0.2)' //blue

    //                 ],
    //                 borderColor: [
    //                     'rgb(54, 162, 235)'

    //                 ],
    //                 borderWidth: 2,
    //                 hoverOffset: 5,

    //             },
    //             {
    //                 label: 'Highly Important',
    //                 data: [30, 20, 19, 51, 3, 4, 6, 19, 25, 29, 1, 38, 3],
    //                 backgroundColor: [
    //                     'rgba(142, 77, 250, 0.2)', //voilet 
    //                 ],
    //                 borderColor: [
    //                     'rgb(142, 77, 250)'
    //                 ],
    //                 borderWidth: 2,
    //                 hoverOffset: 5,

    //             },

    //         ]
    //     },
    //     options: {
    //         responsive: true,
    //         plugins: {
    //             legend: {
    //                 display: true,
    //                 position: "top"
    //             }
    //         },
    //         // indexAxis: 'y',    
    //         scales: {
    //             y: {
    //                 beginAtZero: true
    //             }
    //         }
    //     },
    //     //   plugins:[ChartDataLabels]
    // };

    $backgroundColor = [
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(201, 203, 207, 0.2)',
            //added colors
            'rgba(99, 225, 222, 0.2)',
            'rgba(255, 73, 112, 0.2)',
            'rgba(149, 149, 149, 0.2)',
            'rgba(142, 77, 250, 0.2)',
            'rgba(80, 19, 192, 0.2)',
            'rgba(19, 225, 82, 0.2)',
            'rgba(225, 69, 0, 0.2)'
        ],

        $borderColor = [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)',
            'rgb(153, 102, 255)',
            'rgb(201, 203, 207)',
            //added colors
            'rgb(99, 225, 222)',
            'rgb(255, 73, 112)',
            'rgb(149, 149, 149)',
            'rgb(142, 77, 250)',
            'rgb(80, 19, 192)',
            'rgb(19, 225, 82)',
            'rgb(225, 69, 0)'
        ],

        @for ($i = 0; $i < count($survey->questions); $i++)
            @if ($survey->questions[$i]->option_type_id == 3)
                // <canvas id="radio-{{ $i }}"></canvas>
                new Chart(document.getElementById('radio-{{ $i }}'), {
                type: 'doughnut',
                data: {
                labels: [
                @foreach ($survey->options->where('question_id', $survey->questions[$i]->id) as $option)
                    "{{ $option->option }}",
                @endforeach
                ],
                datasets: [{
                data: [
                @foreach ($survey->options->where('question_id', $survey->questions[$i]->id) as $option)
                    {{ $survey->responses->where('question_id', $survey->questions[$i]->id)->where('response', $option->option)->count() }},
                @endforeach
            
                ],
                backgroundColor: $backgroundColor,
                borderColor: $borderColor,
                borderWidth: 2,
                hoverOffset: 5,
                }]
                },
                options: {
                responsive: true,
                plugins: {
                legend: {
                display: true,
                position: "right"
                },
                tooltip: {
                enabled: true
                },
                datalabels: {
                align: 'center',
                formatter: (value, context) => {
                //console.log(value)
                //console.log(context.chart.data.datasets[0].data)
                const datapoints = context.chart.data.datasets[0].data;
            
                function totalSum(total, datapoint) {
                return total + datapoint;
                }
                const totalValue = datapoints.reduce(totalSum, 0);
                const percentageValue = (value / totalValue * 100).toFixed(0);
                const displayData = [`${value}`, `(${percentageValue}%)`]
                return displayData;
                }
                }
                },
                },
                plugins: [ChartDataLabels]
                });
            @elseif ($survey->questions[$i]->option_type_id == 4)
                // <canvas id="drop-{{ $i }}"></canvas>
                new Chart(document.getElementById('drop-{{ $i }}'), {
                type: 'doughnut',
                data: {
                labels: [
                @foreach ($survey->options->where('question_id', $survey->questions[$i]->id) as $option)
                    "{{ $option->option }}",
                @endforeach
                ],
                datasets: [{
                data: [
                @foreach ($survey->options->where('question_id', $survey->questions[$i]->id) as $option)
                    {{ $survey->responses->where('question_id', $survey->questions[$i]->id)->where('response', $option->option)->count() }},
                @endforeach
            
                ],
                backgroundColor: $backgroundColor,
                borderColor: $borderColor,
                borderWidth: 2,
                hoverOffset: 5,
                }]
                },
                options: {
                responsive: true,
                plugins: {
                legend: {
                display: true,
                position: "right"
                },
                tooltip: {
                enabled: true
                },
                datalabels: {
                align: 'center',
                formatter: (value, context) => {
                //console.log(value)
                //console.log(context.chart.data.datasets[0].data)
                const datapoints = context.chart.data.datasets[0].data;
            
                function totalSum(total, datapoint) {
                return total + datapoint;
                }
                const totalValue = datapoints.reduce(totalSum, 0);
                const percentageValue = (value / totalValue * 100).toFixed(0);
                const displayData = [`${value}`, `(${percentageValue}%)`]
                return displayData;
                }
                }
                },
                },
                plugins: [ChartDataLabels]
                });
            @elseif ($survey->questions[$i]->option_type_id == 5)
                // <canvas id="check-{{ $i }}"></canvas>
                new Chart(document.getElementById('check-{{ $i }}'), {
                type: 'bar',
                data: {
                labels: [
                @foreach ($survey->options->where('question_id', $survey->questions[$i]->id) as $option)
                    "{{ $option->option }}",
                @endforeach
                ],
                datasets: [{
                data: [
                @foreach ($survey->options->where('question_id', $survey->questions[$i]->id) as $option)
                    {{ $survey->responses->where('question_id', $survey->questions[$i]->id)->where('response', $option->option)->count() }},
                @endforeach
                ],
                backgroundColor: $backgroundColor,
                borderColor: $borderColor,
                borderWidth: 2,
                hoverOffset: 5,
                }, ],
            
                },
                options: {
                responsive: true,
                plugins: {
                labels: {
                render: 'percentage',
                showActualPercentages: true,
                precision: 0
                },
                legend: {
                display: false,
                position: "right"
                },
                // datalabels:{
                // formatter: (value, datainfo) =>{
                // console.log(value)
                // console.log(datainfo.chart.data.datasets[1].data)
                // const datavalues = datainfo.chart.data.datasets[1].data;
                // function totalSum( total, datavalues){
                // return total + datavalues;
                // }
                // const totalValue1 = datavalues.reduce(totalSum, 0);
                // const percentageValue1 = (value/ totalValue1 * 100).toFixed(0);
                // const displayData1 = [`${value}`,`(${percentageValue1}%)`]
                // return displayData;
                // }
            
                // }
                },
                tooltip: {
                enabled: true,
                },
            
                indexAxis: 'y',
                scales: {
                y: {
                beginAtZero: true
                }
                },
            
                },
                plugins: [ChartDataLabels]
                });
            @elseif ($survey->questions[$i]->option_type_id == 6)
                // <canvas id="grid-{{ $i }}"></canvas>
                new Chart(document.getElementById('grid-{{ $i }}'), {
                type: 'bar',
                data: {
                labels: [
                @foreach ($survey->options->where('question_id', $survey->questions[$i]->id)->where('row_column', 'row') as $row)
                    "{{ $row->option }}",
                @endforeach
                ],
                datasets: [
                @foreach ($survey->options->where('question_id', $survey->questions[$i]->id)->where('row_column', 'column') as $column)
                    {
                    label: '{{ $column->option }}',
                    data: [
                    @foreach ($survey->options->where('question_id', $survey->questions[$i]->id)->where('row_column', 'row') as $row)
                        {{ $survey->responses->where('question_id', $survey->questions[$i]->id)->where('response', $column->option)->where('option_id', $row->id)->count() }},
                    @endforeach
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)',
                        //added colors
                        'rgba(99, 225, 222, 0.2)',
                        'rgba(255, 73, 112, 0.2)',
                        'rgba(149, 149, 149, 0.2)',
                        'rgba(142, 77, 250, 0.2)',
                        'rgba(80, 19, 192, 0.2)',
                        'rgba(19, 225, 82, 0.2)',
                        'rgba(225, 69, 0, 0.2)',
                        //newly added colors
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)',
                        'rgba(99, 225, 222, 0.2)',
                        'rgba(255, 73, 112, 0.2)',
                        'rgba(149, 149, 149, 0.2)',
                        'rgba(142, 77, 250, 0.2)',
            
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)',
                        // added colors
                        'rgb(99, 225, 222)',
                        'rgb(255, 73, 112)',
                        'rgb(149, 149, 149)',
                        'rgb(142, 77, 250)',
                        'rgb(80, 19, 192)',
                        'rgb(19, 225, 82)',
                        'rgb(225, 69, 0)',
                        //newly added colors
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)',
                        'rgb(99, 225, 222)',
                        'rgb(255, 73, 112)',
                        'rgb(149, 149, 149)',
                        'rgb(142, 77, 250)',
            
                    ],
                    borderWidth: 2,
                    hoverOffset: 5,
            
            
                    },
                @endforeach
                // {
                // label: 'Fairly Important',
                // data: [10, 50, 70, 15, 13, 24, 36, 2, 63, 84, 31, 19, 73],
                // backgroundColor: [
                // 'rgba(54, 162, 235, 0.2)' //blue
            
                // ],
                // borderColor: [
                // 'rgb(54, 162, 235)'
            
                // ],
                // borderWidth: 2,
                // hoverOffset: 5,
            
                // },
                // {
                // label: 'Highly Important',
                // data: [30, 20, 19, 51, 3, 4, 6, 19, 25, 29, 1, 38, 3],
                // backgroundColor: [
                // 'rgba(142, 77, 250, 0.2)', //voilet
                // ],
                // borderColor: [
                // 'rgb(142, 77, 250)'
                // ],
                // borderWidth: 2,
                // hoverOffset: 5,
            
                // },
            
                ]
                },
                options: {
                responsive: true,
                plugins: {
                legend: {
                display: true,
                position: "top"
                }
                },
                // indexAxis: 'y',
                scales: {
                y: {
                beginAtZero: true
                }
                }
                },
                // plugins:[ChartDataLabels]
                });
            @endif
        @endfor
    //render pie chart for radio choice types

    //render pie chart for dropdown choice types


    //render bar chart

    //render multi-bar chart
</script>
