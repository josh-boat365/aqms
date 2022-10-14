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
<a href=" {{ url('/dashboard/submissions/' . $survey->id) }} ">
    <div class=" card d-flex flex-row mb-3">
        <div class="d-flex flex-grow-1 min-width-zero">
            <div
                class="dash-survey-tile card-body align-self-center d-flex flex-column flex-md-row min-width-zero align-items-md-center">
                <div class="col-3 tile-info">
                    <span class="list-item-heading mb-0 truncate w-40 w-xs-100 mt-0">
                        <span class="align-middle d-inline-block">
                            <p>{{ $survey->name }}</p>
                        </span></span>
                </div>
                <div class="col-3 tile-info text-center">
                    <span class="list-item-heading mb-0 truncate w-40 w-xs-100 mt-0">
                        <span class="align-middle d-inline-block">
                            <p>{{ $submissions->where('survey_id', $survey->id)->count() }}</p>
                        </span></span>
                </div>



            </div>
            {{-- <label class="custom-control custom-checkbox mb-1 align-self-center mr-4">
                <input type="checkbox" class="custom-control-input"> 
                    <span class="custom-control-label">&nbsp;</span></label> --}}
        </div>
    </div>
</a>
