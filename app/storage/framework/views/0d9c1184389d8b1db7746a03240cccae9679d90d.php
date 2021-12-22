<!DOCTYPE html>
<html lang="en">
<!-- m dore-jquery.coloredstrategies.com/Apps.Survey.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Nov 2021 22:42:24 GMT -->

<head>
    <meta charset="UTF-8">
    <title>Create Survey | ATU TRACER</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <link rel="stylesheet" href="<?php echo e(asset('font/iconsmind-s/css/iconsminds.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('font/simple-line-icons/css/simple-line-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/bootstrap.rtl.only.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/perfect-scrollbar.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/select2-bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/component-custom-switch.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/dore.dark.bluenavy.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/main.css')); ?>">

    <style>
        .theme-colors {
            display: none;
        }

    </style>


</head>

<body id="app-container" class="menu-sub-hidden  right-menu show-spinner">

    <?php echo $__env->make('inc.dashboard.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <?php echo $__env->make('inc.dashboard.side-bar', ['surveys' => $allSurveys], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    


    <?php $__env->startSection('question-summary'); ?>
        <?php echo $__env->make('inc.dashboard.question.question-summary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('question-list'); ?>
        <?php echo $__env->make('inc.dashboard.question.question-list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('stat'); ?>
        <li class="active"><a href="#"> Questions <span
                    class="float-right"><?php echo e($survey->questions->count()); ?></span></a></li>


        <div class="text-center mt-4"><button type="button" class="btn btn-outline-primary btn-sm mb-2 add-que"><i
                    class="simple-icon-plus btn-group-icon"></i> Add Question</button></div>
        
    <?php $__env->stopSection(); ?>



    <script src="<?php echo e(asset('js/vendor/jquery-3.3.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vendor/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vendor/perfect-scrollbar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vendor/Chart.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vendor/Sortable.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vendor/mousetrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vendor/select2.full.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dore.script.js')); ?>"></script>

    
    <script>
        function loadStyle(e, t) {
            for (var o = 0; o < document.styleSheets.length; o++)
                if (document.styleSheets[o].href == e) return;
            var a = document.getElementsByTagName("head")[0],
                r = document.createElement("link");
            (r.rel = "stylesheet"),
            (r.type = "text/css"),
            (r.href = '<?php echo e(asset('')); ?>' + e),
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

    
    <script>
        $(function() {
            $('#survey-section').addClass('active');
        })
    </script>



    
    

    
    <script>
        $(function() {
            $('.sortable-survey').on('click', '.ans-btn', function(e) {

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


    
    <script>
        $(function() {
            $('.sortable-survey').on('click', '.del-ans', function() {
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

    
    <script>
        $(function() {



            $(".sortable-survey").on("input", '.writtenQuestion', function() {
                // console.log($(this).val())
                $(this).parent().parent().parent().parent().parent().children('.d-flex')
                    .children('.card-body').children('.list-item-heading').children('.preview-question')
                    .text($(this).val())


            });


            $('.sortable-survey').on('click', '.view-button', function() {
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

    
    <script>
        $(function() {
            $columns = [];
            $('.sortable-survey').on('change', '.option-type', function() {

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

    
    <script>
        $(function() {
            $index = 0;

            $('.sortable-survey').on('click', '.grid-row', function() {

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

            $('.sortable-survey').on('click', '.grid-column', function() {

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
                        '.sortable').children('.ans').length > 5) {
                    $(this).remove()
                }
            })
        })
    </script>

    
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

    
    <script>
        $(function() {


            $('.add-que').click(function() {
                var $que_num = $('.question').length;
                var $test_que_card = $('<div/>')
                    .append(
                        $('<div/>').addClass('card question d-flex mb-4 edit-quesiton').append(
                            $('<div/>').addClass('d-flex flex-grow-1 min-width-zero').append(
                                $('<div/>').addClass(
                                    'card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center'
                                ).append(
                                    $('<div/>').addClass('list-item-heading mb-0 truncate w-80 mb-1 mt-1')
                                    .append(
                                        $('<span/>').addClass('heading-number d-inline-block').text($que_num + 1),
                                        $('<span/>').addClass('preview-question').text('')
                                    )
                                ),
                                $('<div/>').addClass(
                                    'custom-control custom-checkbox pl-1 align-self-center pr-4')
                                .append(
                                    $('<div/>').addClass('btn btn-outline-theme-3 icon-button edit-button')
                                    .append(
                                        $('<i/>').addClass('simple-icon-pencil')
                                    ),
                                    $('<div/>').addClass('btn btn-outline-theme-3 icon-button view-button')
                                    .append(
                                        $('<i/>').addClass('simple-icon-eye')
                                    ),
                                    $('<div/>').attr({
                                        'class': 'btn btn-outline-theme-3 icon-button rotate-icon-click rotate',
                                        'data-toggle': 'collapse',
                                        'data-target': '#id', // unique
                                        'aria-expanded': 'true',
                                        'aria-controls': '#id' // same unique
                                    }).append(
                                        $('<i/>').addClass('simple-icon-arrow-down with-rotate-icon')
                                    )
                                )
                            ),
                            $('<div/>').attr({
                                'class': 'question-collapse collapse show',
                                'id': '#id' // same unique
                            }).append(
                                $('<div/>').addClass('card-body pt-0').append(
                                    $('<div/>').addClass('edit-mode').append(
                                        $('<div/>').addClass('form-group mb-5 que-section').append(
                                            $('<label/>').text('Question'),
                                            $('<input>').attr({
                                                'type': 'hidden',
                                                'class': 'que-num',
                                                'value': '#quetion-id' // generate
                                            }),
                                            $('<input>').attr({
                                                'type': 'text',
                                                'class': 'form-control writtenQuestion',
                                                'value': '', // question
                                                'name': 'ques[#que-id][que]' // check out
                                            })
                                        ),
                                        $('<div/>').addClass('seperator mb-4'),
                                        $('<div/>').addClass('form-group opt-type').append(
                                            $('<label/>').addClass('d-block').text('Answer Type'),
                                            $('<select/>').attr({
                                                'class': 'form-control new-select2-single option-type',
                                                'data-width': '100%',
                                                'name': 'ques[#que_id][opt_type]' // check out
                                            })
                                        ),
                                        $('<div/>').addClass('form-group ans-form').append(
                                            $('<div/>').addClass('grid').hide().append(
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
                                            $('<div/>').addClass('non-grid').hide().append(
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
                $('.sortable-survey').append($test_que_card)
                var $options = [
                    <?php $__currentLoopData = $optionTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        { id: <?php echo e($optionType->id); ?>, text:'<?php echo e($optionType->type); ?>' },
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ]

                $(".new-select2-single").select2({
                    data: $options,
                    theme: "bootstrap",
                    placeholder: "",
                    maximumSelectionSize: 6,
                })

                $('.select2-selection--single').addClass('form-control');
                // $(".new-writtenQuestion").on("input", function() {
                //     // console.log($(this).val())
                //     $(this).parent().parent().parent().parent().parent().children('.d-flex')
                //         .children('.card-body').children('.list-item-heading').children(
                //             '.preview-question')
                //         .text($(this).val())


                // });

                // $('.option-type').on('change', function() {

                //     // get rows
                //     $rows = [];
                //     $i = 0;
                //     $(this).parent().parent().children('.ans-form').children('.answers').children(
                //         '.ans').each(
                //         function() {
                //             $rows[$i] = $(this).children('.form-control').val();
                //             $i++;
                //         });
                //     // console.log($rows);

                //     // check for grid
                //     if ($(this).val() == 5) {
                //         $(this).parent().parent().children('.ans-form').children('.grid').show()
                //         $(this).parent().parent().children('.ans-form').children('.non-grid').hide()
                //     } else if ($(this).val() == 1 || $(this).val() == 2) {
                //         $(this).parent().parent().children('.ans-form').children('.grid').hide()
                //         $(this).parent().parent().children('.ans-form').children('.non-grid').hide()
                //     } else if ($(this).val() == 3 || $(this).val() == 4) {
                //         $(this).parent().parent().children('.ans-form').children('.grid').hide()
                //         $(this).parent().parent().children('.ans-form').children('.non-grid').show()
                //     }
                // })
            })
        })
    </script>

</body>


</html>

<?php echo $__env->make('inc.dashboard.question.question-content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\new-projects-dev\app\resources\views/dashboard/surveys/show.blade.php ENDPATH**/ ?>