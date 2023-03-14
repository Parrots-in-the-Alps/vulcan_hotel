<template>
    <div class="flex justify-center">
        <div class="card w-full bg-base-100 shadow-xl">
            <div class="card-body">
                <h1 class="text-primary font-Philosopher text-center font-light">{{ isFrench ? "résumé de votre réservation"
                    : "Booking summary" }}</h1>
                <div class="flex flex-col">
                    <ContentSeparator v-if="isFrench" menuTitle="Votre chambre" />

                    <ContentSeparator v-else menuTitle="Your room" />
                    <!-- <h1 class="mt-8 mb-2 text-primary text-left">{{ isFrench ? "Votre chambre:" : "Your room:" }}</h1> -->
                    <div class="flex flex-row justify-between">
                        <div>
                            {{ this.selectedRoom.name }}
                        </div>
                        <div class="flex flex-row justify-between">
                            <p>{{ this.getStayDurationDays() }}</p>
                            <p>{{ isFrench ? "jours" : "days" }}</p>
                            <p>&</p>
                            <p>{{ this.getStayDurationDays() }}</p>
                            <p>{{ isFrench ? "nuits" : "nights" }}</p>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between place-self-end">
                        <p>{{ isFrench ? "Prix: " : "Price: " }}</p>
                        <p>{{ this.getRoomPrice() }}</p>
                        <p>€</p>
                    </div>
                    <div>
                        <ContentSeparator v-if="isFrench" menuTitle="Vos services" />

                        <ContentSeparator v-else menuTitle="Services" />
                        <!-- <h1 class="mt-8 mb-2 text-primary text-left">{{ isFrench ? "Vos services:" : "Services:" }}</h1> -->
                        <div class="flex flex-col">
                            <div class="flex flex-row" v-for="service in this.selectedServices" :key="service.id">
                                <p>{{ service.title }}</p>
                                <p>{{ service.price }}</p>
                                <p>€</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between place-self-end">
                        <p>{{ isFrench ? "Total services: " : "Services total price :" }}</p>
                        <p>{{ this.getServiceTotalPrice() }}</p>
                        <p>€</p>
                    </div>
                    <div class="mt-8 mb-2 flex flex-row justify-between place-self-end">
                        <p>{{ isFrench ? "Coût total de votre séjour: " : "Stay total cost: " }}</p>
                        <p>{{ this.getTotalPrice() }}</p>
                        <p>€</p>
                    </div>
                    <!-- <ButtonResa previousRoute="/reservation/Services" nextRoute="/reservation/Final" nextStep = "final" customEventNext="submit" previousStep="services" @submit="this.book()"/> -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import PreviousNextButtonVue from './commons/PreviousNextButton.vue';
import ContentSeparator from '../commons/ContentSeparator.vue';
import ButtonResa from './commons/ButtonResa.vue';
import { mapStores } from 'pinia';
import { useReservationStore } from '../../stores/ReservationStore';
import { useRoomStore } from '../../stores/RoomStore';
import { useUserStore } from '../../stores/UserStore';
import { useServiceStore } from '../../stores/ServiceStore';

export default {
    mounted() {
        this.selectedRoom = this.reservationStore.getSelectedRoom();
        this.getServices();
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
        ButtonResa, ContentSeparator
    },
    props: {
        currentStep: String,
    },
    inject: [
        'isFrench',
    ],
    computed: {
        ...mapStores(useReservationStore, useRoomStore, useUserStore, useServiceStore)
    },

    methods: {
        getRoomPrice() {
            const selectedRoom = this.reservationStore.getSelectedRoom();

            let unitPrice = selectedRoom.price;

            let nightNumber = this.getStayDurationDays();

            return nightNumber * unitPrice;
        },

        getStayDurationDays() {
            let entryDate = new Date(this.reservationStore.details.entryDate);
            let exitDate = new Date(this.reservationStore.details.exitDate);

            let numberOfDays = Math.ceil((exitDate - entryDate) / (1000 * 3600 * 24));

            return numberOfDays;
        },

        // getStayDurationNights() {
        //     let numberOfDays = this.getStayDurationDays();

        //     return numberOfDays - 1;
        // },

        getServices() {
            this.reservationStore.details.services.ids.forEach(id => {
                let service = this.serviceStore.getService(id);
                this.selectedServices.push(service);
            });
        },

        getServiceTotalPrice() {
            let price = 0;
            let days = this.getStayDurationDays();
            let weeks = Math.ceil(days / 7);
            console.log(weeks);

            this.selectedServices.forEach(service => {

                switch (service.billing_type) {
                    case "daily":
                        if (service.id == 4) {
                            price += service.price * days * 2;
                        } else {
                            price += service.price * days;
                        }
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
        },

        book(){
            this.reservationStore.book();
        }

        
    },
}
</script>


<style scoped></style>