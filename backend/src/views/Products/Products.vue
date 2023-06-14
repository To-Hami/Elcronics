<template>
    <Applayout >
        <div class="flex items-center justify-between mb-3">
            <h1 class="text-3xl font-semibold">Products</h1>

            <button type="submit"
                    @click="showProductModel"
                    class="py-2 px-4 border border-transparent text-sm font-medium rounded-md
                     text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2
                      focus:ring-offset-2 focus:ring-indigo-500"
            >
                Add new Product
            </button>

        </div>


<ProductModel v-model="showModel" />
<!--        v-model is tow model binding not one model binding like :  -->

<ProductsTable></ProductsTable>

    </Applayout>
</template>

<script setup>

    import ProductsTable from "./ProductsTable.vue";
    import ProductModel from "./ProductModel.vue";
    import {ref} from "vue";

    const showModel = ref(false);
    function showProductModel() {
        showModel.value = true
    }

</script>

<style scoped>

</style>
