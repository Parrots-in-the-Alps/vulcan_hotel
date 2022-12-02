<template>
    <div class="w-full h-full flex flex-row justify-center bg-backGround bg-repeat">

        <div class="w-full h-full md:max-w-lg lg:max-w-2xl xl:max-w-5xl 2xl:max-w-7xl">
            <Header />
            <LandingPage />
            <Footer />
        </div>
        

    </div>

</template>

<script>
import LandingPage from './views/LandingPage.vue'
import Footer from './views/Footer.vue'
import Header from './views/Header.vue'
export default {
    name: "App.vue",
    components: { LandingPage, Footer, Header },

}
</script>


<style scoped>

</style>