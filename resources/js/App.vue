<template>
    <h1 v-for="element in response" :key="element.id">{{element.slogan}}</h1>
    <h1 class="text-7xl font-bold underline">
cucul
</h1>
</template>

<script>

export default {
  name: "App.vue",
  data() {
          return {
              response: []
          }
      },
      async mounted() {
          const response = await axios.get('api/show/videos');
          console.log(response.data)
          this.response = response.data['videos'];
      }
}
</script>


<style scoped>
    h1{
        color:red
    }
</style>