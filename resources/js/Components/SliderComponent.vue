<template>
    <div class="section top">
    <div class="container">
        <!-- <div class="rounded overflow-hidden shadow-lg bg-cover h-60 w-5/12 bg-bottom"> -->
        <!-- </div> -->
        <!-- <div> -->
            <!-- <div :style="{ backgroundImage: `url(/images/HomeBackground.JPG)` }"></div> -->
        <!-- </div> -->
        </div>
    </div>
</template>

<style>
    .container {
        width: 100%;
        height: 100%;
        overflow: hidden;


        background-origin: border-box;
        background-size: cover;
        /* display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center; */
        animation: change 6s infinite ease-in-out;
    }

    @keyframes change{
    0%
    {
        background-image: url('/images/HomeBackground.JPG');
    }
    20%
    {
        background-image: url('/images/IMG_5708.JPG');
    }
    40%
    {
        background-image: url('/images/HomeBackground.JPG');
    }
    60%
    {
        background-image: url('/images/IMG_5708.JPG');
    }
    80%
    {
        background-image: url('/images/HomeBackground.JPG');
    }
    100%
    {
        background-image: url('/images/HomeBackground.JPG');
    }
}
</style>
