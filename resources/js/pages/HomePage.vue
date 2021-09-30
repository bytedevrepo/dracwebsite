<template>
    <div class="">
        <div class="container">
            <div class="toggle" id="toggle" v-if="mainMenu">
                <a id="add" :data-menu_id="mainMenu.id" href="#" >
                    <img width='175' :src="'storage/'+mainMenu.image" alt="">
                </a>
            </div>
        </div>
        <div class="menu" id="menu">
            <div class='item-wrap' v-for="(value,index) in childMenu" :key="index">
                <div class='item'>
                    <a class="" @click.prevent="followMenu(value)" :title='value.display_name'>
                        <img width='150' :src="'storage/'+value.image" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import HomeService from "../services/HomeService";
    export default {
        name: "HomePage",
        data(){
            return{
                mainMenu:'',
                childMenu:'',
            }
        },
        mounted() {
            this.getMainMenu()
        },
        methods:{
            async getMainMenu(){
                const response = await HomeService.getMainMenu();
                await this.setMenu(response);
                this.expandMenu();
            },
            async setMenu(response){
                this.mainMenu = response.data.data.mainMenu;
                this.childMenu = response.data.data.child;
            },
            async followMenu(value){
                if (value.page_id === 0) {
                    this.closeMenu();
                    const response = await HomeService.getChildMenu(value.id);
                    await this.setMenu(response);
                    this.expandMenu();
                } else{
                    let page_slug = value.page.slug;
                    this.$router.push({ name: 'Page', params: { slug: page_slug } })
                }
            },
            closeMenu(){
                var items = $("#menu").children();
                $.each(items, function(i, item){
                    $(item).css('transform',  'translateY(0px)');
                });
            },
            expandMenu(){
                var transitions=['translateY(-160px)','translate(140px,-80px)', 'translate(140px,80px)','translateY(160px)', 'translate(-140px, 80px)', 'translate(-140px, -80px)' ];
                var items = $("#menu").children();
                $.each(items, function(i, item){
                    $(item).css('transform',  transitions[i]);
                });
            }
        }
    }
</script>

<style scoped>

</style>
