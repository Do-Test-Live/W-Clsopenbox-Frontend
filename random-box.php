<?php
require_once('include/dbController.php');
$db_handle = new DBController();
date_default_timezone_set("Asia/Hong_Kong");

$fetch_pro = $db_handle->runQuery("SELECT * FROM `gifts`");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>Lucky Draw</title>
    <link rel='stylesheet'
          href='https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
    <style>
        template{
        'line-height:100px;
        'vertical-align:middle;
        position:relative; top:25%; left:25%;
            margin:0 auto;
            border: 2px solid white;
        }
        .textArea{
            font-size: 13px;
            color:#04f1fc;
            line-height:30px;
            font-family:sans-serif;

        }
        .textArea2{
            font-size: 14px;
            color:#04f1fc;
            line-height:30px;
            font-family:fantasy;

        }
        .square {
            text-align:center;
            width: 100px;
            height: 100px;
            background-color: rgba(0,58,254,1);
            display: inline-block;
        }

        .border {
            border: 1px solid #AA3681 !important;
            padding: 10px;
            border-radius: 10px;
            /*round corner*/
            box-shadow: 4px 4px 3px rgba(20%,20%,40%,0.5);
            margin-bottom: 0.5rem;
        }
        .buttonDiv {
            width: 190px;
            height: 30px;
            margin: 0 auto;
        }
        .buttonDiv span {
            font-family: '微軟雅黑';
            font-size: 14px;
            line-height: 27px;
            display: block;
            float: left;
            width: 80px;
            height: 27px;
            margin-right: 10px;
            cursor: pointer;
            text-align: center;
            color: #fff;
            border: 1px solid #eee;
            border-radius: 7px;
            background: #036;
        }

        .closopen-btn,.closopen-btn:hover,.closopen-btn:active{
            background: #f24849;
            border:1px solid #f24849;
            padding: 10px 45px;
            border-radius: 19px;
        }

    </style>

</head>
<body style="background: url('assets/images/content/BG.jpg'); background-repeat: no-repeat; background-position: center;background-size: cover; height: 100%">


<div class="container">
    <div class="d-flex justify-content-center align-items-center mt-4">
        <img src="assets/images/10sec/Logo.png" class="img-fluid mx-auto" alt="">
    </div>
    <div class="mx-auto text-center mt-5" style="max-width: 550px">
        <div class="square border" data-probability="<?php echo (float)($fetch_pro[0]['gift1']/100); ?>" id="id1">
            <div class="textArea">Choose Me</div>
            <div class="textArea2">Gift 1</div>
        </div>
        <div class="square border" data-probability="<?php echo (float)($fetch_pro[0]['gift2']/100); ?>">
            <div class="textArea">Choose Me</div>
            <div class="textArea2">Gift 2</div>
        </div>
        <div class="square border" data-probability="<?php echo (float)($fetch_pro[0]['gift3']/100); ?>">
            <div class="textArea">Choose Me</div>
            <div class="textArea2">Gift 3</div>
        </div>
        <div class="square border" data-probability="<?php echo (float)($fetch_pro[0]['gift4']/100); ?>">
            <div class="textArea">Choose Me</div>
            <div class="textArea2">Gift 4</div>
        </div>
        <div class="square border" data-probability="<?php echo (float)($fetch_pro[0]['gift5']/100); ?>">
            <div class="textArea">Choose Me</div>
            <div class="textArea2">Gift 5</div>
        </div>
        <div class="square border" data-probability="<?php echo (float)($fetch_pro[0]['gift6']/100); ?>">
            <div class="textArea">Choose Me</div>
            <div class="textArea2">Gift 6</div>
        </div>
        <div class="square border" data-probability="<?php echo (float)($fetch_pro[0]['gift7']/100); ?>">
            <div class="textArea">Choose Me</div>
            <div class="textArea2">Gift 7</div>
        </div>
        <div class="square border" data-probability="<?php echo (float)($fetch_pro[0]['gift8']/100); ?>">
            <div class="textArea">Choose Me</div>
            <div class="textArea2">Gift 8</div>
        </div>
        <div class="square border" data-probability="<?php echo (float)($fetch_pro[0]['gift9']/100); ?>">
            <div class="textArea">Choose Me</div>
            <div class="textArea2">Gift 9</div>
        </div>

        <div id="drawContent"></div>
    </div>
</div>


<div style="text-align: center;">
    <div id="drawTitle" class="text-white mt-5">Click the Button to start</div>
    <div class="buttonDiv">
        <div class="text-center">
            <button id="playbutton" class="btn btn-primary closopen-btn mt-3">Start</button>
        </div>
    </div>
</div>
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script>
    var data = ['Ipad', 'Ipad', 'Gift 1', 'Gift 2', 'Gift 3', 'Gift 4', 'Gift 5', 'Gift 6', 'Gift 7', 'Gift 8'];
    var selectedDataValue; // Variable to store selected data value
    const slices = document.getElementsByClassName('square'); // Remove the dot before 'square'

    for (i = 0; i < data.length; i++) {
        $(".square:nth-child(" + i + ") .textArea:nth-child(2)").text(data[i]);
    }

    var timer = null;
    playbutton.onclick = playRandom;

    function playRandom() {
        var drawTitle = document.getElementById('drawTitle');
        drawTitle.innerHTML = "Wait Untill it stops. Then try again";
        var playbutton = document.getElementById('playbutton');
        clearInterval(timer);

        timer = setInterval(function () {
            let totalProbability = 0;

            // Use a traditional for loop to iterate through the HTMLCollection
            for (let i = 0; i < slices.length; i++) {
                const probability = parseFloat(slices[i].getAttribute('data-probability'));
                totalProbability += probability;
            }

            const random = Math.random() * totalProbability;
            let accumulatedProbability = 0;
            let selectedIndex = -1;

            // Find the selected index based on the accumulated probability
            for (let i = 0; i < slices.length; i++) {
                const probability = parseFloat(slices[i].getAttribute('data-probability'));
                accumulatedProbability += probability;
                if (random <= accumulatedProbability) {
                    selectedIndex = i;
                    break;
                }
            }

            selectedDataValue = data[selectedIndex + 1]; // Store selected data value
            $(".square:nth-child(" + (selectedIndex + 1) + ")").css("background", "rgba(170,54,129,1)");
            $(".square:not(:nth-child(" + (selectedIndex + 1) + "))").css("background", "rgba(0,58,254,1)");
        }, 30);

        playbutton.style.background = '#f51e1f';

        // Automatically stop after 5 seconds
        setTimeout(function () {
            stopFun();
        }, 5000);
    }

    function stopFun() {
        clearInterval(timer);
        var playbutton = document.getElementById('playbutton');
        playbutton.style.background = '#f24849';
        console.log(selectedDataValue); // Alert the selected data value
    }
</script>

</body>
</html>
