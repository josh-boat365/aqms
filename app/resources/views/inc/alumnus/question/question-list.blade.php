<div class="col">
    <div class="container">
        <form action="{{route('alumnus.survey.save')}}" method="post" id="save-form" class="d-flex flex-column align-items-center">
            @csrf
            <input type="hidden" name="survey_id" value="{{$survey->id}}">
            @include('inc.alumnus.question.question-card', ['survey', $survey])
        </form>

    </div>
    {{-- <div class="text-center"><button type="button" class="btn btn-outline-primary btn-sm mb-2 add-que"><i
                class="simple-icon-plus btn-group-icon"></i> Add Question</button></div> --}}
</div>

</form>
