
<template>

    <div>

        <h1 class="text-3xl font-bold underline">
    Hello world FROM VUE!
  </h1>

    </div>


</template>

<script>

export default{
    name: "App.vue",
    mounted(){
        console.log("HAAAAAAAAAAAAAAAAAAAAAAa")
    },
    beforeCreate(){
        console.log("BEFORE CREATION")
    }

    
}

</script>


<style scoped>
    h1{
        color:red
    }
</style>