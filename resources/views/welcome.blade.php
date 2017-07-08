<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        {{-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"> --}}
        <link href="{{ asset('css/css.css') }}" rel="stylesheet">


        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #2780e3;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
                z-index: 999;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            #particles-js {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }
        </style>
    </head>
    <body>
            <div class="flex-center position-ref full-height">

                @if (Route::has('login'))
                    <div class="top-right links">
                        @if (Auth::check())
                            <a href="{{ url('/home') }}">Dashboard</a>
                        @else
                            <a href="{{ url('/login') }}">Login</a>
                            {{-- <a href="{{ url('/register') }}">Register</a> --}}
                        @endif
                    </div>
                @endif

                <div class="content">
                    <div class="title m-b-md">
                      {{-- <center><img src="{{URL::asset('img/nora.png')}}" alt="nora" height="255" width="290"></center> --}}
                        [ SEL-INVOICES ] <br> <small></small>
                    </div>
{{--  --}}
<div style="height: 50px; position: relative;">
    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <center>
            <span id="time" style="font-size: 80px;"></span>
        </center>
    </div>
</div><br><br>
<script>
    (function () {
        function checkTime(i) {
            return (i < 10) ? "0" + i : i;
        }

        function startTime() {
            var today = new Date(),
                h = checkTime(today.getHours()),
                m = checkTime(today.getMinutes()),
                s = checkTime(today.getSeconds());
            document.getElementById('time').innerHTML = h + ":" + m + ":" + s;
            t = setTimeout(function () {
                startTime()
            }, 500);
        }

        function getLocation() {
            $.getJSON("https://freegeoip.net/json/", function(data) {
                $('#location').text(data['region_name'] + ', ' + data['country_name']);
            });
        }

        startTime();
        getLocation();
    })();
</script>

{{--  --}}
                    <div class="links">
                         <a href="http://obaaa.sd">BY OBAAA</a>
                    </div>
                </div>
            </div>

            <div id="particles-js"></div>


            <script src="{{ asset('js/particles.min.js') }}"></script>
            <script>
                /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
                particlesJS.load('particles-js', 'js/particlesjs-config.json', function() {
                    console.log('callback - particles.js config loaded');
                });
            </script>
    </body>
</html>
