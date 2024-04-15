import { defineStore } from "pinia";
import axios from "axios";

const { localStorage } = window;

export const useAuthStore = defineStore("auth", {
    state: ()=> ({
        authUser: null,
        error: null,
        initialized: false,
        
    }),
    getters: {
        user: (state)=> state.authUser,
        errorMessage: (state) => state.error
    },
    actions: {
        
        async getToken() {
            await axios.get('/sanctum/csrf-cookie'); 
        },


        isAuthorized() {
            return this.authUser !== null;
        },


        async initialize() {
            try {
              await this.getUser();
              this.initialized = true;
            } catch (error) {
              console.error(error);
            }
        },


        async getUser(){
            await this.getToken();
            const data = await axios.get("/api/user");
            this.authUser = data.data;
            localStorage.setItem("user", JSON.stringify(data.data));
        },

        async handleLogin(data) {
            if(!this.authUser){ 
                this.handleLogout();
            };
            
            await this.getToken();
            try{
                await axios.post('/login',{
                    email: data.email,
                    password: data.password
            })
            this.initialized = true;
            this.getUser();
            console.log(this.initialized); 
            this.router.push('/');
            state.error = null;
        }catch(error){
            this.error = error.response.data.message;
        }
        },

        async handleRegister (data) {
            await this.getToken();
            await axios.post('/register',{
                name: data.name,
                email: data.email,
                password: data.password,
                password_confirmation: data.password_confirmation
            });
            this.router.push("/login");
        },

        async handleLogout (){
            await axios.post('/logout');
            this.authUser = null;
            localStorage.removeItem("user");
            this.router.push('/login')
        },

        async vendorRegistrationHandle(){
            await this.getUser(); 
            await axios.post('/vendorRegister', {
                id: this.user.id,
            });
            this.router.push("/vendor-dashboard");
        },
    },
})