
<template>

    <div class="mt-10 flex justify-center">
        <div class="card w-96 bg-base-100 shadow-xl">
            <div class="card-body">
                <router-view v-slot="{ Component }">
                    <component :is="Component" />
                </router-view>
            </div>
        </div>
    </div>

</template>

<script>

export default {
    name: "Reservation",
}
</script>


<style scoped>

</style>