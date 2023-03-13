<template>

    <div class="card w-96 bg-background shadow-xl mb-10 text-primary">
            <div class="items-center text-center flex flex-col mb-8">

                <div class="avatar mt-8">
                    <div class="w-24 mask mask-squircle">
                        <img src="https://daisyui.com/tailwind-css-component-profile-1@94w.jpg" />
                    </div>
                </div>

                <h1 class="card-title mt-2 uppercase">
                    {{ this.user.name + " " + this.user.lastName }}
                </h1>

                <div class="card-body">
                    <p class="underline">{{ this.user.email }}</p>
                    <p class="capitalize">{{ this.user.address.streetNumber + " " + this.user.address.steetName }}</p>
                </div>

                <div class="card-actions justify-center">
                    <!-- <button @click="editProfile" class="btn btn-secondary font-Cinzel text-base-100">{{isFrench ? "Modifier le profil" : "Edit profile" }}</button> -->
                    <button @click="changePassword" class="btn btn-secondary font-Cinzel text-base-100">{{isFrench ? "Modifier le mot de passe" : "Edit password" }}</button>
                    <button @click="deleteAccount" class="btn btn-secondary font-Cinzel text-base-100">{{isFrench ? "Supprimer le compte" : "Delete account" }}</button>
                </div>
        </div>
    </div>

</template>

<script>
import { mapState } from 'pinia';
import { useUserStore } from '../../stores/UserStore';

    export default {
        name: "Profile",
        inject:[
            'isFrench'
        ],
        computed: {
        ...mapState(useUserStore, ['user']),
            editProfile() {
            // Logique pour modifier le profil
                console.log('editProfile');
            },
            changePassword() {
            // Logique pour modifier le mot de passe
                console.log('changePassword');
            },
            deleteAccount(){
            // Logique pour supprimer le compte
                console.log('deleteAccount');
            }
        },
    }
    
</script>


<style scoped>

</style>