<style>
    @media (min-width: 280px) and (max-width: 900px) {
        .section-card {
            position: relative;
            left: -1.2rem;
            width: 23rem;
        }

        .card {
            width: 23rem;
        }

        .section-header,
        .section-description {
            font-size: 12px;
        }

        .custom-container {
            width: auto !important;
            min-width: auto !important;
            /* max-width: auto !important; */
        }


    }
</style>

@empty($survey->sections->values()->toArray())


    <div class="container custom-container">
        <form action="{{ route('alumnus.survey.save') }}" method="post" id="save-form"
            class="d-flex flex-column align-items-center">
            @csrf
            <input type="hidden" name="survey_id" value="{{ $survey->id }}">
            <input type="hidden" name="isSubmit" id="isSubmit">
            <input type="hidden" name="progress" id="progress">
            <div class="sortable-survey col-12">
                @include('inc.alumnus.question.question-card', [
                    'questions' => $survey->questions,
                    'responses' => $responses,
                ])
            </div>

        </form>

    </div>
@else
    <form action="{{ route('alumnus.survey.save') }}" method="post" id="save-form"
        class="col d-flex flex-column align-items-center">
        @csrf

        <input type="hidden" name="survey_id" value="{{ $survey->id }}">
        <input type="hidden" name="isSubmit" id="isSubmit">
        <input type="hidden" name="progress" id="progress">
        <input type="hidden" name="section_check_point" id="section_check_point">

        @for ($i = 1; $i <= $survey->sections->count(); $i++)
            <div class="col-12 col-lg-8 survey-wrapper section-{{ $i }} @if ($i == $sectionCheckPoint) current @endif "
                style="display: none">
                <input type="hidden" id="sec-num" value="{{ $i }}">
                <div class=" mb-3  border-primary card section-card" style="border-top: 7px solid #f3f3f3">

                    <div class="card-body">
                        <h1 class="col-11 section-header">{{ $survey->sections[$i - 1]->title }}</h1>
                        <input type="text" value="{{ $survey->sections[$i - 1]->title }}" id="section-header-input"
                            style="display: none" class="form-control col-11 mb-3"
                            placeholder="section-description (optional)">
                        <input type="hidden" class="section-name" value="section-1">
                        <p class="col-12 section-description">{{ $survey->sections[$i - 1]->description }}</p>
                        <textarea id="section-description-input" style="display: none" class="form-control col-12">{{ $survey->sections[$i - 1]->description }}</textarea>
                    </div>
                </div>
                <div class="sortable-survey">




                    @include('inc.alumnus.question.question-card', [
                        'questions' => $survey->sectionQuestions->where(
                            'section_id',
                            $survey->sections[$i - 1]->id
                        ),
                        'section_id' => $survey->sections[$i - 1]->id,
                        'responses' => $responses,
                    ])




                </div>

            </div>
        @endfor
    </form>
    <form action="{{ route('alumnus.survey.reset') }}" method="post" id="reset-form" style="display: none">
        @csrf
        <input type="hidden" name="survey_id" value="{{ $survey->id }}">
    </form>

@endempty
