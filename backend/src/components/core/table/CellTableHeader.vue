<template>

    <th @click="emit('click' , filed)" class="border-b-2 p-2 text-left cursor-pointer bg-gray-100"
        ::class="filed === sortFiled ? 'bg-blue-500' : '' ">
        <div class="flex ">
            <slot></slot>
            <div v-if="filed === sortFiled" class="ml-2">
                <svg v-if="sortDirection === 'asc'" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z" />
                </svg>

                <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z" />
                </svg>
            </div>
        </div>
    </th>
</template>

<script setup>
    const{filed,sortFiled,sortDirection} = defineProps({

        filed:String,
        sortFiled:String,
        sortDirection:String
    });

    const emit = defineEmits(['click']);


</script>

<style scoped>

</style>
