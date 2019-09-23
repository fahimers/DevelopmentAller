<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Aller Media</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
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

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                   Aller Media
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>

                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>



                    <a href="https://github.com/laravel/laravel">GitHub</a>

                </div>
                <div class = "latest-post">  </div>
            </div>
        </div>
    </body>

<script>


    const url = 'http://127.0.0.1:8000/';
    const proxyurl ='http://localhost:3000/api/articles/';
    const postsContainer = document.querySelector('.latest-post');


    fetch( proxyurl )
    .then(response => response.json())
        //.then(data => console.log(data))

        .then(data => {
           data.map(get => {
               const innerContent =
                   `
                   </br>
                    <h3><bold>ID</bold>: ${get[0].id} </h3>
                    <h3>Title: ${get[0].title} </h3>
                    <h3>Content: ${get[0].content} </h3>

                    <h3>ID: ${get[1].id} </h3>
                    <h3>Title: ${get[1].title} </h3>
                    <h3>Content: ${get[1].content} </h3>

                     `

               postsContainer.innerHTML += innerContent;

           })

        });




</script>
</html>
