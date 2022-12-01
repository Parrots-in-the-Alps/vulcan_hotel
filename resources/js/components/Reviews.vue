<template>


</template>
    
<script>

export default {
    name: "reviews.vue",
    data() {
        return {
            response: []
        }
    },
    async mounted() {
        const response = await axios.get('api/show/activereviews');
        console.log(response.data)
        this.response = response.data['data'];
    }
}
</script>
    
    
<style scoped>
h1 {
    color: red
}
</style>