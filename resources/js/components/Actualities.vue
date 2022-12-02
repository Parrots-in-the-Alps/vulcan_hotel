
<template>

<div class="flex flex-row mt-16 justify-center items-center">
    <div v-for="(element,i) in response" :key="element.id" class="max-w-sm mr-5 max-h-sm rounded overflow-hidden shadow-lg">
        <label :for="('my-modal' + i)" class="btn">
                 <img class="object-cover h-48 w-96" :src="'/images/actualities/' + element.image" alt="Sunset in the mountains">
        </label>
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2 font-Cinzel">{{ element.title }}
            </div>
               
        </div>
        <input type="checkbox" :id="('my-modal' + i)" class="modal-toggle" />
<div class="modal">
  <div class="modal-box">
    <label :for="('my-modal' + i)" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
    <h3 class="font-bold text-lg">{{element.title}}</h3>
    <p class="py-4 text-gunMetal">{{ element.description }} </p>
    <div class="modal-action">

    </div>
  </div>
</div>

    </div>

    
</div> 






<!-- <div id="carouselExampleControls" class="carousel slide relative" data-bs-ride="carousel">
  <div  class="carousel-inner relative w-full overflow-hidden">
    <div v-for="element in response.slice(0,1)" :key="element.id" class="carousel-item relative active float-left w-full">
      <img
      :src="'/images/actualities/' + element.image"
        class="block h-48 w-96"
        alt="Wild Landscape"
      />
    </div>

    <div v-for="element in response.slice(1, response.length)" :key="element.id" class="carousel-item relative float-left w-full">
      <img
      :src="'/images/actualities/' + element.image"
        class="block h-48 w-96"
        alt="Camera"
      />
    </div>
    
  </div>
  <button
    class="carousel-control-prev  flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline left-0"
    type="button"
    data-bs-target="#carouselExampleControls"
    data-bs-slide="prev"
  >
    <span class="carousel-control-prev-icon inline-block bg-no-repeat" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button
    class="carousel-control-next  flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline right-0"
    type="button"
    data-bs-target="#carouselExampleControls"
    data-bs-slide="next"
  >
    <span class="carousel-control-next-icon inline-block bg-no-repeat" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div> -->





  

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
        const response = await axios.get('api/actualities/active');
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