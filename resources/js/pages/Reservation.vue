
<template>

    <div class="mt-10 mb-10 flex justify-center">
        <ul class="steps">
            <li class="step step-secondary">Stays</li>
            <li class="step step-secondary">The Rooms</li>
            <li class="step step-secondary">Services</li>
            <li class="step step-secondary">Register</li>
        </ul>
    </div>
    <div class="flex justify-center">
        <router-view v-slot="{ Component }">
            <component :is="Component" />
        </router-view>
    </div>

</template>

<script>

export default {
    name: "Reservation",
}
</script>


<style scoped>

</style>