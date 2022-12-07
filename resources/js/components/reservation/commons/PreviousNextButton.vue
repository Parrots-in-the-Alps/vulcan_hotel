<template>

    <div class="flex flex-row justify-between gap-x-12 mt-12 mb-6">
        <button v-if="isFrench" class="btn btn-secondary font-Cinzel w-28 text-base-100">Précédent</button>
        <button v-else class="btn btn-secondary font-Cinzel w-28 text-base-100">previous</button>
        <button v-if="isFrench" class="btn btn-secondary w-28 font-Cinzel text-base-100">suivant</button>
        <button v-else class="btn btn-secondary font-Cinzel w-28 text-base-100">next</button>
    </div>

</template>

<script>

export default {
    name: "Stays",
    inject: [
        'isFrench',
    ],
}
</script>


<style scoped>

</style>