<template>
    <div class="">
        <div class="menu_container">
            <div class="toggle" id="toggle" v-if="mainMenu">
                <a id="add" :data-menu_id="mainMenu.id" href="#" >
                    <img width='175' :src="'storage/'+mainMenu.image" alt="">
                </a>
            </div>
            <template v-if="showCloseBtn">
            <div class="overlay"></div>
            <div class="close-button"><a @click.prevent="getMainMenu"><i class="material-icons">close</i></a></div>
            </template>
        </div>
        <div class="menu" id="menu">
            <div class='item-wrap' v-for="(value,index) in childMenu" :key="index">
                <div class='item'>
                    <a class="center-menu" @click.prevent="followMenu(value)" :title='value.display_name'>
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
                showCloseBtn:false,
            }
        },
        mounted() {
            this.getMainMenu();
            console.log(this.$el)
        },
        methods:{
            async getMainMenu(){
                this.closeMenu();
                const response = await HomeService.getMainMenu();
                await this.setMenu(response);
                this.expandMenu();
                this.showCloseBtn = false;
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
                    this.$router.push({ name: 'Page', params: { menu_id: value.slug } })
                }
                this.showCloseBtn = true;
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
    .overlay {
        position: relative;
        left: 20px;
        top: 5px;
        border-radius: 50%;
        opacity: 0.2;
        width: 100%;
        height: 100%;
        filter: drop-shadow(2px 4px 60px grey);
        transition: background 0.6s ease;
    }

    .menu_container:hover .overlay {
        display: block;
        background: rgba(0, 0, 0, .1);
    }
    .menu_container:hover .title {
        top: 90px;
    }

    .close-button {
        position: absolute;
        left: 70px;
        top: 20px;
        font-size: 70px;
        text-align: center;
        opacity: 0;
        transition: opacity .35s ease;
        z-index: 90;

    }
    .material-icons{
        font-size: 35px;
        font-weight: bolder;
    }
    .menu_container:hover .close-button {
        opacity: 1;
    }

</style>
