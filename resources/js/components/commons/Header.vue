<template>
    <nav class="mb-10 shadow bg-test">
        <div class="flex justify-between items-center py-6 px-10 container mx-auto">
            <div>
                <h1 class="text-2xl font-bold bg-gradient-to-tr from-gunMetal to-persimmon bg-clip-text text-transparent hover:cursor-pointer"> <router-link to="/">Vulcan</router-link></h1>
            </div>
            <div>
                <div class="hover:cursor-pointer sm:hidden">
                    <span class="h-1 rounded-full block w-8 mb-1 bg-gradient-to-tr from-indigo-600 to-green-600"></span>
                    <span class="h-1 rounded-full block w-8 mb-1 bg-gradient-to-tr from-indigo-600 to-green-600"></span>
                    <span class="h-1 rounded-full block w-8 mb-1 bg-gradient-to-tr from-indigo-600 to-green-600"></span>
                </div>
                <div class="flex items-center">
                    <ul class="sm:flex space-x-4 max-sm:hidden items-center">
                        <li v-if="this.logged !== true">
                            <router-link to="/auth/register">
                                <a class="text-gray-700 hover:text-persimmon text-md ">Register</a>
                            </router-link>
                        </li>
                        <li>
                            <router-link v-if="this.logged !== true" to="/auth/login">
                                <a class="text-gray-700 hover:text-persimmon text-md ">Login</a>
                            </router-link>
                            <router-link v-else to="/">
                                <a @click="logout()" class="text-gray-700 hover:text-persimmon text-md">Logout</a>
                            </router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
import { useUserStore } from '../../stores/UserStore';
import { mapActions, mapState } from 'pinia';

export default {
    name: 'Header',
    computed: {
        ...mapState(useUserStore, ['user', 'logged'])
    },
    methods: {
        ...mapActions(useUserStore, ['logout'])
    },
    mounted() {
        // console.log(this.user);
    }
}
</script>