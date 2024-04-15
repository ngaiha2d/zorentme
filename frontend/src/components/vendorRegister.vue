<script setup>
import { ref } from 'vue';
import { onMounted } from 'vue';
import { useAuthStore } from '../stores/auth';

const authStore = useAuthStore();

onMounted( async()=> {
    await authStore.getUser();
});

</script>
<template>

      <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-black">
          Become a vendor
      </a>
      <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700" style="width: 400px;">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                  Register as a Vendor
              </h1>
              <form @submit.prevent="authStore.vendorRegistrationHandle()" class="space-y-4 md:space-y-6" action="#">
                <div>
                      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name : {{ authStore.user.name }}</label>
                  </div>
                  <div>
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email : {{ authStore.user.email }}</label>
                  </div>
                  <button type="submit" class="w-full text-white bg-danger-60 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Register</button>
              </form>
          </div>
      </div>
</template>