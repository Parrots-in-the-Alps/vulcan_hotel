<template>

    <div class="flex flex-row justify-between gap-x-12 mt-12 mb-6">
        <router-link :to="previousRoute">
            <button @click="this.emitFunctionBack()"
                class="btn btn-secondary font-Cinzel w-28 text-base-100">{{isFrench ? "Précédent" : "Previous" }}</button>
        </router-link>
        <router-link :to="nextRoute">
            <button @click="this.emitFunctionNext()" 
                class="btn btn-secondary w-28 font-Cinzel text-base-100">{{isFrench ? "Reserver" : "Submit" }}</button>
        </router-link>
    </div>

</template>

<script>
export default {
    name: "ButtonResa",
    emits: [
        'update:currentStep',
    ],
    inject: [
        'isFrench',
    ],
    props: {
        nextRoute: String,
        previousRoute: String,
        nextStep: String,
        previousStep: String,
        customEventNext : String,
        customEventBack : String
    },

    methods: {

        emitFunctionBack(){
            let prevStep = this.previousStep;
            let customBack = this.customEventBack;
            this.$parent.$emit('update:currentStep', prevStep);
            this.$emit(customBack);
            
        },

        emitFunctionNext(){
            let nexStep = this.nextStep;
            let customNext = this.customEventNext;
            this.$parent.$emit('update:currentStep', nexStep);
            this.$emit(customNext);
        },
    }
}
</script>


<style scoped>

</style>