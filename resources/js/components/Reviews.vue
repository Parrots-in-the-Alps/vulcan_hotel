<template>
    <div id="review" class="">
        <div class="card w-96 bg-backGround shadow-xl">
            <div class="flex flex-row">
                <div class="avatar ">
                    <div class="w-24 mask mask-triangle ">
                        <img src="https://placeimg.com/192/192/people" />
                    </div>
                </div>
                <div class="flex flex-col justify-center">
                    <div class="flex flex-row self-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-star" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="1" stroke="#ff5c04" fill="#ff5c04"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path
                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                            </path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-star" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="1" stroke="#ff5c04" fill="#ff5c04"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path
                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                            </path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-star" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="1" stroke="#ff5c04" fill="#ff5c04"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path
                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                            </path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-star" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="1" stroke="#ff5c04" fill="#ff5c04"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path
                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                            </path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-star" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="1" stroke="#ff5c04" fill="#243236"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path
                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                            </path>
                        </svg>  
                    </div>
                    <div class="">
                            <h1 class="font-Cinzel text-accent ">Toto</h1>
                    </div>
                </div>


            </div>


        </div>
    </div>

</template>
    
<script>

export default {
    name: "reviews.vue", inject: [
        'isFrench',
        'reviews'
    ],
    data() {
        return {
            reviews: this.reviews
        }
    },
}
</script>
    
    
<style scoped>

</style>