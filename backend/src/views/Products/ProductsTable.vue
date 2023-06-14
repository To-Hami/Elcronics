<template>
    <div class="bg-white p-4 rounded-lg shadow">
        <div class="flex justify-between  pd-3 my-2">
            <div class="flex items-center">
                <span class="whitespace-nowrap mr-3">Per Page</span>
                <select v-model="perPage" @change="getProducts(null)"
                        class="appearance-none relative block w-24 px-3 py-2 border border-gray-300
                             placeholder-gray-500 text-gray-900 rounded-md focus:outline-none
                             focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>

                </select>
            </div>
            <div    >
                <input v-model="search" @change="getProducts(null)"
                       class="appearance-none relative block w-48 px-3 py-2 border border-gray-300
                           placeholder-gray-500 text-gray-900 rounded-md focus:outline-none
                           focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                       placeholder="Type to Search products"
                >
            </div>

        </div>


        <table class="table-auto w-full " >

            <thead>
            <tr>

                <CellTableHeader @click="sortProduct"  class="border-b-2 p-2 text-left" filed="id" :sort-filed="sortFiled" :sort-direction="sortDirection">ID</CellTableHeader>
                <CellTableHeader @click="sortProduct" class="border-b-2 p-2 text-left" filed="" :sort-filed="sortFiled" :sort-direction="sortDirection">Image</CellTableHeader>
                <CellTableHeader @click="sortProduct" class="border-b-2 p-2 text-left" filed="title" :sort-filed="sortFiled" :sort-direction="sortDirection">Title</CellTableHeader>
                <CellTableHeader @click="sortProduct" class="border-b-2 p-2 text-left" filed="price" :sort-filed="sortFiled" :sort-direction="sortDirection">Price</CellTableHeader>
                <CellTableHeader @click="sortProduct" class="border-b-2 p-2 text-left" filed="updated_at" :sort-filed="sortFiled" :sort-direction="sortDirection">Last Updated At</CellTableHeader>



            </tr>
            </thead>
            <tbody v-if="products.loading || !products.data.length">
            <tr>
                <td colspan="6">
                    <Spinner v-if="products.loading"/>
                    <p v-else class="text-center py-8 text-gray-700">
                        There are no products
                    </p>
                </td>
            </tr>
            </tbody>
            <tbody v-else >
            <tr v-for="(product, index) of products.data" class="text-center">
                <td class="border-b p-2 ">{{ product.id }}</td>
                <td class="border-b p-2  flex justify-center ">
                    <img class="w-16 h-16 object-cover " :src="product.image" :alt="product.title">
                </td>
                <td class="border-b p-2 max-w-[200px] whitespace-nowrap overflow-hidden text-ellipsis">
                    {{ product.title }}
                </td>
                <td class="border-b p-2">
                    {{ product.price }}
                </td>
                <td class="border-b p-2 ">
                    {{ product.updated_at }}
                </td>


            </tr>
            </tbody>
        </table>

        <div v-if="!products.loading" class="flex justify-between items-center mt-5">
            <div v-if="products.data.length">
                Showing from {{ products.from }} to {{ products.to }}
            </div>
            <nav
                v-if="products.total > products.limit"
                class="relative z-0 inline-flex justify-center rounded-md shadow-sm -space-x-px"
                aria-label="Pagination"
            >
                <!-- Current: "z-10 bg-indigo-50 border-indigo-500 text-indigo-600", Default: "bg-white border-gray-300 text-gray-500 hover:bg-gray-50" -->
                <a
                    v-for="(link, i) of products.links"
                    :key="i"
                    :disabled="!link.url"
                    href="#"
                    @click="getForPage($event, link)"
                    aria-current="page"
                    class="relative inline-flex items-center px-4 py-2 border text-sm font-medium whitespace-nowrap"
                    :class="[
                  link.active
                    ? 'z-10 bg-indigo-50 border-indigo-500 text-indigo-600'
                    : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50',
                  i === 0 ? 'rounded-l-md' : '',
                  i === products.links.length - 1 ? 'rounded-r-md' : '',
                  !link.url ? ' bg-gray-100 text-gray-700': ''
                ]"
                    v-html="link.label"
                >
                </a>
            </nav>
        </div>

    </div>
</template>

<script setup>

    import {ref ,onMounted,computed} from "vue";
    import store from "../../store";
    import Spinner from "../../components/core/Spinner.vue";
    import {PRODUCT_PER_PAGE} from "../../constants.js";
    import CellTableHeader from "../../components/core/table/CellTableHeader.vue";

    const perPage = ref(PRODUCT_PER_PAGE);
    const search = ref("");
    const sortFiled = ref("updated_at"); //   ال  ref هو  اسنااد قيمة للمتغير
    const sortDirection = ref("desc");
    const products = computed( ()=>store.state.products);//المتغيير الفاضي البنحزن فيهوو


    onMounted(() => {
        getProducts();
    });

    function getProducts(url = null){
        store.dispatch('getProducts' ,{
            url,
            search : search.value,
            sort_filed:sortFiled.value,
            sort_direction:sortDirection.value,
            perPage :perPage.value
        });
    }

    function getForPage(ev,link) {
        if(!link.url || link.active){
            return
        }
        getProducts(link.url);
    }

    function  sortProduct(filed){
        if(sortFiled.value !== filed){
            sortFiled.value = filed;
            sortDirection.value = 'asc'
        }else if (sortDirection.value === 'asc'){
            sortDirection.value = 'desc'
        }else{
            sortDirection.value = 'asc'
        }

        getProducts();
    }

</script>

<style scoped>

</style>
