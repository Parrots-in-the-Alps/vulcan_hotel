<template>

<nav class="shadow  bg-gunMetal">

<div class="flex justify-between items-center py-6 px-10 container mx-auto">

  <div>
    <h1 class="text-2xl font-bold bg-gradient-to-tr from-gunMetal to-persimmon bg-clip-text text-transparent hover:cursor-pointer">Vulcan</h1>
  </div>

  <div>
    
    <div class="hover:cursor-pointer sm:hidden">
      <spnan class="h-1 rounded-full block w-8 mb-1 bg-gradient-to-tr from-indigo-600 to-green-600"></spnan>
      <spnan class="h-1 rounded-full block w-8 mb-1 bg-gradient-to-tr from-indigo-600 to-green-600"></spnan>
      <spnan class="h-1 rounded-full block w-8 mb-1 bg-gradient-to-tr from-indigo-600 to-green-600"></spnan>
    </div>
    <div class="flex items-center">

      <ul class="sm:flex space-x-4 max-sm:hidden items-center">
        <li><a href="#" class="text-gray-700 hover:text-persimmon text-md ">Services</a></li>
        <li><a href="#" class="text-gray-700 hover:text-persimmon  text-md ">Rooms</a></li>
        <li><a href="#" class="text-gray-700 hover:text-persimmon  text-md ">Actualities</a></li>
        <li><a href="#" class="text-gray-700 hover:text-persimmon  text-md ">Reviews</a></li>
        <li><a href="#" class="text-gray-700 hover:text-persimmon  text-md ">Contact</a></li>
      </ul>

      <div class="md:flex items-center hidden space-x-4 ml-8 lg:ml-12">
        <h1 class="text-text-gray-600  py-2 hover:cursor-pointer hover:text-indigo-600">LOGIN</h1>
        <h1 class="text-text-gray-600  py-2 hover:cursor-pointer px-4 rounded text-white bg-gradient-to-tr from-indigo-600 to-green-600 hover:shadow-lg">SIGNUP</h1>
      </div>
    </div>
  </div>
</div>
</nav>
   
   
</template>

<script>
    export default {
        name: 'Header',
        components: {
        }
    }
</script>