<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Borrow My Angel: Share the App</title>

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <style>
            body {
                background-color: #8C9EFF;
                color: #FFFFFF;
                font-size: 1.5rem;
            }
            .store {
                max-width: 300px;
            }
            .card {
                background-color: #8C9EFF;
                border: none;
            }
            .card-header {
                background-color: #8C9EFF;
                border: none;
            }
        </style>
    </head>

    <body>
        <div class="container card text-center" style="min-width: 500px;">
            <div class="row">
                <div class="card-header">
                    <h1>Someone has recommended the Borrow My Angle app to you.</h1>
                </div>
                <div class="img-thumbnail mx-auto">
                    <img src="\img/bmaLogo.jpeg" alt="Borrow My Angel Logo" />
                </div>
                <div class="card-body">
                    <p>Holder text to briefly explain the app. Click below to hear Chuck's song for Charity.</p>
                    <audio controls>
                        <source src="\audio/BorrowMyAngel-Song.mp3" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio><br>
                    <a href="#"><img class="store" src="\img/appleStore.png" alt="Download on the Apple App store" /></a>
                    <a href="#"><img class="store" src="\img/googleStore.png" alt="Download on the Google Play store" /></a>
                    <footer class="container-fluid text-center">
                        <p>&copy Borrow My Angel</p>
                    </footer>
                </div>
            </div>
        </div>

    </body>
</html>
