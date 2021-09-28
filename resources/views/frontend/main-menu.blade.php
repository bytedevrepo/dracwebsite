@extends('frontend.layouts.app')
@section('content')
    <svg>
        <defs>
            <filter id="filt">
                <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10" />
                <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="filt" />
                <feBlend in2="filt" in="SourceGraphic" result="mix" />
            </filter>
        </defs>
    </svg>
    <div class="container">
        <div class="toggle" id="toggle"></div>
    </div>

    <div class="menu" id="menu"></div>
@stop
@section('script')

    <script type="text/javascript">
        $(document).ready(function(){
            getMainMenu();
            function setCenterMenu(mainMenu){
                var url = 'images/'+mainMenu.image;
                $('#add').remove();
                $('#toggle').append(
                    `<a id="add" href="${mainMenu.id}">
            ${mainMenu.title}
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
            ${menu[i].title}
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
                        var mainMenu = JSON.parse(response.mainMenu);
                        var child = JSON.parse(response.child);
                        setCenterMenu(mainMenu);
                        setChildMenu(child);
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            }

            $(document).on('click', '.child_menu', function(e) {
                e.preventDefault();
                closeMenu();
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
                var exapand0=['translateY(-160px)','translate(140px,-80px)', 'translate(140px,80px)','translateY(160px)', 'translate(-140px, 80px)', 'translate(-140px, -80px)' ];
                var items = $("#menu").children();
                $.each(items, function(i, item){
                    $(item).css('transform',  exapand0[i]);
                });
            }

            function closeMenu(){
                var items = $("#menu").children();
                $.each(items, function(i, item){
                    $(item).css('transform',  'translateY(0px)');
                });
            }
        });

    </script>
@stop
