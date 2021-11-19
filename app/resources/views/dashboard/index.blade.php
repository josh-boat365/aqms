@extends('layouts.dashboard')

@section('style')

@endsection

@section('body-id') id="app-container" @endsection

@section('body-class') class="menu-sub-hidden show-spinner right-menu" @endsection

{{-- @section('nav')
    @include('inc.dashboard.navbar')
@endsection --}}

{{-- @section('side-bar')
    @include('inc.dashboard.sidebar')
@endsection --}}

@section('main')
    @extends('inc.dashboard.survey-list')
@endsection

@section('survey-form')
    @include('inc.dashboard.survey-form')
@endsection

@section('survey-tiles')
    @foreach ($allSurveys as $survey)
        @include('inc.dashboard.survey-tile', ['survey' => $survey, 'status' => $survey->status])
    @endforeach
@endsection

@section('script')
    @error('title')
        <script>
            $(document).ready(function() {
                $("#add-new-btn").trigger("click");
            });
        </script>
    @enderror
@endsection
