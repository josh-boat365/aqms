{{-- section wrapper --}}

@empty($survey->sections->values()->toArray())
    <div class="sortable-survey col-lg-8 col-12 mb-4">
        @include('inc.dashboard.question.question-card', ['questions' => $survey->questions->toArray()])
    </div>
    <div id="all-deletes" style="display: none"></div>
@else
    @for ($i = 1; $i <= $survey->sections->count(); $i++)
        <div class="col-12 col-lg-8 survey-wrapper section-{{ $i }} @if ($i == 1) current @endif "
            style="display: none">
            <input type="hidden" id="sec-num" value="{{ $survey->sections[$i - 1]->id }}">
            <div class=" mb-3  border-primary card section-card" style="border-top: 7px solid #f3f3f3">
                <div class="position-absolute card-top-buttons">
                    <div class="btn icon-button btn-header-light sec-desc sec-edit"><i class="simple-icon-pencil"></i>
                    </div>
                </div>

                <div class="card-body">
                    <h1 class="col-11 section-header">{{ $survey->sections[$i - 1]->title }}</h1>
                    <input type="text" name="sections[old][{{ $survey->sections[$i - 1]->id }}][section_header]"
                        value="{{ $survey->sections[$i - 1]->title }}" id="section-header-input" style="display: none"
                        class="form-control col-11 mb-3" placeholder="section-description (optional)">
                    <input type="hidden" class="section-name" value="section-1">
                    <p class="col-12 section-description">{{ $survey->sections[$i - 1]->description }}</p>
                    <textarea name="sections[old][{{ $survey->sections[$i - 1]->id }}][section_description]" id="section-description-input"
                        style="display: none" class="form-control col-12">{{ $survey->sections[$i - 1]->description }}</textarea>
                </div>
            </div>
            <div class="sortable-survey">
                {{-- {{ $survey->sectionQuestions->where('section_id', $survey->sections[$i-1]->id) }} --}}
                <!-- {{ $survey->sectionQuestions }} -->
                <!-- {{ $survey }} -->
                <!-- {{ $survey->sections[$i - 1]->id }} -->
                @include('inc.dashboard.question.question-card', [
                    'questions' => $survey->sectionQuestions->where('section_id', $survey->sections[$i - 1]->id)->values()->toArray(),
                    'section_id' => $survey->sections[$i - 1]->id,
                ])
            </div>

        </div>
    @endfor
@endempty

{{-- @if ($survey->sections == null)
    empty section
    <div class="sortable-survey">

        @include('inc.dashboard.question.question-card', ['questions', $survey->questions])
    </div>
@else
    non empty section
    @for ($i = 1; $i <= $survey->sections->count(); $i++)
        <div class="col-12 col-lg-8 survey-wrapper section-{{ $i }} @if ($i == 1) current @endif "
            style="display: none">
            <input type="hidden" id="sec-num" value="{{ $i }}">
            <div class=" mb-3  border-primary card section-card" style="border-top: 7px solid #f3f3f3">
                <div class="position-absolute card-top-buttons">
                    <div class="btn icon-button btn-header-light sec-desc sec-edit"><i class="simple-icon-pencil"></i>
                    </div>
                </div>
                
                <div class="card-body">
                    <h1 class="col-11 section-header">{{ $survey->sections[$i - 1]->title }}</h1>
                    <input type="text" name="sections[old][{{ $survey->sections[$i - 1]->id }}][section_header]"
                        value="{{ $survey->sections[$i - 1]->title }}" id="section-header-input" style="display: none"
                        class="form-control col-11 mb-3" placeholder="section-description (optional)">
                    <input type="hidden" class="section-name" value="section-1">
                    <p class="col-12 section-description">{{ $survey->sections[$i - 1]->description }}</p>
                    <textarea name="sections[old][{{ $survey->sections[$i - 1]->id }}][section_description]" id="section-description-input"
                        style="display: none"
                        class="form-control col-12">{{ $survey->sections[$i - 1]->description }}</textarea>
                </div>
            </div>
            <div class="sortable-survey">

                @include('inc.dashboard.question.question-card', ['questions'=>
                $survey->sectionQuestions->where('section_id', $survey->sections[$i-1]->id)->values()->toArray(),
                'order' => $i,
                ]),
            </div>
        </div>
    @endfor
    
@endif --}}



</form>
