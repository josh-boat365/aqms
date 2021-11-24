<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Add New Survey</h5><button type="button" class="close"
                data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <form class="tooltip-right-bottom" method="POST" novalidate action="{{ route('survey.store') }}">
                @csrf
                {{-- {{ $errors }} --}}
                <div class="form-group has-float-label position-relative"><label>Title</label>
                    <input type="text" class="form-control" value="{{old('title')}}" name="title">
                    @error('title')
                        <div class="invalid-tooltip d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group"><label>Details</label>
                    <textarea placeholder="" class="form-control" rows="2" name="details">{{old('details')}}</textarea>
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
                <div class="modal-footer"><button type="button" class="btn btn-outline-primary"
                        data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-primary" value="Add">
                </div>
            </form>
        </div>

    </div>
</div>
