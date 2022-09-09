<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title font-weight-bold h5">Add New Survey</h5><button type="button" class="close"
                data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            {{-- update style --}}
            <form class="tooltip-right-bottom" method="POST" novalidate action="{{ route('survey.store') }}">
                @csrf
                {{-- {{ $errors }} --}}
                <div class="form-group has-float-label position-relative"><label class="font-weight-bold">Title</label>
                    <input type="text" id="title" class="form-control rounded" value="{{ old('title') }}"
                        name="title">
                    <h6 class="text-muted" style="font-size: 0.65rem;float: right;">Title must be unique</h6>
                    @error('title')
                        <div class="invalid-tooltip d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group has-float-label position-relative"><label
                        class="font-weight-bold">Description</label>
                    <textarea placeholder="" id="description" class="form-control rounded" rows="2" name="description">{{ old('description') }}</textarea>
                    <h6 class="text-muted" style="font-size: 0.65rem;float: right;">Description must be greater
                        than 150 characters</h6>
                    @error('description')
                        <div class="invalid-tooltip d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                    <input type="submit" value="Add" class="btn btn-primary">
                    {{-- <div id="add_survey" class="btn btn-primary"> Add </div> --}}
                </div>
            </form>
        </div>

    </div>
</div>
