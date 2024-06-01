<template>

        <div>
            <div>
                SHOW SOMETHING - PAGE
            </div>
            <Link href="/">Front Page</Link>

        </div>



</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import FirstLayout from '@/Layouts/FirstLayout.vue'

defineOptions({ layout: FirstLayout })
</script>

<!-- <script>
import FirstLayout from '@/Layouts/FirstLayout.vue'

    export default {
        layout: FirstLayout
    }

</script> -->
