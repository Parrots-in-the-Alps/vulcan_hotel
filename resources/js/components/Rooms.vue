
<template>
  
  <div class="flex flex-row justify-around">
    <div v-for="room in response" :key="room.id" class="max-w-sm rounded overflow-hidden shadow-lg">
      <div class="px-6 py-4">
      <div class="font-bold text-xl mb-2">{{ room.name }}</div>
        <p class="text-gray-700 text-base">
        <img class="object-cover h-48 w-96" :src="'/images/rooms/' + room.image" alt="image d'une suite">
        {{ room.description }}
        </p>
      </div>
    </div>
  </div>

</template>

<script>

export default {
  name: "Rooms.vue",
  data() {
    return {
      response: []
    }
  },
  async mounted() {
    const response = await axios.get('api/show/activerooms');
    console.log(response.data['data'])
    this.response = response.data['data'];
  }
}

</script>


<style scoped>



</style>