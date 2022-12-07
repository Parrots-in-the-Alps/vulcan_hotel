<template>
    <div class="w-full h-full md:w-3/4  lg:w-2/3 xl:w-1/2 2xl:w-1/2 rounded-2xl shadow-xl flex flex-col items-center">
        <div class="self-center mt-6 mb-12">
            <h1 class="text-secondary font-Cinzel ">SERVICES</h1>
        </div>
        <div v-for="service in serviceStore.activeServices" :key="service.index" class="w-1/2 h-2/3 flex flex-row justify-between ">
                <div>
                    <input type="checkbox" checked="checked" class="checkbox checkbox-secondary cursor-pointer" />
                </div>
                <div class="label-text text-CadetBlue font-Philosopher">{{ service.title }} </div>
                <div class="label-text text-CadetBlue font-Philosopher">{{ service.price }} €$</div>
           
        </div>
        <div class="flex flex-row justify-between gap-x-12 mt-12 mb-6">
            <button v-if="isFrench" class="btn btn-secondary font-Cinzel w-28 text-base-100">Précédent</button>
            <button v-else class="btn btn-secondary font-Cinzel w-28 text-base-100">previous</button>
            <button v-if="isFrench" class="btn btn-secondary w-28 font-Cinzel text-base-100">suivant</button>
            <button v-else class="btn btn-secondary font-Cinzel w-28 text-base-100">next</button>
        </div>
    </div>

</template>
    
<script>
import { mapStores } from 'pinia';
import { useServiceStore } from '../../stores/ServiceStore';

export default {
    name: "ResaServices",
    inject: [
        'isFrench',
    ],
    data() {
        return {

        }
    },
    computed: {
        ...mapStores(useServiceStore)
    }
}
</script>
    
    
<style scoped>

</style>