    <template>

    </template>
    
    <script>
    
    export default {
      name: "Videos.vue",
    inject:[
        'isFrench',
        'videos'
    ],
    data() {
        return {
            videos: this.videos
        }
    },
    }
    </script>
    
    
    <style scoped>
        h1{
            color:red
        }
    </style>