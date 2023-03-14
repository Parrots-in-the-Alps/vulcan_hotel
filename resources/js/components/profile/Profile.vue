<template>

    <div class="flex items-center justify-center">
        <div class="card w-96 bg-background shadow-xl mb-10 text-primary ">
                <div class="items-center text-center flex flex-col mb-8">

                    <div class="avatar mt-8">
                        <div class="w-24 mask mask-squircle">
                            <img src="https://daisyui.com/tailwind-css-component-profile-1@94w.jpg" />
                        </div>
                    </div>

                    <h1 class="card-title mt-2 uppercase">
                        <!-- //TODO -->
                        <!-- {{ this.user.name + " " + this.user.lastName }} -->
                        {{ this.user.name + " Mougnagna"}}
                    </h1>

                    <div class="card-body">
                        <p class="underline">{{ this.user.email }}</p>
                        <!-- //TODO -->
                        <!-- <p class="capitalize">{{ this.user.address.streetNumber + " " + this.user.address.streetName }}</p> -->
                    </div>

                    <div v-if="this.passChange == false" class="card-actions justify-center">
                        <!-- //TODO -->
                        <!-- <button @click="editProfile" class="btn btn-secondary font-Cinzel text-base-100">{{isFrench ? "Modifier le profil" : "Edit profile" }}</button> -->
                        <!-- //TODO mettre en place la modification du le mot de passe -->
                        <button @click="changePassword" class="btn btn-secondary font-Cinzel text-base-100">{{isFrench ? "Modifier le mot de passe" : "Edit password" }}</button>
                        <button @click="deleteAccount" class="btn btn-secondary font-Cinzel text-base-100">{{isFrench ? "Supprimer le compte" : "Delete account" }}</button>
                    </div>

                    <div v-else class="card-actions justify-center">
                        <div class="form-control">
                            <label class="input-group">
                                <span>Old Password</span>
                                <input type="password" class="input input-bordered" v-model="userStore.pass.old_password"/>
                            </label>
                            <label class="input-group">
                                <span>New Password</span>
                                <input type="password" class="input input-bordered" v-model="userStore.pass.new_password"/>
                            </label>
                            <label class="input-group">
                                <span>Confirm Password</span>
                                <input type="password" class="input input-bordered" v-model="userStore.pass.new_password_confirmation"/>
                            </label>
                        </div>
                        <button @click="updatePassword();changePassword()" class="btn bg-secondary hover:bg-accent text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline self-center" type="button">
                            Submit
                        </button>
                    </div>
            </div>
        </div>
    </div>
    

</template>

<script>
import { mapState, mapActions, mapStores } from 'pinia';
import { useUserStore } from '../../stores/UserStore';
import axios from "axios";
import router from "../../router/index.js";

    export default {
        name: 'Profile',
        data() {
            return {
                passChange: false
            }
        },
        inject:[
            'isFrench'
        ],
        computed: {
            ...mapState(useUserStore, ['user']),
            ...mapStores(useUserStore)
        },
        methods: {
            //TODO
            // editProfile() {
            //     console.log('editProfile');
            // },
            ...mapActions(useUserStore, ['updatePassword']),
            changePassword() {
                this.passChange = !this.passChange
            },
            async deleteAccount(){
                await axios.delete('/api/users/' + this.user.id);
                router.push({name: 'LandingPage'});
            }
        },
        beforeMount() {
            const userStore = useUserStore()
            userStore.getCurrentUser(userStore.user.id);
        }
    }
    
</script>


<style scoped>

</style>