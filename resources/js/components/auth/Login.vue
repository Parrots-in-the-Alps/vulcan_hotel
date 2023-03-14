<template>
    <div class="flex justify-center">
        <div class="card w-96 bg-base-100 shadow-xl">
            <div class="card-body">
                <div class="card-title self-center text-secondary font-Cinzel">Login</div>
                <input v-model="userStore.user.email" type="text" placeholder="Email" class="flex  input input-bordered w-full max-w-xs self-center"/>
                <input v-model="userStore.user.password" type="password" placeholder="Password" class="input input-bordered w-full max-w-xs self-center"/>
                <div class="self-center flex">
                    <input type="checkbox" checked="checked" class="checkbox checkbox-secondary cursor-pointer" >
                    <p class="ml-2">remember me ?</p>
                </div>
                <button @click="login()" class="btn bg-secondary hover:bg-accent text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline self-center" type="button">
                    Sign In
                </button>
                <div class="self-center">
                    <router-link to="/auth/register">
                        <a class=" font-Philosopher text-primary ">Create an account ? </a>
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapStores, mapActions } from 'pinia';
import { useUserStore } from '../../stores/UserStore';

    export default {
        name: "Login",
        inject: [
            'isFrench',
        ],
        computed: {
            ...mapStores(useUserStore)
        },
        methods: {
            ...mapActions(useUserStore, ['login']),
        }
    }
</script>

<style scoped>

</style>