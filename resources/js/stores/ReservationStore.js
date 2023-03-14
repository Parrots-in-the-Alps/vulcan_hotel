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
            
            const response = await axios.post('api/isAvailable',{"entryDate":this.details.entryDate,
                "exitDate": this.details.exitDate,
                "type" : this.details.room.type});

            let requestedRooms = response.data['type'];
            let suggestedRooms = response.data['suggested'];

            return {"requested":requestedRooms,"suggested":suggestedRooms};
        },

        setRoomType(epyt){
            this.$patch({details:{room:{type : epyt}}});;
        },

        async createReservation(){
            let available = await this.checkAvailability();

            let requested = available.requested;
            
            if(requested.length > 0){
                let room = requested.pop();
                //let userId = this.userStore.
                const response = await axios.post()
            }
        }

        // getAvailabilities(){
        //     const availableRooms = this.checkAvailability();
            
        // }
    },
    
})