<template>
    <header class="h-16 bg-white shadow flex items-center justify-between">
        <button @click="emit('toggle-sidebar')" class="border-4 border-indigo-700 rounded-full transition hover:bg-indigo-700 px-2  mx-1">
            <ChevronDoubleLeftIcon class="w-8 text-indigo-700 hover:text-white "></ChevronDoubleLeftIcon>
        </button>

      <div>
          <Menu as="div" class="relative inline-block text-right w-50 h-5 justify-center items-center flex">
              <div>
                  <MenuButton
                      class="inline-flex w-full justify-center rounded-l-md bg-indigo-700  px-4 py-2 text-sm font-medium text-white      focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75"
                  >
                      <img class="w-12 rounded-full h-13" src="https://www.kindpng.com/picc/m/497-4973038_profile-picture-circle-png-transparent-png.png" alt="img">

                      <ChevronDownIcon
                          class="ml-2 -mr-1 h-5 w-5 text-violet-200 hover:text-indigo-700"
                          aria-hidden="true"
                      />
                  </MenuButton>
              </div>

              <transition
                  enter-active-class="transition duration-100 ease-out"
                  enter-from-class="transform scale-95 opacity-0"
                  enter-to-class="transform scale-100 opacity-100"
                  leave-active-class="transition duration-75 ease-in"
                  leave-from-class="transform scale-100 opacity-100"
                  leave-to-class="transform scale-95 opacity-0"
              >
                  <MenuItems
                      class="absolute right-0 mt-2 w-56 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none "
                  >
                      <div class="px-1 py-1">
                          <MenuItem v-slot="{ active }">
                              <button
                                  :class="[
                  active ? 'bg-indigo-700 text-white' : 'text-gray-900',
                  'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                ]"

                             >
                                  <UserIcon
                                      :active="active"
                                      class="mr-2 h-5 w-5 text-violet-400"
                                      aria-hidden="true"
                                  />
                                  Profile
                              </button>
                          </MenuItem>

                          <MenuItem v-slot="{ active }">
                                  <button
                                      @click="logout"

                                      :class="[
                      active ? 'bg-indigo-700 text-white' : 'text-gray-900',
                      'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                    ]"

                                  >
                                  <LockClosedIcon


                                      :active="active"
                                      class="mr-2 h-5 w-5 text-violet-400"
                                      aria-hidden="true"

                                  />
                                  Log Out
                              </button>
                          </MenuItem>

                      </div>
                  </MenuItems>
              </transition>
          </Menu>
      </div>

    </header>

</template>

<script setup>
    import {ChevronDoubleLeftIcon ,ChevronDownIcon ,UserIcon,LockClosedIcon} from '@heroicons/vue/20/solid'
    import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'
    import store from "../store";
    import router from "../router";
    import {computed} from "vue";

    const currentUser = computed( ()=>store.state.user.data);

    const emit = defineEmits(['toggle-sidebar']);

    function logout (){
        store.dispatch('logout')
            .then(() => {
                router.push({name:'login'})
            })
            .catch(({response}) =>{

                errorMsg.value = response.data.message;
            })
    }

</script>

<style scoped>


</style>
