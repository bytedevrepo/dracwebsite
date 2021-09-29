<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            background: #BEBFBD;
        }

        #mainMenu {
            display:none;
            margin: auto 0;
            text-align:center;
        }

        #menu {
            top:0;
            left:50%;
            margin-left:-480px;
            position:fixed;
            margin-top: -2px;
            z-index:99;
        }

        .svgButton {
            cursor: pointer; /* SVG &lt;a&gt; elements don't get this by default, so you need to explicitly set it */
            outline: none;
            fill:#1a1510;
            stroke:#f3d858;
            stroke-width: 2px;
        }

        .svgButtonA {
            cursor: pointer;
            outline: none;
        }

        .menu-trigger {
            fill: #EA2A55;
            pointer-events: auto;
        }

        .menu-trigger:hover, .menu-trigger:focus {
            cursor: pointer;
        }



        symbol {
            overflow: visible;
        }

        #subMenuWrapper, #subMenuText {
            text-anchor: middle;
            alignment-baseline:middle;
        }

        .symbolFill {
            fill: #FBFCFA;
        }
    </style>
    <style>
        /*
         * ==== hexagon
         */
        .hexa, .hexa div {
            margin: 0 auto;
            transform-origin: 50% 50%;
            overflow: hidden;
            width: 300px;
            height: 300px;
        }
        .hexa {
            width: 325px;
            height: 230px;
        }
        .hexa div {
            width: 100%;
            height: 100%;
        }
        .hexa {
            transform: rotate(120deg);
        }
        .hex1 {
            transform: rotate(-60deg);
        }
        .hex2 {
            transform: rotate(-60deg);
        }

        /* dev mode */
        .part.devmode div {
            box-shadow: 0 0 4px;
        }
        .part {
            padding: 50px 20px 85px;
            background: #205B73;
            color: #AFE4FC;
        }
        .part:nth-of-type(2n) {
            background: #F2E6A7;
            color: #CDAE51
        }
        .hexa img {
            position: relative;
            top: -25px;
            left: 20px;
        }
        .octo div img {
            position :relative;
            left:-5px; top: -5px;
        }
        .diamond img {
            position: relative;
            width: 105%; left: -7px; top: -5px;
        }
    </style>
    <style>
        .container{
            margin: 20px 80px 80px 80px;
        }
        .close-btn {
            font-size: 60px;
            font-weight: bold;
            cursor: pointer;
            position: absolute;
            top: 50px;
            right: 80px;
        }
    </style>
</head>
<body>
<?php
$points = [
    '195,104.5 170,61 195,17.5 245,17.5 270,61,245,104.5',
    '295,154.5 270,111 295,67.5 345,67.5,370,111 345,154.5',
    '395,204.5 370,161 395,117.5 445,117.5,470,161 445,204.5',
    '515,204.5 490,161 515,117.5 565,117.5,590,161 565,204.5',
    '615,154.5 590,111 615,67.5 665,67.5,690,111 665,154.5',
    '715,104.5 690,61 715,17.5 765,17.5 790,61,765,104.5'
];
$menu_name = [];
?>
@foreach($menu->children as $key=>$value)
    @php array_push($menu_name, $value->display_name); @endphp
@endforeach
<div class="part">
    <div class="hexa">
        <div class="hex1">
            <div class="hex2">
                <img src="http://farm3.staticflickr.com/2788/4392569951_8bcec3b3ed_z.jpg?zz=1" alt="" width="320" height="313" />
            </div>
        </div>
    </div>
    <span class="close-btn" onclick="window.location.href='/';">&times;</span>
</div>
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
            @foreach($menu->children as $key=>$value)
                <a id="subMenu{{$loop->iteration}}" class="subMenu" xlink:href="#/">
                    <polygon id="hex{{$loop->iteration}}" class="svgButton" filter="url(#filterX)" style="stroke-miterlimit:10;" points="{{ $points[$key] }}"></polygon>
                </a>

            @endforeach
            <a id="subTextWrapper">
                <rect id="textContainer" x="405.5" y="67.5" style="fill:none;stroke:none;stroke-miterlimit:10;" width="150" height="25"></rect>
                <text class="text" id="subMenuText" style="fill:#1a1510;" transform="matrix(1 0 0 1 480 82)"></text>
            </a>
    </svg>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            {!! $page->body !!}
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TimelineMax.min.js"></script>
<script src="https://richardgaynor.com.au/wp-content/themes/hashcomb/js/TextPlugin.min.js"></script>
<script>
    var svgButtons = $(".svgButton");
    var subMenuText = $("#subMenuText");
    var subText = $("#subTextWrapper");
    var menuWrapper = $("#menuWrapper");
    var triggerText = $("#triggerText");
    var menu = $("#menu");
    var items = $(".subMenu");
    var open = false;
    var menuClick = false;
    var currentSubMenu = 0;
    menu_names = @json($menu_name);
    var subMenuTitles = menu_names;
    {{--console.log(subMenuTitles)--}}
    {{--var menu = JSON.stringify({{$menu_name}})--}}
    {{--console.log(menu)--}}

    TweenLite.set([items, subText], {
        scale: 0,
        visibility: "visible"
    });
    var subSpinTL = new TimelineMax({
        paused: true,
        repeat: -1
    });

    menuWrapper.click(function() {
        triggerActivate();
    });

    function triggerActivate() {
        open = !open;
        if (open) {
            TweenMax.set(menu, {
                attr: {
                    height: "280px",
                    viewBox: "0,0,960,280"
                }
            });
            TweenMax.to(trigger, 0.9, {
                stroke: "#6da5b0",
                ease: Power3.easeOut
            });
            TweenMax.staggerTo(items, 0.7, {
                scale: 1,
                ease: Elastic.easeOut
            }, 0.05);
            TweenMax.to(subText, 0.7, {
                scale: 1,
                ease: Elastic.easeOut
            });
        } else {
            TweenMax.to(trigger, 0.6, {
                stroke: "#f3d858",
                ease: Power3.easeOut
            });
            TweenMax.staggerTo(items, .3, {
                scale: 0,
                ease: Back.easeIn,
            }, 0.05);
            TweenMax.to(subText, .3, {
                scale: 0,
                ease: Back.easeIn
            });
            TweenMax.set(menu, {
                attr: {
                    height: "50px",
                    viewBox: "0,0,960,50"
                },
                delay: 0.7
            });
        }
    }

    items.hover(function(event) {
        for (var i = 0; i < svgButtons.length; i++) {
            if (event.target.id == svgButtons[i].id) {
                TweenMax.to(subMenuText, 0.2, {
                    text: subMenuTitles[i],
                    ease: Linear.easeNone
                });
                TweenMax.set(svgButtons[i], {
                    transformOrigin: "50% 50%"
                });
                currentSubMenu = i;
                subSpinTL.clear();
                subSpinTL.to(svgButtons[currentSubMenu], 1, {
                    scale: 1.2
                });
                subSpinTL.to(svgButtons[currentSubMenu], 1, {
                    stroke: "#6da5b0"
                }, 0);
                subSpinTL.yoyo(true);
                subSpinTL.play(0);
            }
        }
    });

    items.mouseleave(function() {
        TweenMax.to(subMenuText, 0.2, {
            text: "",
            ease: Linear.easeNone
        });
        subSpinTL.yoyo(false);
        TweenMax.to(svgButtons[currentSubMenu], 0.2, {
            scale: 1
        });
        TweenMax.to(svgButtons[currentSubMenu], 0.2, {
            stroke: "#f3d858"
        });
    });
</script>
</body>
</html>
