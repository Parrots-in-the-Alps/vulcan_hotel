
<template>
  <div class=" flex flex-wrap justify-center">

    <div v-for="room in roomStore.activeRooms" :key="room.id" class="p-1 flex-col card w-96">
      <div class="group relative  overflow-hidden rounded-md transition-all duration-500 ">
        <a href="#" class="lightbox transition-all duration-500 group-hover:scale-105 tobii-zoom" title="">
          <img class="object-cover" :src="'/images/rooms/' + room.image">
        </a>
        <div
          class="absolute -bottom-52 group-hover:bottom-2 right-2 left-2 transition-all duration-500 bg-backGround dark:bg-slate-900 p-4 rounded shadow dark:shadow-gray-700">
          <a href="#"
            class="hover:text-primary-600 text-lg transition duration-500 font-medium text-white">{{ room.name }}</a>
          <h6 class="text-slate-400">{{ room.description }}</h6>
          <div class="self-center">
            <router-link to="/reservation/stays">
              <BookButton />
            </router-link>
          </div>
        </div>
      </div>
    </div>

  </div>
</template>

<script>
import BookButton from '../commons/BookButton.vue';
import { useRoomStore } from '../../stores/RoomStore';
import { mapStores } from 'pinia';

export default {
  name: "Rooms.vue",
  components: { BookButton },
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