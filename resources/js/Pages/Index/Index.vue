<template>
    <div class="section_top min-h-screen">
        <div class="content rounded border-solid border-2 border-white-300 px-8 py-4 backdrop-blur-md">
            <h1>Welcome to my personal page !</h1>
            <h1>Here you will find more information about me and articles I care.</h1>
            <h1>Enjoy !</h1>
            <button class="target">POGA</button>
        </div>

        <!-- <div class="grid grid-cols-2 justify-items-center my-6 mx-12"> -->
    <!-- <div class="flex max-sm:flex-col-reverse max-sm:gap-4 justify-around items-center mt-8" > -->
        <!-- <div class="rounded overflow-hidden shadow-lg bg-cover h-60 w-5/12 bg-bottom" :style="{ backgroundImage: `url(/images/HomeBackground.JPG)` }">
            <div class="bg-cover bg-bottom" :style="{ Image: `url(/images/HomeBackground.JPG)` }" alt="image"></div>
        </div> -->



        <!-- <div class="rounded overflow-hidden shadow-lg bg-cover h-60 w-5/12 bg-bottom text-center px-2 py-8"> -->
            <!-- <h1 class="text-3xl grid justify-center align-content-center">Welcome to my personal page!</h1> -->
            <!-- <h1 class="text-3xl ">Priecājos, ka iegriezāties manā vietnē</h1> -->
        <!-- </div> -->

    <!-- <div class="flex justify-center py-4">
    <div class="flex rounded overflow-hidden justify-center items-center shadow-lg bg-cover h-40 w-11/12 bg-bottom text-center px-2 py-10 max-sm:w-5/12 max-sm:h-48">
            <h1 class="text-2xl ">Here you will find more information about me and articles I care. Enjoy!</h1>
        </div>
    </div> -->
</div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<script>
    export default {
        mounted: function() {
            $(".target").on("click", function(){
            alert("Sveiks no Indeks lapas :-)");
                });
            }
        }
</script>


<style>
.section_top {
    width: 100%;
    /* height: 100%; */
    overflow: hidden;
    position: relative;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 0;
    background-position: 50% 50%;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    animation: change 100s infinite ease-in-out;
}

.content {
    position: absolute;
    top: 60%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-transform: uppercase;
    color: white;
    min-width: fit-content;
    text-align: justify;
    font-weight: bold;
    letter-spacing: 3px;
    /* backdrop-filter: blur(12px); */
}

@keyframes change{
    0%
    {
        background-image: url('/images/IMG_001.JPG');
    }
    10%
    {
        background-image: url('/images/IMG_002.JPG');
    }
    20%
    {
        background-image: url('/images/IMG_003.JPG');
    }
    30%
    {
        background-image: url('/images/IMG_004.JPG');
    }
    40%
    {
        background-image: url('/images/IMG_005.JPG');
    }
    50%
    {
        background-image: url('/images/IMG_006.JPG');
    }

    60%
    {
        background-image: url('/images/IMG_007.JPG');
    }
    70%
    {
        background-image: url('/images/IMG_008.JPG');
    }
    80%
    {
        background-image: url('/images/IMG_009.JPG');
    }
    90%
    {
        background-image: url('/images/IMG_010.JPG');
    }
    100%
    {
        background-image: url('/images/IMG_006.JPG');
    }
}
</style>


