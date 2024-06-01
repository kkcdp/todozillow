<template>
    <div>
    <div class="flex flex-col">

        <h1 class="flex flex-row text-lg justify-between mx-8">
            <p class="w-3/4 bg-red-200">Filters block</p>
            <!-- <div class="btn-primary">
                    <Link :href="route('groups.todos.create', {group: $page.props.group})"
                    >Add Todo</Link>
            </div> -->
        </h1>
    </div>
        <div class="flex flex-col items-center">
            <div v-for="todo in todos" :key="todo.id">
                <TodoCard :todo="todo"/>
            </div>

        </div>

    </div>
  </template>

  <script setup>
    import { Link } from '@inertiajs/vue3'
    import GroupCard from '@/Components/GroupCard.vue';
    import TodoCard from '@/Components/TodoCard.vue';

    const props = defineProps({
    group: Object,
    todos: Object,

  })


  </script>
