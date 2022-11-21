    <template>

    </template>
    
    <script>
    
    export default {
      name: "Videos.vue",
      data() {
              return {
                  response: []
              }
          },
          async mounted() {
              const response = await axios.get('api/show/videos');
              console.log(response.data)
              this.response = response.data['room'];
          }
    }
    </script>
    
    
    <style scoped>
        h1{
            color:red
        }
    </style>