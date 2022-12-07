<template>

    <div class="card-title self-center text-secondary font-Cinzel ">SERVICES</div>
    <div class="flex flex-col justify-center items-center">
        <div v-for="service in serviceStore.activeServices" :key="service.index" class="w-1/2 h-2/3 mt-2 flex flex-row justify-between">
            <input type="checkbox" checked="checked" class="checkbox checkbox-secondary cursor-pointer" />
            <div class="label-text text-CadetBlue font-Philosopher">{{ service.title }} </div>
            <div class="label-text text-CadetBlue font-Philosopher">{{ service.price }} €$</div>
        </div>
    </div>
    
    <PreviousNextButtonVue previousRoute="/reservation/stays" nextRoute="/reservation/"/>

</template>
    
<script>
import { mapStores } from 'pinia';
import { useServiceStore } from '../../stores/ServiceStore';
import PreviousNextButtonVue from './commons/PreviousNextButton.vue';

export default {
    name: "Services",
    components: {
        PreviousNextButtonVue
    },
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