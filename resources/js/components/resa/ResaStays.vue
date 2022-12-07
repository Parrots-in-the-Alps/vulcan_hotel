<template>
    <div class="w-full h-full md:w-3/4  lg:w-2/3 xl:w-1/2 2xl:w-1/2 rounded-2xl shadow-xl flex flex-col items-center">
        <div class="self-center mt-6 mb-12">
            <h1 class="text-secondary font-Cinzel ">stays</h1>
        </div>
        <div class="w-1/2 h-2/3 flex flex-row justify-between ">
                
           
        </div>
        <div>

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
import { useRoomStore } from '../../stores/ServiceStore';

export default {
    name: "ResaStays",
    inject: [
        'isFrench',
    ],
    data() {
        return {

        }
    },
    computed: {
        ...mapStores(useRoomStore)
    }
}
</script>
    
    
<style scoped>

</style>