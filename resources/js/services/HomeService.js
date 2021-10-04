import Api from './Api';

export default {
    getMainMenu(){
        return Api().get('api/getMainMenu');
    },
    getChildMenu(menu_id){
        return Api().get('api/getChildMenu/'+menu_id);
    },
    getPage(slug){
        return Api().get('api/getPage/'+slug);
    },
    getPageList(menu_id){
        return Api().get('api/getPageList/'+menu_id);
    },
}
