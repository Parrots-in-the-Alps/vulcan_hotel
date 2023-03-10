<template>

    <div class="flex justify-center">
        <div class="card w-96 bg-base-100 shadow-xl">
            <div class="card-body">
                <div class="card-title self-center text-secondary font-Cinzel">{{isFrench ? "Résumé de vote réservation":"booking summary"}}</div>
                <div class="flex justify-between">
                    <h2 class="text-cadetBlue font-Philosopher">{{isFrench ? "Résumé de vote réservation":"booking summary"}}</h2>
                    <div>{{this.selectedRoom.type}}</div>

                        <!--TODO-->
                    
                    


                </div>
                <div class="flex flex-row justify-between gap-x-12 mt-12 mb-6">
                    <router-link to="/reservation/stays">
                        <button @click="this.$parent.$emit('update:currentStep', previousStep)"
                            class="btn btn-secondary font-Cinzel w-28 text-base-100">{{isFrench ? "Précédent" : "Previous" }}</button>
                    </router-link>
                    <router-link to="/reservation/services">
                        <button @click="this.$parent.$emit('update:currentStep', nextStep)"
                            class="btn btn-secondary w-28 font-Cinzel text-base-100">{{isFrench ? "Réserver" : "Submit" }}</button>
                    </router-link>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import PreviousNextButtonVue from '../commons/PreviousNextButton.vue';
import { mapStores } from 'pinia';
import { useReservationStore } from '../../stores/ReservationStore';

export default {
    mounted(){
       const room = this.reservationStore.getSelectedRoom();
       this.selectedRoom = room;
       const availableRooms = this.reservationStore.checkAvailability();
       this.availableType = availableRooms;
    },
    name: "TheRooms",
    data(){
        return{
            selectedRoom : "",
            availableType: []
        }
    },

    components: {
        PreviousNextButtonVue
    },
    props: {
        currentStep: String,
    },
    inject: [
        'isFrench',
    ],
    computed:{
        ...mapStores(useReservationStore)
    }
}
</script>


<style scoped>

</style>