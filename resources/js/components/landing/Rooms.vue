
<template>
  <div class=" flex justify-center items-center">

    <div v-for="room in roomStore.activeRooms" :key="room.id" class="p-1">
      <div class="group relative block overflow-hidden rounded-md transition-all duration-500">
        <a href="#" class="lightbox transition-all duration-500 group-hover:scale-105 tobii-zoom" title="">
          <img class="object-cover h-48 w-96" :src="'/images/rooms/' + room.image">
        </a>
        <div
          class="absolute -bottom-52 group-hover:bottom-2 right-2 left-2 transition-all duration-500 bg-backGround dark:bg-slate-900 p-4 rounded shadow dark:shadow-gray-700">
          <a href="#"
            class="hover:text-primary-600 text-lg transition duration-500 font-medium text-white">{{ room.name }}</a>
          <h6 class="text-slate-400">{{ room.description }}</h6>
          <div class="self-center">
            <router-link to="/reservation">
              <button v-if="isFrench" class="btn btn-secondary font-Cinzel text-base-100">Reserver</button>
              <button v-else class="btn btn-secondary font-Cinzel text-base-100">Book</button>
            </router-link>
          </div>
        </div>
      </div>
    </div>

  </div>
</template>

<script>
import { useRoomStore } from '../../stores/RoomStore';
import { mapStores } from 'pinia';

export default {
  name: "Rooms.vue",
  inject:[
        'isFrench',
    ],
    computed: {
        ...mapStores(useRoomStore)
    }
}

</script>


<style scoped>

</style>