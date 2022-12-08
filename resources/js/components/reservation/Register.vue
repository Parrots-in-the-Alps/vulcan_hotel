<template>
    <div class="w-full h-full md:w-3/4  lg:w-2/3 xl:w-1/2 2xl:w-1/2 rounded-2xl shadow-xl flex flex-col items-center ">
        <div class="self-center mt-6 mb-12">
            <h1 class="text-secondary font-Cinzel ">register</h1>
        </div>
        <div class="w-1/2 h-2/3 flex flex-col">
            <input type="text" placeholder="Name" v-model="userStore.user.name" class="input input-bordered input-secondary " />
            <input type="text" placeholder="Last Name" v-model="user.lastName"
                class="input input-bordered input-secondary " />
            <input type="email" placeholder="Email" v-model="user.email" class="input input-bordered input-secondary " />
            <div class="w-full flex-row ">
                <input type="number" placeholder="Street Number" v-model="streetNumber"
                    class="input input-bordered input-secondary w-1/3 " />
                <input type="text" placeholder="Street Name" v-model="streetName"
                    class="input input-bordered input-secondary w-2/3 " />
                <input type="number" placeholder="Postal Code" v-model="postalCode"
                    class="input input-bordered input-secondary w-1/3 " />
                <input type="text" placeholder="City" v-model="city"
                    class="input input-bordered input-secondary w-2/3 " />
            </div>
            <input type="text" placeholder="Country" v-model="country" class="input input-bordered input-secondary  " />
            <input type="text" placeholder="Password" v-model="password"
                class="input input-bordered input-secondary " />
            <input type="text" placeholder="Confirm Password" v-model="confirmPassword"
                class="input input-bordered input-secondary" />
            <div class="self-center mt-6 mb-12">
                <router-link to="/">
                    <p class="text-cadetBlue font-Philosopher ">Already registered?</p>
                </router-link>
            </div>
            <div>
                <PreviousNextButton previousRoute="/reservation/services" nextRoute="/" previousStep="services"
                    @saveFormInfo="" />
            </div>

        </div>

    </div>

</template>
    
<script>
import PreviousNextButton from './commons/PreviousNextButton.vue';
import { mapStores } from 'pinia';
import { useUserStore } from '../../stores/UserStore';


export default {
    name: "Register",
    components: { PreviousNextButton },
    inject: [
        'isFrench',
    ],
    data() {
        return {

        }
    },
    computed: {
        ...mapStores(useUserStore)
    },
    methods: {
        saveForm() {
            useUserStore.test(user)
        }
    }
}
</script>
    
    
<style scoped>

</style>