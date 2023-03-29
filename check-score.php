<?php

include "header.php";

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f7f7f7;
        }

        .score-card {
            background-color: #4caf50;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .score-value {
            font-size: 72px;
            font-weight: bold;
            color: #3a3a3a;
        }
    </style>

    <title>Score Page</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="score-card">
                    <h2 class="mb-4">Your Score</h2>
                    <div class="score-value" id="score-value">3</div>
                    <p class="mt-4">Gefeliciteerd met je score, goed bezig!</p>
                </div>
            </div>
        </div>
    </div>
    </body>