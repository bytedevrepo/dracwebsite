<template>
    <div class="">
        {{pageData}}
        <router-link to="/">Back</router-link>
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
            }
        }
    }
</script>

<style scoped>

</style>
