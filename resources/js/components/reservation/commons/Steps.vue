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
                    title: 'Check',
                    className: 'check'
                },
                
                {
                    title: 'Summary',
                    className: 'summary'
                },

                {
                    title: 'Final',
                    className: 'final'
                }
            ]
        }
    },
}
</script>


<style scoped>

</style>