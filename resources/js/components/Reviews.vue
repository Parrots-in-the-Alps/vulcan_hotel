<template>


</template>
    
<script>

export default {
    name: "reviews.vue",inject:[
        'isFrench',
        'reviews'
    ],
    data() {
        return {
            reviews: this.reviews
        }
    },
}
</script>
    
    
<style scoped>
</style>