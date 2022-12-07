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
import Actualities from '../components/Actualities';
import Services from '../components/Services';
import Heroes from '../components/Heroes';
import Reviews from '../components/Reviews';
import Rooms from '../components/Rooms';
import Videos from '../components/Videos';
import ContentSeparator from '../components/ContentSeparator';

    export default {
        name: 'landingPage',
        inject: [
        'isFrench',
        
    ],
        components: {
            Actualities, Services, Heroes, Reviews,  Rooms, Videos, ContentSeparator 
        },
        
    }
</script>

