<template>
    <div>
        <div class="flex flex-col mt-24">
            <h1 class="text-lg text-center mx-8 my-8">
                <p>Groups page</p>
            </h1>
            <div class="flex flex-row text-lg justify-end mx-8">
                <div class="btn-primary">
                        <Link :href="route('groups.create')"
                        >Add Group</Link>
                </div>
            </div>
        </div>

        <div class="my-10 mx-8 grid justify-items-center lg:grid-cols-5 gap-8 md:grid-cols-4 sm:grid-cols-3 xs:grid-cols-2 xxs:grid-cols-1
    ">
            <GroupCard v-for="group in groups.data" :key="group.id" :group="group"/>
        </div>

        <div v-if="groups.data.length" class="w-full flex justify-center mt-4 mb-4">
            <Pagination :links="groups.links"/>
        </div>


    </div>
  </template>

  <script setup>
  import { Link } from '@inertiajs/vue3'
    import GroupCard from '@/Components/GroupCard.vue';
    import Pagination from '@/Components/UI/Pagination.vue';
    import MainLayoutTodos from '@/Layouts/MainLayoutTodos.vue';

    const props = defineProps({
    groups: {
        typeof: Object
    }
  })

  defineOptions({ layout: MainLayoutTodos })
  </script>
