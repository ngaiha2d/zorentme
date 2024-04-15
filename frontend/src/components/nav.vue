<script setup>
import { onMounted } from 'vue';
import { useAuthStore } from '../stores/auth';

const  authStore = useAuthStore();
if(authStore.user){

onMounted(async ()=>{
    await authStore.getUser();
});
}
</script>


<template>
<nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600 ">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
  <a href="#" class="flex items-center">
    <router-link :to="{name :'Home'}" class=" rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page"><span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Zorentme</span></router-link>
  </a>
  

    <ul :class="'flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700'">
      <template v-if="!authStore.user">
        <li>
        <router-link :to="{name:'Login'}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Login</router-link>
      </li>
      <!-- <li>
        <router-link :to="{name:'Register'}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Register</router-link>
      </li> -->
      
      </template>
      
      <template v-else-if="authStore.user.is_vendor == 1">
        <p style="color: aliceblue;">{{ authStore.user.name }}</p>
        <router-link :to="{name:'VendorDashboard'}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Vendor Dashboard</router-link>
        <p class="point hover" style="color: aliceblue;" @click="authStore.handleLogout" >Logout</p>
        
      </template>
      <template v-else>
        <p  style="color: aliceblue;">{{ authStore.user.name }}</p>
        <router-link :to="{name:'VendorRegistration'}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Register as Vendor</router-link>
        <button @click="authStore.handleLogout" >Logout</button> 
      </template>
    </ul>
  </div>

</nav>

</template>

<style>
nav li:hover,
nav li:active {

  cursor: pointer;
}
.point{
  cursor: pointer;
}
.point:hover {
  color: blue;
}
</style>

