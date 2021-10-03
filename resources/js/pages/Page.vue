<template>
    <div class="">

        <header id="episoda-home" class="episoda-header">
            <!--<a href="#menu" class="episoda-nav-ico-open episoda-pop-up-btn">-->
            <!--<span class="episoda-sandwich-top"></span>-->
            <!--<span class="episoda-sandwich-mid"></span>-->
            <!--<span class="episoda-sandwich-bottom"></span>-->
            <!--<span class="episoda-label">open</span>-->
            <!--</a>-->
            <div id="circularMenu" class="circular-menu" style="z-index:50;">

                <a class="floating-btn" onclick="document.getElementById('circularMenu').classList.toggle('active');" style="z-index:60;">
                    <i class="material-icons" style="font-size: 40px !important;">add</i>
                </a>

                <menu class="items-wrapper">
                    <a href="#" @click.prevent="followMenu(value, index)" class="menu-item" v-for="(value,index) in this.pageList" :title="value.display_name">
                        <img v-if="value.image" :src="'storage/'+value.image" alt="" width="50">
                    </a>
                </menu>

            </div>

            <div class="episoda-copyright">Copyright © 2018 Drac</div>

            <section id="episoda-header-slider" class="episoda-slider owl-carousel">
                <!-- slide -->
                <!--<div class="episoda-slide" :id="value.slug" :data-hash="mainMenu.slug+'#'+value.slug" v-for="(value,index) in pageList" :key="index">-->
                <div class="episoda-slide" :id="value.slug" v-for="(value,index) in pageList" :key="index">
                    <router-link to="/" style="z-index: 990;">
                        <div class="episoda-logo" style="z-index: 990;">
                            <img v-if="value.image" :src="'storage/'+value.image" alt="" style="width: 80px !important;">
                        </div>
                    </router-link>

                    <!-- slide img -->
                    <img v-if="value.page.background_image" class="episoda-slide-img" :src="'storage/'+value.page.background_image" alt="header slide image">
                    <img v-else class="episoda-slide-img" src="frontend-assets/site/img/hawaii.jpg" alt="header slide image">
                    <!-- end slide img -->

                    <!-- slide content -->
                    <div class="episoda-slide-content">
                        <div class="episoda-absolute col-md-9 col-lg-8 col-10">
                            <p>{{ value.display_name }}</p>
                            <h1>{{ sliceText(value.page.title, 50) }}</h1>
                            <p>{{ sliceText(value.page.body, 255) }}</p>
                            <a href="#" @click="showPage(value)" class="episoda-pop-up-btn">Read more<i class="episoda-right-arrow"></i></a>
                        </div>
                    </div>
                    <!-- end slide content -->
                </div>
                <!-- end slide -->
            </section>
        </header>
        <div id="about" class="episoda-pop-up-window" :class="{'episoda-active':show}">
            <a @click.prevent="show = false;selectedPage='';" class="episoda-ico-close">
                <span class="episoda-cross-first"></span>
                <span class="episoda-cross-second"></span>
                <span class="episoda-label">close</span>
            </a>
            <div class="container">
                <div class="row">
                    <article class="col-md-8 col-lg-8 col-12 offset-md-2 offset-lg-2 offset-0">
                        <header>
                            <p>{{ selectedMenu.display_name }}</p>
                            <h2>{{ selectedMenu.page.title }}</h2>
                        </header>
                        <img v-if="selectedMenu.page.background_image" :src="'storage/'+selectedMenu.page.background_image" alt="" class="episoda-img-responsive">

                        <div class="episoda-content" v-html="selectedMenu.page.body"></div>
                        <!--<footer class="episoda-details">-->
                        <!--<dl class="episoda-details-container">-->
                        <!--<div class="episoda-details-item">-->
                        <!--<dt class="episoda-item-name">Date of birth</dt>-->
                        <!--<dd class="episoda-item-data">May 17, 1987</dd>-->
                        <!--</div>-->
                        <!--<div class="episoda-details-item">-->
                        <!--<dt class="episoda-item-name">Located in</dt>-->
                        <!--<dd class="episoda-item-data">New-York, USA</dd>-->
                        <!--</div>-->
                        <!--<div class="episoda-details-item">-->
                        <!--<dt class="episoda-item-name">Profession</dt>-->
                        <!--<dd class="episoda-item-data">Professional photographer, social photography, designer</dd>-->
                        <!--</div>-->
                        <!--<div class="episoda-details-item">-->
                        <!--<dt class="episoda-item-name">Languages spoken</dt>-->
                        <!--<dd class="episoda-item-data">English, german</dd>-->
                        <!--</div>-->
                        <!--<div class="episoda-details-item">-->
                        <!--<dt class="episoda-item-name">Skills</dt>-->
                        <!--<dd class="episoda-item-data">Using digital and non-digital cameras, creativity, personality, perseverance, patience and dedication.</dd>-->
                        <!--</div>-->
                        <!--</dl>-->
                        <!--</footer>-->

                    </article>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import HomeService from "../services/HomeService";
    export default {
        name: "Page",
        data(){
            return{
                menu_id: '',
                mainMenu: '',
                pageListCount: 6,
                pageList: [],
                show:false,
                selectedMenu:{
                    display_name: '',
                    page: {
                        title: '',
                        body: '',
                        background_image: ''
                    }
                },
            }
        },
        beforeMount(){
            this.menu_id = this.$route.params.menu_id;
            this.getPageList();
        },
        methods:{
            sliceText(text, length){
                if (text && text.length > length){
                    let addedText = `...`;
                    text =  ` ${text.slice(0, length)}${addedText}`
                }
                return text;
            },
            showPage(data){
                this.show = true;
                this.selectedMenu = data;
            },
            followMenu(value, index){
                var element_id = '#'+value.slug;
                console.log($(element_id).parent());
                $(element_id).parent().trigger("to.owl.carousel", [index, 1]);
            },
            initOwl(){
                this.$nextTick(() => {
                    var owl = $('#episoda-header-slider');
                    owl.owlCarousel({
                        items: 1,
                        loop: true,
                        nav: true,
                        navText: ['<i class="episoda-left-arrow"></i>Prev', 'Next<i class="episoda-right-arrow"></i>'],
                        autoplay: true,
                        autoplayTimeout: 10000,
                        animateIn: 'fadeIn',
                        animateOut: 'fadeOut',
                        URLhashListener: false,
                    });
                })
            },
            async getPageList(){
                const response = await HomeService.getPageList(this.menu_id);
                this.pageList = response.data.data.siblings;
                this.mainMenu = response.data.data.menu;
                this.initOwl();
            },
            goBack(){
                this.$router.push('/')
            }
        }
    }
</script>

<style scoped>
    .circular-menu {
        position: fixed;
        right: 5em;
        top: 4em;
    }

    .circular-menu .floating-btn {
        display: block;
        width: 5em;
        height: 5em;
        border-radius: 50%;
        background-color: rgba(0, 0, 0, 0.9);
        box-shadow: 0 2px 5px 0 hsla(0, 0%, 0%, .26);
        color: hsl(0, 0%, 100%);
        text-align: center;
        line-height: 6.5;
        cursor: pointer;
        outline: 0;
    }

    .circular-menu.active .floating-btn {
        box-shadow: inset 0 0 3px hsla(0, 0%, 0%, .3);
    }

    .circular-menu .floating-btn:active {
        box-shadow: 0 4px 8px 0 hsla(0, 0%, 0%, .4);
    }

    .circular-menu .floating-btn i {
        font-size: 1.3em;
        transition: transform .2s;
    }

    .circular-menu.active .floating-btn i {
        transform: rotate(-45deg);
    }

    .circular-menu:after {
        display: block;
        content: ' ';
        width: 5em;
        height: 5em;
        border-radius: 50%;
        position: absolute;
        top: 0;
        right: 0;
        z-index: -2;
        background-color: hsla(0,0%,0%,0.3);
        transition: all .3s ease;
    }

    .circular-menu.active:after {
        transform: scale3d(5.5, 5.5, 1);
        transition-timing-function: cubic-bezier(.68, 1.55, .265, 1);
    }

    .circular-menu .items-wrapper {
        padding: 0;
        margin: 0;
    }

    .circular-menu .menu-item {
        position: absolute;
        top: .2em;
        right: .2em;
        z-index: -1;
        display: block;
        text-decoration: none;
        color: hsl(0, 0%, 100%);
        font-size: 1em;
        width: 4em;
        height: 4em;
        border-radius: 50%;
        text-align: center;
        line-height: 4;
        background-color: whitesmoke;
        transition: transform .3s ease, background .2s ease;
    }

    .circular-menu .menu-item:hover {
        background-color: hsla(0,0%,0%,.3);
    }

    .circular-menu.active .menu-item {
        transition-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .circular-menu.active .menu-item:nth-child(1) {
        transform: translate3d(-9em,-3.5em,0)
    }

    .circular-menu.active .menu-item:nth-child(2) {
        transform: translate3d(-10em,1em,0);
    }

    .circular-menu.active .menu-item:nth-child(3) {
        transform: translate3d(-8.7em,5.6em,0);
    }

    .circular-menu.active .menu-item:nth-child(4) {
        transform: translate3d(-5em,9em,0);
    }
    .circular-menu.active .menu-item:nth-child(5) {
        transform: translate3d(-0.5em,10em,0);
    }
    .circular-menu.active .menu-item:nth-child(6) {
        transform: translate3d(4em,9em,0);
    }

    /*logo*/
    .episoda-logo{
        background-color: hsla(0,0%,0%,0.3);
        border-radius: 50%;
        height: 5rem;
        width: 5rem;
        top: 64px;
    }
</style>
