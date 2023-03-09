<template>
    <div class="w-full h-full md:w-3/4  lg:w-2/3 xl:w-1/2 2xl:w-1/2 rounded-2xl shadow-xl flex flex-col items-center ">
        <div class="self-center mt-6 mb-12">
            <h1 class="text-secondary font-Cinzel ">register</h1>
        </div>
        <div class="w-1/2 h-2/3 flex flex-col gap-y-5">
            <input type="text" placeholder="Name" v-model="userStore.user.name"
                class="input input-bordered input-secondary " />
            <input type="text" placeholder="Last Name" v-model="userStore.user.lastName"
                class="input input-bordered input-secondary " />
            <div class="w-full flex-row ">
                <input type="number" placeholder="Street Number" v-model="userStore.user.address.streetNumber"
                    class="input input-bordered input-secondary w-1/3 " />
                <input type="text" placeholder="Street Name" v-model="userStore.user.address.steetName"
                    class="input input-bordered input-secondary w-2/3 " />
                <input type="number" placeholder="Postal Code" v-model="userStore.user.address.postalCode"
                    class="input input-bordered input-secondary w-1/3 " />
                <input type="text" placeholder="City" v-model="userStore.user.address.city"
                    class="input input-bordered input-secondary w-2/3 " />
            </div>
            <input type="text" placeholder="Country" v-model="userStore.user.address.country"
                class="input input-bordered input-secondary  " />
                <input type="email" placeholder="Email" v-model="userStore.user.email"
                class="input input-bordered input-secondary " />
            <input type="password" placeholder="Password" v-model="userStore.user.password"
                class="input input-bordered input-secondary " passwordrules="required: upper; required: lower; required: digit; 
                 minlength: 25; allowed: [-().&@?'#,/&quot;+];" />
            <input type="password" placeholder="Confirm Password" v-model="userStore.user.confirmPassword"
                class="input input-bordered input-secondary" />
                <button @click="register()" class="btn btn-secondary w-24 self-center">
                    Register
                </button>

            <div class="self-center mt-6 mb-12">
                <router-link to="/auth/login">
                    <p class="text-cadetBlue font-Philosopher ">Already registered?</p>
                </router-link>
            </div>
        </div>
    </div>

</template>
    
<script>
import { mapStores, mapActions } from 'pinia';
import { useUserStore } from '../../stores/UserStore';

export default {
    name: "Register",
    // inject: [
    //     'isFrench',
    // ],
    computed: {
        ...mapStores(useUserStore)
    },
    methods: {
        ...mapActions(useUserStore, ['register']),
    }
}
</script>
    
    
<style scoped>

</style>