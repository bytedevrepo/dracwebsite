<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/style.css') }}">
</head>
<body>
<div class="container">
    <div class="toggle" id="toggle" onclick="expand()">
        <img src="{{ asset('images/ana_logo.png') }}" alt="" width="150">
    </div>
</div>
<div class="menu" id="menu">
    <div class="item">
        <a href="#"><i class="material-icons">home</i></a>
    </div>
    <div class="item">
        <a href="#"><i class="material-icons">home</i></a>
    </div>
    <div class="item">
        <a href="#"><i class="material-icons">home</i></a>
    </div>
    <div class="item">
        <a href="#"><i class="material-icons">home</i></a>
    </div>
    <div class="item">
        <a href="#"><i class="material-icons">home</i></a>
    </div>
    <div class="item">
        <a href="#"><i class="material-icons">home</i></a>
    </div>
</div>
<script>
    var j = 0;
    var i = document.getElementById("menu").childNodes;
    function expand() {
        if (j === 0){
            document.getElementById("add").style.transform = 'rotate(45deg)';
            document.getElementById("menu").style.transform = 'scale(1)';
            i[1].style.transform = 'translateY(-160px)';
            i[3].style.transform = 'translate(140px,-80px)';
            i[5].style.transform = 'translate(140px,80px)';
            i[7].style.transform = 'translateY(160px)';
            i[9].style.transform = 'translate(-140px, 80px)';
            i[11].style.transform = 'translate(-140px, -80px)';
            j = 1;
        } else{
            document.getElementById("add").style.transform = 'rotate(0deg)';
            i[1].style.transform = 'translateY(0)';
            i[3].style.transform = 'translate(0)';
            i[5].style.transform = 'translate(0)';
            i[7].style.transform = 'translateY(0)';
            i[9].style.transform = 'translate(0)';
            i[11].style.transform = 'translate(0)';
            j = 0;
        }
            // 'translateY(-160px)';
            // 'translate(140px,-80px)',
            // 'translate(140px,80px)',
            // 'translateY(160px)',
            // 'translate(-140px, 80px)',
            // 'translate(-140px, -80px)'
    }
</script>
</body>
</html>
