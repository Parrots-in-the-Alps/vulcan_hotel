
<template>

<div class="flex flex-row mt-16 justify-center items-center">
    <div v-for="element in response" :key="element.id" class="max-w-sm mr-5 max-h-sm rounded overflow-hidden shadow-lg">
        <img class="object-cover h-48 w-96" :src="'/images/actualities/' + element.image" alt="Sunset in the mountains">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2 font-Cinzel">{{ element.title }}
            </div>
                <p class="text-gray-700 text-base font-Philosopher">
                    {{ element.description }} 
                </p>
        </div>

    </div>
</div> 





  

</template>

<script>

export default {
    name: "Actualities.vue",
    data() {
        return {
            response: []
        }
    },
    async mounted() {
        const response = await axios.get('api/show/activeactualities');
        console.log(response.data)
        this.response = response.data['data'];
    },

}
</script>


<style scoped>
    h1{
        color:red
    }
</style>