<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard | ATU Tracer</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <link rel="stylesheet" href="{{ asset('font/iconsmind-s/css/iconsminds.css') }}">
    <link rel="stylesheet" href="{{ asset('font/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.rtl.only.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap-float-label.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/select2-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap-datepicker3.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/jquery.contextMenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/component-custom-switch.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dore.light.bluenavy.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/profiles/profile-icon-atu.png') }}">

    <style>
        .theme-colors {
            display: none;
        }

        .survey-filter:hover {
            cursor: pointer;
        }
    </style>
</head>

<body id="app-container" class="menu-sub-hidden show-spinner right-menu">

    @include('inc.dashboard.navbar')


    @include('inc.dashboard.side-bar', ['surveys' => $allSurveys])


    {{-- should be included in survey content --}}
    @extends('inc.dashboard.survey.survey-content')
    @section('exp-date-input')
        <input type="date" id="exp_date_field" name="datemin" min="{{ $min_exp_day }}">
    @endsection


    @section('survey-tiles')
        @foreach ($allSurveys as $survey)
            @include('inc.dashboard.survey.survey-tile', [
                'survey' => $survey,
                'status' => $survey->status,
            ])
        @endforeach
    @endsection

    @section('stat')
        <li class="active"><a href="#"> All Surveys <span class="float-right">{{ $allSurveys->count() }}</span></a>
        </li>
        <li><a href="#"> Deployed Surveys <span
                    class="float-right">{{ $allSurveys->where('status_id', '2')->count() }}</span></a></li>
        <li><a href="#"> Drafted Surveys <span
                    class="float-right">{{ $allSurveys->where('status_id', '1')->count() }}</span></a></li>
        <li><a href="#"> Archived Surveys <span
                    class="float-right">{{ $allSurveys->where('status_id', '3')->count() }}</span></a></li>
        <li><a href="#"> Submitted Surveys <span class="float-right">{{ $submissions->count() }}</span></a></li>

        <a class="archive-warning" style="display: none" data-toggle="modal" href="#archiveWarning">test dialog</a>
        <a class="deploy-warning" style="display: none" data-toggle="modal" href="#deployWarning">test dialog</a>
        <a class="delete-warning" style="display: none" data-toggle="modal" href="#deleteWarning">test dialog</a>

        <form action="{{ route('survey.view-response') }}" method="post" id="view-response" style="display: none">
            @csrf
            <input type="hidden" name="survey_id" class="survey_id">
            <input type="submit" class="submit">
        </form>
    @endsection

    @section('survey-form')
        @include('inc.dashboard.survey.survey-form')
    @endsection


    <script src="{{ asset('js/vendor/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/vendor/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/vendor/select2.full.js') }}"></script>
    <script src="{{ asset('js/vendor/mousetrap.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery.contextMenu.min.js') }}"></script>
    <script src="{{ asset('js/dore.script.js') }}"></script>

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

    {{-- <script>
        $(function () {
            $('#add_survey').click(function () {
                $form = $(this).parent().parent();
                $title = $form.find('#title');
                $description = $form.find('#details');

                // console.log($title.val());
                // console.log($description.val());

                if ($title.val().trim() != "" || $description.val().trim() != "") {
                    
                    $form.submit();
                }
            })
        })
    </script> --}}

    <script>
        // $(document).ready(function() {
        //     $('#admin_welcome_prompt_close_btn') click(function() {
        //         // 'this' is not a jQuery object, so it will use the default click() function
        //         this.click();
        //     }).click();
        // });
        $(function() {
            // console.log($('#admin_welcome_prompt_close_btn')[0].trigger('click'));
            // jQuery('body').on('click', function() {
            //     jQuery('#admin_welcome_prompt_close_btn')[0].click();
            // });
            // $('#admin_welcome_prompt_close_btn')[0].click();
            // console.log($('#admin_welcome_prompt_close_btn').text());
        })
    </script>

    <script>
        $(function() {
            $('#survey-section').addClass('active');
        })
    </script>

    <script>
        $(function() {
            $('#exp_date_field').change(function() {
                $('#date_input_submit').val($(this).val())
                $('#dep_btn').show();
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
                $('#notification').fadeTo('slow', 0, function() {

                    $('#notification').remove()
                })
            }, 3000);
        })
    </script>

    <script>
        $(function() {
            $('.survey-filter').on('click', function() {
                $(this).parent().parent().children('.dropdown-toggle').text($(this).text())
                // $('.survey-list').children('a').each()

                switch ($(this).text()) {
                    case 'View All':
                        $('.survey-list').children('a').children('.archive').parent().show()
                        $('.survey-list').children('a').children('.deploy').parent().show()
                        $('.survey-list').children('a').children('.draft').parent().show()

                        break;
                    case 'Archived':
                        console.log('archived');
                        $('.survey-list').children('a').children('.archive').parent().show()
                        $('.survey-list').children('a').children('.deploy').parent().hide()
                        $('.survey-list').children('a').children('.draft').parent().hide()
                        break;
                    case 'Deployed':
                        console.log('deployed');
                        $('.survey-list').children('a').children('.archive').parent().hide()
                        $('.survey-list').children('a').children('.deploy').parent().show()
                        $('.survey-list').children('a').children('.draft').parent().hide()
                        break;
                    case 'Drafted':
                        console.log('drafted');
                        $('.survey-list').children('a').children('.archive').parent().hide()
                        $('.survey-list').children('a').children('.deploy').parent().hide()
                        $('.survey-list').children('a').children('.draft').parent().show()
                        break;

                }
            })
        })
    </script>

    {{-- <script>
        $(function() {


            $().contextMenu &&
                $.contextMenu({
                    selector: ".list .card",
                    callback: function(e, t) {},
                    events: {
                        show: function(e) {
                            var t = e.$trigger.parents(".list");
                            t && t.length > 0 && t.data("shiftSelectable").rightClick(e.$trigger);
                        },
                    },
                    items: {
                        copy: {
                            name: "Deploy",
                            className: "simple-icon-docs"
                        },
                        archive: {
                            name: "Move to archive",
                            className: "simple-icon-drawer"
                        },
                        delete: {
                            name: "Delete",
                            className: "simple-icon-trash"
                        }
                    },
                }),
        })
    </script> --}}
    {{-- <script src="{{asset('js/scripts.js')}}"></script> --}}
</body>


</html>
