
<template>
    <button class="btn btn-secondary font-Cinzel text-base-100">{{isFrench ? "Réserver" : "Book Now" }}</button>
</template>
  
<script>
export default {
    name: "bookButton",
    inject:[
        'isFrench'
    ],
}
</script>

