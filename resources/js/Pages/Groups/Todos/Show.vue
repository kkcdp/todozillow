<template>
    <div class="flex flex-col items-center">
        <div>
            <TodoCard :todo="todo" :group="group"/>
        </div>

        <section
        class="todo-show-card"
        :class="{'taskdone': isDone, 'taskimportant': isImportant}"
        >
                <div class="pt-5 pb-8">
                    <p class="text-center uppercase text-lg">Description:</p>
                    <br>
                    <div class="flex text-center">
                        {{ todo.description }}
                    </div>

                </div>
        </section>
    </div>

  </template>

  <script setup>

    import TodoCard from '@/Components/TodoCard.vue';
    import { computed } from 'vue'
    import MainLayoutTodos from '@/Layouts/MainLayoutTodos.vue';

    const props = defineProps({
    todo: Object,
    group: Object
  })

  defineOptions({ layout: MainLayoutTodos })

  const isDone = computed(
    () => props.todo.isDone
  )

  const isImportant = computed(
  () => props.todo.importance
)

  </script>
