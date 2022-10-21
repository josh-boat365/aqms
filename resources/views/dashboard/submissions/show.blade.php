<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="An Alumni Tracer Portal (ATP) Designed For Engaging in Surveys at Accra Technical University. Developed for Graduate Evaluation and Quality Assurance. The ATP seeks to learn about the extent to which the educational experience at Accra Technical University (ATU) has contributed to the career developments of its alumni. In particular, studies conducted through the ATP aim at determining the impact of training received at ATU on work placement and career progression of graduates. Your feedback, processed confidentially, will inform institutional policy on improving academic programmes and practical training, for quality service delivery to current students, prospective admissions, and industry.">
    <meta name="robots" content="noindex,nofollow">
    <title>Response Analytics | Alumni Tracer Portal (ATP) | Accra Technical University (ATU)</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <link rel="stylesheet" href="{{ asset('font/iconsmind-s/css/iconsminds.css') }}">
    <link rel="stylesheet" href="{{ asset('font/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.rtl.only.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/datatables.responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/select2-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/select2-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/jquery.contextMenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/component-custom-switch.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dore.light.bluenavy.min.css') }}">
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
            top: 50%;
            transform: translateY(-50%);
            left: -5px;
            /*
            box-sizing: border-box; */
        }

        .dropdown-item:hover {
            cursor: pointer;
        }
    </style>
    <style>
        /* .alumnus-hover:hover a{
            color: white;
        } */
        .alumnus-hover:hover {
            background: whitesmoke;
            cursor: pointer;
        }
    </style>
</head>

<body id="app-container" class="menu-sub-hidden show-spinner right-menu">


    @include('inc.dashboard.navbar')


    @include('inc.dashboard.side-bar', ['surveys' => $allSurveys])


    {{-- should be included in survey content --}}
    @extends('inc.dashboard.responses.content')

    @section('alumni-list')
        @include('inc.dashboard.responses.alumni-list')
    @endsection

    @section('question-list')
        @include('inc.dashboard.responses.question-list')
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
    @endsection

    @section('survey-form')
        @include('inc.dashboard.survey.survey-form')
    @endsection


    <script src="{{ asset('js/vendor/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/vendor/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/vendor/charts.min.js') }}"></script>
    <script src="{{ asset('js/vendor/chartjs-plugin-datalabels.js') }}"></script>
    <script src="{{ asset('js/vendor/datatables.min.js') }}"></script>
    <script src="{{ asset('js/vendor/moment.min.js') }}"></script>
    <script src="{{ asset('js/vendor/select2.full.js') }}"></script>
    <script src="{{ asset('js/vendor/mousetrap.min.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery.contextMenu.min.js') }}"></script>
    <script src="{{ asset('js/dore.script.js') }}"></script>
    {{-- <script src="{{ asset('js/custom-chart.js') }}"></script> --}}

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

    {{-- toggle chart & table --}}
    <script>
        $(function() {
            $('.table-chart-btn').click(function() {

                $('#chart-' + $(this).attr('id')).toggleClass('active')
                $('#table-' + $(this).attr('id')).toggleClass('active')

                $(this).children('.table-icon').toggleClass('d-none');
                $(this).children('.chart-icon').toggleClass('d-none');
            })
            $('.chart-btn').click(function() {
                // console.log($('#chart-' + $(this).attr('id')));
                // console.log('#chart-' + $(this).attr('id'));
                $('#chart-' + $(this).attr('id')).addClass('active')
                $('#table-' + $(this).attr('id')).removeClass('active')
            })
            $('.table-btn').click(function() {
                console.log($('#table-' + $(this).attr('id')));
                $('#table-' + $(this).attr('id')).addClass('active')
                $('#chart-' + $(this).attr('id')).removeClass('active')
            })
        })
    </script>

    <script>
        $(function() {
            $('#submission-section').addClass('active');
        })
    </script>

    {{-- auto select and show questions of first user in alumni list --}}
    <script>
        $(function() {
            // console.log('hi');
            $('.alumni').first().addClass('dot-active')
            $('.ques').first().show()
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

    <script>
        $(function() {
            $('.alumni').click(function() {
                $user_id = $(this).children('input').val()
                console.log($user_id)
                $('.ques').hide()
                $('.dot-active').removeClass('dot-active')

                $(this).addClass('dot-active')
                $('.' + $user_id).show()
            })


        })
    </script>

    <script src="{{ asset('js/jquery.table2excel.js') }}"></script>
    <script>
        $(function() {
            $(".export-btn").click(function() {
                $table = $(this).parent().parent().parent().parent().parent().find('.exportTable')
                // console.log($table);
                $table.table2excel({
                    exclude: ".noExl",
                    name: "aqms_report",
                    filename: "stat sheet",
                    fileext: ".xlsx",
                    exclude_img: true,
                    exclude_links: true,
                    exclude_inputs: true
                });
                // console.log($(this));
                // $(".exportTable").table2excel({
                //     // exclude CSS class
                //     exclude: ".noExl",
                //     name: "aqms_report",
                //     filename: "stat", //do not include extension
                //     fileext: ".xls" // file extension
                // });
            });
        })
    </script>


</body>


</html>
