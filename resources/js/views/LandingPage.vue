<template>
 <ContentSeparator 
   menuTitle="Roomzes" />
    <Rooms />
   <ContentSeparator 
   menuTitle="Actualities" />
    <Actualities />


   
   
</template>

<script>
import Actualities from '../components/Actualities';
import Advantages from '../components/Advantages';
import Heroes from '../components/Heroes';
import Reviews from '../components/Reviews';
import Rooms from '../components/Rooms';
import Videos from '../components/Videos';
import ContentSeparator from '../components/ContentSeparator';
    export default {
        name: 'landingPage',
        components: {
            Actualities, Advantages, Heroes, Reviews,  Rooms, Videos, ContentSeparator 
        }
    }
</script>

