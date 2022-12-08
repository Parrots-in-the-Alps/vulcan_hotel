<template>

    <div class="mt-10 mb-10 flex justify-center">
        <ul class="steps">
            <li 
                v-for="(step, index) in steps"
                :class="[
                    step.className,
                    currentStep == step.className ? 'step-secondary' : ''
                ]"
                class="step">
                {{ step.title }}
            </li>
        </ul>
    </div>
</template>

<script>

export default {
    name: "Steps",
    props: {
        currentStep: String,
    },
    data()
    {
        return {
            steps: [
                {
                    title: 'Stays',
                    className: 'stays'
                },
                {
                    title: 'The Rooms',
                    className: 'therooms'
                },
                {
                    title: 'Services',
                    className: 'services'
                },
                {
                    title: 'Register',
                    className: 'register'
                },
            ]
        }
    },
    watch: {
    // Note: only simple paths. Expressions are not supported.
        'currentStep' (newValue) {
            console.log(newValue)
        }
    },
}
</script>


<style scoped>

</style>