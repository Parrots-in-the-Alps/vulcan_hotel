<template>
    <Heroes />

    <ContentSeparator 
   menuTitle="Services" />
   
   <Services />

   <ContentSeparator 
   v-if="isFrench" menuTitle="Nos chambres" />

   <ContentSeparator 
    v-else menuTitle="Rooms" />

    <Rooms />

    <ContentSeparator 
   menuTitle="Video" />

    <Videos />

    <ContentSeparator 
   v-if="isFrench" menuTitle="Avis clients" />

   <ContentSeparator 
   v-else menuTitle="Reviews" />

    <Reviews />

   <ContentSeparator 
   v-if="isFrench" menuTitle="Actualities" />

   <ContentSeparator 
   v-else menuTitle="Actualities" />

    <Actualities />
</template>

<script>
import ContentSeparator from '../components/commons/ContentSeparator.vue';
import Register from '../components/reservation/Register.vue';
import Heroes from '../components/landing/Heroes.vue';
import Services from '../components/landing/Services.vue';
import Rooms from '../components/landing/Rooms.vue';
import Videos from '../components/landing/Videos.vue';
import Reviews from '../components/landing/Reviews.vue';
import Actualities from '../components/landing/Actualities.vue';

export default {
    name: 'LandingPage',
    inject: [
        'isFrench',
    ],
    components: {
        ContentSeparator, Heroes, Services, Rooms, Videos, Reviews, Actualities, Register 
    },
}
</script>
