<main>
    <div class="container-fluid">
        <div class="row app-row">
            <div class="col-12 survey-app">
                <div class="mb-2">
                    {{-- <h1>{{$survey->name}}</h1> --}}
                    <div class="text-zero top-right-button-container"><button type="button"
                            class="btn btn-lg btn-outline-primary dropdown-toggle dropdown-toggle-split top-right-button top-right-button-single"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ACTIONS</button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a> <a
                                class="dropdown-item" href="#">Another action</a></div>
                    </div>
                </div>
                <ul class="nav nav-tabs separator-tabs ml-0 mb-5" role="tablist">
                    {{-- <li class="nav-item"><a class="nav-link active" id="first-tab" data-toggle="tab" href="#first"
                            role="tab" aria-controls="first" aria-selected="true">DETAILS</a></li> --}}

                    <li class="nav-item"><a class="nav-link active" id="third-tab" data-toggle="tab" href="#third"
                            role="tab" aria-controls="third" aria-selected="false">SUBMITTED RESPONSES</a></li>
                </ul>
                <div class="tab-content mb-4">
                    <div class="tab-pane show active" id="third" role="tabpanel" aria-labelledby="third-tab">
                        <div class="row">
                            <div class="col-lg-4 col-12 mb-4">

                                @include('inc.dashboard.responses.alumni-list')
                            </div>
                            <div class="col-12 col-lg-8">

                                @foreach ($submissions as $submission)


                                    <div class="col-12 {{ $submission->user_id }} ques" style="display: none;">
                                        @for ($i = 0; $i < count($survey->questions); $i++)
                                            <div class="card question d-flex mb-4 card-style">
                                                <div class="d-flex flex-grow-1 min-width-zero">
                                                    <div
                                                        class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                                                        <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1">
                                                            <span
                                                                class="heading-number d-inline-block">{{ $i + 1 }}
                                                            </span></div>
                                                    </div>
                                                </div>
                                                <div class="question-collapse collapse show"
                                                    id="q{{ $survey->questions[$i]->id }}">
                                                    <div class="card-body pt-0">
                                                        {{-- view --}}
                                                        <div class="edit-mode">
                                                            <label class="preview-question">
                                                                {{ $survey->questions[$i]->question }}
                                                            </label>
                                                            <div class="mb-4">
                                                                @if ($survey->questions[$i]->option_type_id == 1)
                                                                    <input class="form-control trim" type="text"
                                                                        name="ans[{{ $survey->questions[$i]->id }}]"
                                                                        value="@foreach ($allResponses->where('user_id', $submission->user_id) as $response)@if ($response->question_id == $survey->questions[$i]->id){{ $response->response }}@endif @endforeach" disabled>
                                                                @elseif ($survey->questions[$i]->option_type_id ==
                                                                    2)
                                                                    <textarea class="form-control trim"
                                                                        name="ans[{{ $survey->questions[$i]->id }}]"
                                                                        cols="30" rows="2"
                                                                        disabled>@foreach ($allResponses->where('user_id', $submission->user_id) as $response)@if ($response->question_id == $survey->questions[$i]->id){{ $response->response }}@endif @endforeach</textarea>

                                                                @elseif ($survey->questions[$i]->option_type_id ==
                                                                    3)
                                                                    @foreach ($survey->options->where('question_id', $survey->questions[$i]->id) as $option)
                                                                        <div class="custom-control custom-radio"><input
                                                                                value="{{ $option->option }}"
                                                                                type="radio"
                                                                                @foreach ($allResponses->where('user_id', $submission->user_id) as $response)@if ($response->response == $option->option) checked @endif @endforeach
                                                                                id="o{{ $option->id }}"
                                                                                name="ans[{{ $survey->questions[$i]->id }}]"
                                                                                class="custom-control-input" disabled>
                                                                            <label class="custom-control-label"
                                                                                for="o{{ $option->id }}">{{ $option->option }}</label>
                                                                        </div>
                                                                    @endforeach
                                                                @elseif ($survey->questions[$i]->option_type_id ==
                                                                    4)
                                                                    @foreach ($survey->options->where('question_id', $survey->questions[$i]->id) as $option)
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input value="{{ $option->option }}"
                                                                                class="custom-control-input"
                                                                                type="checkbox"
                                                                                @foreach ($allResponses->where('user_id', $submission->user_id) as $response)@if ($response->response == $option->option) checked @endif @endforeach
                                                                                name="ans[{{ $survey->questions[$i]->id }}][{{ $option->id }}]"
                                                                                class="form-control"
                                                                                id="o{{ $option->id }}" disabled>
                                                                            <label for="o{{ $option->id }}"
                                                                                class="custom-control-label">{{ $option->option }}</label>
                                                                        </div>

                                                                    @endforeach


                                                                @else
                                                                    <div class="row col-12">
                                                                        <div class="d-flex flex-column col-2">
                                                                            <div style="height: 50px"></div>
                                                                            @foreach ($survey->options->where('question_id', $survey->questions[$i]->id) as $option)
                                                                                <div class="text-center">
                                                                                    {{ $option->option }}</div>
                                                                            @endforeach
                                                                        </div>
                                                                        <div class="col-10 row"
                                                                            style="flex-wrap: nowrap">
                                                                            @foreach ($survey->columns->where('question_id', $survey->questions[$i]->id) as $column)
                                                                                <div class="d-flex flex-column justify-content-between"
                                                                                    style="width: 100px; height: 100%; min-width:100px">
                                                                                    <div style="height: 50px"
                                                                                        class="d-flex align-items-center justify-content-center w-100">
                                                                                        {{ $column->question }}
                                                                                    </div>
                                                                                    @foreach ($survey->options->where('question_id', $survey->questions[$i]->id) as $option)
                                                                                        <div class="d-flex justify-content-center">
                                                                                            <input  type="radio"  id="" @foreach ($allResponses->where('user_id', $submission->user_id) as $response)@if ($response->response == $column->question) @if ($response->option_id == $option->id) checked @endif @endif @endforeach disabled>
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
                                        @endfor
                                    </div>


                                @endforeach
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="app-menu">
        <div class="p-4 h-100">
            <div class="scroll">
                <p class="text-muted text-small">Status</p>
                <ul class="list-unstyled mb-5">
                    @yield('stat')
                </ul>
                {{-- <p class="text-muted text-small">Categories</p>
                <ul class="list-unstyled mb-5">
                    <li>
                        <div class="custom-control custom-checkbox mb-2"><input type="checkbox" class="custom-control-input"
                                id="category1"> <label class="custom-control-label" for="category1">Development</label>
                        </div>
                    </li>
                    <li>
                        <div class="custom-control custom-checkbox mb-2"><input type="checkbox" class="custom-control-input"
                                id="category2"> <label class="custom-control-label" for="category2">Workplace</label></div>
                    </li>
                    <li>
                        <div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input"
                                id="category3"> <label class="custom-control-label" for="category3">Hardware</label></div>
                    </li>
                </ul>
                <p class="text-muted text-small">Labels</p>
                <div>
                    <p class="d-sm-inline-block mb-1"><a href="#"><span
                                class="badge badge-pill badge-outline-primary mb-1">NEW FRAMEWORK</span></a></p>
                    <p class="d-sm-inline-block mb-1"><a href="#"><span
                                class="badge badge-pill badge-outline-theme-3 mb-1">EDUCATION</span></a></p>
                    <p class="d-sm-inline-block mb-1"><a href="#"><span
                                class="badge badge-pill badge-outline-secondary mb-1">PERSONAL</span></a></p>
                </div> --}}
            </div>
        </div><a class="app-menu-button d-inline-block d-xl-none" href="#"><i class="simple-icon-options"></i></a>
    </div>

</main>
