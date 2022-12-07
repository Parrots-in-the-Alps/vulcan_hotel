<template>

    <div class="w-full h-full flex justify-center">
        <div class="w-full h-full md:max-w-lg lg:max-w-2xl xl:max-w-5xl 2xl:max-w-7xl">
            <Header />
                <router-view v-slot="{ Component }">
                    <component :is="Component" />
                </router-view>
            <Footer />
        </div>
    </div>

</template>

<script>

import Header from './components/commons/Header.vue';
import Footer from './components/commons/Footer.vue';
import { useRoomStore } from './stores/RoomStore.js';
import { useServiceStore } from './stores/ServiceStore.js';
import { mapStores } from 'pinia';
import { computed } from 'vue';

export default {
    name: "App.vue",
    components: { Header, Footer },
    beforeMount() {
        this.roomStore.fetchActiveRooms();
        this.serviceStore.fetchActiveServices();
        this.fetchActualities();
        this.fetchHero();
        this.fetchFooter();
        this.fetchReviews();
        this.fetchVideos();
    },
    data() {
        return {
            isFrench: (navigator.language.startsWith("fr")),
            actualities: [],
            hero: [],
            footer: [],
            reviews: [],
            videos: []
        }
    },
    provide() {
        return {
            isFrench: computed(() => this.isFrench),
            actualities: computed(() => this.actualities),
            hero: computed(() => this.hero),
            footer: computed(() => this.footer),
            reviews: computed(() => this.reviews),
            videos: computed(() => this.videos)
        }
    },
    computed: {
        ...mapStores(useRoomStore, useServiceStore)
    },
    methods: {

        async fetchActualities() {
            const response = await axios.get('api/actualities/active');
            console.log(response.data)
            this.actualities = response.data['data'];
        },

        async fetchHero() {
            const response = await axios.get('api/heroes/active');
            console.log(response.data)
            this.hero = response.data['data'];
        },

        async fetchFooter(){
            const response = await axios.get('api/footers/active');
            console.log(response.data)
            this.footer = response.data['data'];
        },

        async fetchReviews(){
            const response = await axios.get('api/reviews/active');
            console.log(response.data)
            this.reviews = response.data['data'];
        },

        async fetchVideos(){
            const response = await axios.get('api/videos/active');
            console.log(response.data)
            this.videos = response.data['data'];
        }
    }
}
</script>


<style scoped>

</style>