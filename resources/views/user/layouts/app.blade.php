<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic page needs
 ============================================ -->
    <title>@yield('title', 'MyProduct.lk - Shop online')</title>
    <meta charset="utf-8">
    <meta name="keywords"
        content="boostrap, responsive, html5, css3, jquery, theme, multicolor, parallax, retina, business" />
    <meta name="author" content="MyProduct.lk Dev Team" />
    <meta name="robots" content="index, follow" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="facebook-domain-verification" content="fhih8o4ia0snlfqwekhqg5vrtnla85" />
    <!-- Mobile specific metas
 ============================================ -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Favicon
 ============================================ -->

    <link rel="shortcut icon" href="ico/favicon.png">
    <link rel="icon" href="{{ asset('assets-front/image/icon.png') }}">
    <!-- Google web fonts
 ============================================ -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>

    <!-- Libs CSS
 ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets-front/css/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('assets-front/css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-front/js/datetimepicker/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-front/js/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-front/css/themecss/lib.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-front/js/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet">

    <!-- Theme CSS
 ============================================ -->
    <link href="{{ asset('assets-front/css/themecss/so_megamenu.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-front/css/themecss/so-categories.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-front/css/themecss/so-listing-tabs.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-front/css/themecss/so-newletter-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-front/css/themecss/just_purchased_notification.css') }}" rel=stylesheet>
    <link href="{{ asset('assets-front/css/footer1.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-front/css/header1.css') }}" rel="stylesheet">
    <link id="color_scheme" href="{{ asset('assets-front/css/theme.css') }}" rel="stylesheet">
    @if (request()->is('product/view/*'))
        <link rel="stylesheet" href="{{ asset('assets-front/css/product.bottom.nav.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('assets-front/css/bottom.bar.css') }}">
    @endif

    <link href="{{ asset('assets-front/css/responsive.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8049dab6ea.js" crossorigin="anonymous"></script>
    @yield('styles')

    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1430408281072188');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=1430408281072188&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->
</head>

<body class="common-home res layout-home1">
    @if (Auth::user())
        <script>
            window.userID = {{ Session::get('LoggedUser')->id }};
        </script>
    @else
        <script>
            window.userID = null;
        </script>
    @endif
    <div id="wrapper" class="wrapper-full banners-effect-7">
        @include('user.layouts.topbar')
        @yield('content')
        {{-- @include('user.layouts.footer') --}}
        @if (!request()->is('product/view/*'))
            @include('user.layouts.footer')
        @endif
    </div>


    <script type="text/javascript" src="{{ asset('assets-front/js/jquery-2.2.4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets-front/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets-front/js/owl-carousel/owl.carousel.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets-front/js/themejs/libs.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets-front/js/unveil/jquery.unveil.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets-front/js/countdown/jquery.countdown.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets-front/js/dcjqaccordion/jquery.dcjqaccordion.2.8.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('assets-front/js/datetimepicker/moment.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets-front/js/datetimepicker/bootstrap-datetimepicker.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('assets-front/js/jquery-ui/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets-front/js/modernizr/modernizr-2.6.2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets-front/js/bootstrap-notify.min.js') }}"></script>

    <!-- Theme files============================================ -->
    <script type="text/javascript" src="{{ asset('assets-front/js/themejs/application.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets-front/js/themejs/homepage.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets-front/js/themejs/so_megamenu.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets-front/js/themejs/addtocart.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets-front/custom/common.js') }}"></script>
    @yield('scripts')
    <script>
        var url = "{{ env('APP_URL') }}";
        var keyword = "{{ app('request')->input('query') }}";
        var cat_id = "{{ app('request')->input('cat_id') }}";
        var sortby = "{{ app('request')->input('sortby') }}";

        function filter(val) {
            window.location.href = url + "?query=" + keyword + "&cat_id=" + cat_id + "&sortby=" + val;
        }

        function cat(val) {
            window.location.href = url + "/products/all/all?query=" + keyword + "&cat_id=" + val + "&sortby=" + sortby;
        }
    </script>
</body>

</html>
