import { defineStore, mapStores } from 'pinia'
import { useServiceStore } from './ServiceStore'
import { useRoomStore } from './RoomStore';
import { useUserStore } from './UserStore';
import moment from 'moment';

import axios from "axios"


export const useReservationStore = defineStore('reservation', {
    state: () => ({
        details: {
            userId: "",
            entryDate: "",
            exitDate: "",
            guestNumber: "",
            services: {
                ids: []
            },
            room: {
                type: "",
            }
        },
        resaStatus: false


    }),

    getters: {
        ...mapStores(useRoomStore, useServiceStore, useUserStore),


    },

    actions: {
        getSelectedRoom() {
            const room_store = this.roomStore;
            return room_store.getRoom(this.details.room.type);
        },

        async checkAvailability() {


            console.log("totodate1");
            console.log(this.details.entryDate);
            console.log(this.details.exitDate);

            const entry_date = moment(this.details.entryDate).format("YYYY-MM-DD");
            const exit_date = moment(this.details.exitDate).format("YYYY-MM-DD");

            console.log("totodate2");
            console.log(entry_date);
            console.log(exit_date);

            const response = await axios.post('api/isAvailable', {
                "entryDate": entry_date,
                "exitDate": exit_date,
                "type": this.details.room.type
            });

            let requestedRooms = response.data['type'];
            let suggestedRooms = response.data['suggested'];

            return { "requested": requestedRooms, "suggested": suggestedRooms };
        },

        setRoomType(epyt) {
            this.$patch({ details: { room: { type: epyt } } });;
        },

        async book() {
            console.log("tototototototo");
            let available = await this.checkAvailability();

            const requested = available.requested;
            const suggested = available.suggested;

            console.log("requested ids: ");
            console.log(requested);
            requested.forEach(element => {
                console.log("boucle requested");
                console.log(element.id);

            });
            console.log("------------");
            console.log("sugggested ids: ");
            console.log(suggested);

            if (requested.length > 0) {
                const entry_date = moment(this.details.entryDate).format("YYYY-MM-DD");
                const exit_date = moment(this.details.exitDate).format("YYYY-MM-DD");
                let room = requested.pop();
                console.log(room);
                let roomId = room.id;
                console.log(roomId);
                let userId = this.userStore.user.id;

                const response = await axios.post('api/reservations', {
                    "entryDate": entry_date,
                    "exitDate": exit_date,
                    "user_id": userId,
                    "room_id": roomId,
                    "service_id": this.details.services.ids,
                    "guest_number":this.details.guestNumber,
                });

                console.log(response.status);

                if (response.status == 200) {
                    this.resaStatus = true;
                }
            } 
        },

        //TODO reset resaStatus-->final.vue

        resetResaStatus(){
            this.resaStatus = false;
        }

        // getAvailabilities(){
        //     const availableRooms = this.checkAvailability();

        // }
    },

})