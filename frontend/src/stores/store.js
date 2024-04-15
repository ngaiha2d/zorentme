import { defineStore } from "pinia";
import router from "../router";
import axios from "axios";

export const useStore = defineStore("store",{
    state:()=>({
        item:null,
        itemforproductpage:null,
    }),
    getters:{
        msg:(state) => state.item
    },
    actions:{
        async itemList(){
            const items = await axios.get('api/all/item');
            this.item = items.data;
        },

        async loadPage(item_id) {
            router.push({ name: "product_page", params: { item_id } });
        },

        async productPageNext(item_id){
            await this.itemList();
            this.itemforproductpage = this.item.find((item) => item.id === item_id);
        },
        async handleItemList(data, file) {
            console.log(file,'asdas');
            console.log(data);
            // try {
            //   const response = await axios.post('api/all/item', {
            //     name: data.name,
            //     categories: data.categories,
            //     description: data.description,
            //     price: data.price,
            //     rent_time: '1',
            //     user_id: data.user_id,
            //   });
            //   const responseData = response.data;
            //   console.log(responseData);
            //   window.alert(responseData);
            //   // Handle the response data as needed
            // } catch (error) {
            //   console.error(error);
            //   // Handle the error
            // }
            this.router.push('/vendor-dashboard');
            
          }
    }
});