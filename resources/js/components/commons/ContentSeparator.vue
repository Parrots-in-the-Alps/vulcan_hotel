<template>
    <div class=" flex py-5 items-center">
    <div class="flex-grow border-t border-persimmon"></div>
    <span v-if="menuTitle != null" class="font-Cinzel flex-shrink mx-4 text-persimmon">{{menuTitle}}</span>
    <div class="flex-grow border-t border-persimmon"></div>
</div>
  </template>
  
  <script>
  export default {
    name: "ContentSeparator",
    props: {
      menuTitle: String,
    }
  }
  </script>