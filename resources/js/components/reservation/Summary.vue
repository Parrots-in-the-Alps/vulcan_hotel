<template>
    <div class="flex justify-center">
        <div class="card w-96 bg-base-100 shadow-xl">
            <div class="card-body">
                <div class="text-primary font-Philosopher text-center font-light">
                    {{ isFrench ? "résumé de votre réservation" : "Booking summary" }}
                </div>

                <div class="flex flex-row space-between space-x-8">
                    <div class="mt-8 mb-2 text-primary text-left">
                        {{ isFrench ? "Votre chambre:" : "Your room:" }}
                    </div>
                    <div class="flex flex-col justify-between">
                        <div>
                            <a href="#" class="lightbox transition-all duration-500 group-hover:scale-105 tobii-zoom"
                                title="">
                                <img class="object-cover" :src="'/images/rooms/' + room.image">
                            </a>
                        </div>
                        <div class="text-center font-Philosopher text-cadetblue">
                            {{ this.selectedRoom.name }}
                        </div>
                        <div class="flex flex-col font-Philosopher text-cadetblue justify-between">
                            <p>{{ this.getStayDurationDays() }}</p>
                            <p>{{ isFrench ? "jours" : "days" }}</p>
                            <p>&</p>
                            <p>{{ this.getStayDurationNights() }}</p>
                            <p>{{ isFrench ? "nuits" : "nights" }}</p>
                        </div>
                        <div class="flex flex-row">
                            <p class="text-center font-Philosopher text-primary">{{ isFrench ? "Prix" : "Pirce" }}</p>
                            <div class="flex flex-col font-Philosopher text-secondary">
                                <p>{{ this.getRoomPrice }}</p>
                                <p>€</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-8 mb-2 text-primary text-left">
                        {{ isFrench ? "Vos services:" : "Services:" }}
                    </div>
                    <div class="flex flex-row justify-between">
                        <div class="flex flex-col" v-for="service in this.selectedServices" :key="service.id">
                            <p>{{ service.title }}</p>
                            <p>{{ service.price }}</p>
                            <p>€</p>
                        </div>
                        <div class="flex flex-col font-Philosopher">
                            <p>{{ isFrench ? "Total services" : "Services total price" }}</p>
                            <p>{{ this.getServiceTotalPrice }}</p>
                            <p>€</p>
                        </div>
                    </div>
                    <div class="mt-8 mb-2 text-primary text-left flex flex-col">
                        <p>{{ isFrench ? "Coût total de votre séjour:" : "Stay total cost:" }}</p>
                        <p>{{ this.getTotalPrice() }}</p>
                    </div>
                </div>
                <button class="btn btn-secondary font-Cinzel text-base-100" @click="this.emitFunction(room)">{{
                    isFrench ? "Réserver" : "Book Now" }}</button>
            </div>
        </div>
    </div>
</template>

<script>
import PreviousNextButtonVue from './commons/PreviousNextButton.vue';
import { mapStores } from 'pinia';
import { useReservationStore } from '../../stores/ReservationStore';
import { useRoomStore } from '../../stores/RoomStore';
import { useUserStore } from '../../stores/UserStore';

export default {
    mounted() {
        const room = this.reservationStore.getSelectedRoom();
        this.selectedRoom = room;

        const services = this.getServices();
        this.selectedServices = services;
    },
    name: "Summary",

    data() {
        return {
            selectedRoom: {},
            availableType: {},
            selectedRoomType: "",
            suggestedType: "",
            selectedServices: []
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
    computed: {
        ...mapStores(useReservationStore, useRoomStore, useUserStore)
    },

    methods: {
        getRoomPrice() {
            const selectedRoom = this.reservationStore.getSelectedRoom();

            let unitPrice = selectedRoom.price;

            let nightNumber = this.getStayDurationNights();

            return nightNumber * unitPrice;
        },

        getStayDurationDays() {
            let entryDate = new Date(this.reservationStore.details.entryDate);
            let exitDate = new Date(this.reservationStore.details.exitDate);

            let numberOfDays = Math.ceil((exitDate - entryDate) / (1000 * 3600 * 24));

            return numberOfDays;
        },

        getStayDurationNights() {
            let numberOfDays = this.getStayDurationDays();

            return numberOfDays - 1;
        },

        getServices() {
            this.reservationStore.details.services.ids.forEach(id => {
                let service = this.serviceStore.getService(id);
                this.selectedServices.push(service);
            });
        },

        getServiceTotalPrice() {
            let price = 0;
            let days = this.getStayDurationDays();
            let weeks = math.ceil(days / 7);

            this.selectedServices.forEach(service => {
                switch (service.billing_type) {
                    case "daily":
                        price += service.price * days;
                        break;
                    case "unitary":
                        price += service.price;
                        break;
                    case "weekly":
                        price += service.price * weeks;
                        break;
                    default:
                        break;
                }
            });
            return price;
        },

        getTotalPrice() {
            let roomPrice = this.getRoomPrice();
            let servicesPrice = this.getServiceTotalPrice();

            return roomPrice + servicesPrice;
        }
    },
}
</script>


<style scoped></style>