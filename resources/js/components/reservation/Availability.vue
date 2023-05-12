<template>

    <div class="flex justify-center">
        <div class="card w-96 bg-base-100 shadow-xl">
            <div class="card-body">
                <div class="text-primary font-Philosopher text-center font-light">
                    {{isFrench ? this.formatRoomTypeFr() : this.formatRoomTypeEn() }}
                </div>
                <div class="mt-8 mb-2 text-primary">
                    {{ isFrench ? "Les chambres suivantes sont disponibles:" : "Following rooms are available:" }}
                </div>
                <div class="flex flex-row space-between space-x-8">
                    <div class="flex flex-col justify-center items-center" v-for="room in this.availableType" :key="room.id">
                        
                        <div class="text-center font-Philosopher text-cadetblue">
                            {{ isFrench ? room.name.fr : room.name.en }}
                        </div>
                        <div>
                             <a href="#" class="lightbox transition-all duration-500 group-hover:scale-105 tobii-zoom" title="">
                                <img class="object-cover" :src="'/images/rooms/' + room.image">
                            </a>
                        </div>
                        <div class="text-center font-Philosopher text-cadetblue">
                            {{isFrench ? room.description.fr : room.description.en }}
                            
                        </div>
                        
                        <button class="btn btn-secondary font-Cinzel text-base-100" @click="this.emitFunction(room)">{{isFrench ? "Réserver" : "Book Now" }}</button>
                        
                    </div> 
                </div>
                <PreviousNextButtonVue v-if=this.changedType customEventBack="" previousRoute="/reservation/Stays" previousStep="stays" customEventNext="" nextRoute="/reservation/Services" nextStep="services" />
            </div>
        </div>
    </div>

</template>

<script>
import PreviousNextButtonVue from './commons/PreviousNextButton.vue';
import { mapStores } from 'pinia';
import { useReservationStore } from '../../stores/ReservationStore';
import { useRoomStore } from '../../stores/RoomStore';

export default {
    mounted(){
       const room = this.reservationStore.getSelectedRoom();
       this.selectedRoom = room;

       this.getAvailableTypes();
       
    },
    name: "Availability",

    data(){
        return{
            selectedRoom : {},
            availableType: {},
            selectedRoomType : "",
            suggestedType : "",
            changedType:false
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
        ...mapStores(useReservationStore, useRoomStore)
    },

    methods:{
        formatRoomTypeFr(){
                let baseBeg = "Désolé, ";
                let baseEnd = " pour la période que vous souhaitez";
                
                switch (this.selectedRoom.type) {
                    case "standard":
                        return this.selectedRoomType = baseBeg+"toutes nos chambres Standards sont indisponibles"+baseEnd;
                    case "luxe":
                        return this.selectedRoomType = baseBeg+"toutes nos chambres de Luxe sont indisponibles"+baseEnd;
                    case "suite":
                        return this.selectedRoomType = baseBeg+"La Suite est indisponible"+baseEnd;
                    default:
                        break;
                }
        },

        formatRoomTypeEn(){
            let baseBeg = "We are sorry, ";
            let baseEnd = " for this period";
            
                switch (this.selectedRoom.type) {
                    case "standard":
                        return this.selectedRoomType = baseBeg+"none of our Standards Rooms are available"+baseEnd;
                    case "luxury":
                        return this.selectedRoomType = baseBeg+"none of our Luxury Rooms are available"+baseEnd;
                    case "suite":
                        return this.selectedRoomType = baseBeg+"The suite is unavailable"+baseEnd;
                    default:
                        break;
                }
        },
        
        async getAvailableTypes(){
            let toto = await this.reservationStore.checkAvailability();

            this.availableType = toto.suggested;
            console.log(this.availableType);
            this.availableType.forEach(element => {console.log(element.id)});
            console.log("toto mange un gros kebab");
        },

        emitFunction(room){
            //this.$parent.$emit('update:currentStep', );
            this.reservationStore.setRoomType(room.type.en);
            this.changedType = true;
        },

        
    },
}
</script>


<style scoped>

</style>