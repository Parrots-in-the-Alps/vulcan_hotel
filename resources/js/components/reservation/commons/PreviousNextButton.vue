<template>

    <div class="flex flex-row justify-between gap-x-12 mt-12 mb-6">
        <router-link :to="previousRoute">
            <button v-if="isFrench" @click="this.$parent.$emit('update:currentStep', previousStep)" class="btn btn-secondary font-Cinzel w-28 text-base-100">Précédent</button>
            <button v-else @click="this.$parent.$emit('update:currentStep', previousStep)" class="btn btn-secondary font-Cinzel w-28 text-base-100">previous</button>
        </router-link>
        <router-link :to="nextRoute">
            <button v-if="isFrench" @click="this.$parent.$emit('update:currentStep', nextStep)" class="btn btn-secondary w-28 font-Cinzel text-base-100">suivant</button>
            <button v-else @click="this.$parent.$emit('update:currentStep', nextStep)" class="btn btn-secondary font-Cinzel w-28 text-base-100">next</button>
        </router-link>
    </div>

</template>

<script>

export default {
    name: "PreviousNextButton",
    inject: [
        'isFrench',
    ],
    props: {
        nextRoute: String,
        previousRoute: String,
        nextStep: String,
        previousStep: String
    }
}
</script>


<style scoped>

</style>