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


        <div class="text-center mt-4"><button type="button" class="btn btn-outline-primary btn-sm mb-2 add-que"><i
                    class="simple-icon-plus btn-group-icon"></i> Add Question</button></div>
        <div class="text-center mt-4"><button type="button" class="btn btn-outline-success btn-sm mb-2 upd-que"><i
                    class="simple-icon-plus btn-group-icon"></i> Update</button></div>
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

    {{-- new que add --}}
    <script>
        $(function() {
            $('.add-que').click(function() {
                $que_box = $('<div/>').append(
                    $('<div/>').text('New Question').addClass('mb-1'),
                    $('<form> @csrf </form>').attr({
                        'method': 'post',
                        'action': '{{ route('survey.addQuestion') }}',
                    }).append(
                        $('<input/>').attr({
                            'type': 'hidden',
                            'value': '{{ $survey->id }}',
                            'name': 'survey_id',
                        }),
                        $('<textarea/>').attr({
                            'class': 'form-control',
                            'name': 'question',
                            'id': 'question',
                            'autocomplete': 'off',
                        }),
                        $('<div/>').addClass('text-center mt-3').append(

                            $('<button/>').addClass('btn btn-danger cancel-add-que mr-2').text(
                                'cancel'),

                            $('<input>').attr({
                                'type': 'submit',
                                'class': 'btn btn-primary',
                                'value': 'add'
                            })
                        )
                    ),


                );

                // $('.sortable-survey').append($que_box);
                $(this).parent().parent().append($que_box);

                $(this).hide();
                $('.upd-que').hide();

            })

            $('.app-menu').on('click', '.cancel-add-que', function() {
                $(this).parent().parent().parent().remove();
                $('.add-que').show()
                $('.upd-que').show()
            })
        })
        // <div>
        //     <div class="card p-4 mb-4" style="border-radius: .75rem">
        //         <div class="mb-1">Question</div>
        //         <form action="" method="post">
        //             @csrf
        //             <input class="form-control" type="text" name="question" id="question">
        //         </form>
        //     </div>
        // </div>
    </script>

    {{-- add answer --}}
    <script>
        $(function() {
            $('.question').on('click', '.ans-btn', function(e) {

                var $que_num = $(this).parent().parent().parent().parent().children('.que-section')
                    .children(
                        '.que-num').val();


                var ansBox = $('<div/>').addClass('mb-1 position-relative ans')
                    .append(
                        $('<input>').attr({
                            'class': 'form-control',
                            'type': 'text',
                            'name': "ques[" + $que_num + "][ans][new][]"
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
            $('.question').on('click', '.del-ans', function() {
                $(this).parent().parent().slideUp('', function() {
                    $(this).remove();
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

    {{-- preview question --}}
    <script>
        $(function() {



            $(".writtenQuestion").on("input", function() {
                // console.log($(this).val())
                $(this).parent().parent().parent().parent().parent().children('.d-flex')
                    .children('.card-body').children('.list-item-heading').children('.preview-question')
                    .text($(this).val())


            });


            $('.view-button').click(function() {
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

                    case '3':

                        //clear view options
                        $viewMode.children('.mb-4').html(' ');

                        // get and set all options
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

                    case '4':
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
                            $grid.children('.d-flex').append($('<div/>').addClass('text-center mb-2')
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
                                $('<div/>').addClass('d-flex justify-content-center mb-2').append(
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

    {{-- desc-edit/save --}}
    <script>
        $(function() {
            $('.desc-edit').on('click', function() {

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
            $('.option-type').on('change', function() {

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
                if ($(this).val() == 5) {
                    $(this).parent().parent().children('.ans-form').children('.grid').show()
                    $(this).parent().parent().children('.ans-form').children('.non-grid').hide()
                } else if ($(this).val() == 1 || $(this).val() == 2) {
                    $(this).parent().parent().children('.ans-form').children('.grid').hide()
                    $(this).parent().parent().children('.ans-form').children('.non-grid').hide()
                } else if ($(this).val() == 3 || $(this).val() == 4) {
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

                // get rows
                // $rows = [];
                // $i = 0;
                // $(this).parent().parent().children('.ans-form').children('.answers').children('.ans').each(
                //     function() {
                //         $rows[$i] = $(this).children('.form-control').val();
                //         $i++;
                //     });
                // console.log($rows);

                // check for grid
                if ($(this).val() == 5) {
                    $(this).parent().parent().children('.ans-form').children('.grid').show()
                    $(this).parent().parent().children('.ans-form').children('.non-grid').hide()
                } else if ($(this).val() == 1 || $(this).val() == 2) {
                    $(this).parent().parent().children('.ans-form').children('.grid').hide()
                    $(this).parent().parent().children('.ans-form').children('.non-grid').hide()
                } else if ($(this).val() == 3 || $(this).val() == 4) {
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

            $('.grid-row').click(function() {

                $que_num = $(this).parent().parent().parent().parent().parent().children('.que-section')
                    .children('.que-num').val();

                console.log($(this).parent().parent().parent().parent().parent().children('.que-section')
                    .children('.que-num').val());

                var ansBox = $('<div/>').addClass('mb-1 position-relative ans')
                    .append(
                        $('<input>').attr({
                            'class': 'form-control',
                            'type': 'text',
                            'name': "ques[" + $que_num + "][ans][rows][new][]"
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
                $index++;
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

            $('.question').on('click', '.grid-column', function() {

                $que_num = $(this).parent().parent().parent().parent().parent().children('.que-section')
                    .children('.que-num').val();

                console.log($que_num);

                var ansBox = $('<div/>').addClass('mb-1 position-relative ans')
                    .append(
                        $('<input>').attr({
                            'class': 'form-control',
                            'type': 'text',
                            'name': "ques[" + $que_num + "][ans][columns][new][]"
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
                $index++;
                $(this).parent().parent().parent().children('.answers').children('.columns').children(
                    '.sortable').append(ansBox)

                if ($(this).parent().parent().parent().children('.answers').children('.columns').children(
                        '.sortable').children('.ans').length == 5) {
                    $(this).remove()
                }
            })
        })
    </script>

    {{-- notification --}}
    <script>
        $(function () {
            setTimeout(() => {
                $('#notification').fadeIn('slow')
            }, 1500);
        })
        $(function () {
            setTimeout(() => {
                $('#notification').fadeTo('slow', 0)
            }, 3000);
        })
    </script>

    <script>
        $(function() {
            $('.upd-que').click(function() {
                $('.option-type').each(function() {
                        if ($(this).val() == 5) {
                            $(this).parent().parent().children('.ans-form').children('.non-grid')
                                .remove()
                        } else if ($(this).val() == 1 || $(this).val() == 2) {
                            $(this).parent().parent().children('.ans-form').children('.grid').remove()
                            $(this).parent().parent().children('.ans-form').children('.non-grid')
                                .remove()
                        } else if ($(this).val() == 3 || $(this).val() == 4) {
                            $(this).parent().parent().children('.ans-form').children('.grid').remove()
                        }
                    }),
                    $('#update-form').submit()
            })
        })
    </script>

</body>
<!-- Mirrored from dore-jquery.coloredstrategies.com/Apps.Survey.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Nov 2021 22:42:24 GMT -->

</html>
