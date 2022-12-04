import { defineStore } from 'pinia'
import axios from "axios"


export const useRoomStore = defineStore('room',{
    state: () =>({
        activeRooms:[]
    }),
    
    getters:{

    },

    actions: {

        async fetchActiveRooms(){
            try {
                const data = await axios.get('api/rooms/active');
                  this.activeRooms = data.data['data'];
                }
                catch (error) {
                  alert(error)
                  console.log(error)
              }
        }
    },
    
})