
<template>



</template>

<script>

export default {
    name: "Addresses.vue",
    data() {
        return {
            response: []
        }
    },
    async mounted() {
        const response = await axios.get('api/show/activeaddresses');
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