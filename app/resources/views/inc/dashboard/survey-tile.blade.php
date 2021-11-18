<div class="card d-flex flex-row mb-3">
    <div class="d-flex flex-grow-1 min-width-zero">
        <div
            class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
            <a class="list-item-heading mb-0 truncate w-40 w-xs-100 mt-0" href="Apps.Survey.html"><i
                    class="
                @if ($status->status == 'draft')
                simple-icon-refresh heading-icon
                @else
                simple-icon-check heading-icon
                @endif
                "></i>
                <span class="align-middle d-inline-block">{{ $survey->name }}</span></a>
            {{-- <p class="mb-0 text-muted text-small w-15 w-xs-100">Personal</p> --}}
            <p class="mb-0 text-muted text-small w-15 w-xs-100">{{ $survey->created_at->format('Y-m-d') }}</p>
            <div class="w-15 w-xs-100"><span class="badge badge-pill badge-secondary">{{ $status->status }}</span>
            </div>
        </div><label class="custom-control custom-checkbox mb-1 align-self-center mr-4"><input type="checkbox"
                class="custom-control-input"> <span class="custom-control-label">&nbsp;</span></label>
    </div>
</div>
