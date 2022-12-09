import { defineStore } from 'pinia'
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
        }
    }),
    
    getters:{

    },

    actions: {
        

        getRoomDescription(){
            const roomStore = useRoomStore;
            const room =roomStore.getRoom(this.details.room.type);
            console.log(room);

        }
    },
    
})