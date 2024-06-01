<template>
    <form @submit.prevent="create">
      <div>
        <div>
          <label>Todo</label>
          <input v-model="form.todoname" type="text" />
          <div v-if="form.errors.todoname">
          {{ form.errors.todoname }}
        </div>
        </div>

        <div>
          <label>Deadline Date</label>
          <input v-model.date ="form.deadlinedate" type="date" />
          <div v-if="form.errors.deadlinedate">
          {{ form.errors.deadlinedate }}
        </div>
        </div>

        <div>
          <label>Deadline Time</label>
          <input v-model.time="form.deadlinetime" type="time" />
          <div v-if="form.errors.deadlinetime">
          {{ form.errors.deadlinetime }}
        </div>
        </div>

        <div>
          <label>Importance</label>
          <input v-model="form.importance" type="boolean" />
          <div v-if="form.errors.importance">
          {{ form.errors.importance }}
        </div>
        </div>

        <div>
          <label>Description</label>
          <input v-model="form.description" type="text" />
          <div v-if="form.errors.description">
          {{ form.errors.description }}
        </div>
        </div>

        <div>
          <label>Is Done</label>
          <input v-model="form.isDone" type="boolean" />
          <div v-if="form.errors.isDone">
          {{ form.errors.isDone }}
        </div>
        </div>

        <div class="hidden">
                    <input v-model="form.by_group_id" type="text" />
                        <div v-if="form.errors.color">
                            {{ form.errors.color }}
                        </div>
            </div>

        <div>
          <button type="submit">Create</button>
        </div>
      </div>
    </form>
  </template>

  <script setup>
  import { useForm, usePage } from '@inertiajs/vue3'
  import { computed } from 'vue'
  import MainLayoutTodos from '@/Layouts/MainLayoutTodos.vue';


  const props = defineProps({
    group: Object,
    todo: Array
  })

  defineOptions({ layout: MainLayoutTodos })

  const form = useForm({
    todoname: 'new todo ...',
    deadlinedate: null,
    deadlinetime: null,
    importance: 0,
    description: null,
    by_user_id: 1,
    by_group_id: Number,
    isDone: false
  })

  const page = usePage()

  const groupId = computed(
  () => route().params
)

// console.log(groupId)

  const create = () => form.post(route('groups.todos.store', route().params))










  </script>

  <style scoped>
  label {
    margin-right: 2em;
  }
  div {
    padding: 2px
  }
  </style>
