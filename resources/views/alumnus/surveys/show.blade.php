<!DOCTYPE html>
<html lang="en">
<!-- m dore-jquery.coloredstrategies.com/Apps.Survey.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Nov 2021 22:42:24 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="An Alumni Tracer Portal (ATP) Designed For Engaging in Surveys at Accra Technical University. Developed for Graduate Evaluation and Quality Assurance. The ATP seeks to learn about the extent to which the educational experience at Accra Technical University (ATU) has contributed to the career developments of its alumni. In particular, studies conducted through the ATP aim at determining the impact of training received at ATU on work placement and career progression of graduates. Your feedback, processed confidentially, will inform institutional policy on improving academic programmes and practical training, for quality service delivery to current students, prospective admissions, and industry.">
    <meta name="robots" content="noindex,nofollow">
    <title>Survey | Alumni Tracer Portal (ATP) | Accra Technical University (ATU)</title>
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
    <link rel="icon" type="image/x-icon" href="{{ asset('img/profiles/profile-icon-atu.png') }}">

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

    @include('inc.alumnus.navbar')


    @include('inc.alumnus.side-bar')


    @extends('inc.alumnus.question.question-content')


    @section('question-list')
        @include('inc.alumnus.question.question-list', ['responses', $responses])
    @endsection

    @section('stat')
        <li class="active"><a href="#"> All Questions <span
                    class="float-right">{{ $survey->questions->count() }}</span></a></li>
        <li class="active"><a href="#"> Progress <span
                    class="float-right progress-tracker">{{ '0/' . $survey->questions->count() }}</span></a></li>


        <div class="text-center mt-4">
            <div class="btn btn-outline-primary btn-sm mb-2" id="save-btn"><i class="simple-icon-plus btn-group-icon"></i>
                Save</div>
        </div>
        <div class="text-center mt-4">
            <div class="btn btn-outline-danger btn-sm mb-2" id="reset-btn"><i class="simple-icon-trash btn-group-icon"></i>
                Reset</div>
        </div>
        <div class="separator my-3"></div>
        @if ($survey->sections != null)
            <div class="mt-2" id="section-list" class="scroll h-100 col mt-2" style="max-height: 500px">

                <div class="sections">
                    @for ($i = 0; $i < $survey->sections->count(); $i++)
                        <div class="position-relative my-1 py-1 ml-4  pointer" id="section-{{ $i + 1 }}">
                            {{ $survey->sections[$i]->title }}</div>
                    @endfor
                </div>

            </div>
        @endif
        <div class="text-center mt-4">

            <form action="{{ route('alumnus.survey.submit') }}" method="post" id="submit-form">
                @csrf
                <input type="hidden" name="survey_id" value="{{ $survey->id }}">
            </form>
            <div style="display: none" class="btn btn-success btn-sm mb-2" id="submit-btn"><i
                    class="simple-icon-plus btn-group-icon"></i>
                Sumbit</div>
        </div>

    @endsection



    <script src="{{ asset('js/vendor/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/vendor/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/vendor/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('js/vendor/Sortable.js') }}"></script>
    <script src="{{ asset('js/vendor/mousetrap.min.js') }}"></script>
    <script src="{{ asset('js/vendor/select2.full.js') }}"></script>
    <script src="{{ asset('js/dore.script.js') }}"></script>

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

    <!-- sections -->
    <script>
        $(function() {
            $('#section-' + $('.current').children('#sec-num').val()).addClass('dot-active')

            $('.sections').on('click', '.pointer', function() {
                $('.dot-active').removeClass('dot-active')
                $(this).addClass('dot-active')
                $target_section = $(this).attr('id');
                $('.current').removeClass('current')
                $('.' + $target_section).addClass('current')

                // // console.log($('.current #sec-num').val());
            })
        })
    </script>

    {{-- drop down theme --}}
    <script>
        $(function() {
            $('.drop-down').select2({
                theme: "bootstrap",
                placeholder: "",
                maximumSelectionSize: 6,
            })

            $('.select2-selection--single').addClass('form-control');

            // setTimeout(() => {
            //     $('.select2-search--dropdown').hide()
            // }, 5000);

            $('form').on('click', '.select2-selection__rendered', function() {
                // // console.log($(this).parent().parent().parent().parent().children('select'));
                if ($(this).parent().parent().parent().parent().children('select').hasClass('drop-down')) {
                    $('.select2-search--dropdown').hide()
                } else {
                    $('.select2-search--dropdown').show()
                }
            })

        })
    </script>

    {{-- save --}}
    <script>
        $(function() {
            $('#save-btn').click(function() {
                // // console.log('save');
                // // console.log("answered = " + $('.answered').length);
                $('#progress').val($('.answered').length)
                // // console.log($('#progress'));

                $('.custom-radio').each(function() {
                    // console.log($(this).children('input').attr('id'));
                    $name = $(this).children('input').attr('name');
                    $id = $(this).children('input').attr('id');
                    $input = $(this).children('input');
                    $input.attr('name', $name + '[' + $id.substring(1, $id.length) + ']');
                })

                if ($('.survey-wrapper')) {
                    $question_group = $('.sortable-survey');

                    $answered_sections = $('.fully-answered')

                    if ($('.current').children('.sortable-survey').hasClass('fully-answered') &&
                        $answered_sections.length != $question_group.length) {
                        $current_section_number = $('.current').children('#sec-num').val();

                        $arr = []
                        for (let sec_num = 1; sec_num <= $('.sortable-survey').length; sec_num++) {
                            $arr.push(sec_num);
                        }

                        $section_check_order = [].concat($arr.slice(($current_section_number), $arr
                                .length), $arr
                            .slice(0, $current_section_number - 1));


                        for (let index = 0; index < $section_check_order.length; index++) {
                            const number = $section_check_order[index];
                            //  section
                            $question_group = $('.section-' + number).children('.sortable-survey');
                            // console.log($section);
                            if (!$question_group.hasClass('fully-answered')) {
                                // console.log('next unanswered section');
                                // console.log($question_group);
                                $('#section_check_point').val(number)
                                break;
                            }
                        }

                    } else if (!$('.current').children('.sortable-survey').hasClass('fully-answered')) {
                        $('#section_check_point').val($('.current').children('#sec-num').val())
                    }

                }


                $('#save-form').submit();
            })
        })
    </script>

    {{-- reset --}}
    <script>
        $(function() {
            $('#reset-btn').click(function() {
                // // console.log('dsv');
                // // console.log("answered = " + $('.answered').length);
                // $('#progress').val($('.answered').length)
                // // console.log($('#progress'));
                $('#reset-form').submit();
            })
        })
    </script>

    {{-- submit --}}
    <script>
        $(function() {
            $('#submit-btn').click(function() {
                $('.custom-radio').each(function() {
                    // console.log($(this).children('input').attr('id'));
                    $name = $(this).children('input').attr('name');
                    $id = $(this).children('input').attr('id');
                    $input = $(this).children('input');
                    $input.attr('name', $name + '[' + $id.substring(1, $id.length) + ']');
                })
                $('#isSubmit').val('yes')
                $('#save-form').submit();
            })
        })
    </script>

    {{-- trim input --}}
    <script>
        $(function() {
            $('.trim').each(function() {
                $(this).val($(this).val().trim())
            })
            $('textarea').each(function() {
                $(this).text($(this).text().trim())
            })
        })
    </script>

    {{-- check if answered --}}
    <script>
        $(function() {
            function countAnswered() {
                $('#progress').val($('.answered').length);
                $('.progress-tracker').text($('.answered').length + '/' + $('.question').length);
                if ($('.answered').length == $('.question').length) {
                    $('#submit-btn').show()
                } else {
                    $('#submit-btn').hide()
                }

                $('.sortable-survey').each(function() {
                    $ques_num = $(this).find('.question').length;
                    $ans_num = $(this).find('.answered').length

                    if ($ques_num == $ans_num)
                        $(this).addClass('fully-answered')
                })

            }

            $('input').on('change', function() {
                //text box
                if ($(this).attr('type') == 'text') {
                    // if empty
                    if ($(this).val().trim() == "") {
                        $(this).parent().parent().parent().parent().parent().removeClass('answered')

                    } else {
                        $(this).parent().parent().parent().parent().parent().addClass('answered')
                    }

                }

                //radio button
                if ($(this).attr('type') == 'radio') {
                    // not grid
                    if ($(this).parent().hasClass('custom-radio')) {
                        $(this).parent().parent().children('.custom-radio').each(function() {
                            if ($(this).children('input').is(':checked')) {
                                $(this).parent().parent().parent().parent().parent().parent()
                                    .addClass('answered')
                                return false;
                            } else {
                                $(this).parent().parent().parent().parent().parent().parent()
                                    .removeClass('answered')
                            }
                        })
                    } else {
                        // grid

                        $grid_option_group = $(this).parent().parent().parent().parent();

                        //get row count
                        $row_count = $grid_option_group.children('.grid-row-group').children('.grid-row')
                            .length;

                        //input tracker array
                        $input_track = [];
                        for (let row_index = 0; row_index < $row_count; row_index++)
                            $input_track[row_index] = false;

                        //grid columns
                        $grid_option_group.children('.grid-column-group').children('.grid-column').each(
                            function() {
                                $input_index = 0;
                                //inputs
                                $(this).children('.check-box').each(function() {
                                    if (!$input_track[$input_index])
                                        $input_track[$input_index] = $(this)
                                        .children(
                                            'input').is(':checked')
                                    $input_index++;
                                })
                            })


                        $question = $grid_option_group.parent().parent().parent().parent()
                            .parent();

                        console.log($input_track);
                        for (let index = 0; index < $input_track.length; index++) {
                            const bool = $input_track[index];
                            if (bool) {
                                $question.addClass('answered')

                            } else {
                                $question.removeClass('answered')
                                break;
                            }
                        }

                    }


                }

                //check box
                if ($(this).attr('type') == 'checkbox') {
                    $(this).parent().parent().children('.custom-checkbox').each(function() {
                        if ($(this).children('input').is(':checked')) {
                            $(this).parent().parent().parent().parent().parent().addClass(
                                'answered')
                            return false
                        } else {
                            $(this).parent().parent().parent().parent().parent()
                                .removeClass(
                                    'answered')
                        }
                    });
                }

                countAnswered();
            })
            // textarea
            $('textarea').on('change', function() {
                // if empty
                if ($(this).val().trim() == "") {
                    $(this).parent().parent().parent().parent().parent().removeClass('answered')
                } else {
                    $(this).parent().parent().parent().parent().parent().addClass('answered')
                }
                countAnswered();
            })

            // countAnswered();
        })
    </script>

    {{-- check and count answered question on load --}}
    <script>
        $(function() {

            $('.sortable-survey').each(function() {

                // drop downs
                $(this).find('select').each(function() {
                    // // console.log($(this));
                    $(this).parent().parent().parent().parent().parent().addClass('answered')
                })

                //text box // radio button (not grid) // check box
                $(this).find('input').each(function() {
                    //text box
                    if ($(this).attr('type') == 'text') {
                        // if empty
                        if ($(this).val().trim() == "") {
                            $(this).parent().parent().parent().parent().parent().removeClass(
                                'answered')

                        } else {
                            // console.log($(this));
                            $(this).parent().parent().parent().parent().parent().addClass(
                                'answered')
                        }

                    }


                    //radio button  // not grid
                    else if ($(this).attr('type') == 'radio') {
                        // // console.log("radio");
                        // not grid
                        if ($(this).parent().hasClass('custom-radio')) {
                            $(this).parent().parent().children('.custom-radio').each(function() {
                                if ($(this).children('input').is(':checked')) {
                                    $(this).parent().parent().parent().parent().parent()
                                        .addClass('answered')
                                    // // console.log($(this));
                                    return false;
                                } else {
                                    $(this).parent().parent().parent().parent().parent()
                                        .parent()
                                        .removeClass('answered')
                                }
                            })
                        }
                    }

                    //check box
                    else if ($(this).attr('type') == 'checkbox') {
                        $(this).parent().parent().children('.custom-checkbox').each(function() {
                            if ($(this).children('input').is(':checked')) {
                                $(this).parent().parent().parent().parent().parent()
                                    .addClass(
                                        'answered')
                                return false
                            } else(
                                $(this).parent().parent().parent().parent().parent()
                                .removeClass(
                                    'answered')
                            )
                        });
                    }


                })

                // text area
                $(this).find('textarea').each(function() {

                    if ($(this).val().trim() == "") {
                        $(this).parent().parent().parent().parent().parent().removeClass('answered')
                    } else {
                        $(this).parent().parent().parent().parent().parent().addClass('answered')
                    }
                })

                // radio button (grid)

                $(this).find('.grid-option-group').each(function() {
                    //get row count
                    $row_count = $(this).children('.grid-row-group').children('.grid-row').length;

                    //input tracker array
                    $input_track = [];
                    for (let row_index = 0; row_index < $row_count; row_index++)
                        $input_track[row_index] = false;

                    //grid columns
                    $(this).children('.grid-column-group').children('.grid-column').each(
                        function() {
                            $input_index = 0;
                            //inputs
                            $(this).children('.check-box').each(function() {
                                if (!$input_track[$input_index])
                                    $input_track[$input_index] = $(this).children(
                                        'input').is(':checked')
                                $input_index++;
                            })
                        }
                    )


                    $question = $(this).parent().parent().parent().parent()
                        .parent();

                    // $question.addClass('answered')

                    console.log($input_track);
                    for (let index = 0; index < $input_track.length; index++) {
                        const bool = $input_track[index];
                        if (bool) {
                            $question.addClass('answered')
                        } else {
                            $question.removeClass('answered')
                            break;
                        }
                    }

                })

                //check if section is fully answered
                // $ques_num = $(this).find('.question').length;
                // $ans_num = $(this).find('.answered').length

                // if ($ques_num == $ans_num)
                //     $(this).addClass('fully-answered')


            })

            // $('#progress').val($('.answered').length);
            // $('.progress-tracker').text($('.answered').length + '/' + $('.question')
            //     .length);

            // if ($('.answered').length == $('.question').length) {
            //     $('#submit-btn').show()
            // } else {
            //     $('#submit-btn').hide()
            // }

            $('#progress').val($('.answered').length);
            $('.progress-tracker').text($('.answered').length + '/' + $('.question').length);
            if ($('.answered').length == $('.question').length) {
                $('#submit-btn').show()
            } else {
                $('#submit-btn').hide()
            }

            $('.sortable-survey').each(function() {
                $ques_num = $(this).find('.question').length;
                $ans_num = $(this).find('.answered').length

                if ($ques_num == $ans_num)
                    $(this).addClass('fully-answered')
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

    <script>
        $(function() {
            $('#survey-section').addClass('active');
        })
    </script>

    {{-- <script>
        $(function() {
            $('input').each(function() {
                
            })
        })
    </script> --}}

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
