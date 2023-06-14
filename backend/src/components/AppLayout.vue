<template class="flex items-center justify-center">
    <div class="flex min-h-full bg-gray-200 " v-if="currentUser.id">
        <Sidebar :class="{'-ml-[270px]': !sidebarOpened}" />

        <div class="flex-1">
            <!-- header -->

          <MyHeader @toggle-sidebar="toggleSidebar"></MyHeader>

            <!--content-->
            <div class="p-4 rounded bg-white mt-3">

                <router-view></router-view>

            </div>
        </div>
    </div>
<div v-else="currentUser.id" class="flex items-center justify-center min-h-full">
 <Spinner />
</div>


</template>

<script setup>
    import {ref ,computed, onMounted ,onUnmounted} from 'vue'
    import  Sidebar from './Sidebar.vue';
    import MyHeader from "./MyHeader.vue";
    import store from "../store";
    import Spinner from "./core/Spinner.vue";

    const currentUser = computed( ()=>store.state.user.data);

    const sidebarOpened = ref( true);
    function toggleSidebar(){
        sidebarOpened.value = !sidebarOpened.value
    }


    onMounted(()=>{
        handleSidebar();
        window.addEventListener('resize',handleSidebar);
        store.dispatch('getUser')
    });

    onUnmounted(()=>{
        window.removeEventListener('resize',handleSidebar)
    });

    function handleSidebar(){
        if(window.outerWidth < 766){
            sidebarOpened.value = false
        }else{
            sidebarOpened.value = true
        }
    }

</script>

<style scoped>

</style>
