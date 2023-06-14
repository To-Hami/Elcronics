<template>
    <div class="flex min-h-full  transition-all">

        <!--  sidebar-->
        <div class="w-[250px] bg-indigo-700 rounded-l-lg text-gray-300 p-4 transition-all" >

           <div class="flex items-center">
               <span><img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=white" alt="Your Company" /></span>
               <router-link :to="{name:'app'}">
                   <span class="px-2 text-lg">Electronics</span>
               </router-link>

           </div>
             <router-link :to="{name:'app.dashboard'}" class="flex items-center hover:bg-black/40 px-4 py-2 rounded my-2  transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-80 duration-200">
                 <span class=" mr-3" ><HomeIcon class="w-6"></HomeIcon></span>
                 <span class="text-lg">Dashboard</span>
             </router-link>

            <router-link :to="{name:'app.users'}" class="flex items-center hover:bg-black/40 px-4 py-2 rounded my-2  transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-80 duration-200">
                <span class=" mr-3" ><UsersIcon class="w-6"></UsersIcon></span>
                <span class="text-lg">Users</span>
            </router-link>

            <router-link :to="{name:'app.Products'}" class="flex items-center hover:bg-black/40 px-4 py-2 rounded my-2  transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-80 duration-200">
                <span class=" mr-3" ><CubeTransparentIcon class="w-6"></CubeTransparentIcon></span>
                <span class="text-lg">Products</span>
            </router-link>

            <router-link :to="{name:'app.orders'}" class="flex items-center hover:bg-black/40 px-4 py-2 rounded my-2  transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-80 duration-200">
                <span class=" mr-3" ><GiftIcon class="w-6"></GiftIcon></span>
                <span class="text-lg">Orders</span>
            </router-link>

            <router-link :to="{name:'app.reports'}" class="flex items-center hover:bg-black/40 px-4 py-2 rounded my-2  transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-80 duration-200">
                <span class=" mr-3" ><ChartBarIcon class="w-6"></ChartBarIcon></span>
                <span class="text-lg">Reports</span>
            </router-link>

       </div>

    </div>

</template>

<script setup>
    import { HomeIcon, UsersIcon,  CubeTransparentIcon, ChartBarIcon ,GiftIcon  } from '@heroicons/vue/20/solid'

</script>

<style scoped>

</style>
