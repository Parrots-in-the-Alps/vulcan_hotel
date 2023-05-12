import { defineStore } from 'pinia'
import axios from "axios"


export const useRoomStore = defineStore('room',{
    state: () =>({
        activeRooms:[]
    }),
    
    getters:{
        getActiveRooms(state){
            return state.activeRooms;
        }
    },

    actions: {

        async fetchActiveRooms(){
            try {
                const data = await axios.get('api/sampleroom/active');
                  this.activeRooms = data.data['data'];
                }
                catch (error) {
                  alert(error)
                  console.log(error)
              }
        },

        getRoom(type){
            const rooms = this.getActiveRooms;
            return rooms.find(room=>room.type === type);
        }
    },
    
})