<template>
    <div  class="flex flex-wrap justify-between">
        <!-- debut user review -->
        <div class="flex flex-col rounded-2xl w-60 h-60 p-3 bg-backGround shadow-xl justify-between ">
            <!-- avatar, user name, ratings -->
            <div class="flex flex-row " >
                <div class="avatar">
                    <div class=" w-24 mask mask-triangle ">
                        <img src="https://placeimg.com/192/192/people" />
                    </div>
                </div>
                <div class="flex flex-col content-between self-center ">
                    <!-- stars -->
                    <div class="flex flex-row ">
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
                    <!-- user name -->
                    <div class="">
                        <h1 class="font-Cinzel text-accent ">Toto</h1>
                    </div>
                </div>
            </div>
            <!-- user comment date-->
            <div class="self-start">
                <p class="font-Philosopher text-cadetBlue"> 12/06/2022</p>
            </div>
            <!-- user comment -->
            <div class="rounded-lg border-1.5 border-secondary basis-1/2 overflow-auto shadow-md place-items-stretch">
                <p class="font-Philosopher text-cadetBlue">Very nice! Outstanding design and services. Comfy beds. </p>
            </div>
            <!-- fin user review -->
        </div>
        <div class="flex flex-col rounded-2xl w-60 h-60 p-3 bg-backGround shadow-xl justify-between ">
            <!-- avatar, user name, ratings -->
            <div class="flex flex-row " >
                <div class="avatar">
                    <div class=" w-24 mask mask-triangle ">
                        <img src="https://placeimg.com/192/192/people" />
                    </div>
                </div>
                <div class="flex flex-col content-between self-center ">
                    <!-- stars -->
                    <div class="flex flex-row ">
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
                    <!-- user name -->
                    <div class="">
                        <h1 class="font-Cinzel text-accent ">Toto</h1>
                    </div>
                </div>
            </div>
            <!-- user comment date-->
            <div class="self-start">
                <p class="font-Philosopher text-cadetBlue"> 12/06/2022</p>
            </div>
            <!-- user comment -->
            <div class="rounded-lg border-1.5 border-secondary basis-1/2 overflow-auto shadow-md place-items-stretch">
                <p class="font-Philosopher text-cadetBlue">Very nice! Outstanding design and services. Comfy beds. </p>
            </div>
            <!-- fin user review -->
        </div>
        <div class="flex flex-col rounded-2xl w-60 h-60 p-3 bg-backGround shadow-xl justify-between ">
            <!-- avatar, user name, ratings -->
            <div class="flex flex-row " >
                <div class="avatar">
                    <div class=" w-24 mask mask-triangle ">
                        <img src="https://placeimg.com/192/192/people" />
                    </div>
                </div>
                <div class="flex flex-col content-between self-center ">
                    <!-- stars -->
                    <div class="flex flex-row ">
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
                    <!-- user name -->
                    <div class="">
                        <h1 class="font-Cinzel text-accent ">Toto</h1>
                    </div>
                </div>
            </div>
            <!-- user comment date-->
            <div class="self-start">
                <p class="font-Philosopher text-cadetBlue"> 12/06/2022</p>
            </div>
            <!-- user comment -->
            <div class="rounded-lg border-1.5 border-secondary basis-1/2 overflow-auto shadow-md place-items-stretch">
                <p class="font-Philosopher text-cadetBlue">Very nice! Outstanding design and services. Comfy beds. </p>
            </div>
            <!-- fin user review -->
        </div>
        <div class="flex flex-col rounded-2xl w-60 h-60 p-3 bg-backGround shadow-xl justify-between ">
            <!-- avatar, user name, ratings -->
            <div class="flex flex-row " >
                <div class="avatar">
                    <div class=" w-24 mask mask-triangle ">
                        <img src="https://placeimg.com/192/192/people" />
                    </div>
                </div>
                <div class="flex flex-col content-between self-center ">
                    <!-- stars -->
                    <div class="flex flex-row ">
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
                    <!-- user name -->
                    <div class="">
                        <h1 class="font-Cinzel text-accent ">Toto</h1>
                    </div>
                </div>
            </div>
            <!-- user comment date-->
            <div class="self-start">
                <p class="font-Philosopher text-cadetBlue"> 12/06/2022</p>
            </div>
            <!-- user comment -->
            <div class="rounded-lg border-1.5 border-secondary basis-1/2 overflow-auto shadow-md place-items-stretch">
                <p class="font-Philosopher text-cadetBlue">Very nice! Outstanding design and services. Comfy beds. </p>
            </div>
            <!-- fin user review -->
        </div>
        <div class="flex flex-col rounded-2xl w-60 h-60 p-3 bg-backGround shadow-xl justify-between ">
            <!-- avatar, user name, ratings -->
            <div class="flex flex-row " >
                <div class="avatar">
                    <div class=" w-24 mask mask-triangle ">
                        <img src="https://placeimg.com/192/192/people" />
                    </div>
                </div>
                <div class="flex flex-col content-between self-center ">
                    <!-- stars -->
                    <div class="flex flex-row ">
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
                    <!-- user name -->
                    <div class="">
                        <h1 class="font-Cinzel text-accent ">Toto</h1>
                    </div>
                </div>
            </div>
            <!-- user comment date-->
            <div class="self-start">
                <p class="font-Philosopher text-cadetBlue"> 12/06/2022</p>
            </div>
            <!-- user comment -->
            <div class="rounded-lg border-1.5 border-secondary basis-1/2 overflow-auto shadow-md place-items-stretch">
                <p class="font-Philosopher text-cadetBlue">Very nice! Outstanding design and services. Comfy beds. </p>
            </div>
            <!-- fin user review -->
        </div>
        <div class="flex flex-col rounded-2xl w-60 h-60 p-3 bg-backGround shadow-xl justify-between ">
            <!-- avatar, user name, ratings -->
            <div class="flex flex-row " >
                <div class="avatar">
                    <div class=" w-24 mask mask-triangle ">
                        <img src="https://placeimg.com/192/192/people" />
                    </div>
                </div>
                <div class="flex flex-col content-between self-center ">
                    <!-- stars -->
                    <div class="flex flex-row ">
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
                    <!-- user name -->
                    <div class="">
                        <h1 class="font-Cinzel text-accent ">Toto</h1>
                    </div>
                </div>
            </div>
            <!-- user comment date-->
            <div class="self-start">
                <p class="font-Philosopher text-cadetBlue"> 12/06/2022</p>
            </div>
            <!-- user comment -->
            <div class="rounded-lg border-1.5 border-secondary basis-1/2 overflow-auto shadow-md place-items-stretch">
                <p class="font-Philosopher text-cadetBlue">Very nice! Outstanding design and services. Comfy beds. </p>
            </div>
            <!-- fin user review -->
        </div>

    </div>

</template>
    
<script>

export default {
    name: "reviews.vue", inject: [
        'isFrench',
        // 'reviews'
    ],
}
</script>
    
    
<style scoped>

</style>