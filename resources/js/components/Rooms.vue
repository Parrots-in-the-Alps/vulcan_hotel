
<template>

  <div v-for="element in response" :key="element.id" class="max-w-sm rounded overflow-hidden shadow-lg">
    <!-- <img class="w-full" src="/img/card-top.jpg" alt="Sunset in the mountains"> -->
    <div class="px-6 py-4">
      <div class="font-bold text-xl mb-2">{{ element.name }}</div>
      <p class="text-gray-700 text-base">
        {{ element.description }}
      </p>
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
    const response = await axios.get('api/show/rooms');
    console.log(response.data)
    this.response = response.data['room'];
  }
}
</script>


<style scoped>
h1 {
  color: red
}
</style>