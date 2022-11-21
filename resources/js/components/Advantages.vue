
<template>



</template>

<script>

export default {
    name: "Advantages.vue",
    data() {
        return {
            response: []
        }
    },
    async mounted() {
        const response = await axios.get('api/show/advantages');
        console.log(response.data)
        this.response = response.data['advantage'];
    }
}
</script>


<style scoped>
    h1{
        color:red
    }
</style>