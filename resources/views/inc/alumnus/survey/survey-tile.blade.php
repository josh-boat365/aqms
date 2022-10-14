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
            flex-direction: row !important;
        }

        .tile-text {
            font-size: 80%;
        }

        .surv-name {
            white-space: normal !important;
            position: relative;
            left: -1rem;
        }

        .surv-stats {
            padding: 5px;
            font-size: 8px;

        }

        .tile-info p {
            width: 4rem !important;

        }

        .tile-header .card-body .col-3 h5 {
            font-size: 11px !important;
        }

        .badge.badge-pill {
            padding-left: 3px !important;
            width: 62px !important;
        }

    }
</style>
@if ($submissions->where('user_id', auth()->user()->id)->where('survey_id', $survey->id)->count() == 0)
    <a href="{{ url('/home/surveys/' . $survey->id) }}">
@endif

<div class="card d-flex flex-row mb-3">
    <div class="d-flex flex-grow-1 min-width-zero">
        <div
            class="dash-survey-tile card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
            <div class="col-3 tile-info">
                <span class="list-item-heading mb-0 truncate w-40 w-xs-100 mt-0">

                    <div class="align-middle surv-name tile-text d-inline-block">{{ $survey->name }}</div>
                </span>
            </div>

            <div class="col-3 title-info">
                <div class="w-15 w-xs-100">
                    <p class="mb-0 text-muted tile-text font-weight-bold  text-medium" style="width: fit-content">
                        {{-- {{$survey->questions->count()}} --}}
                        @if ($progresses->where('user_id', auth()->user()->id)->where('survey_id', $survey->id)->count() > 0)
                            @foreach ($progresses->where('user_id', auth()->user()->id)->where('survey_id', $survey->id) as $progress)
                                {{ $progress->progress }}/{{ $survey->questions->count() }}
                            @endforeach
                        @else
                            0/{{ $survey->questions->count() }}
                        @endif

                    </p>
                </div>

            </div>

            <div class="col-3 tile-info">
                <div class="w-8 w-xs-100">
                    <p class="mb-0 tile-x tile-text text-muted font-weight-bold text-medium">
                        {{-- {{ $survey->expire_at->format('d-m') }} --}}
                        {{ $survey->expire_at->format('d-m-y') }} </p>
                </div>
            </div>

            <div class="col-3 tile-info">
                <div class="w-8 w-xs-100">
                    <p class="mb-0 font-weight-bold surv-stats  text-medium badge badge-pill  @if ($submissions->where('user_id', auth()->user()->id)->where('survey_id', $survey->id)->count() > 0) badge-success">
                        submitted
                    @else
                        badge-primary"> not Submitted @endif
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>
            @if ($submissions->where('user_id', auth()->user()->id)->where('survey_id', $survey->id)->count() == 0)
                        </a>
                        @endif
