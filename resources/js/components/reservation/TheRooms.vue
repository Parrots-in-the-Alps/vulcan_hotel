<template>

    <div class="flex justify-center">
        <div class="card w-96 bg-base-100 shadow-xl">
            <div class="card-body">
                <div class="card-title self-center text-secondary font-Cinzel">booking summary</div>
                <div class="flex justify-between">
                    <h2 v-if="isFrench" class="text-cadetBlue font-Philosopher">Votre chambre</h2>
                    <h2 v-else class="text-secondary font-Philosopher">Your Room</h2>
                    
                    


                </div>
                <div class="flex flex-row justify-between gap-x-12 mt-12 mb-6">
                    <router-link to="/reservation/stays">
                        <button v-if="isFrench" @click="this.$parent.$emit('update:currentStep', previousStep)"
                            class="btn btn-secondary font-Cinzel w-28 text-base-100">Précédent</button>
                        <button v-else @click="this.$parent.$emit('update:currentStep', previousStep)"
                            class="btn btn-secondary font-Cinzel w-28 text-base-100">previous</button>
                    </router-link>
                    <router-link to="/reservation/services">
                        <button v-if="isFrench" @click="this.$parent.$emit('update:currentStep', nextStep)"
                            class="btn btn-secondary w-28 font-Cinzel text-base-100">Reserver</button>
                        <button v-else @click="(this.$parent.$emit('update:currentStep', nextStep))"
                            class="btn btn-secondary font-Cinzel w-28 text-base-100">Submit</button>
                    </router-link>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import PreviousNextButtonVue from './commons/PreviousNextButton.vue';
import { mapStores } from 'pinia';
import { useReservationStore } from '../../stores/ReservationStore';

export default {
    mounted(){
        // this.reservationStore.get
    },
    name: "TheRooms",
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