<template>
    <div>
        <div class="flex flex-col">
        <p>TODO INDEX PAGE</p>
        <div>
            Group number: {{ group.id }}, Group Name: {{ group.group_name }}

        </div>

            <GroupName :group="group.group_name"/>

            <h1 class="flex flex-row text-lg justify-between mx-8">
                <p class="w-3/4 bg-red-200">Filters block</p>
                <div class="btn-primary">
                        <Link :href="route('groups.todos.create', groupId)"
                        >Add Todo</Link>
                </div>
            </h1>
        </div>
        <div class="flex flex-col items-center">
                <TodoCard :group="group" v-for="(todo, index) in todos.data" :key="index" :todo="todo"/>
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
    import GroupName from '@/Components/GroupName.vue';
    import MainLayoutTodos from '@/Layouts/MainLayoutTodos.vue';

  const props = defineProps({
    todos: Object,
    group: {
        typeof: Array
    }
  })

  defineOptions({ layout: MainLayoutTodos })

  const groupId = computed(
  () => route().params
)

// console.log(props)

  </script>
