<template>
    <div class="w-full h-full flex justify-center">
        <div class="w-full h-full md:max-w-lg lg:max-w-2xl xl:max-w-5xl 2xl:max-w-7xl">
            <Header />
            <LandingPage />
            <Footer />
        </div>


    </div>

</template>

<script>

import LandingPage from './views/LandingPage.vue'
import Footer from './views/Footer.vue'
import Header from './views/Header.vue'
import { useUserStore } from ".//stores/RoomStore.js";
import { useRoomStore } from './/stores/RoomStore.js';
import { useServiceStore } from './/stores/ServiceStore.js';
import { mapStores } from 'pinia';




export default {
    name: "App.vue",
    components: { LandingPage, Footer, Header },
    beforeMount(){
        this.roomStore.fetchActiveRooms();
        this.serviceStore.fetchActiveServices();
    },
    data(){
        return{
            
        }
    },
    provide(){
        return{

        }
    },
    computed: {
         ...mapStores(useRoomStore, useServiceStore)
    },
    methods: {

    }


}
</script>

 
<style scoped>

</style>