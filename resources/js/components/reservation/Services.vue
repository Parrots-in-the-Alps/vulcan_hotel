<template>

    <div class="flex justify-center">
        <div class="card w-96 bg-base-100 shadow-xl">
            <div class="card-body">
                <div class="card-title self-center text-secondary font-Cinzel ">SERVICES</div>
                <div class="flex flex-col justify-center items-center">
                    <div v-for="service in serviceStore.activeServices" :key="service.index" class="w-1/2 h-2/3 mt-2 flex flex-row justify-between">
                        <input type="checkbox" :value="service.id" v-model="reservationStore.details.services.ids" class="checkbox checkbox-secondary cursor-pointer" />
                        <div class="label-text text-CadetBlue font-Philosopher">{{ service.title }} </div>
                        <div class="label-text text-CadetBlue font-Philosopher">{{ service.price }} €$</div>
                    </div>
                </div>
                <PreviousNextButtonVue previousRoute="/reservation/Availability" nextRoute="/" previousStep="availability"/>
            </div>
        </div>
    </div>
    
</template>
    
<script>
import { mapStores } from 'pinia';
import { useServiceStore } from '../../stores/ServiceStore';
import { useReservationStore} from '../../stores/ReservationStore';
import PreviousNextButtonVue from '../commons/PreviousNextButton.vue';

export default {
    name: "Services",
    components: {
        PreviousNextButtonVue
    },
    props: {
        currentStep: String,
    },
    inject: [
        'isFrench',
    ],
    data() {
        return {

        }
    },
    computed: {
        ...mapStores(useServiceStore,useReservationStore)
    }
}
</script>
    
    
<style scoped>

</style>