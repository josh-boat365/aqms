<!DOCTYPE html>
<html lang="en">
<!-- m dore-jquery.coloredstrategies.com/Apps.Survey.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Nov 2021 22:42:24 GMT -->

<head>
    <meta charset="UTF-8">
    <title>Create Survey | ATU TRACER</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <link rel="stylesheet" href="{{ asset('font/iconsmind-s/css/iconsminds.css') }}">
    <link rel="stylesheet" href="{{ asset('font/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.rtl.only.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/select2-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/component-custom-switch.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dore.dark.bluenavy.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <style>
        .theme-colors {
            display: none;
        }

        .dot-active:after {
            content: " ";
            background: #00365a;
            border-radius: 10px;
            position: absolute;
            width: 7px;
            height: 7px;
            top: 45%;
            transform: translateY(-50%);
            left: -15px;
            /*
            box-sizing: border-box; */
        }

        .pointer:hover {
            cursor: pointer;
        }

        .current {
            display: block !important;
        }
    </style>


</head>

<body id="app-container" class="menu-sub-hidden  right-menu show-spinner">

    @include('inc.dashboard.navbar')


    @include('inc.dashboard.side-bar', ['surveys' => $allSurveys])


    @extends('inc.dashboard.question.question-content')


    @section('question-summary')
        @include('inc.dashboard.question.question-summary')
    @endsection

    @section('question-list')
        @include('inc.dashboard.question.question-list')
    @endsection

    @section('stat')
        <li class="active"><a href="#"> Questions <span
                    class="float-right">{{ $survey->questions->count() }}</span></a></li>

        @if ($survey->status_id == 1)
            <div class="text-center mt-4"><button type="button" class="btn btn-outline-primary btn-sm mb-2 add-que"><i
                        class="simple-icon-plus btn-group-icon"></i> Add Question</button></div>
            <div class="text-center mt-4"><button type="button" class="btn btn-outline-success btn-sm mb-2 upd-que"><i
                        class="simple-icon-plus btn-group-icon"></i> Update</button></div>
        @endif


        <div class="separator my-3"></div>
        @if ($survey->sections == null)
            <div class="mt-4">
                <input type="checkbox" name="enable-section" id="enable-section"
                    @if ($survey->status_id != 1) disabled @endif> <label for="enable-section">nable
                    Sections</label>
            </div>
            <div class="mt-2" id="section-list" class="scroll h-100 col mt-2" style="max-height: 500px; display: none">
                <div class="sections">
                    <div class="position-relative my-1 py-1 ml-4 dot-active pointer" id="section-1">Untitiled~1</div>
                    {{-- <div class="position-relative my-1 py-1 ml-4">Section Two</div>
                <div class="position-relative my-1 py-1 ml-4">Section Three</div>
                <div class="position-relative my-1 py-1 ml-4">Section Four</div> --}}
                </div>
                <div class="text-center mt-2"><button type="button" class="btn btn-outline-primary btn-sm mb-2"
                        id="add-section-button"><i class="simple-icon-plus btn-group-icon"></i> Add section</button></div>
            </div>
        @else
            <div class="mt-4">
                <input type="checkbox" name="enable-section" id="enable-section"
                    @if ($survey->status_id != 1) disabled @endif @if ($survey->sections->count() > 0) checked @endif>
                <label for="enable-section">Enable
                    Sections</label>
            </div>
            <div class="mt-2" id="section-list" class="scroll h-100 col mt-2" style="max-height: 500px">
                {{-- <div class="sections">
                <div class="position-relative my-1 py-1 ml-4 dot-active pointer" id="section-1">Untitiled~1</div>
                
                </div> --}}
                <div class="sections">
                    @for ($i = 0; $i < $survey->sections->count(); $i++)
                        <div class="position-relative my-1 py-1 ml-4  pointer" id="section-{{ $i + 1 }}">
                            {{ $survey->sections[$i]->title }}</div>
                    @endfor
                    {{-- @foreach ($survey->sections as $section)
                        <div class="position-relative my-1 py-1 ml-4  pointer" id="section-{{}}">
                            {{ $section->title }}</div>
                    @endforeach --}}
                </div>
                <div class="text-center mt-2"><button type="button" class="btn btn-outline-primary btn-sm mb-2"
                        id="add-section-button"><i class="simple-icon-plus btn-group-icon"></i> Add section</button>
                </div>
            </div>
        @endif
        <form action="{{ route('survey.question.delete') }}" method="post" style="display: none" id="delete-que-form">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="que_id" class="que_id">
            <input type="hidden" name="que_num" class="que_num">
            <input type="hidden" name="survey_id" class="survey_id" value="{{ $survey->id }}">
        </form>
    @endsection



    <script src="{{ asset('js/vendor/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/vendor/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/vendor/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('js/vendor/Sortable.js') }}"></script>
    <script src="{{ asset('js/vendor/mousetrap.min.js') }}"></script>
    <script src="{{ asset('js/vendor/select2.full.js') }}"></script>
    <script src="{{ asset('js/dore.script.js') }}"></script>


    <script>
        $(function () {
            $('#archive-btn').click(function () {
                $('#archive-form').submit()
            })
        })
    </script>
    
        <script>
            $(function() {
                $old_value = $('#exp-date').val();
                $('#exp-date').on('change', function() {
                    if ($(this).val() == $old_value) {
                        $('.deploy-btn').hide()
                    } else {
                        console.log($(this).val());
                        $('#deploy-form').children('.date').val($(this).val())
                        $('.deploy-btn').show()
                    }
                })
            })
        </script>


    {{-- section edit --}}
    <script>
        $(function() {
            $('#update-form').on('click', '.sec-desc', function() {
                console.log('something');
                $description_display = $(this).parent().parent().children('.card-body').children(
                    '.section-description')
                $description_form = $(this).parent().parent().children('.card-body').children(
                    '#section-description-input')

                $section_display = $(this).parent().parent().children('.card-body').children(
                    '.section-header')
                $section_form = $(this).parent().parent().children('.card-body').children(
                    '#section-header-input')

                if ($(this).hasClass('sec-edit')) {

                    $description_display.hide()
                    $section_display.hide()

                    $description_form.text($description_display.text()).show();
                    $section_form.val($section_display.text()).show();

                } else {

                    $description_form.hide()
                    $section_form.hide()

                    $description_display.text($description_form.val()).show();
                    $section_display.text($section_form.val()).show();

                }

                // change icon
                $(this).children('i').toggleClass('simple-icon-eye')
                $(this).children('i').toggleClass('simple-icon-pencil')
                $(this).toggleClass('btn-outline-theme-3')
                $(this).toggleClass('btn-header-light')
                $(this).toggleClass('sec-edit')
                $(this).toggleClass('sec-save')



            })

            $("#update-form").on("input", '#section-header-input', function() {

                // console.log($('.sections').children('#' + $(this).parent().children('.section-name').val()));

                $('.sections').children('#' + $(this).parent().children('.section-name').val())
                    .text($(this).val())


            });
        })
    </script>

    <script>
        $(function() {
            @error('description')
                console.log('desc error registered');
                $('.card-top-buttons .desc-edit').trigger('click');
            @enderror
        })
    </script>

    {{-- switching sections --}}
    <script>
        $(function() {

            if (!$('#enable-section').is(':checked')) {
                $('#section-list').slideUp()
            }

            $('.sections').on('click', '.pointer', function() {
                $('.dot-active').removeClass('dot-active')
                $(this).addClass('dot-active')
                $target_section = $(this).attr('id');
                $('.current').removeClass('current')
                $('.' + $target_section).addClass('current')

                // console.log($('.current #sec-num').val());
            })
        })
    </script>

    {{-- add / enable sections --}}
    <script>
        $(function() {
            // $('#section-list').slideUp();
            $('.sections .pointer').first().addClass('dot-active')

            $('#enable-section').change(function() {

                if ($(this).is(':checked')) {
                    $count = $('.survey-wrapper').length;


                    var $section = $('<div/>').attr({
                        'class': 'is-new current col-12 col-lg-8 survey-wrapper section-' + (
                            $count + 1),
                        'style': 'display: none'
                    }).append(
                        $('<input>').attr({
                            'type': 'hidden',
                            'id': 'sec-num',
                            'value': ($count + 1),

                        })
                    );

                    $section_count = $('.section-card').length;

                    var $section_card = $('<div/>').attr({
                        'class': 'mb-3  border-primary card section-card',
                        'style': 'border-top: 7px solid #f3f3f3;'
                    }).append(
                        $('<div/>').addClass('position-absolute card-top-buttons').append(
                            $('<div/>').addClass('btn icon-button btn-header-light sec-desc sec-edit')
                            .append(
                                $('<i/>').addClass('simple-icon-pencil')
                            )
                        ),
                        $('<div/>').addClass('card-body').append(
                            $('<h1/>').addClass('col-11 section-header').text('Untitled~' + ($count +
                                1)),

                            $('<input>').attr({
                                'type': 'text',
                                'name': 'sections[new][' + ($section_count + 1) +
                                    '][section_header]',
                                'id': 'section-header-input',
                                'style': 'display: none',
                                'class': 'form-control col-11 mb-3',
                                'placeholder': 'section name    ',
                                'value': 'Untitled~' + ($count +
                                    1)
                            }),
                            $('<input>').attr({
                                'type': 'hidden',
                                'class': 'section-name',
                                'value': 'section-' + ($count + 1)
                            }),
                            // <input type="hidden" class="section-name" value="section-1">
                            $('<p/>').addClass('col-12 section-description').text(
                                'section-description (optional)'),

                            $('<textarea/>').attr({
                                'name': 'sections[new][' + ($section_count + 1) +
                                    '][section_description]',
                                'id': 'section-description-input',
                                'style': 'display: none',
                                'class': 'form-control col-12'
                            })
                        )
                    )

                    $section.append($section_card);
                    // $section.append($section_card);

                    $section.append($('.sortable-survey').removeClass('col-lg-8').removeClass('col-12'));

                    $('#update-form').append($section)

                    $('#section-list').children('.sections').append(
                        $('<div/>').addClass('position-relative my-1 py-1 ml-4 dot-active pointer')
                        .attr({
                            'id': 'section-1'
                        }).text('Untitiled~1')
                        // <div class="position-relative my-1 py-1 ml-4 dot-active pointer" id="section-1">Untitiled~1</div>
                    )
                    $('#section-list').slideDown()
                    $('.section-card').slideDown(function() {
                        $(this).show();
                    })

                    var $sec_num = $('#update-form .current #sec-num').val()

                    $('.sortable-survey input').each(function() {
                        // console.log( $(this));
                        // console.log( $(this).attr('name'));
                        // $str = "Hello World";
                        // console.log();
                        if ($(this).attr('name') != undefined) {


                            // console.log($(this).attr('name').slice($(this).attr('name').indexOf("questions") + 9, $(this).attr('name').length));
                            $(this).attr('name', 'sections[new][' + $sec_num + '][questions]' + $(
                                this).attr('name').slice($(this).attr('name').indexOf(
                                "questions") + 9, $(this).attr('name').length))
                        }
                    })


                    $('.sortable-survey select').each(function() {
                        // console.log( $(this));
                        // console.log( $(this).attr('name'));
                        // $str = "Hello World";
                        // console.log();
                        if ($(this).attr('name') != undefined) {

                            $(this).attr('name', 'sections[new][' + $sec_num + '][questions]' + $(
                                this).attr('name').slice($(this).attr('name').indexOf(
                                "questions") + 9, $(this).attr('name').length))
                        }
                    })



                } else { //TODO: reverse the effect of checked state on input and selects
                    $('#section-list').slideUp(function() {
                        $(this).children('.sections').children('.pointer').remove()

                    });
                    $('.section-card').slideUp(function() {
                        $(this).hide();
                    })

                    //get all ques cards
                    $sortable_survey = $('<div/>').addClass('sortable-survey col-lg-8 col-12 mb-4')
                    $allQuestions = $('.question');
                    $allQuestions.each(function() {
                        $sortable_survey.append(
                            $('<div/>').append($(this))
                        )
                    })

                    $('.survey-wrapper').remove();

                    $('#update-form').append(
                        $sortable_survey
                    )

                    $num = 1;
                    $('.question').each(function() {
                        $(this).children('.d-flex').children('.card-body').children(
                            '.list-item-heading').children('.heading-number').text($num++);

                        // console.log($num);
                    })

                    $('.sortable-survey input').each(function() {
                        // console.log( $(this));
                        // console.log( $(this).attr('name'));
                        // $str = "Hello World";
                        // console.log();
                        if ($(this).attr('name') != undefined) {
                            // console.log();

                            // console.log($(this).attr('name').slice($(this).attr('name').indexOf("[questions]") + 11, $(this).attr('name').length));
                            $(this).attr('name', 'questions' + $(this).attr('name').slice($(this)
                                .attr('name').indexOf("[questions]") + 11, $(this).attr(
                                    'name').length))
                        }
                    })

                    $('.sortable-survey select').each(function() {
                        // console.log( $(this));
                        // console.log( $(this).attr('name'));
                        // $str = "Hello World";
                        // console.log();
                        if ($(this).attr('name') != undefined) {

                            $(this).attr('name', 'questions' + $(this).attr('name').slice($(this)
                                .attr('name').indexOf("[questions]") + 11, $(this).attr(
                                    'name').length))
                        }
                    })
                }
            });

            $('#add-section-button').click(function() {
                $count = $('.survey-wrapper').length;

                $('.dot-active').removeClass('dot-active')

                var $section_label = $('<div/>').attr({
                    'class': 'position-relative my-1 py-1 ml-4 dot-active pointer',
                    'id': 'section-' + ($count + 1)
                }).text('Untitiled~' + ($count + 1))

                $('.sections').append($section_label);

                var $section = $('<div/>').attr({
                    'class': 'current col-12 col-lg-8 survey-wrapper section-' + ($count + 1),
                    'style': 'display: none'
                }).append(
                    $('<input>').attr({
                        'type': 'hidden',
                        'id': 'sec-num',
                        'value': ($count + 1)
                    })
                );

                $section_count = $('.section-card').length;

                var $section_card = $('<div/>').attr({
                    'class': 'mb-3  border-primary card section-card',
                    'style': 'border-top: 7px solid #f3f3f3;'
                }).append(
                    $('<div/>').addClass('position-absolute card-top-buttons').append(
                        $('<div/>').addClass('btn icon-button btn-header-light sec-desc sec-edit')
                        .append(
                            $('<i/>').addClass('simple-icon-pencil')
                        )
                    ),
                    $('<div/>').addClass('card-body').append(
                        $('<h1/>').addClass('col-11 section-header').text('Untitled~' + ($count + 1)),

                        $('<input>').attr({
                            'type': 'text',
                            'name': 'sections[new][' + ($section_count + 1) + '][section_header]',
                            'id': 'section-header-input',
                            'style': 'display: none',
                            'class': 'form-control col-11 mb-3',
                            'placeholder': 'section name',
                            'value': 'Untitled~' + ($count + 1)

                        }),
                        $('<input>').attr({
                            'type': 'hidden',
                            'class': 'section-name',
                            'value': 'section-' + ($count + 1)
                        }),
                        // <input type="hidden" class="section-name" value="section-1">
                        $('<p/>').addClass('col-12 section-description').text(
                            'section-description (optional)'),

                        $('<textarea/>').attr({
                            'name': 'sections[new][' + ($section_count + 1) +
                                '][section_description]',
                            'id': 'section-description-input',
                            'style': 'display: none',
                            'class': 'form-control col-12'
                        })
                    )
                )

                $section.append($section_card);
                $section.append(
                    $('<div/>').addClass('sortable-survey')
                );

                $('.current').removeClass('current');
                $('#update-form').append($section)

            })
        })
    </script>

    {{-- script --}}
    <script>
        function loadStyle(e, t) {
            for (var o = 0; o < document.styleSheets.length; o++)
                if (document.styleSheets[o].href == e) return;
            var a = document.getElementsByTagName("head")[0],
                r = document.createElement("link");
            (r.rel = "stylesheet"),
            (r.type = "text/css"),
            (r.href = '{{ asset('') }}' + e),
            t &&
                (r.onload = function() {
                    t();
                });
            var l = $(a).find('[href$="main.css"]');
            0 !== l.length ? l[0].before(r) : a.appendChild(r);
        }!(function(e) {
            e().dropzone && (Dropzone.autoDiscover = !1);
            try {
                localStorage.setItem("dore-is-private-tab", !1);
                e("body").append(
                    '\n  <div class="theme-colors">\n    <div class="p-4">\n    <p class="text-muted mb-2">Light Theme</p>\n    <div class="d-flex flex-row justify-content-between mb-3">\n      <a href="#" data-theme="dore.light.bluenavy.min.css" class="theme-color theme-color-bluenavy"></a>\n      <a href="#" data-theme="dore.light.blueyale.min.css" class="theme-color theme-color-blueyale"></a>\n      <a href="#" data-theme="dore.light.blueolympic.min.css" class="theme-color theme-color-blueolympic"></a>\n      <a href="#" data-theme="dore.light.greenmoss.min.css" class="theme-color theme-color-greenmoss"></a>\n      <a href="#" data-theme="dore.light.greenlime.min.css" class="theme-color theme-color-greenlime"></a>\n    </div>\n    <div class="d-flex flex-row justify-content-between mb-4">\n      <a href="#" data-theme="dore.light.purplemonster.min.css" class="theme-color theme-color-purplemonster"></a>\n      <a href="#" data-theme="dore.light.orangecarrot.min.css" class="theme-color theme-color-orangecarrot"></a>\n      <a href="#" data-theme="dore.light.redruby.min.css" class="theme-color theme-color-redruby"></a>\n      <a href="#" data-theme="dore.light.yellowgranola.min.css" class="theme-color theme-color-yellowgranola"></a>\n      <a href="#" data-theme="dore.light.greysteel.min.css" class="theme-color theme-color-greysteel"></a>\n    </div>\n    <p class="text-muted mb-2">Dark Theme</p>\n    <div class="d-flex flex-row justify-content-between mb-3">\n      <a href="#" data-theme="dore.dark.bluenavy.min.css" class="theme-color theme-color-bluenavy"></a>\n      <a href="#" data-theme="dore.dark.blueyale.min.css" class="theme-color theme-color-blueyale"></a>\n      <a href="#" data-theme="dore.dark.blueolympic.min.css" class="theme-color theme-color-blueolympic"></a>\n      <a href="#" data-theme="dore.dark.greenmoss.min.css" class="theme-color theme-color-greenmoss"></a>\n      <a href="#" data-theme="dore.dark.greenlime.min.css" class="theme-color theme-color-greenlime"></a>\n    </div>\n    <div class="d-flex flex-row justify-content-between">\n    <a href="#" data-theme="dore.dark.purplemonster.min.css" class="theme-color theme-color-purplemonster"></a>\n    <a href="#" data-theme="dore.dark.orangecarrot.min.css" class="theme-color theme-color-orangecarrot"></a>\n    <a href="#" data-theme="dore.dark.redruby.min.css" class="theme-color theme-color-redruby"></a>\n    <a href="#" data-theme="dore.dark.yellowgranola.min.css" class="theme-color theme-color-yellowgranola"></a>\n    <a href="#" data-theme="dore.dark.greysteel.min.css" class="theme-color theme-color-greysteel"></a>\n  </div>\n  </div>\n  <div class="p-4">\n    <p class="text-muted mb-2">Border Radius</p>\n    <div class="custom-control custom-radio custom-control-inline">\n      <input type="radio" id="roundedRadio" name="radiusRadio" class="custom-control-input radius-radio" data-radius="rounded">\n      <label class="custom-control-label" for="roundedRadio">Rounded</label>\n    </div>\n    <div class="custom-control custom-radio custom-control-inline">\n      <input type="radio" id="flatRadio" name="radiusRadio" class="custom-control-input radius-radio" data-radius="flat">\n      <label class="custom-control-label" for="flatRadio">Flat</label>\n    </div>\n  </div>\n  <div class="p-4">\n    <p class="text-muted mb-2">Direction</p>\n    <div class="custom-control custom-radio custom-control-inline">\n    <input type="radio" id="ltrRadio" name="directionRadio" class="custom-control-input direction-radio" data-direction="ltr">\n    <label class="custom-control-label" for="ltrRadio">Ltr</label>\n  </div>\n  <div class="custom-control custom-radio custom-control-inline">\n    <input type="radio" id="rtlRadio" name="directionRadio" class="custom-control-input direction-radio" data-direction="rtl">\n    <label class="custom-control-label" for="rtlRadio">Rtl</label>\n  </div>\n</div>\n<a href="#" class="theme-button"> <i class="simple-icon-magic-wand"></i> </a>\n</div>\n'
                );
            } catch (e) {}
            var t = "dore.light.bluenavy.min.css",
                o = "ltr",
                a = "rounded";
            try {
                localStorage.getItem("dore-theme-color") ? (t = localStorage.getItem("dore-theme-color")) : localStorage
                    .setItem("dore-theme-color", t),
                    localStorage.getItem("dore-direction") ? (o = localStorage.getItem("dore-direction")) : localStorage
                    .setItem("dore-direction", o),
                    localStorage.getItem("dore-radius") ? (a = localStorage.getItem("dore-radius")) : localStorage
                    .setItem("dore-radius", a);
            } catch (e) {
                (t = "dore.light.bluenavy.min.css"), (o = "ltr"), (a = "rounded");
            }

            function r() {
                e("body").addClass(o), e("html").attr("dir", o), e("body").addClass(a), e("body").dore();
            }
            e(".theme-color[data-theme='" + t + "']").addClass("active"),
                e(".direction-radio[data-direction='" + o + "']").attr("checked", !0),
                e(".radius-radio[data-radius='" + a + "']").attr("checked", !0),
                e("#switchDark").attr("checked", t.indexOf("dark") > 0),
                loadStyle("css/" + t, function() {
                    setTimeout(r, 300);
                }),
                e("body").on("click", ".theme-color", function(t) {
                    t.preventDefault();
                    var o = e(this).data("theme");
                    try {
                        localStorage.setItem("dore-theme-color", o), window.location.reload();
                    } catch (e) {}
                }),
                e("input[name='directionRadio']").on("change", function(t) {
                    var o = e(t.currentTarget).data("direction");
                    try {
                        localStorage.setItem("dore-direction", o), window.location.reload();
                    } catch (e) {}
                }),
                e("input[name='radiusRadio']").on("change", function(t) {
                    var o = e(t.currentTarget).data("radius");
                    try {
                        localStorage.setItem("dore-radius", o), window.location.reload();
                    } catch (e) {}
                }),
                e("#switchDark").on("change", function(o) {
                    var a = e(o.currentTarget)[0].checked ? "dark" : "light";
                    "dark" == a ? (t = t.replace("light", "dark")) : "light" == a && (t = t.replace("dark",
                        "light"));
                    try {
                        localStorage.setItem("dore-theme-color", t), window.location.reload();
                    } catch (e) {}
                }),
                e(".theme-button").on("click", function(t) {
                    t.preventDefault(), e(this).parents(".theme-colors").toggleClass("shown");
                }),
                e(document).on("click", function(t) {
                    e(t.target).parents().hasClass("theme-colors") ||
                        e(t.target).parents().hasClass("theme-button") ||
                        e(t.target).hasClass("theme-button") ||
                        e(t.target).hasClass("theme-colors") ||
                        (e(".theme-colors").hasClass("shown") && e(".theme-colors").removeClass("shown"));
                });
        })(jQuery);
    </script>

    {{-- select-2 test --}}
    <script>
        $(function() {
            var $data = [{
                id: 0,
                text: 'enhancement'
            }, {
                id: 1,
                text: 'bug'
            }, {
                id: 2,
                text: 'duplicate'
            }, {
                id: 3,
                text: 'invalid'
            }, {
                id: 4,
                text: 'wontfix'
            }];
            $(".test-select").select2({
                data: $data,
                theme: "bootstrap",
                placeholder: "",
                maximumSelectionSize: 6,
            })
            $('.select2-selection--single').addClass('form-control');
        })
    </script>

    {{-- setting active section --}}
    <script>
        $(function() {
            $('#survey-section').addClass('active');
        })
    </script>


    {{-- add answer --}}
    <script>
        $(function() {
            $index = 0;

            $('#update-form').on('click', '.ans-btn', function(e) {

                $spec = $('.current #section-header-input')
                if ($spec.length > 0 && $spec.attr('name').indexOf('new') != -1) {
                    $section_state = 'new'
                } else {
                    $section_state = 'old'
                }

                $section_num = $('.current #sec-num').val()

                var $que_num = $(this).parent().parent().parent().parent().children('.que-section')
                    .children(
                        '.que-num').val();

                if ($(this).parent().parent().parent().parent().children('.que-section')
                    .children(
                        '.is-new').val()) {
                    $question_state = 'new';
                } else {
                    $question_state = 'old';
                }

                if (!$('.survey-wrapper').length > 0) {
                    $name = "questions[" + $question_state + "][" + $que_num + "][options][new][" + (
                        $index++) + "]"
                } else {
                    $name = "sections[" + $section_state + "][" + $section_num + "][questions][" +
                        $question_state + "][" + $que_num + "][options][new][" + ($index++) + "]"
                }

                var ansBox = $('<div/>').addClass('mb-1 position-relative ans')
                    .append(
                        $('<input>').attr({
                            'class': 'form-control',
                            'type': 'text',

                            // questions -> Qstate -> Qid/Qgroup_id -> options -> Ogroup_id -> option
                            'name': $name
                        }),

                        $('<div/>').addClass('input-icons')
                        .append(
                            $('<span/>').addClass('badge badge-pill handle pr-0 mr-0')
                            .append(
                                $('<i/>').addClass('simple-icon-cursor-move')
                            ),

                            $('<span/>').addClass('badge badge-pill del-ans btn')
                            .append(
                                $('<i/>').addClass('simple-icon-trash')
                            )
                        )
                    )




                $(this).parent().parent().children('.answers').append(ansBox)
            })
        });
    </script>


    {{-- del ans --}}
    <script>
        $(function() {
            $index = 0;
            $('#update-form').on('click', '.del-ans', function() {
                $(this).parent().parent().slideUp('', function() {
                    // console.log($(this).children('.form-control').attr('name'));
                    $name = $(this).children('.form-control').attr('name')
                        // .substring(0, $(this).children('.form-control').attr('name').indexOf('[options]') + 9) 
                        +
                        "[deleted]";

                    if ($name.indexOf('[options][new]') != -1) {

                    }

                    // console.log($(this));
                    $delete = $('<input>').attr({
                        'name': $name,
                        'value': true,
                        'style': 'display: none',
                        'class': 'deletes'
                    })

                    $(this).parent().parent().append($delete);
                });
                //FIND OUT IF IT'S A COLUMN HEADER THAT HAS BEEN DELETED
                // console.log($(this).parent().parent().parent().parent())
                if ($(this).parent().parent().parent().parent().hasClass('columns')) {
                    if ($(this).parent().parent().parent().parent().children(
                            '.sortable').children('.ans').length == 5) {
                        $button = $('<div/>').addClass('btn btn-outline-primary btn-sm mb-2 grid-column')
                            .append(
                                $('<i/>').addClass('simple-icon-plus btn-group-icon')
                            ).text('Add Column')
                        $(this).parent().parent().parent().parent().parent().parent().children('.row')
                            .children('.column-btn').append($button)
                    }
                }
            })
        })
    </script>

    {{-- del ques --}}
    <script>
        $(function() {
            $('#update-form').on('click', '.trash-button', function() {
                $que_id = $(this).parent().parent().parent().children('.question-collapse').children(
                        '.card-body').children('.edit-mode').children('.que-section').children('.que-num')
                    .val()

                $que_num = $(this).parent().parent().children('.card-body').children('.list-item-heading')
                    .children('.heading-number').text();

                $('#delete-que-form').children('.que_id').val($que_id);
                $('#delete-que-form').children('.que_num').val($que_num);
                $('#delete-que-form').submit();
            })
        })
    </script>

    {{-- preview question --}}
    <script>
        $(function() {

            $("#update-form").on("input", '.writtenQuestion', function() {
                // console.log($(this).val())
                $(this).parent().parent().parent().parent().parent().children('.d-flex')
                    .children('.card-body').children('.list-item-heading').children('.preview-question')
                    .text($(this).val())


            });


            $('#update-form').on('click', '.view-button', function() {
                $base = $(this).parent().parent().parent();
                // console.log($base)
                $question = $(this).parent().parent().children('.card-body').children('.list-item-heading')
                    .children('.preview-question').text();


                $viewMode = $(this).parent().parent().parent().children('.question-collapse').children(
                    '.card-body').children('.view-mode');


                $editMode = $(this).parent().parent().parent().children('.question-collapse').children(
                    '.card-body').children('.edit-mode');


                $options = $editMode.children('.ans-form').children('.non-grid').children('.answers')
                    .children('.ans');

                $grid_rows = $editMode.children('.ans-form').children('.grid').children('.answers')
                    .children('.rows').children('.sortable').children('.ans');

                $grid_columns = $editMode.children('.ans-form').children('.grid').children('.answers')
                    .children('.columns').children('.sortable').children('.ans');

                // console.log($options)
                //set updated question
                $viewMode.children('.preview-question').text($question)




                //set updated options
                switch ($editMode.children('.opt-type').children('.form-control').val()) {
                    //text (single line)
                    case '1':
                        // console.log('1')
                        $textBox = $('<input>').attr({
                            'class': 'form-control',
                            'type': 'text',
                            'name': 'ans',
                            'id': 'ans',
                            'placeholder': 'Enter Answer Here...'
                        });

                        //place text box in view mode
                        $viewMode.children('.mb-4').html($textBox);
                        break;

                        //text (multi line)
                    case '2':
                        //clear view options
                        $viewMode.children('.mb-4').html(' ');

                        $textArea = $('<textarea/>').attr({
                            'class': 'form-control',
                            'name': '',
                            'id': '',
                            'cols': '30',
                            'rows': '2',
                        })

                        $viewMode.children('.mb-4').append($textArea);
                        break;

                        // Single Select (Radio Button)
                    case '3':

                        //clear view options
                        $viewMode.children('.mb-4').html(' ');


                        $.each($options, function(index, elem) {
                            $optionBox = $('<div/>').addClass('custom-control custom-radio')
                                .append(
                                    $('<input>').attr({
                                        'class': 'custom-control-input',
                                        'type': 'radio',
                                        'name': 'ans',
                                        'id': 'ans' + index
                                    }),

                                    $(`<label/>`).attr({
                                        'for': 'ans' + index,
                                        'class': 'custom-control-label'
                                    }).text($(this).children('.form-control').val())
                                )

                            $viewMode.children('.mb-4').append($optionBox);
                        })

                        // console.log(3)

                        break;
                        // Single Select (Drop down)
                    case '4':

                        //clear view options
                        $viewMode.children('.mb-4').html(' ');

                        $drop_down = $('<select>').addClass('drop-down-preview form-control')
                        // get and set all options
                        $.each($options, function(index, elem) {
                            $option = $('<option/>').attr({
                                'class': 'custom-control',
                                'value': $(this).children('.form-control').val()
                            }).text($(this).children('.form-control').val())
                            $drop_down.append($option)
                        })
                        $viewMode.children('.mb-4').html($drop_down);

                        $('.drop-down-preview').select2({

                            theme: "bootstrap",
                            placeholder: "",
                            maximumSelectionSize: 6,
                        })
                        $('.select2-selection--single').addClass('form-control');


                        break;
                        // Multiple Select (Check Box)
                    case '5':
                        //clear view options
                        $viewMode.children('.mb-4').html(' ');

                        // get and set all options
                        $.each($options, function(index, elem) {
                            $optionBox = $('<div/>').addClass('custom-control custom-checkbox')
                                .append(
                                    $('<input>').attr({
                                        'class': 'custom-control-input',
                                        'type': 'checkbox',
                                        'name': 'ans' + index,
                                        'id': 'ans' + index
                                    }),

                                    $(`<label/>`).attr({
                                        'for': 'ans' + index,
                                        'class': 'custom-control-label'
                                    }).text($(this).children('.form-control').val())
                                )

                            // console.log($optionBox)
                            // console.log($viewMode.children('.mb-4'))
                            $viewMode.children('.mb-4').append($optionBox);
                        })
                        break;

                        // Grid
                    default:
                        //clear view options
                        $viewMode.children('.mb-4').html(' ');

                        $grid = $('<div/>').addClass('row col-12').append(
                            $('<div/>').addClass('d-flex flex-column col-2').append(
                                $('<div/>').attr({
                                    'style': 'height: 50px'
                                })
                            ),

                            $('<div/>').attr({
                                'class': 'col-10 row',
                                'style': 'flex-wrap: nowrap',
                            })


                        )

                        $.each($grid_rows, function() {
                            $grid.children('.d-flex').append($('<div/>').addClass(
                                    'text-center mb-2')
                                .text($(this).children('.form-control').val()))
                        })

                        $.each($grid_columns, function() {
                            $grid.children('.row').append($('<div/>').attr({
                                'class': 'd-flex flex-column justify-content-between',
                                'style': 'width: 100%; height: 100%; min-width: 100px',
                            }).append(
                                $('<div/>').attr({
                                    'class': 'd-flex align-items-center justify-content-center w-100',
                                    'style': 'height: 50px',
                                }).text($(this).children('.form-control').val())
                            ))
                        })

                        $row_index = 1;
                        $.each($grid_rows, function() {
                            $grid.children('.row').children('.d-flex').append(
                                $('<div/>').addClass('d-flex justify-content-center mb-2')
                                .append(
                                    $('<input>').attr({
                                        'type': 'radio',
                                        'name': 'row' + $row_index,

                                    })
                                )
                            )
                            $row_index++;
                        })

                        $viewMode.children('.mb-4').append($grid)
                        break;
                }


                // console.log($options)

            })
            // $('.option-type').on('change', function () {
            //     console.log($(this).val())
            // })
        })
    </script>

    <script>
        $(function() {
            $('#update-form').on('click', '.select2-selection__rendered', function() {

                if ($(this).parent().parent().parent().parent().children('select').hasClass(
                        'drop-down-preview')) {
                    $('.select2-search--dropdown').hide()
                } else {
                    $('.select2-search--dropdown').show()
                }
            })
        })
    </script>

    {{-- desc-edit/save --}}
    <script>
        $(function() {
            $('.summary-edit').on('click', function() {

                if ($(this).hasClass('desc-edit')) {
                    $description = $(this).parent().parent().children('.card-body').children('.desc')
                        .text();
                    $name = $(this).parent().parent().children('.card-body').children('.name').text();

                    // $(this).parent().parent().children('.card-body').children('.desc').html($('<textarea/>')
                    //     .attr({
                    //         'class': 'form-control',
                    //         'rows': '10'
                    //     }).text($description))

                    $(this).parent().parent().children('.card-body').children('.desc').hide()
                    $(this).parent().parent().children('.card-body').children('.name').hide()

                    $('#survey-name').val($name)
                    $('#survey-name').show()

                    $('#survey-description').text($description)
                    $('#survey-description').show()

                    // $(this).parent().parent().children('.card-body').children('.name').html(
                    //     $('<input/>').attr({
                    //         'type': 'text',
                    //         'class': 'form-control',
                    //         'value': $name
                    //     })
                    // )
                    // console.log($description)

                } else {
                    // $description = $(this).parent().parent().children('.card-body').children('.desc')
                    //     .children('.form-control').val();
                    // $name = $(this).parent().parent().children('.card-body').children('.name').children(
                    //     '.form-control').val();
                    // $(this).parent().parent().children('.card-body').children('.desc').html($description)
                    // $(this).parent().parent().children('.card-body').children('.name').html($name)

                    $description = $('#survey-description').val()
                    $name = $('#survey-name').val()

                    $('#survey-name').hide()
                    $('#survey-description').hide()

                    $(this).parent().parent().children('.card-body').children('.desc').text($description)
                        .show()
                    $(this).parent().parent().children('.card-body').children('.name').text($name).show()

                    // console.log($description)
                }

                // change icon
                $(this).children('i').toggleClass('simple-icon-eye')
                $(this).children('i').toggleClass('simple-icon-pencil')
                $(this).toggleClass('btn-outline-theme-3')
                $(this).toggleClass('btn-header-light')
                $(this).toggleClass('desc-edit')
                $(this).toggleClass('desc-save')



            })
        })
    </script>

    {{-- check option box --}}
    <script>
        $(function() {
            $columns = [];
            $('#update-form').on('change', '.option-type', function() {

                // get rows
                $rows = [];
                $i = 0;
                $(this).parent().parent().children('.ans-form').children('.answers').children('.ans').each(
                    function() {
                        $rows[$i] = $(this).children('.form-control').val();
                        $i++;
                    });
                // console.log($rows);

                // check for grid
                if ($(this).val() == 6) {
                    $(this).parent().parent().children('.ans-form').children('.grid').show()
                    $(this).parent().parent().children('.ans-form').children('.non-grid').hide()
                } else if ($(this).val() == 1 || $(this).val() == 2) {
                    $(this).parent().parent().children('.ans-form').children('.grid').hide()
                    $(this).parent().parent().children('.ans-form').children('.non-grid').hide()
                } else if ($(this).val() == 3 || $(this).val() == 4 || $(this).val() == 5) {
                    $(this).parent().parent().children('.ans-form').children('.grid').hide()
                    $(this).parent().parent().children('.ans-form').children('.non-grid').show()
                }
            })
        })
    </script>

    {{-- initial display --}}
    <script>
        $(function() {
            $('.option-type').each(function() {

                if ($(this).val() == 6) {
                    $(this).parent().parent().children('.ans-form').children('.grid').show()
                    $(this).parent().parent().children('.ans-form').children('.non-grid').hide()
                } else if ($(this).val() == 1 || $(this).val() == 2) {
                    $(this).parent().parent().children('.ans-form').children('.grid').hide()
                    $(this).parent().parent().children('.ans-form').children('.non-grid').hide()
                } else if ($(this).val() == 3 || $(this).val() == 4 || $(this).val() == 5) {
                    $(this).parent().parent().children('.ans-form').children('.grid').hide()
                    $(this).parent().parent().children('.ans-form').children('.non-grid').show()
                }
            })
        })
    </script>

    {{-- grid row and columns addition --}}
    <script>
        $(function() {
            $index = 0;

            $('#update-form').on('click', '.grid-row', function() {

                $section_num = $('.current #sec-num').val()

                $que_num = $(this).parent().parent().parent().parent().parent().children('.que-section')
                    .children('.que-num').val();

                var $is_new_que = $(this).parent().parent().parent().parent().parent().children(
                        '.que-section')
                    .children(
                        '.is-new').val();

                console.log($que_num);
                console.log($is_new_que);

                if ($is_new_que) {
                    $question_state = 'new';
                } else {
                    $question_state = 'old';
                }

                $spec = $('.current #section-header-input')
                if ($spec.length > 0 && $spec.attr('name').indexOf('new') != -1) {
                    $section_state = 'new'
                } else {
                    $section_state = 'old'
                }

                if (!$('.survey-wrapper').length > 0) {
                    $name = "questions[" + $question_state + "][" + $que_num + "][options][rows][new][" + (
                        $index++) + "]"
                } else {
                    $name = "sections[" + $section_state + "][" + $section_num + "][questions][" +
                        $question_state + "][" + $que_num + "][options][rows][new][" + ($index++) + "]"
                }

                // if ($is_new_que) {
                var ansBox = $('<div/>').addClass('mb-1 position-relative ans')
                    .append(
                        $('<input>').attr({
                            'class': 'form-control',
                            'type': 'text',
                            'name': $name
                        }),

                        $('<div/>').addClass('input-icons')
                        .append(
                            $('<span/>').addClass('badge badge-pill handle pr-0 mr-0')
                            .append(
                                $('<i/>').addClass('simple-icon-cursor-move')
                            ),

                            $('<span/>').addClass('badge badge-pill del-ans btn')
                            .append(
                                $('<i/>').addClass('simple-icon-trash')
                            )
                        )
                    )
                // } else {
                //     var ansBox = $('<div/>').addClass('mb-1 position-relative ans')
                //         .append(
                //             $('<input>').attr({
                //                 'class': 'form-control',
                //                 'type': 'text',
                //                 'name': "ques[old][" + $que_num + "][ans][rows][new][" + $index++ + "]"
                //             }),

                //             $('<div/>').addClass('input-icons')
                //             .append(
                //                 $('<span/>').addClass('badge badge-pill handle pr-0 mr-0')
                //                 .append(
                //                     $('<i/>').addClass('simple-icon-cursor-move')
                //                 ),

                //                 $('<span/>').addClass('badge badge-pill del-ans btn')
                //                 .append(
                //                     $('<i/>').addClass('simple-icon-trash')
                //                 )
                //             )
                //         )
                // }


                // $index++;
                $(this).parent().parent().parent().children('.answers').children('.rows').children(
                    '.sortable').append(ansBox)
            })

            // check all column length
            $('.grid-column').each(function() {
                if ($(this).parent().parent().parent().children('.answers').children('.columns').children(
                        '.sortable').children('.ans').length == 5) {
                    $(this).remove()
                }
            })

            if ($(this).parent().parent().parent().parent().children('.que-section')
                .children(
                    '.is-new').val()) {
                $question_state = 'new';
            } else {
                $question_state = 'old';
            }

            $('#update-form').on('click', '.grid-column', function() {
                $section_num = $('.current #sec-num').val()
                $que_num = $(this).parent().parent().parent().parent().parent().children('.que-section')
                    .children('.que-num').val();
                var $is_new_que = $(this).parent().parent().parent().parent().parent().children(
                        '.que-section')
                    .children(
                        '.is-new').val();

                if (!$('.survey-wrapper').length > 0) {
                    $name = "questions[" + $question_state + "][" + $que_num + "][options][columns][new][" +
                        ($index++) + "]"
                } else {
                    $name = "sections[" + $section_state + "][" + $section_num + "][questions][" +
                        $question_state + "][" + $que_num + "][options][columns][new][" + ($index++) + "]"
                }

                // if ($is_new_que) {
                var ansBox = $('<div/>').addClass('mb-1 position-relative ans')
                    .append(
                        $('<input>').attr({
                            'class': 'form-control',
                            'type': 'text',
                            'name': $name
                        }),

                        $('<div/>').addClass('input-icons')
                        .append(
                            $('<span/>').addClass('badge badge-pill handle pr-0 mr-0')
                            .append(
                                $('<i/>').addClass('simple-icon-cursor-move')
                            ),

                            $('<span/>').addClass('badge badge-pill del-ans btn')
                            .append(
                                $('<i/>').addClass('simple-icon-trash')
                            )
                        )
                    )
                // } else {
                //     var ansBox = $('<div/>').addClass('mb-1 position-relative ans')
                //         .append(
                //             $('<input>').attr({
                //                 'class': 'form-control',
                //                 'type': 'text',
                //                 'name': "ques[old][" + $que_num + "][ans][columns][new][" + $index++ +
                //                     "]"
                //             }),

                //             $('<div/>').addClass('input-icons')
                //             .append(
                //                 $('<span/>').addClass('badge badge-pill handle pr-0 mr-0')
                //                 .append(
                //                     $('<i/>').addClass('simple-icon-cursor-move')
                //                 ),

                //                 $('<span/>').addClass('badge badge-pill del-ans btn')
                //                 .append(
                //                     $('<i/>').addClass('simple-icon-trash')
                //                 )
                //             )
                //         )
                // }

                // $index++;
                $(this).parent().parent().parent().children('.answers').children('.columns').children(
                    '.sortable').append(ansBox)

                if ($(this).parent().parent().parent().children('.answers').children('.columns').children(
                        '.sortable').children('.ans').length > 5) {
                    $(this).remove()
                }
            })
        })
    </script>

    {{-- notification --}}
    <script>
        $(function() {
            setTimeout(() => {
                $('#notification').fadeIn('slow')
            }, 1500);
        })
        $(function() {
            setTimeout(() => {
                $('#notification').fadeTo('slow', 0)
            }, 3000);
        })
    </script>

    {{-- update survey --}}
    <script>
        $(function() {
            $('.upd-que').click(function() {
                $(this).attr("disabled", true);
                // $('.question').each(function () {
                //     console.log($(this));
                // })

                $('.option-type').each(function() {
                        if ($(this).val() == 6) {
                            $(this).parent().parent().children('.ans-form').children('.non-grid')
                                .remove()
                        } else if ($(this).val() == 1 || $(this).val() == 2) {
                            $(this).parent().parent().children('.ans-form').children('.grid').remove()
                            $(this).parent().parent().children('.ans-form').children('.non-grid')
                                .remove()
                        } else if ($(this).val() == 3 || $(this).val() == 4 || $(this).val() == 5) {
                            $(this).parent().parent().children('.ans-form').children('.grid').remove()
                        }
                    }),
                    $que_order = 1;


                $('#update-form .question').each(function() {

                    //get name
                    $name = $(this).children('.question-collapse').children('.card-body').children(
                            '.edit-mode').children('.que-section').children('.writtenQuestion')
                        .attr('name')

                    $(this).children('.question-collapse').children('.card-body').children(
                            '.edit-mode').children('.que-section').children('.writtenQuestion')
                        .attr('name', $name + '[question]')


                    $(this).children('.question-collapse').children('.card-body').children(
                        '.edit-mode').children('.que-section').append(
                        $('<input>').attr({
                            'type': 'hidden',
                            'class': 'que_order',
                            'name': $name + '[order]',
                            'value': $que_order++
                        })
                    )

                    if ($(this).children('.question-collapse').children('.card-body').children(
                            '.edit-mode').children('.ans-form').children('.ans-group').hasClass(
                            'non-grid')) {
                        // console.log($(this));
                        $ans = $(this).children('.question-collapse').children('.card-body')
                            .children('.edit-mode').children('.ans-form').children('.ans-group')
                            .children('.sortable').children('.ans');
                        // console.log($ans);

                        $opt_order = 1;
                        $ans.each(function() {
                            $name = $(this).children('.form-control').attr('name');

                            $(this).children('.form-control').attr('name', $name +
                                '[option]');

                            $(this).append(
                                $('<input>').attr({
                                    'type': 'hidden',
                                    'name': $name + '[order]',
                                    'value': $opt_order++,
                                })
                            )

                        })

                    } else {

                        $rows = $(this).children('.question-collapse').children('.card-body')
                            .children('.edit-mode').children('.ans-form').children('.ans-group')
                            .children('.answers').children('.rows').children('.sortable').children(
                                '.ans');
                        $columns = $(this).children('.question-collapse').children('.card-body')
                            .children('.edit-mode').children('.ans-form').children('.ans-group')
                            .children('.answers').children('.columns').children('.sortable')
                            .children('.ans');
                        // console.log($rows);
                        // console.log($columns);
                        // console.log($(this));

                        $opt_order = 1;
                        $rows.each(function() {
                            $name = $(this).children('.form-control').attr('name')

                            $(this).children('.form-control').attr('name', $name +
                                '[option]');

                            $(this).append(
                                $('<input>').attr({
                                    'type': 'hidden',
                                    'name': $name + '[order]',
                                    'value': $opt_order++,
                                })
                            )
                        })

                        $opt_order = 1;
                        $columns.each(function() {
                            $name = $(this).children('.form-control').attr('name')

                            $(this).children('.form-control').attr('name', $name +
                                '[option]');

                            $(this).append(
                                $('<input>').attr({
                                    'type': 'hidden',
                                    'name': $name + '[order]',
                                    'value': $opt_order++,
                                })
                            )
                        })
                    }


                })

                $('#update-form').submit()
            })
        })
    </script>

    {{-- add question test --}}
    <script>
        $(function() {
            $('.add-que').click(function() {

                // get question number
                var $que_num = ($('#enable-section').is(':checked')) ?
                    $('.current').children('.sortable-survey').children('div').length :
                    $('.sortable-survey').children('div').length;

                // get section number
                var $sec_num = $('.current #sec-num').val();

                $spec = $('.current #section-header-input')
                if ($spec.length > 0 && $spec.attr('name').indexOf('new') != -1) {
                    $section_state = 'new'
                } else {
                    $section_state = 'old'
                }

                // build card
                var $test_que_card = $('<div/>')
                    .append(
                        $('<div/>').addClass('card question d-flex mb-4 edit-quesiton').append(
                            $('<div/>').addClass('d-flex flex-grow-1 min-width-zero').append(
                                $('<div/>').addClass(
                                    'card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center'
                                ).append(
                                    $('<div/>').addClass('list-item-heading mb-0 truncate w-80 mb-1 mt-1')
                                    .append(
                                        $('<span/>').addClass('heading-number d-inline-block').text(
                                            $que_num + 1),
                                        $('<span/>').addClass('preview-question').text('')
                                    )
                                ),
                                $('<div/>').attr({
                                    'class': 'custom-control d-flex custom-checkbox pl-1 align-self-center pr-4',
                                    'style': 'flex: 0 0 25%; max-width: 20%; gap: 5px'
                                })
                                .append(
                                    $('<div/>').addClass(
                                        'col btn btn-outline-theme-3 icon-button edit-button')
                                    .append(
                                        $('<i/>').addClass('simple-icon-pencil')
                                    ),
                                    $('<div/>').addClass(
                                        'col btn btn-outline-theme-3 icon-button view-button')
                                    .append(
                                        $('<i/>').addClass('simple-icon-eye')
                                    ),
                                    $('<div/>').attr({
                                        'class': 'col mx-1 btn btn-outline-theme-3 icon-button rotate-icon-click rotate',
                                        'data-toggle': 'collapse',
                                        'data-target': '#n' + $que_num, // unique
                                        'aria-expanded': 'true',
                                        'aria-controls': '#n' + $que_num // same unique
                                    }).append(
                                        $('<i/>').addClass('simple-icon-arrow-down with-rotate-icon')
                                    ),
                                    $('<div/>').addClass('col btn btn-danger icon-button remove-button')
                                    .append(
                                        $('<i/>').addClass('iconsminds-close')
                                    )
                                )
                            ),
                            $('<div/>').attr({
                                'class': 'question-collapse collapse show',
                                'id': 'n' + $que_num // same unique
                            }).append(
                                $('<div/>').addClass('card-body pt-0').append(
                                    $('<div/>').addClass('edit-mode').append(
                                        $('<div/>').addClass('form-group mb-5 que-section').append(
                                            $('<label/>').text('Question'),
                                            $('<input>').attr({
                                                'type': 'hidden',
                                                'class': 'que-num',
                                                'value': $que_num + 1 // generate
                                            }),
                                            $('<input>').attr({
                                                'type': 'hidden',
                                                'class': 'is-new',
                                                'value': 'true'
                                            }),

                                            // question input
                                            $('<input>').attr({
                                                'type': 'text',
                                                'class': 'form-control writtenQuestion',
                                                'value': '', // question
                                                'name': ($('#enable-section').is(':checked')) ?
                                                    'sections[' + $section_state + '][' + ($sec_num) +
                                                    '][questions][new][' + (
                                                        $que_num + 1) +
                                                    ']' : 'questions[new][' + ($que_num + 1) +
                                                    ']'
                                            })
                                        ),
                                        $('<div/>').addClass('seperator mb-4'),
                                        $('<div/>').addClass('form-group opt-type').append(
                                            $('<label/>').addClass('d-block').text('Answer Type'),
                                            $('<select/>').attr({
                                                'class': 'form-control new-select2-single option-type',
                                                'data-width': '100%',
                                                'name': ($('#enable-section').is(':checked')) ?
                                                    'sections[' + $section_state + '][' + ($sec_num) +
                                                    '][questions][new][' + (
                                                        $que_num + 1) +
                                                    '][option_type_id]' : 'questions[new][' + (
                                                        $que_num +
                                                        1) +
                                                    '][option_type_id]' // check out
                                            })
                                        ),
                                        $('<div/>').addClass('form-group ans-form').append(
                                            $('<div/>').addClass('grid ans-group').hide().append(
                                                $('<label/>').addClass('d-block').text('Answers'),
                                                $('<div/>').addClass('answers mb-3 d-flex col').append(
                                                    $('<div/>').addClass('col rows').append(
                                                        $('<h5/>').text('Rows'),
                                                        $('<div/>').addClass('sortable').append(
                                                            // row options
                                                        )
                                                    ),
                                                    $('<div/>').addClass('col columns').append(
                                                        $('<h5/>').text('Columns'),
                                                        $('<div/>').addClass('sortable').append(
                                                            // column options
                                                        )
                                                    )
                                                ),
                                                $('<div/>').addClass('col-12 row').append(
                                                    $('<div/>').addClass('col text-center row-btn').append(
                                                        $('<div/>').addClass(
                                                            'btn btn-outline-primary btn-sm mb-2 grid-row')
                                                        .append(
                                                            $('<i/>').addClass(
                                                                'simple-icon-plus btn-group-icon')
                                                        ).text('Add Row')
                                                    ),
                                                    $('<div/>').addClass('col text-center column-btn')
                                                    .append(
                                                        $('<div/>').addClass(
                                                            'btn btn-outline-primary btn-sm mb-2 grid-column'
                                                        ).append(
                                                            $('<i/>').addClass(
                                                                'simple-icon-plus btn-group-icon')
                                                        ).text('Add Column')
                                                    ),
                                                )
                                            ),
                                            $('<div/>').addClass('non-grid ans-group').hide().append(
                                                $('<label/>').addClass('d-block').text('Answers'),
                                                $('<div/>').addClass('answers mb-3 sortable').append(
                                                    // non-grid options
                                                ),
                                                $('<div/>').addClass('text-center').append(
                                                    $('<div/>').addClass(
                                                        'btn btn-outline-primary btn-sm mb-2 ans-btn')
                                                    .append(
                                                        $('<i/>').addClass(
                                                            'simple-icon-plus btn-group-icon')
                                                    ).text('Add Answer')
                                                )
                                            )
                                        )
                                    ),
                                    $('<div/>').addClass('view-mode').append(
                                        $('<label/>').addClass('preview-question'),
                                        $('<div/>').addClass('mb-4')
                                    )
                                )
                            )
                        )

                    );
                console.log($test_que_card);
                console.log($('.current .sortable-survey'));

                ($('#enable-section').is(':checked')) ?

                $('.current .sortable-survey').append($test_que_card):
                    $('.sortable-survey').append($test_que_card)

                var $options = [
                    @foreach ($optionTypes as $optionType)
                        {
                            id: {{ $optionType->id }},
                            text: '{{ $optionType->type }}'
                        },
                    @endforeach
                ]

                $(".new-select2-single").select2({
                    data: $options,
                    theme: "bootstrap",
                    placeholder: "",
                    maximumSelectionSize: 6,
                })

                $('.select2-selection--single').addClass('form-control');

                $("html, body").animate({
                    scrollTop: $(
                        'html, body').get(0).scrollHeight
                }, 1000);
            })
        })
    </script>


    {{-- remove question --}}
    <script>
        $(function() {
            $('#update-form').on('click', '.remove-button', function() {

                $card = $(this).parent().parent().parent().parent();

                $card.slideUp(function() {
                    $(this).remove();

                    $que_num = 1;
                    $('.heading-number').each(function() {
                        $(this).text($que_num++);
                        // console.log($(this));
                    })
                })


            })


        })
    </script>

    <script>
        $(function() {
            for (let index = 0; index < $('.heading-number').length; index++) {
                const element = $('.heading-number')[index];
                element.innerText = index + 1
            }
        })
    </script>

</body>


</html>
