<template>

    <Rooms />
   
</template>

<script>
import Actualities from '../components/Actualities';
import Advantages from '../components/Advantages';
import Heroes from '../components/Heroes';
import Reviews from '../components/Reviews';
import Rooms from '../components/Rooms';
import Videos from '../components/Videos';
    export default {
        name: 'landingPage',
        components: {
            Actualities, Advantages, Heroes, Reviews,  Rooms, Videos, 
        }
    }
</script>