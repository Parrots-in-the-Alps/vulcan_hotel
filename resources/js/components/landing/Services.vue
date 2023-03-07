
<template>

    <div class="flex flex-wrap justify-center">
        <div v-for="service in serviceStore.activeServices.slice(0,3)" :key="service.id" class="card w-96 bg-backGround shadow-xl flex-col mr-5 mt-5">
            <figure class="px-10 pt-10">
                <img :src="('/images/services/' + service.image_icon)" :alt="service.title" class="rounded-xl" />
            </figure>
            <div class="card-body items-center text-center   flex flex-col ">
                <h2 class="card-title font-Cinzel text-secondary">{{ service.title }}</h2>
                <p class="font-Philosopher text-primary">{{ service.description }}</p>
                <p class="font-Philosopher text-primary">{{ service.price }} €$</p>
                <div class="card-actions">
                    <router-link to="/reservation/stays">
                        <BookButton />
                    </router-link>
                </div>
            </div>
        </div>
    </div>


</template>

<script>
import { mapStores } from 'pinia';
import { useServiceStore } from '../../stores/ServiceStore';
import BookButton from '../commons/BookButton.vue';

export default {
    name: "Servicevue",
    components: { BookButton },
    inject: [
        'isFrench'
    ],
    computed: {
        ...mapStores(useServiceStore)
    },
    methods: {
    }
}
</script>


<style scoped>

</style>