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
                                                                        <div class="custom-control d-flex custom-checkbox">
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