<template>

    <div class="card-title self-center text-secondary font-Cinzel">The Rooms</div>
    <div class="flex justify-between">
        <div class="flex flex-col">
            <p>Standard Room</p>
            <p>70 €</p>
        </div>
        <img class="w-32 h-32" src="../../../../public/images/rooms/standard_room.jpg" alt="Image d'une chambre standard">
    </div>
    <PreviousNextButtonVue previousRoute="/reservation/stays" nextRoute="/reservation/services"/>

</template>

<script>
import PreviousNextButtonVue from './commons/PreviousNextButton.vue';

export default {
    name: "TheRooms",
    components: {
        PreviousNextButtonVue
    },
    inject: [
        'isFrench',
    ],
}
</script>


<style scoped>

</style>