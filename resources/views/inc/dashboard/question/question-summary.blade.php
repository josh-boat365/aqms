{{-- make description editable --}}
{{-- swap colors --}}
<form action="{{ route('survey.update') }}" method="post" id="update-form" class="row col">
    @csrf
    <input type="hidden" name="survey_id" value="{{$survey->id}}">
    <div class="col-lg-4 col-12 mb-4">
        <div class="card mb-4">
            <div class="position-absolute card-top-buttons"><div class="btn btn-header-light icon-button desc-edit"><i
                        class="simple-icon-pencil"></i></div></div>
            <div class="card-body">
                <p class="list-item-heading mb-4">Summary</p>
                <p class="text-muted text-small mb-2">Name</p>
                <p class="mb-3 name">{{ $survey->name }}</p>
                <input type="text" class="form-control" id="survey-name" style="display: none" name='name' value="{{ $survey->name }}">
                <p class="text-muted text-small mb-2">Description</p>
                <p class="desc mb-3">{{ $survey->description }}</p>
                <textarea class="form-control" id="survey-description" rows="10" style="display: none"
                    name="description">{{ $survey->description }}</textarea>
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
