
<template>



</template>

<script>

export default {
    name: "Actualities.vue",
    data() {
        return {
            response: []
        }
    },
    async mounted() {
        const response = await axios.get('api/show/actualities');
        console.log(response.data)
        this.response = response.data['actuality'];
    }
}
</script>


<style scoped>
    h1{
        color:red
    }
</style>