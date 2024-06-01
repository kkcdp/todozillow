<template>
    <div class="min-h-screen">
        <header>
            <div class="">
                <TopNavTodos />
            </div>

        </header>

        <div v-if="flashSuccess" class="success">
            {{ flashSuccess }}
        </div>


        <slot>Default</slot>

            <Footer />
    </div>
  </template>

  <script setup>
  import { Link, usePage } from '@inertiajs/vue3'
  import { computed } from 'vue'
  import TopNavTodos from '@/Components/TopNavTodos.vue';
  import Footer from '@/Components/Footer.vue';

  const flashSuccess = computed(
  () => usePage().props.flash.success,
  )

  </script>

<style scoped>
.success {

    /* min-height: 50px; */
    text-align: center;
    background-color: green;
    color: white;
}
</style>
