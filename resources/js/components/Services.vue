
<template>

    <div  class="flex flex-row justify-items-center space-x-1">
        <div v-for="service in serviceStore.activeServices" :key="service.id" class="card w-96 bg-backGround shadow-xl">
            <figure class="px-10 pt-10">
                <img src="https://placeimg.com/400/225/arch" alt="Shoes" class="rounded-xl" />
            </figure>
            <div class="card-body items-center text-center ">
                <h2 class="card-title font-Cinzel text-secondary">{{service.title}}</h2>
                <p class="font-Philosopher text-primary">{{service.description}}</p>
                <p class="font-Philosopher text-primary">{{service.price}} €$</p>
                <div class="card-actions">
                    <button v-if="isFrench" class="btn btn-secondary font-Cinzel text-base-100">Reserver</button>
                    <button v-else class="btn btn-secondary font-Cinzel text-base-100">Book Now</button> 
                </div>
            </div>
        </div>
    </div>


</template>

<script>
import { mapStores } from 'pinia';
import { useServiceStore } from '../stores/ServiceStore';

export default {
    name: "Servicevue",
    beforeMount(){
        this.detectBrowserLanguage();
    },
    data() {
        return {
            isFrench:false
        }
    },
    computed: {
        ...mapStores(useServiceStore)
    },
    methods:{
        detectBrowserLanguage(){
            if(navigator.language.startsWith("fr")){
                this.isFrench=true;
            }
        }
    }
}
</script>


<style scoped>

</style>