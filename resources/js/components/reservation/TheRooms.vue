<template>

    <div class="flex justify-center">
        <div class="card w-96 bg-base-100 shadow-xl">
            <div class="card-body">
                <div class="card-title self-center text-secondary font-Cinzel">The Rooms</div>
                <div class="flex justify-between">
                    <div class="flex flex-col">
                        <p>Standard Room</p>
                        <p>70 €</p>
                    </div>
                    <img class="w-32 h-32" src="../../../../public/images/rooms/standard_room.jpg" alt="Image d'une chambre standard">
                </div>
                <PreviousNextButtonVue previousRoute="/reservation/stays" nextRoute="/reservation/services" nextStep="services" previousStep="stays"/>
            </div>
        </div>
    </div>

</template>

<script>
import PreviousNextButtonVue from './commons/PreviousNextButton.vue';

export default {
    name: "TheRooms",
    components: {
        PreviousNextButtonVue
    },
    props: {
        currentStep: String,
    },
    inject: [
        'isFrench',
    ],
}
</script>


<style scoped>

</style>