<template>
    <div class="flex justify-center">
        <div class="card w-full bg-base-100 shadow-xl">
            <div class="card-body">
                <h1 v-if="this.reservationStore.resaStatus" class="text-primary font-Philosopher text-center font-light">{{
                    isFrench ? "Bravo, votre reservation à bien été effectuée ! Bisous!"
                    : "Well done, you have succesfully booked a room" }}</h1>
                <h1 v-else class="text-primary font-Philosopher text-center font-light">{{ isFrench ? "Padbol"
                    : "try again" }}</h1>

                <router-link :to='/'>
                    <button @click="this.reset()"
                        class="btn btn-secondary w-28 font-Cinzel text-base-100">{{ isFrench ? "FIN" : "EXIT" }}</button>
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
import PreviousNextButtonVue from './commons/PreviousNextButton.vue';
import ContentSeparator from '../commons/ContentSeparator.vue';
import ButtonResa from './commons/ButtonResa.vue';
import { mapStores } from 'pinia';
import { useReservationStore } from '../../stores/ReservationStore';


export default {
    mounted() {

    },
    name: "Final",

    data() {
        return {
            selectedRoom: {},
            availableType: {},
            selectedRoomType: "",
            suggestedType: "",
            selectedServices: []
        }
    },

    components: {
        ButtonResa, ContentSeparator
    },
    props: {
        currentStep: String,
    },
    inject: [
        'isFrench',
    ],
    computed: {
        ...mapStores(useReservationStore)
    },

    methods: {
        reset(){
            this.reservationStore.resaStatus();
        }


    },
}
</script>


<style scoped></style>