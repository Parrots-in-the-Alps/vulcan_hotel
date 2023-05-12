<template>
    <div class="flex py-5 items-center my-12">
    <div class="flex-grow border-t border-[#ff7d63]"></div>
    <span v-if="menuTitle != null" class="font-Cinzel flex-shrink mx-4 text-[#ff7d63]">{{menuTitle}}</span>
    <div class="flex-grow border-t border-[#ff7d63]"></div>
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