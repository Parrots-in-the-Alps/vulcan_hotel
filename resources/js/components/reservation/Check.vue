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
            
            availableType:false,
            
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
            console.log("totocompo")
            const rooms = await this.reservationStore.checkAvailability();
            console.log("check 1");

            const selectedRooms = rooms.requested;

            const suggested = rooms.suggested;
            selectedRooms.forEach(element => {
                console.log(element.id);
            });
            console.log("check 2");
            suggested.forEach(element => {
                console.log(element.id);
            });


            if(selectedRooms.length > 0){
                this.availableType = true;
            }else{
                this.availableType = false
            }
        }

        
    },
}
</script>


<style scoped>

</style>