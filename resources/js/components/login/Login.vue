<template>
    <div class="flex flex-col space-y-4 gap-2">


        <div class="card-title self-center font-['Cinzel']">Login</div>
       
       
           
            

                <input type="text" placeholder="Email" class="flex  input input-bordered w-full max-w-xs self-center" />
            
 
     
    

    
       
    
                <input type="text" placeholder="Password" class="input input-bordered w-full max-w-xs self-center" />
            
   
           
      



           <div class="self-center"> <input type="checkbox" checked="checked" class="checkbox checkbox-secondary cursor-pointer " >&nbsp;remember me ?</div>


            <button class=" btn bg-secondary hover:bg-accent text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline self-center" type="button">
                Sign In
        
             </button>

             <div class="self-center">
                <router-link to="/login/Register">
                      <a class=" font-Philosopher text-primary ">Create an account ? </a>
                    
                      </router-link>
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