<template>
        <div class="grid grid-rows gap-6 my-6 justify-center">
            <div class="grid justify-center ">
                <h1>BLOG PAGE</h1>
            </div>

            <div class="grid justify-center">
                <Link href="/hello">Show Page</Link>
            </div>


            <div>
                <SliderComponent />
            </div>




        </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import SliderComponent from '@/Components/SliderComponent.vue';


</script>

