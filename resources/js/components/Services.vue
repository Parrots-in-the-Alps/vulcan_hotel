
<template>



</template>

<script>

export default {
    name: "Servicevue",
    data() {
        return {
            response: []
        }
    },
    async mounted() {
        const response = await axios.get('api/services/active');
        console.log(response.data)
        this.response = response.data['data'];
    }
}
</script>


<style scoped>
    h1{
        color:red
    }
</style>