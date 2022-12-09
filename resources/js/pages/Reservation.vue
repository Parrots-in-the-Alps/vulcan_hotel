<template>

    <Steps :currentStep="currentStep"/>
    <div class="flex justify-center">
        <router-view v-slot="{ Component }">
            <component v-on:update:currentStep="currentStep = $event" :is="Component" />
        </router-view>
    </div>

</template>

<script>
import Steps from '../components/reservation/commons/Steps.vue';

export default {
    name: "Reservation",
    components: {
        Steps
    },
    data() {
        return {
                       
            currentStep: "stays"
        }
    }
}
</script>


<style scoped>

</style>