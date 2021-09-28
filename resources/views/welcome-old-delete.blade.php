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
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="container">
    <div class="toggle" id="toggle"></div>
</div>

<div class="menu" id="menu"></div>

<script src="{{ asset('js/jquery-2.1.1.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function(){

        getMainMenu();

        {{--function setMenu(image){--}}
            {{--var menu = <?php echo json_encode($menu); ?>;--}}
            {{--var mainMenu = <?php echo json_encode($mainMenu); ?>;--}}
            {{--$('#toggleMenu').attr('src',image);--}}
            {{--setCenterMenu(JSON.parse(mainMenu));--}}
            {{--setChildMenu(JSON.parse(menu))--}}
            {{--expandMenu();--}}
        {{--}--}}

        function setCenterMenu(mainMenu){
            console.log(mainMenu)
            var url = 'images/'+mainMenu.image;
            $('#add').remove();
            $('#toggle').append(
                `<a id="add" href="${mainMenu.id}">
            <img class='item-image' id="toggleMenu" src="${url}"/>
        </a>`
            )
        }
        function setChildMenu(menu){
            $('.item-wrap').remove();
            for (i=0;i<menu.length;i++){
                var url = 'images/'+menu[i].image;
                $('#menu').append(
                    `<div class='item-wrap'>
            <div class='item'>
            <a href='${menu[i].id}' class='child_menu'>
            <img class='item-image' src="${url}"/>
            </a>
            </div>
            </div>`
                )
            }
            expandMenu();
        }

        function getMainMenu(){
            $('.item-wrap').remove();
            $('#add').remove();
            $.ajax({
                type: "GET",
                url: '/getMainMenu',
                dataType: 'json',
                success: function (response) {
                    var mainMenu = JSON.parse(response.mainMenu)
                    var child = JSON.parse(response.child)
                    setCenterMenu(mainMenu)
                    setChildMenu(child)
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }

        $(document).on('click', '.child_menu', function(e) {
            e.preventDefault();
            let id = $(this).attr('href');
            $.ajax({
                type: "GET",
                url: '/getChildMenu/'+id,
                dataType: 'json',
                success: function (response) {
                    // console.log(response)
                    $('.item-wrap').remove();
                    setCenterMenu(response.main);
                    setChildMenu(response.child);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });

        function expandMenu(){
            var i = $("#menu").children();
            var j = 0;
            if (j === 0) {
                document.getElementById("add").style.transform = 'rotate(45deg)';
                document.getElementById("menu").style.transform = 'scale(1)';
                i[0].style.transform = 'translateY(-160px)';
                i[1].style.transform = 'translate(140px,-80px)';
                i[2].style.transform = 'translate(140px,80px)';
                i[3].style.transform = 'translateY(160px)';
                i[4].style.transform = 'translate(-140px, 80px)';
                i[5].style.transform = 'translate(-140px, -80px)';
                j = 1;
            } else {
                document.getElementById("add").style.transform = 'rotate(0deg)';
                i[0].style.transform = 'translateY(0)';
                i[1].style.transform = 'translate(0)';
                i[2].style.transform = 'translate(0)';
                i[3].style.transform = 'translateY(0)';
                i[4].style.transform = 'translate(0)';
                i[5].style.transform = 'translate(0)';
                j = 0;
            }
        }
    });

</script>

<svg>
    <defs>
        <filter id="filt">
            <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10" />
            <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="filt" />
            <feBlend in2="filt" in="SourceGraphic" result="mix" />
        </filter>
    </defs>
</svg>
</body>
</html>
