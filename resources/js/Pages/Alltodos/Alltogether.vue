<template>
    <div>
        <div class="w-full flex flex-col">
            <h1 class="flex justify-center">TODO ALLTOGETHER PAGE</h1>
        </div>


        <div class="flex flex-col items-center">
            <Filters :filters="filters"/>
        </div>

        <div class="flex flex-col items-center">
            <TodoCard :group="group" v-for="todo in todos.data" :key="todo.id" :todo="todo"/>
        </div>
        <div>
            {{ group }}
        </div>

        <div v-if="todos.data.length" class="w-full flex justify-center mt-4 mb-4">
            <Pagination :links="todos.links"/>
        </div>

    </div>
</template>

  <script setup>
    import { Link } from '@inertiajs/vue3'
    import { computed } from 'vue'
    import TodoCard from '@/Components/TodoCard.vue';
    import Pagination from '@/Components/UI/Pagination.vue';
    import Filters from '@/Pages/Alltodos/Components/Filters.vue';
    import MainLayoutTodos from '@/Layouts/MainLayoutTodos.vue';


  const props = defineProps({
    todos: Object,
    filters: Object,
    group: Object
  })

//   console.log(props)

    defineOptions({ layout: MainLayoutTodos })
  </script>
