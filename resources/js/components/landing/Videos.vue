<template>
    <div class="flex justify-center" v-for="video in videos" :key="video.id">
        <div class="card card-compact w-full bg-base-100 shadow-xl">
            <iframe  height="315" :src="video.video_link"
                :title="video.title" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
            <div class="card-body">
                <h2 class="card-title text-secondary font-Cinzel">{{ video.title }}</h2>
                <p class="font-Philosopher text-primary">{{ video.description }}</p>
                <div class="card-actions justify-end">
                    <button v-if="isFrench" class="btn btn-secondary font-Cinzel text-base-100">Reserver</button>
                    <button v-else class="btn btn-secondary font-Cinzel text-base-100">Book Now</button> 
                </div>
            </div>
        </div>
    </div>

</template>
    
<script>

export default {
    name: "Videos.vue",
    inject: [
        'isFrench',
        'videos'
    ],
    data() {
        return {
            videos: this.videos
        }
    },
}
</script>
    
    
<style scoped>

</style>