import { defineStore, mapStores } from 'pinia'
import { useServiceStore } from './ServiceStore'
import { useRoomStore } from './RoomStore';
import { useUserStore } from './UserStore'

import axios from "axios"


export const useReservationStore = defineStore('reservation',{
    state: () =>({
        details:{
            userId:"",
            entryDate:"",
            exitDate:"",
            services:{
                ids:[]
            },
            room:{
                type:"",
                guestNumber:"",

            }
        },
        

    }),
    
    getters:{
        ...mapStores(useRoomStore,useServiceStore,useUserStore),

        
    },

    actions: {
        getSelectedRoom(){
            const room_store= this.roomStore;
            return room_store.getRoom(this.details.room.type);
        },

        async checkAvailability(){
            console.log("coucou toto");

            const response = await axios.post('api/isAvailable',{"entryDate":this.details.entryDate,
                "exitDate": this.details.exitDate,
                "type" : this.details.room.type});

            let requestedRooms = response.data['type'];
            let suggestedRooms = response.data['suggested'];

            return {"requested":requestedRooms,"suggested":suggestedRooms};
        },

        setRoomType(epyt){
            this.$patch({details:{room:{type : epyt}}});;
        }

        // getAvailabilities(){
        //     const availableRooms = this.checkAvailability();
            
        // }
    },
    
})