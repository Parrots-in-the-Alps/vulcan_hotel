
<template>



</template>

<script>

export default {
    name: "CallToActions.vue",
    data() {
        return {
            response: []
        }
    },
    async mounted() {
        const response = await axios.get('api/show/calltoactions');
        console.log(response.data)
        this.response = response.data['calltoaction'];
    }
}
</script>


<style scoped>
    h1{
        color:red
    }
</style>