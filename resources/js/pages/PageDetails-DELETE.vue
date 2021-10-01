<template>
    <div class="">
        <div id="about" class="episoda-pop-up-window" :class="{'episoda-active':pageData}">
            <a href="#" @click.prevent="goBack" class="episoda-ico-close">
                <span class="episoda-cross-first"></span>
                <span class="episoda-cross-second"></span>
                <span class="episoda-label">close</span>
            </a>
            <div class="container">
                <div class="row">

                    <article class="col-md-8 col-lg-6 col-12 offset-md-2 offset-lg-3 offset-0">

                        <img src="img/photographer.jpg" alt="" class="episoda-img-responsive">
                        <header>
                            <p>Hi everyone!</p>
                            <h2>I'm Mark Smith</h2>
                        </header>
                        <div class="episoda-content">
                           {{ pageData.body }}
                        </div>
                        <footer class="episoda-details">
                            <dl class="episoda-details-container">
                                <div class="episoda-details-item">
                                    <dt class="episoda-item-name">Date of birth</dt>
                                    <dd class="episoda-item-data">May 17, 1987</dd>
                                </div>
                                <div class="episoda-details-item">
                                    <dt class="episoda-item-name">Located in</dt>
                                    <dd class="episoda-item-data">New-York, USA</dd>
                                </div>
                                <div class="episoda-details-item">
                                    <dt class="episoda-item-name">Profession</dt>
                                    <dd class="episoda-item-data">Professional photographer, social photography, designer</dd>
                                </div>
                                <div class="episoda-details-item">
                                    <dt class="episoda-item-name">Languages spoken</dt>
                                    <dd class="episoda-item-data">English, german</dd>
                                </div>
                                <div class="episoda-details-item">
                                    <dt class="episoda-item-name">Skills</dt>
                                    <dd class="episoda-item-data">Using digital and non-digital cameras, creativity, personality, perseverance, patience and dedication.</dd>
                                </div>
                            </dl>
                        </footer>

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
                page_slug: '',
                pageData: '',
            }
        },
        mounted(){
            this.page_slug = this.$route.params.slug;
            this.getPage();
        },
        methods:{
            async getPage(){
                const response = await HomeService.getPage(this.page_slug);
                this.pageData = response.data.data.page;
            },
            goBack(){
                this.$router.push('/')
            }
        }
    }
</script>

<style scoped>

</style>
