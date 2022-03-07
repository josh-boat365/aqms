@empty($survey->sections->values()->toArray())

<div class="col">
    <div class="container">
        <form action="{{route('alumnus.survey.save')}}" method="post" id="save-form" class="d-flex flex-column align-items-center">
            @csrf
            <input type="hidden" name="survey_id" value="{{$survey->id}}">
            <input type="hidden" name="isSubmit"  id="isSubmit">
            <input type="hidden" name="progress" id="progress">
            @include('inc.alumnus.question.question-card', [ 'responses' => $responses])
            
        </form>

    </div>
</div>

@else

    @for ($i = 1; $i <= $survey->sections->count(); $i++)
        
    @endfor
    
@endempty




</form>
