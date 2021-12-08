<div class="card d-flex flex-row mb-3">
    <div class="d-flex flex-grow-1 min-width-zero">
        <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
           <div class="col-3">
            <h5 class="font-weight-bold h5">Title</h5>
            <a class="list-item-heading mb-0 truncate w-40 w-xs-100 mt-0"
                href="{{ url('/home/surveys/' . $survey->id) }}">
                {{-- <i
                    class="
                @if ($status->id == '1')
                simple-icon-refresh heading-icon
                @else
                simple-icon-check heading-icon
                @endif
                "></i> --}}

                <div class="align-middle d-inline-block">{{$survey->name}}</div>
            </a>
           </div>
           
           <div class="col-3  ">
            <h5 class="font-weight-bold h5">Progress</h5>
            <div class="w-15 w-xs-100">
                <p class="mb-0 text-muted font-weight-bold  text-medium">4/50</p>
            </div>
            
           </div>
            
            <div class="col-3 ">
                <h5 class="font-weight-bold h5">Date Updated</h5>
                <div class="w-8 w-xs-100">
                    <p class="mb-0 text-muted font-weight-bold text-medium">{{$survey->created_at->format('Y-m-d') }}</p>
                </div>
            </div>

            <div class="col-3 ">
                <h5 class="font-weight-bold h5">Expiration Date</h5>
                <div class="w-8 w-xs-100">
                    <p class="mb-0 text-muted font-weight-bold text-medium">{{$survey->created_at->format('Y-m-d') }}</p>
                </div>
            </div>

            {{-- <div class="w-15 w-xs-100"><span class="badge badge-pill badge-secondary"></span>
            </div> --}}
        </div>
    </div>
</div>
