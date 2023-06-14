<template>

    <div class="flex items-center justify-center min-h-full min-w-full">
        <div class="text-indigo-700 text-5xl px-6 border-r font-bold ">404</div>
        <div class="px-4">
            <h2 class="text-5xl font-bold mb-4">Page Not Found</h2>
            <p class="text-gray-700 mb-2">Please check the url in the address bar and try again .</p>
            <router-link :to="{name:'app.dashboard'}" class=" rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Back To Home</router-link>
        </div>
    </div>

</template>

<script>
    export default {
        name: "NotFound"
    }
</script>

<style scoped>

</style>
