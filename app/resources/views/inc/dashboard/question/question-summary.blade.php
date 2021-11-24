<div class="col-lg-4 col-12 mb-4">
    <div class="card mb-4">
        <div class="position-absolute card-top-buttons"><button class="btn btn-header-light icon-button"><i class="simple-icon-pencil"></i></button></div>
        <div class="card-body">
            <p class="list-item-heading mb-4">Summary</p>
            <p class="text-muted text-small mb-2">Name</p>
            <p class="mb-3">{{ $survey->name }}</p>
            <p class="text-muted text-small mb-2">Description</p>
            <p class="mb-3">{{ $survey->description }}</p>
            <p class="text-muted text-small mb-2">Create Date</p>
            <p class="mb-3">{{ $survey->created_at->format('Y-m-d') }} </p>
            {{-- <p class="text-muted text-small mb-2">Labels</p>
            <div>
                <p class="d-sm-inline-block mb-1"><a href="#"><span class="badge badge-pill badge-outline-theme-3 mb-1">EDUCATION</span></a></p>
                <p class="d-sm-inline-block mb-1"><a href="#"><span class="badge badge-pill badge-outline-secondary mb-1">PERSONAL</span></a></p>
            </div> --}}
        </div>
    </div>
</div>