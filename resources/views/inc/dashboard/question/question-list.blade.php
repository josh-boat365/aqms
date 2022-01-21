    <div class="col-12 col-lg-8 survey-wrapper section-1 current" style="display: none">
        <input type="hidden" id="sec-num" value="1">
        <div class=" mb-3  border-primary card section-card" style="border-top: 7px solid #f3f3f3; display: none">
            <div class="position-absolute card-top-buttons">
                <div class="btn icon-button btn-header-light sec-desc sec-edit"><i class="simple-icon-pencil"></i></div>
            </div>
            <div class="card-body">
                <h1 class="col-11 section-header">Untitiled~1</h1>
                <input type="text" name="section[new][1][section_header]" id="section-header-input" style="display: none"
                    class="form-control col-11 mb-3" placeholder="section-description (optional)">
                    <input type="hidden" class="section-name" value="section-1">
                <p class="col-12 section-description">section-description (optional)</p>
                <textarea name="section[new][1][section_description]" id="section-description-input" style="display: none"
                    class="form-control col-12"></textarea>
            </div>
        </div>
        <div class="sortable-survey">

            @include('inc.dashboard.question.question-card', ['survey', $survey])
        </div>
    </div>

    </form>
