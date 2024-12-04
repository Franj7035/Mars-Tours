<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mars Countdown</title>
    <link href="main.css" rel="stylesheet">
</head>
<>
    <header>
        <nav> 
            <a href="index.php">Mars Tours Home</a> &nbsp; | &nbsp;
            <a href="app.php">Pilot Application Form</a> &nbsp; | &nbsp;
            <a href="countdown.php">Countdown</a>
        </nav>

        <!-- title page -->
        <h1>Countdown till Takeoff to Mars</h1>
    </header>

    <main>
        <div id="divCountdown">Coundown goes here...</div>
    </main>

    <?php
        // set up formatted date time
        $launchDateTime = strtotime(datetime: 'December 20, 2024 12:00:00');
        // translate the date time for JavaScript
        $jsDateTime = date(format: 'F d, Y H:i:s', timestamp: $launchDateTime);
    ?>

    <script>
        // countdown timeer variable
        var countdownTimer = new Date("<?php echo "$jsDateTime"; ?>").getTime();

        console.log("countdownTimer = " + countdownTimer);

        //run the countdown code every second 
        var intervalid = setInterval(function(){
            // get the current date in seconds
            var currentTime = new Date().getTime();
            var divCountdown = document.getElementById("divCountdown");

            console.log("currentTime=" + currentTime);

            //constants for the time calculations
            const MS_IN_A_SECOND = 1000;
            const MS_IN_A_MINUTE = MS_IN_A_SECOND * 60;
            const MS_IN_AN_HOUR = MS_IN_A_MINUTE * 60;
            const MS_IN_A_DAY = MS_IN_AN_HOUR * 24;

            // how many miliseconds remain between now and takeoff
            var timeDiff = countdownTimer - currentTime;

            // countdown calculations for days, hours, minutes, seconds
            var days = Math.floor(timeDiff / MS_IN_A_DAY);
            var hours = Math.floor((timeDiff % MS_IN_A_DAY) / MS_IN_AN_HOUR);
            var minutes = Math.floor ((timeDiff % MS_IN_AN_HOUR) / MS_IN_A_MINUTE);
            var seconds = Math.floor((timeDiff % MS_IN_A_MINUTE) / MS_IN_A_SECOND);

            divCountdown.innerHTML = "Countdown: " + days + " Days : " + hours + " Hours : " + minutes + "Minutes : " + 
            seconds + " Seconds. ";

            // display messages base on how long until launch
            // if days < 0 - they missed launch
            if (days < 0){
                // stop the countdown - clear interval
                clearInterval(intervalid); 
                divCountdown.innerHTML = "sorry you missed the launch!";
            }
            // less than 3 days to takeoff
            else if (days <3){
                // shorthand to add the message below the countdown timer
                divCountdown.innerHTML += "<BR>Travel to launch site!";
            }
            // less than 10 days to takeoff
            else if(days < 10){
                // shorthand to add the message below the countdown timer
                divCountdown.innerHTML += "<BR>Start packing your bags!";
            }
            // less than 30 days to takeoff
            else if(days < 30){
                // shorthand to add the message below the countdown timer
                divCountdown.innerHTML += "<BR>Less than a month until launch!";
            }

        }, 1000); // 1000 ms is 1 second
    </script>

    <footer>
        <!-- Footer Content -->
        <p>&copy; 2024 Mars Tours. All rights reserved.</p>
    </footer>
</body>
</html>