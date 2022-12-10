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
        }
    }),
    
    getters:{
        ...mapStores(useRoomStore,useServiceStore,useUserStore)
    },

    actions: {
        

        getSelectedRoom(){
            const room_store= this.roomStore
            return room_store.getRoom(this.details.room.type);
        }
    },
    
})