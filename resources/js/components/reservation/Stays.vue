<template>

    <div class="card-title">Stays</div>
    <PreviousNextButtonVue />

</template>

<script>
import PreviousNextButtonVue from './commons/PreviousNextButton.vue';

export default {
    name: "Stays",
    components: {
        PreviousNextButtonVue
    },
    inject: [
        'isFrench',
    ],
}
</script>


<style scoped>

</style>