<template>
    <div class="grid grid-cols-4 gap-4">
        <div class="col-span-4 card-title self-center font-['Cinzel']">Login</div>
       
        <div>
           
            
    
            <div class="flex items-center">
                <input type="text" placeholder="Email" class="input input-bordered w-full max-w-xs" />
            
            </div>
        </div>
    

    
        <div>
           
    
            <div class="flex items-center">
                <input type="text" placeholder="Password" class="input input-bordered w-full max-w-xs" />
            
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