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
<div class="row">
    <div class="coffee-span-12" id="menuBar">
        <svg version="1.1" id="menu" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="960px" height="50px" viewBox="0 0 960 50" style="enable-background:new 0 0 960 560;" xml:space="preserve">
            <defs>
                <filter id="filterX" primitiveUnits="objectBoundingBox" x="0%" y="0%">
                    <feGaussianBlur in="SourceAlpha" stdDeviation="0.04"></feGaussianBlur>
                    <feOffset dx="0" dy="0.04" result="offsetblur"></feOffset>
                    <feFlood flood-color="#1a1510"></feFlood>
                    <feComposite in2="offsetblur" operator="in"></feComposite>
                    <feMerge>
                        <feMergeNode></feMergeNode>
                        <feMergeNode in="SourceGraphic"></feMergeNode>
                    </feMerge>
                </filter>
            </defs>

            <a class="svgButtonA" id="menuWrapper">
                <polygon id="trigger" style="fill:#1a1510;stroke:#f3d858;stroke-width:2px;stroke-miterlimit:10;" filter="url(#filterX)" points="430,1 455,44.5 505,44.5 530,1"></polygon>
                <text id="triggerText" class="text" style="fill:#FBFCFA;" transform="matrix(1 0 0 1 456.4741 28.6611)">MENU</text>
            </a>

            <a id="subMenu1" class="subMenu" xlink:href="#/">
                <polygon id="hex1" class="svgButton" filter="url(#filterX)" style="stroke-miterlimit:10;" points="195,104.5 170,61 195,17.5 245,17.5 270,61,245,104.5"></polygon>
            </a>
            <a id="subMenu2" class="subMenu" xlink:href="#/music">
                <polygon id="hex2" class="svgButton" filter="url(#filterX)" style="stroke-miterlimit:10;" points="295,154.5 270,111 295,67.5 345,67.5370,111 345,154.5"></polygon>
            </a>
            <a id="subMenu3" class="subMenu" xlink:href="#/design">
                <polygon id="hex3" class="svgButton" filter="url(#filterX)" style="stroke-miterlimit:10;" points="395,204.5 370,161 395,117.5 445,117.5470,161 445,204.5"></polygon>
            </a>
            <a id="subMenu4" class="subMenu" xlink:href="#/writing">
                <polygon id="hex4" class="svgButton" filter="url(#filterX)" style="stroke-miterlimit:10;" points="515,204.5 490,161 515,117.5 565,117.5590,161 565,204.5"></polygon>
            </a>
            <a id="subMenu5" class="subMenu" xlink:href="#/blog">
                <polygon id="hex5" class="svgButton" filter="url(#filterX)" style="stroke-miterlimit:10;" points="615,154.5 590,111 615,67.5 665,67.5690,111 665,154.5"></polygon>
            </a>
            <a id="subMenu6" class="subMenu">
                <polygon id="hex6" class="svgButton" filter="url(#filterX)" style="stroke-miterlimit:10;" points="715,104.5 690,61 715,17.5 765,17.5 790,61765,104.5"></polygon>
            </a>
            <a id="subTextWrapper">
                <rect id="textContainer" x="405.5" y="67.5" style="fill:none;stroke:none;stroke-miterlimit:10;" width="150" height="25"></rect>
                <text class="text" id="subMenuText" style="fill:#1a1510;" transform="matrix(1 0 0 1 480 82)"></text>
            </a>
    </svg>
    </div>
</div>

</body>
</html>
