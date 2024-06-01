<template>
    <div class="flex gap-1">
       <Link v-for="(link, index) in links"
       :key="index"
       class="py-1 px-2 rounded-md"
       :href="link.url ?? ''"
       :class="{'bg-gray-300 font-bold' : link.active}"
       v-html="link.label"
       />
    </div>
</template>

<script setup>
import {Link} from '@inertiajs/vue3'
defineProps({
    links: {
        typeof: Array
    }
})

</script>
