<template>
    <!-- <nav class="mb-10 shadow bg-[#0A0A0B]">
        <div class="flex justify-between items-center py-6 px-10 container mx-auto">
            <div>
                <h1 class="text-2xl font-bold bg-[#FF7D63] bg-clip-text text-transparent hover:cursor-pointer"><a href="/">Vulcan</a></h1>
            </div>
            <div>
                <div class="hover:cursor-pointer sm:hidden">
                    <span class="h-1 rounded-full block w-8 mb-1 bg-gradient-to-tr from-indigo-600 to-green-600"></span>
                    <span class="h-1 rounded-full block w-8 mb-1 bg-gradient-to-tr from-indigo-600 to-green-600"></span>
                    <span class="h-1 rounded-full block w-8 mb-1 bg-gradient-to-tr from-indigo-600 to-green-600"></span>
                </div>
                <div class="flex items-center">
                    <ul class="sm:flex space-x-4 max-sm:hidden items-center text-[#FF7D63]">
                        <li><a href="#" class="hover:text-persimmon text-md ">Services</a></li>
                        <li><a href="#" class="hover:text-persimmon text-md ">Rooms</a></li>
                        <li><a href="#" class="hover:text-persimmon text-md ">Actualities</a></li>
                        <li><a href="#" class="hover:text-persimmon text-md ">Reviews</a></li>
                        <li><a href="#" class="hover:text-persimmon text-md ">Contact</a></li>
                        <li v-if="this.logged !== true">
                            <router-link to="/auth/register">
                                <a class="hover:text-persimmon text-md">Register</a>
                            </router-link>
                        </li>
                        <li>
                            <router-link v-if="this.logged !== true" to="/auth/login">
                                <a class="hover:text-persimmon text-md">Login</a>
                            </router-link>
                            <router-link v-else to="/">
                                <a @click="logout()" class="text-gray-700 hover:text-persimmon text-md">Logout</a>
                            </router-link>
                        </li>
                        <li>
                            <router-link v-if="this.logged == true" to="/profile">
                                <a class="text-gray-700 hover:text-persimmon text-md">Profile</a>
                            </router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav> -->



    <div class="bg-white">
      <nav
        class="
          container
          px-6
          py-8
          mx-auto
          md:flex md:justify-between md:items-center
        "
      >
            <div class="flex items-center justify-between">

                    <h1 class="text-2xl font-bold bg-[#FF7D63] bg-clip-text text-transparent hover:cursor-pointer"><a href="/">Vulcan</a></h1>
        
                     <!-- Mobile menu button -->
                    <div @click="showMenu = !showMenu" class="flex">
                        <button
                        type="button"
                        class="
                            text-gray-800
                            hover:text-gray-400
                            focus:outline-none focus:text-gray-400
                            xl:hidden
                            md:hidden
                            
                        "
                        >
                        <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                            <path
                            fill-rule="evenodd"
                            d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"
                            ></path>
                        </svg>
                        </button>
                    </div>
            </div>


                <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
            <ul
            :class="showMenu ? 'flex' : 'max-md:hidden'"
            class="
                flex-col
                space-y-4
                md:flex
                md:space-y-0
                md:flex-row
                md:items-center
                md:space-x-10
                md:mt-0
            "
            >
                                <li><router-link to="#services"><p class="hover:text-persimmon text-md ">Services</p></router-link></li>
                                <li><router-link to="#rooms"><p class="hover:text-persimmon text-md ">Rooms</p></router-link></li>
                                <li><router-link to="#actualities"><p class="hover:text-persimmon text-md ">Actualities</p></router-link></li>
                                <li><router-link to="#reviews"><p class="hover:text-persimmon text-md ">Reviews</p></router-link></li>
                                <li><p class="hover:text-persimmon text-md ">Contact</p></li>
                                <li v-if="this.logged !== true">
                                    <router-link to="/auth/register">
                                        <a class="hover:text-persimmon text-md">Register</a>
                                    </router-link>
                                </li>
                                <li>
                                    <router-link v-if="this.logged !== true" to="/auth/login">
                                        <a class="hover:text-persimmon text-md">Login</a>
                                    </router-link>
                                    <router-link v-else to="/">
                                        <a @click="logout()" class="text-gray-700 hover:text-persimmon text-md">Logout</a>
                                    </router-link>
                                </li>
                                <li>
                                    <router-link v-if="this.logged == true" to="/profile">
                                        <a class="text-gray-700 hover:text-persimmon text-md">Profile</a>
                                    </router-link>
                                </li>
            </ul>
        </nav>
    </div>





</template>

<script>
import { useUserStore } from '../../stores/UserStore';
import { mapActions, mapState } from 'pinia';

export default {
    name: 'Header',
    data() {
    return {
      showMenu: false,
    };
  },
    computed: {
        ...mapState(useUserStore, ['user', 'logged'])
    },
    methods: {
        ...mapActions(useUserStore, ['logout'])
    },
}
</script>