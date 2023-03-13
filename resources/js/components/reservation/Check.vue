<template>
    <Services v-if=this.availableType></Services>
        
    <Availability v-else></Availability>
    
</template>

<script>
import PreviousNextButtonVue from './commons/PreviousNextButton.vue';
import { mapStores } from 'pinia';
import { useReservationStore } from '../../stores/ReservationStore';
import { useRoomStore } from '../../stores/RoomStore';
import Services from './Services.vue';
import Availability from './Availability.vue';

export default {
    mounted(){
       this.setComponent();
    },
    name: "Check",
    components: {
        Availability, Services
    },

    data(){
        return{
            
            availableType:true,
            
        }
    },

    components: {
    PreviousNextButtonVue,
    Services,
    Availability
},
    props: {
        currentStep: String,
    },
    inject: [
        'isFrench',
    ],
    computed:{
        ...mapStores(useReservationStore, useRoomStore)
    },

    methods:{
        async setComponent(){
            const rooms = await this.reservationStore.checkAvailability();

            const selectedRooms = rooms.requested;

            console.log(selectedRooms);
            console.log("caca"+selectedRooms.length);

            if(selectedRooms.length > 0){
                this.availableType = true;
            }else{
                this.availableType = false
            }
            console.log(this.availableType);
        }

        
    },
}
</script>


<style scoped>

</style>