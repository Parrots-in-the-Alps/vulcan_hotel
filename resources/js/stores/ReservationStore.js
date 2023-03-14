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
        resaStatus:false
        

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

        async book(){
            console.log("tototototototo");
            let available = await this.checkAvailability();

            let requested = available.requested;
            
            if(requested.length > 0){
                let room = requested.pop();
                let roomId = room.id;
                let userId = this.userStore.user.id;

                const response = await axios.post('api/reservations',{
                    "entryDate":this.details.entryDate,
                    "exitDate":this.details.exitDate,
                    "user_id":userId,
                    "room_id":roomId,
                    "service_id":JSON.stringify(this.details.services.ids)
                });

                console.log("totoreserve");

                if(response.status == 200){
                    this.resaStatus = true;
                }
            }
        }

        // getAvailabilities(){
        //     const availableRooms = this.checkAvailability();
            
        // }
    },
    
})