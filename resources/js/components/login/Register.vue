<template>
<div class="grid grid-cols-4 gap-4">
    <div class="col-span-4 card-title self-center font-['Cinzel']">Register</div>
   
    <div>
        <div class="card-title self-center font-['Cinzel']">User information</div>
        <div class="flex items-center">
            <input type="text" placeholder="Name" class="input input-bordered w-full max-w-xs" />
        
        </div>

        <div class="flex items-center">
            <input type="text" placeholder="Lastname" class="input input-bordered w-full max-w-xs" />
        
        </div>

        <div class="flex items-center">
            <input type="text" placeholder="Email" class="input input-bordered w-full max-w-xs" />
        
        </div>
    </div>

    <div class="col-span-4">
        <div class=" card-title self-center font-['Cinzel']">Adresses</div>
        <div class="flex items-center">
            <input type="text" placeholder="Num" class="input input-bordered w-20 max-w-xs" />
            <input type="text" placeholder="Street name" class="input input-bordered flex-initial w-max max-w-xs" />
        
        </div>
        <div class="flex items-center">
            <input type="text" placeholder="Postal Code" class="input input-bordered w-20 max-w-xs" />
            <input type="text" placeholder="City name" class="input input-bordered w-max max-w-xs" />
        
        </div>

    </div>

    <div>
        <div class="card-title self-center font-['Cinzel']">Password</div>

        <div class="flex items-center">
            <input type="text" placeholder="Password" class="input input-bordered w-full max-w-xs" />
        
        </div>

        <div class="flex items-center">
            <input type="text" placeholder="Confirm Password" class="input input-bordered w-full max-w-xs" />
        
        </div>
    </div>

</div>


    
  
    
    
 

</template>

<script>


export default {
    name: "Register",
    inject: [
        'isFrench',
    ],
}
</script>


<style scoped>

</style>