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
                $('#add').remove();
                $('#toggle').append(
                    `<a id="add" data-menu_id="${mainMenu.id}" href="#">
                        <img width='175' src="storage/${mainMenu.image}" alt="">
                    </a>`
                )
            }
            function setChildMenu(menu){
                // console.log({menu})
                $('.item-wrap').remove();
                for (i=0;i<menu.length;i++){
                    let page_slug;
                    let page_id = menu[i].page_id;
                    if (page_id !== 'undefined' && page_id !== 0){
                        page_slug = menu[i].page.slug;
                    }
                    $('#menu').append
                    (`<div class='item-wrap'>
                        <div class='item'>
                            <a data-menu_id="${menu[i].id}" data-page_slug="${page_slug}" href='#' class='child_menu' title='${menu[i].display_name}'>
                                <img width='150' src="storage/${menu[i].image}" alt="">
                            </a>
                        </div>
                    </div>`)
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
                let menu_id = $(this).data("menu_id");
                let page_slug = $(this).data("page_slug");
                if (page_slug === 'undefined'){
                    $.ajax({
                        type: "GET",
                        url: '/getChildMenu/'+menu_id,
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
                }else{
                    followPage(page_slug, menu_id);
                }
            });

            function followPage(page_slug, menu_id) {
                window.location.href = '/'+page_slug+'?menu='+menu_id
            }

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
