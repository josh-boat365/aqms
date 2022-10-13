{{-- make description editable --}}
{{-- swap colors --}}
{{-- css for bootstrap floating labels --}}
<link rel="stylesheet" href="{{ asset('css/vendor/bootstrap-float-label.min.css') }}">
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
                <label class="form-group has-float-label">
                    <input type="date" id="exp_date_field">
                    {{-- <input type="date" id="exp_date_field" > --}}
                    <span>Expiration Date</span>
                </label>


                <label for="" class="form-group has-float-label"
                    style="border: #c8d2dc solid 1px;border-radius: 20px;">
                    <div style="padding: 1rem">
                        <button class="btn btn-outline-secondary" style="width: 10rem">Draft</button><br>
                        <button class="btn btn-outline-success" style="width: 10rem">Deploy</button><br>
                        <button class="btn btn-outline-danger" style="width: 10rem">Archive</button>
                    </div>
                    <span>Set Survey Status </span>
                </label>
            </div>
        </div>
    </div>
    {{-- date picker js  --}}
    <script src="{{ asset('js/vendor/bootstrap-datepicker.js') }}"></script>
