{{-- make description editable --}}
{{-- swap colors --}}
{{-- css for bootstrap floating labels --}}
<link rel="stylesheet" href="{{ asset('css/vendor/bootstrap-float-label.min.css') }}">


    {{-- Message for Warnings --}}
    <div class="modal fade " id="editEpirationDateModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog bg-transparent" role="document">
            <div class="modal-content" style="border-radius:1rem; ">
                <div class="modal-header bg-danger text-white">
                    <h3 class="modal-title">WARNING!</h3><button type="button" class="close" data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <h3>Deployed surveys can't be further edited</h3>
                    <br>
                    <br>
                    {{-- <h6>Click on date field to set date.</h6> --}}
                    <label class="form-group has-float-label">
                        <input id="exp-date" type="date" id="exp_date_field"
                        @if ($survey->status_id == 2)
                            value="{{ $survey->expire_at->format('Y-m-d') }}">
                            @endif
                        {{-- @yield('exp-date-input') --}}
                        {{-- <input class="form-control datepicker exp-date"
                                                    placeholder=" enter expiration date"> --}}
                        <span>Expiration Date</span>
                    </label>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('survey.show.updateExpirationDate', $survey) }}" method="post"
                        id="deploy-form">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="date" id="date_input_submit" class="date">
                        @csrf

                        <input style="display: none" id="dep_btn" type="submit" value="Deploy"
                            class="btn btn-secondary deploy-btn">
                    </form>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    @if ($survey->status_id == 2)
                    <form action="{{route('survey.show.archive', $survey)}}" method="post" style="display: none" id="archive-form">
                        <input type="hidden" name="_method" value="PUT">
                        @csrf
                    </form>
                @endif

<form action="{{ route('survey.update') }}" method="post" id="update-form" class="row col">
    @csrf
    <input type="hidden" name="survey_id" value="{{ $survey->id }}">
    <div class="col-lg-4 col-12 mb-4">
        <div class="card mb-4">
            <div class="position-absolute card-top-buttons">
                @error('description')
                    <div class="btn icon-button btn-outline-theme-3 summary-edit desc-save"><i class="simple-icon-eye"></i>
                    </div>
                @else
                    <div class="btn btn-header-light icon-button summary-edit desc-edit"><i class="simple-icon-pencil"></i>
                    </div>
                @enderror
            </div>
            <div class="card-body">
                <p class="list-item-heading mb-4">Summary</p>
                <p class="text-muted text-small mb-2">Name</p>
                <p class="mb-3 name" @error('description') style="display: none" @enderror>{{ $survey->name }}</p>
                <input type="text" class="form-control" id="survey-name"
                    @error('description')  @else style="display: none" @enderror name='name'
                    value="{{ $survey->name }}">
                <p class="text-muted text-small mb-2">Description</p>
                <p class="desc mb-3" @error('description') style="display: none" @enderror>
                    @error('description')
                        {{ old('description') }}
                    @else
                        {{ $survey->description }}
                    @enderror
                </p>
                <textarea class="form-control" id="survey-description" rows="10"
                    @error('description') style="border: 1px solid red" @else style="display: none" @enderror name="description">
@error('description')
{{ old('description') }}
@else
{{ $survey->description }}
@enderror
</textarea>
                @error('description')
                    <p class=" text-small mb-2 text-danger">max: 250</p>
                @enderror

                <p class="text-muted text-small mb-2">Date Created</p>
                <p class="mb-3">{{ $survey->created_at->format('Y-m-d') }} </p>
                <p class="text-muted text-small mb-2">Expiration Date</p>
                <div class="d-flex justify-content-between position-relative mb-3">
                    <p class="m-0">
                        @if ($survey->expire_at != null)
                            {{ $survey->expire_at->format('Y-m-d') }}
                        @else
                            ----:--:--
                        @endif
                    </p>

                    @if ($survey->status_id == 2)
                        <div class="position-absolute" style="right: 0; top: -7px">
                            <a href="#editEpirationDateModal" id="editEpirationDateModalBtn">
                                <div class="btn btn-header-light icon-button"><i class="simple-icon-pencil"></i>
                                </div>
                            </a>
                        </div>
                    @endif


                    {{-- <a href="#editEpirationDateModal" id="editEpirationDateModalBtn">
                        <div class="btn btn-header-light icon-button" style="position: relative;left: 90%;"><i
                                class="simple-icon-pencil"></i>
                        </div>
                    </a> --}}
                </div>

                


                <label for="" class="form-group has-float-label"
                    style="border: #c8d2dc solid 1px;border-radius: 20px; max-width:100%">
                    <div style="padding: 1rem">
                        {{-- @if ($survey->status_id == 2)
                        <button class="btn btn-outline-secondary" style="width: 10rem">Draft</button><br>
                        @endif --}}
                        @if ($survey->status_id == 1)
                        <a id="editEpirationDateModalBtn" class="btn btn-outline-success" style="width: 10rem">Deploy</a><br>
                        @endif
                        @if ($survey->status_id == 2)
                        <div id="archive-btn"  class="btn btn-outline-danger" style="width: 10rem">Archive</div>
                        @endif
                        @if ($survey->status_id == 3)
                        <div id="response-btn"  class="btn btn-outline-info" style="width: 10rem">View Responses</div>
                        @endif
                        
                        
                        
                    </div>
                    <span>Set Survey Status </span>
                </label>
            </div>


        </div>
    </div>
    {{-- date picker js  --}}
    <script src="{{ asset('js/vendor/bootstrap-datepicker.js') }}"></script>
    <script>
        // $('#editEpirationDateModalBtn').on('click', );
        $('#editEpirationDateModalBtn').on('click', function() {
            $('#editEpirationDateModal').modal('show');
        });
    </script>
