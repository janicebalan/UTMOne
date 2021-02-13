<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>UTMOne</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            .bg-image{
                background-image: url("https://static.scientificamerican.com/sciam/cache/file/C3D6DFBB-92DD-43D0-A9F8CB9AB477F652_source.jpg");              
                height: 100%;

                /* Center and scale the image nicely */
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }
            html, body {
                background-color: #fff;
                color: white;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .bg-text {
                background-color: rgb(0,0,0); /* Fallback color */
                background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
                color: white;
                font-weight: bold;
                border: 3px solid #f1f1f1;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                z-index: 2;
                width: 80%;
                padding: 20px;
                text-align: center;
            }

            .button {
                transition-duration: 0.4s;
                font-size: 20px;
                padding: 15px 36px;
                border: 1px solid grey;
                border-radius: 4px;
                background-color: white;
            }

            .button:hover {
                background-color: grey; 
                color: white;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="bg-image flex-center position-ref full-height">
            <!--
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a class="button" href="{{ url('/home') }}">Home</a>
                    @else
                        <a class="button" href="{{ route('login') }}">Login</a>
                         -->
                        <!--
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                        -->
                        <!--
                    @endauth
                </div>
            @endif
            -->
            <div class="bg-text content">
                <div class="title m-b-md">
                UTMOne
                </div>

                <div class="links">
                    <p>Created by Team Lights</p>
                    @if (Route::has('login'))
                        <div class="links">
                            @auth
                                <a class="button" href="{{ url('/home') }}">Home</a>
                            @else
                                <a class="button" href="{{ route('login') }}">Login</a>
                            @endauth
                        </div>
                    @endif
                    
                </div>
            </div>
        </div>
    </body>
</html>
