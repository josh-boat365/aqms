<div class="col-12 col-lg-8">
    <div class="sortable-survey">
        <form action="{{ route('dashboard.test') }}" method="post">
            @csrf
            @include('inc.dashboard.question.question-card', ['survey', $survey])

            <input type="submit" value="Test data">
        </form>
    </div>
    {{-- <div class="text-center"><button type="button" class="btn btn-outline-primary btn-sm mb-2 add-que"><i
                class="simple-icon-plus btn-group-icon"></i> Add Question</button></div> --}}
</div>
