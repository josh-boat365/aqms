{{-- make description editable --}}
{{-- swap colors --}}
<form action="{{ route('survey.update') }}" method="post" id="update-form" class="row col">
    @csrf
    <input type="hidden" name="survey_id" value="{{ $survey->id }}">
    <div class="col-lg-4 col-12 mb-4">
        <div class="card mb-4">
            <div class="position-absolute card-top-buttons">
                @error('description')
                <div class="btn icon-button btn-outline-theme-3 summary-edit desc-save"><i class="simple-icon-eye"></i></div>
                @else
                <div class="btn btn-header-light icon-button summary-edit desc-edit"><i class="simple-icon-pencil"></i></div>
                @enderror
            </div>
            <div class="card-body">
                <p class="list-item-heading mb-4">Summary</p>
                <p class="text-muted text-small mb-2">Name</p>
                <p class="mb-3 name" @error('description') style="display: none" @enderror>{{ $survey->name }}</p>
                <input type="text" class="form-control" id="survey-name"  @error('description')  @else style="display: none" @enderror name='name'
                    value="{{ $survey->name }}">
                <p class="text-muted text-small mb-2">Description</p>
                <p class="desc mb-3" @error('description') style="display: none" @enderror>@error('description'){{ old('description') }} @else {{ $survey->description }} @enderror</p>
                <textarea class="form-control" id="survey-description" rows="10" @error('description') style="border: 1px solid red" @else style="display: none" @enderror
                    name="description">@error('description') {{ old('description') }} @else {{ $survey->description }} @enderror
                    </textarea>
                @error('description') <p class=" text-small mb-2 text-danger">max: 250</p> @enderror
                
                <p class="text-muted text-small mb-2">Date Created</p>
                <p class="mb-3">{{ $survey->created_at->format('Y-m-d') }} </p>
                {{-- <p class="text-muted text-small mb-2">Labels</p>
            <div>
                <p class="d-sm-inline-block mb-1"><a href="#"><span class="badge badge-pill badge-outline-theme-3 mb-1">EDUCATION</span></a></p>
                <p class="d-sm-inline-block mb-1"><a href="#"><span class="badge badge-pill badge-outline-secondary mb-1">PERSONAL</span></a></p>
            </div> --}}
            </div>
        </div>
    </div>
