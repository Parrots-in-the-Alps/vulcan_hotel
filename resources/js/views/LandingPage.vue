<template>
    <Heroes />
    <ContentSeparator 
   menuTitle="Advantages" />
   <Services />

 <ContentSeparator 
   menuTitle="Rooms" />
    <Rooms />
    <ContentSeparator 
   menuTitle="Video" />
    <Videos />
    <ContentSeparator 
   menuTitle="Reviews" />
    <Reviews />
   <ContentSeparator 
   menuTitle="Actualities" />
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
        components: {
            Actualities, Services, Heroes, Reviews,  Rooms, Videos, ContentSeparator 
        }
    }
</script>

