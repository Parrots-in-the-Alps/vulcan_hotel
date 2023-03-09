
<template>
     <div  v-if="this.logged == true" class="self-center">
        <router-link to="/reservation/stays">
    <button class="btn btn-secondary font-Cinzel text-base-100">{{isFrench ? "Réserver" : "Book Now" }}</button>
        </router-link>
</div>

<div  v-else class="self-center">
        <router-link to="/auth/login">
    <button v-on:click="greet" class="btn btn-secondary font-Cinzel text-base-100">{{isFrench ? "Réserver" : "Book Now" }}</button>
        </router-link>
</div>
</template>
  
<script>
import { useUserStore } from '../../stores/UserStore';
import { mapActions, mapState } from 'pinia';
export default {
    name: "bookButton",
    inject:[
        'isFrench'
    ],
    computed: {
        ...mapState(useUserStore, ['user', 'logged'])
    },
    methods: {
        greet: function () {
            window.alert("Vous devez être connecté pour effectuer une réservation");
    },
    },
}
</script>

