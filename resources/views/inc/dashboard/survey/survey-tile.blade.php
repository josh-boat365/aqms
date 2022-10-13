{{-- Mobile View For Tiles --}}
<style type="text/css">
    .tile-x {
        color: rgb(187, 25, 25) !important;
    }

    p {
        margin: auto;
    }

    @media (min-width: 280px) and (max-width: 900px) {
        .dash-survey-tile {
            display: flex !important;
            flex-direction: column !important;
        }

        .tile-info p {
            width: 7rem !important;
            margin: 5px !important;
        }

        .tile-header .card-body .col-3 h5 {
            font-size: 11px !important;
        }

    }
</style>
<a href="{{ url('/dashboard/surveys/' . $survey->id) }}">
    <div
        class=" card d-flex flex-row mb-3 @if ($survey->status_id == 1) draft @elseif($survey->status_id == 2) deploy @elseif($survey->status_id == 3) archive @endif">
        <input type="hidden" class="survey_id" value="{{ $survey->id }}">
        <div class="d-flex flex-grow-1 min-width-zero">
            <div
                class="dash-survey-tile card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                <div class="col-3 tile-info">
                    <span class="list-item-heading mb-0 truncate w-40 w-xs-100 mt-0"><i
                            class="
                    @if ($survey->status_id == '1') simple-icon-refresh heading-icon
                    @else
                    simple-icon-check heading-icon @endif
                    "></i>
                        <span class="align-middle d-inline-block">
                            <p>{{ $survey->name }}</p>
                        </span></span>
                </div>

                <div class="col-3 tile-info">
                    <p class="mb-0 text-muted text-small w-8 w-xs-100" style="position: relative; left: 1.2rem;">
                        {{ $survey->created_at->format('Y-m-d') }} </p>
                </div>

                <div class="col-3 tile-info ">
                    <p class="mb-0 tile-x text-muted text-center text-small w-8 w-xs-100"
                        @if ($survey->status_id == 2) style="color: green !important;" @endif>
                        @if ($survey->status_id != 1)
                            {{ $survey->expire_at->format('d-m-y') }}
                        @else
                            ---
                        @endif
                    </p>
                </div>

                <div class="col-3 title-info">
                    @if ($status->status == 'Draft')
                        <div class="w-15  w-xs-100"><span class="badge badge-pill badge-secondary"
                                style="position: relative; left: 3.2rem;">Draft</span></div>
                    @elseif ($status->status == 'Archived')
                        <div class="w-15  w-xs-100"><span class="badge badge-pill badge-danger"
                                style="position: relative; left: 3.2rem;">Archived</span></div>
                    @elseif ($status->status == 'Deployed')
                        <div class="w-15  w-xs-100"><span class="badge badge-pill badge-success"
                                style="position: relative; left: 3.2rem;">Deployed</span></div>
                    @endif
                    {{-- <div class="w-15  w-xs-100"><span class="badge badge-pill badge-secondary" style="position: relative; left: 3.2rem;">{{ $status->status }}</span>
                </div> --}}
                </div>

            </div><label class="custom-control custom-checkbox mb-1 align-self-center mr-4"><input type="checkbox"
                    class="custom-control-input"> <span class="custom-control-label">&nbsp;</span></label>
        </div>
    </div>
</a>
