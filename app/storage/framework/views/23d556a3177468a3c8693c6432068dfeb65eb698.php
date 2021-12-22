<!DOCTYPE html>
<html lang="en">
<!-- m dore-jquery.coloredstrategies.com/Apps.Survey.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Nov 2021 22:42:24 GMT -->

<head>
    <meta charset="UTF-8">
    <title>Survey | ATU TRACER</title>
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

    <?php echo $__env->make('inc.alumnus.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    

    <?php echo $__env->make('inc.alumnus.side-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    


    

    <?php $__env->startSection('question-list'); ?>
        <?php echo $__env->make('inc.alumnus.question.question-list', ['responses', $responses], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('stat'); ?>
        <li class="active"><a href="#"> All Questions <span
                    class="float-right"><?php echo e($survey->questions->count()); ?></span></a></li>
        <li class="active"><a href="#"> Progress <span
                    class="float-right progress-tracker"><?php echo e('4/50'); ?></span></a></li>


        <div class="text-center mt-4">
            <div class="btn btn-outline-primary btn-sm mb-2" id="save-btn"><i class="simple-icon-plus btn-group-icon"></i>
                Save</div>
        </div>
        <div class="text-center mt-4">
            <form action="<?php echo e(route('alumnus.survey.submit')); ?>" method="post" id="submit-form">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="survey_id" value="<?php echo e($survey->id); ?>">
            </form>
            <div style="display: none" class="btn btn-success btn-sm mb-2" id="submit-btn"><i
                    class="simple-icon-plus btn-group-icon"></i>
                Sumbit</div>
        </div>
        
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
            $('#save-btn').click(function() {
                console.log('dsv');
                console.log($('#save-form'));
                $('#save-form').submit();
            })
        })
    </script>

    
    <script>
        $(function() {
            $('#submit-btn').click(function() {
                $('#isSubmit').val('yes')
                $('#save-form').submit();
            })
        })
    </script>

    
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

                        $question = $(this).parent().parent().parent().parent().parent().parent().parent()
                            .parent().parent();

                        $column_inputs = $(this).parent().parent().children('.check-box').length;

                        $x = 0;
                        $y = 0;
                        $answered = [];
                        // each column
                        $(this).parent().parent().parent().children('div').each(function() {


                            // each checkbox container
                            $(this).children('.check-box').each(function() {
                                // console.log($(this).children('input').is(':checked'));
                                if ($(this).children('input').is(':checked')) {
                                    $answered[$y] = true;
                                }
                                // console.log($(this).children('input') + ' ' + $(this).children('input').is('checked'));

                                // if ($(this).children('input').is('checked')) {
                                //     console.log($(this).children('input'));
                                //     // $answered[$y] = true;
                                // }

                                $y++;
                            })
                            $x++;
                            $y = 0;
                        })

                        // console.log($answered);

                        // check if all answered
                        if ($answered.length == $column_inputs) {
                            $question.addClass('answered')
                        } else {
                            $question.removeClass('answered')
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
                        } else(
                            $(this).parent().parent().parent().parent().parent().removeClass(
                                'answered')
                        )
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


        })
    </script>

    
    <script>
        $(function() {
            $('input').each(function() {
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

                        $question = $(this).parent().parent().parent().parent().parent().parent().parent()
                            .parent().parent();
                        $column_inputs = $(this).parent().parent().children('.check-box').length;

                        $x = 0;
                        $y = 0;
                        $answered = [];
                        // each column
                        $(this).parent().parent().parent().children('div').each(function() {


                            // each checkbox container
                            $(this).children('.check-box').each(function() {
                                // console.log($(this).children('input').is(':checked'));
                                if ($(this).children('input').is(':checked')) {
                                    $answered[$y] = true;
                                }
                                // console.log($(this).children('input') + ' ' + $(this).children('input').is('checked'));

                                // if ($(this).children('input').is('checked')) {
                                //     console.log($(this).children('input'));
                                //     // $answered[$y] = true;
                                // }

                                $y++;
                            })
                            $x++;
                            $y = 0;
                        })

                        // check if all answered
                        $($answered).each(function() {
                            if (!$(this)) {
                                $question.removeClass('answered')
                            } else {
                                $question.addClass('answered')
                            }
                        })
                    }
                }

                //check box
                if ($(this).attr('type') == 'checkbox') {
                    $(this).parent().parent().children('.custom-checkbox').each(function() {
                        if ($(this).children('input').is(':checked')) {
                            $(this).parent().parent().parent().parent().parent().addClass(
                                'answered')
                            return false
                        } else(
                            $(this).parent().parent().parent().parent().parent().removeClass(
                                'answered')
                        )
                    });
                }
                $('#progress').val($('.answered').length);
                $('.progress-tracker').text($('.answered').length + '/' + $('.question').length);
                if ($('.answered').length == $('.question').length) {
                    $('#submit-btn').show()
                } else {
                    $('#submit-btn').hide()
                }
            })

            $('textarea').each(function() {
                // if empty
                if ($(this).val().trim() == "") {
                    $(this).parent().parent().parent().parent().parent().removeClass('answered')
                } else {
                    $(this).parent().parent().parent().parent().parent().addClass('answered')
                }

                $('#progress').val($('.answered').length);
                $('.progress-tracker').text($('.answered').length + '/' + $('.question').length);
                if ($('.answered').length == $('.question').length) {
                    $('#submit-btn').show()
                } else {
                    $('#submit-btn').hide()
                }
            })
        })
    </script>

    
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
            $('input').each(function() {

            })
        })
    </script>

</body>
<!-- Mirrored from dore-jquery.coloredstrategies.com/Apps.Survey.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Nov 2021 22:42:24 GMT -->

</html>

<?php echo $__env->make('inc.alumnus.question.question-content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\new-projects-dev\app\resources\views/alumnus/surveys/show.blade.php ENDPATH**/ ?>