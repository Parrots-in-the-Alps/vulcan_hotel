<template>
    <Header />
    <LandingPage />
    <Footer />
</template>

<script>
import LandingPage from './views/LandingPage.vue'
import Footer from './views/Footer.vue'
import Header from './views/Footer.vue'
export default {
    name: "App.vue",
    components: { LandingPage, Footer, Header },
   
}
</script>


<style scoped>

</style>