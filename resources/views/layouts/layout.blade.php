<!DOCTYPE html>
<html>
<head>
    <title>@yield('page_title', 'Admin Dashboard')</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
    <meta content="Tamerlan Soziev" name="author">
    <meta content="Admin dashboard html template" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="favicon.png" rel="shortcut icon">
    <base href="{{ \URL::asset('/') }}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet" type="text/css">
    <link href="bower_components/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="bower_components/dropzone/dist/dropzone.css" rel="stylesheet">
    <link href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet">
    <link href="/css/main.css?version=3.7.0" rel="stylesheet">
    <link href="bower_components/dragula.js/dist/dragula.min.css" rel="stylesheet">
    <link href="/css/toastr.min.css" rel="stylesheet">
    @yield('css')
</head>
<body>
<div class="all-wrapper menu-side">
    <div class="layout-w">
        @include("layouts.menu")
        <div class="content-w">
            @include("layouts.header")
            <div class="content-i">
                <div class="content-box">
                @yield("content")
                <!--------------------

              START - Chat Popup Box
              -------------------->
                    <div class="floated-chat-btn">
                        <i class="os-icon os-icon-mail-07"></i><span>Demo Chat</span>
                    </div>
                    <div class="floated-chat-w">
                        <div class="floated-chat-i">
                            <div class="chat-close">
                                <i class="os-icon os-icon-close"></i>
                            </div>
                            <div class="chat-head">
                                <div class="user-w with-status status-green">
                                    <div class="user-avatar-w">
                                        <div class="user-avatar">
                                            <img alt="" src="img/avatar1.jpg">
                                        </div>
                                    </div>
                                    <div class="user-name">
                                        <h6 class="user-title">
                                            John Mayers
                                        </h6>
                                        <div class="user-role">
                                            Account Manager
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-messages">
                                <div class="message">
                                    <div class="message-content">
                                        Hi, how can I help you?
                                    </div>
                                </div>
                                <div class="date-break">
                                    Mon 10:20am
                                </div>
                                <div class="message">
                                    <div class="message-content">
                                        Hi, my name is Mike, I will be happy to assist you
                                    </div>
                                </div>
                                <div class="message self">
                                    <div class="message-content">
                                        Hi, I tried ordering this product and it keeps showing me error code.
                                    </div>
                                </div>
                            </div>
                            <div class="chat-controls">
                                <input class="message-input" placeholder="Type your message here..." type="text">
                                <div class="chat-extra">
                                    <a href="#"><span class="extra-tooltip">Attach Document</span><i
                                                class="os-icon os-icon-documents-07"></i></a><a href="#"><span
                                                class="extra-tooltip">Insert Photo</span><i
                                                class="os-icon os-icon-others-29"></i></a><a href="#"><span
                                                class="extra-tooltip">Upload Video</span><i
                                                class="os-icon os-icon-ui-51"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--------------------
                    END - Chat Popup Box
                    -------------------->
                </div>
            </div>
        </div>
    </div>
    <div class="display-type"></div>
</div>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/moment/moment.js"></script>
<script src="bower_components/chart.js/dist/Chart.min.js"></script>
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="bower_components/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
<script src="bower_components/ckeditor/ckeditor.js"></script>
<script src="bower_components/bootstrap-validator/dist/validator.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="bower_components/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
<script src="bower_components/dropzone/dist/dropzone.js"></script>
<script src="bower_components/editable-table/mindmup-editabletable.js"></script>
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script>
<script src="bower_components/tether/dist/js/tether.min.js"></script>
<script src="bower_components/bootstrap/js/dist/util.js"></script>
<script src="bower_components/bootstrap/js/dist/alert.js"></script>
<script src="bower_components/bootstrap/js/dist/button.js"></script>
<script src="bower_components/bootstrap/js/dist/carousel.js"></script>
<script src="bower_components/bootstrap/js/dist/collapse.js"></script>
<script src="bower_components/bootstrap/js/dist/dropdown.js"></script>
<script src="bower_components/bootstrap/js/dist/modal.js"></script>
<script src="bower_components/bootstrap/js/dist/tab.js"></script>
<script src="bower_components/bootstrap/js/dist/tooltip.js"></script>
<script src="bower_components/bootstrap/js/dist/popover.js"></script>
<script src="bower_components/dragula.js/dist/dragula.min.js"></script>
<script src="/js/main.js?version=3.7.0"></script>
<script src="/js/toastr.min.js"></script>
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-XXXXXXXX-9', 'auto');
    ga('send', 'pageview');
</script>

<script>
    @if(Session::has('message'))

        var alertType = {!! json_encode(Session::get('alert-type', 'info')) !!};
        var alertMessage = {!! json_encode(Session::get('message')) !!};
        var alerter = toastr[alertType];

        if (alerter) {
            alerter(alertMessage);
        } else {
            toastr.error("toastr alert-type " + alertType + " is unknown");
        }

    @endif
</script>

@yield('js')
</body>
</html>
