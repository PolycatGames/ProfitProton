<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tax Runner</title>
    <style>
        body {
            font-family: 'Pixelify Sans';
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
            flex-direction: column;
        }

        footer {
            position: absolute;
            bottom: 0;
        }

        .gameMain {
            display: flex;
            flex-direction: column;
            width: 100%;
            max-width: 600px;
        }

        #gameContainer {
            position: relative;
            width: 100%;
            height: 250px;
            max-width: 600px;
            background-color: white;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .gameBox {
            display: flex;
            border: 4px solid black;
            flex-direction: column;
            margin-bottom: 20px;
            cursor: pointer;
        }

        #floor {
            background-color: black;
            height: 30px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            text-transform: uppercase;
            color: rgb(176, 176, 176);

            /* Safari */
            user-select: none;
            /* Prevent selection */
            -moz-user-select: none;
            /* Firefox */
            -webkit-user-select: none;
            /* Chrome, Safari */
            -ms-user-select: none;
            /* IE/Edge */
            pointer-events: none;
        }

        .runner {
            background-image: "files/runner.gif";
            position: absolute;
            bottom: 0;
            width: 40px;
            height: auto;
            image-rendering: pixelated;
            image-rendering: crisp-edges;
            image-rendering: pixelated;
            /* Chrome, Firefox */
            image-rendering: crisp-edges;
            /* Safari */
            user-select: none;
            /* Prevent selection */
            -moz-user-select: none;
            /* Firefox */
            -webkit-user-select: none;
            /* Chrome, Safari */
            -ms-user-select: none;
            /* IE/Edge */
            pointer-events: none;
        }

        .obstacle {
            position: absolute;
            bottom: 0;
            width: 50px;
            height: auto;
            image-rendering: pixelated;
            image-rendering: crisp-edges;
            image-rendering: pixelated;
            /* Chrome, Firefox */
            image-rendering: crisp-edges;
            /* Safari */
            user-select: none;
            /* Prevent selection */
            -moz-user-select: none;
            /* Firefox */
            -webkit-user-select: none;
            /* Chrome, Safari */
            -ms-user-select: none;
            /* IE/Edge */
            pointer-events: none;
        }

        .game-information {
            display: flex;
            flex-direction: row;
            align-items: center;
            font-size: 20px;
        }

        .game-information img {
            height: auto;
            width: 30px;
        }

        #money {
            font-size: 30px;
            color: rgb(0, 228, 68);
            padding: 10px;

            /* Safari */
            user-select: none;
            /* Prevent selection */
            -moz-user-select: none;
            /* Firefox */
            -webkit-user-select: none;
            /* Chrome, Safari */
            -ms-user-select: none;
            /* IE/Edge */
            pointer-events: none;
        }

        footer {
            font-size: 14px;
            width: 100%;
            text-align: center;
            align-items: center;
        }

        h1 {
            opacity: .3;
            font-size: 50px;
        }
    </style>
</head>

<body>
    <h1>TAX RUNNER</h1>
    <main class="gameMain">
        <div class="gameBox">
            <div id="gameContainer">
                <span id="money">$0</span>
                <img class="runner" id="runner" src="/assets/easteregg/files/runner.gif" alt="">
            </div>
            <div id="floor">
                <span>Click to jump</span>
            </div>
        </div>
        <div class="game-information">
            <img src="/assets/easteregg/files/taxman.gif" alt="Tax men">
            <span>Avoid the taxmen (in game)</span>
        </div>
        <script src="/assets/easteregg/game.js"></script>
    </main>

    <footer>
        Disclaimer: this game is meant for entertainment purposes only and does not encourage or endorse any form of tax
        evasion or illegal activity.
    </footer>
</body>

</html>