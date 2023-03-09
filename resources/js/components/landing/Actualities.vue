
<template>

  <div class="flex flex-row mt-16 justify-center items-center">
      <div v-for="(element,i) in actualities" :key="element.id" class="max-w-sm mr-5 max-h-sm rounded overflow-hidden shadow-lg">
          <label :for="('my-modal' + i)">
  
                   <img :for="('my-modal' + i)" class="object-cover h-48 w-96 btn hover:bg-persimmon" :src="'/images/actualities/' + element.image" alt="Sunset in the mountains">
              
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
      <p class="py-4 text-white">{{ element.description }} </p>
      <div class="modal-action">
  
      </div>
    </div>
  </div>
  
      </div>
  
      
  </div> 
  
  </template>
  
  <script>
  export default {
      name: "Actualities.vue",
      inject:[
          'isFrench',
          'actualities'
      ],
  }
  </script>
  
  
  <style scoped>
    
  </style>