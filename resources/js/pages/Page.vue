<template>
    <div class="">
        <!--<ul id="menu_ferro">-->
            <!--<li><a href="#"><i class="icon-camera"></i></a></li>-->
            <!--<li><a href="#"><i class="icon-user"></i></a></li>-->
            <!--<li><a href="#"><i class="icon-map-marker"></i></a></li>-->
            <!--<li><a href="#"><i class="icon-music"></i></a></li>-->
            <!--<li><a href="#"><i class="icon-comment-alt"></i></a></li>-->
            <!--<li><a href="#"><i class="icon-moon"></i></a></li>-->
        <!--</ul>-->
        <header id="episoda-home" class="episoda-header">
            <!--<a href="#menu" class="episoda-nav-ico-open episoda-pop-up-btn">-->
                <!--<span class="episoda-sandwich-top"></span>-->
                <!--<span class="episoda-sandwich-mid"></span>-->
                <!--<span class="episoda-sandwich-bottom"></span>-->
                <!--<span class="episoda-label">open</span>-->
            <!--</a>-->

            <div class="episoda-copyright">Copyright © 2018 Drac</div>

            <section id="episoda-header-slider" class="episoda-slider owl-carousel">
                <!-- slide -->
                <div class="episoda-slide" :data-hash="value.slug" v-for="(value,index) in pageList" :key="index">
                    <a @click=""><div class="episoda-logo">
                        <img :src="'storage/'+value.image" alt="" style="width: 100px !important;">
                    </div></a>
                    <!-- slide img -->
                    <img class="episoda-slide-img" src="frontend-assets/site/img/hawaii.jpg" alt="header slide image">
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
                console.log(data)
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
                        autoplayTimeout: 6000,
                        animateIn: 'fadeIn',
                        animateOut: 'fadeOut',
                        URLhashListener: false,
                        startPosition: 'URLHash'
                    });
                })
            },
            async getPageList(){
                const response = await HomeService.getPageList(this.menu_id);
                this.pageList = response.data.data.siblings;
                this.initOwl();
            },
            goBack(){
                this.$router.push('/')
            }
        }
    }
</script>

<style scoped>

</style>
