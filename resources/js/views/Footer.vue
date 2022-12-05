<template>



</template>

<script>
export default {
    name: 'Footer',
    components: {
    },
    inject: [
        'isFrench',
        'footer'
    ],
    data() {
        return {
            isFrench: this.isFrench,
            footer: this.footer
        }
    },
}
</script>