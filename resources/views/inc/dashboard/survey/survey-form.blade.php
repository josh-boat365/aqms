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
                    @error('title')
                        <div class="invalid-tooltip d-block">{{ $message }}</div>
                    @enderror
                    <div class="text-muted float-right" style="font-size: 10px">Survey title must be unique</div>
                </div>

                <div class="form-group has-float-label position-relative"><label
                        class="font-weight-bold">Description</label>
                    <textarea placeholder="" id="description" class="form-control rounded" rows="2" name="description">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-tooltip d-block">{{ $message }}</div>
                    @enderror
                    <div class="text-muted float-right"style="font-size: 10px">Survey description must me at 150
                        characters</div>
                </div>
                {{-- <div class="form-group"><label>Category</label> <select
                        class="form-control">
                        <option label="&nbsp;">&nbsp;</option>
                        <option value="Flexbox">Flexbox</option>
                        <option value="Sass">Sass</option>
                        <option value="React">React</option>
                    </select></div> --}}
                {{-- <div class="form-group"><label>Status</label>
                    <div class="custom-control custom-checkbox"><input type="checkbox"
                            class="custom-control-input" id="customCheck1"> <label
                            class="custom-control-label"
                            for="customCheck1">Completed</label></div>
                </div> --}}
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                    <input type="submit" value="Add" class="btn btn-primary">
                    {{-- <div id="add_survey" class="btn btn-primary"> Add </div> --}}
                </div>
            </form>
        </div>

    </div>
</div>
