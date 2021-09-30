<template>
    <div class="">
        <!--<pre> {{ pageList}}</pre>-->
        <header id="episoda-home" class="episoda-header">

            <!-- logotype -->
            <div class="episoda-logo">e</div>
            <!-- end logotype -->

            <!-- menu button -->
            <a href="#menu" class="episoda-nav-ico-open episoda-pop-up-btn">
                <span class="episoda-sandwich-top"></span>
                <span class="episoda-sandwich-mid"></span>
                <span class="episoda-sandwich-bottom"></span>
                <span class="episoda-label">open</span>
            </a>
            <!-- end menu button -->

            <!-- copyright -->
            <div class="episoda-copyright">Copyright © 2018 episoda</div>
            <!-- end copyright -->

            <!-- play/pause audio button -->
            <div class="episoda-audio-btn">
                <span class="episoda-equalizer episoda-line-1"></span>
                <span class="episoda-equalizer episoda-line-2"></span>
                <span class="episoda-equalizer episoda-line-3"></span>
                <span class="episoda-equalizer episoda-line-4"></span>
                <span class="episoda-equalizer episoda-line-5"></span>
                <span class="episoda-label"><span class="episoda-label-play">play</span><span class="episoda-label-pause">pause</span></span>
            </div>
            <!-- end play/pause audio button -->

            <!-- audio track -->
            <audio id="episoda-audio-bg" class="episoda-audio" loop>
                <source src="/frontend-assets/site/audio/bensound-memories.mp3" type="audio/mpeg">
            </audio>
            <!-- end audio track -->

            <section id="episoda-header-slider" class="episoda-slider owl-carousel">

                <!-- slide -->
                <div class="episoda-slide" :data-hash="value" v-for="value in pageListCount">

                    <!-- slide img -->
                    <img class="episoda-slide-img" src="frontend-assets/site/img/hawaii.jpg" alt="header slide image">
                    <!-- end slide img -->

                    <!-- slide content -->
                    <div class="episoda-slide-content">

                        <div class="episoda-absolute col-md-9 col-lg-8 col-10">

                            <p>{{ getData(value)}}</p>
                            <h1>Crystal clear water near the shore</h1>
                            <a href="#hawaii" class="episoda-pop-up-btn">Read more<i class="episoda-right-arrow"></i></a>

                        </div>

                    </div>
                    <!-- end slide content -->

                </div>
                <!-- end slide -->
            </section>
        </header>

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
            }
        },
        async beforeMount(){
            this.menu_id = this.$route.params.menu_id;
            await this.getPageList();
        },
        methods:{
            async getPageList(){
                const response = await HomeService.getPageList(this.menu_id);
                this.pageList = response.data.data.menu;
                console.log(this.pageList)
            },
            getData(index){
                console.log(this.pageList)
            },
            goBack(){
                this.$router.push('/')
            }
        }
    }
</script>

<style scoped>

</style>
