<template>
    <div>
    <form @submit.prevent="update">
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
          <input v-model="form.deadlinedate" type="date" />
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

        <div>
          <button type="submit">Update</button>
        </div>
      </div>
    </form>

    </div>
  </template>

  <script setup>
  import { useForm } from '@inertiajs/vue3'
  import MainLayoutTodos from '@/Layouts/MainLayoutTodos.vue';

  const props = defineProps({
    todo: Object,

  })

  defineOptions({ layout: MainLayoutTodos })


  const form = useForm({
    todoname: props.todo.todoname,
    deadlinedate: props.todo.deadlinedate,
    deadlinetime: props.todo.deadlinetime,
    importance: props.todo.importance,
    description: props.todo.description,
    by_user_id: props.todo.by_user_id,
    isDone: props.todo.isDone
  })


    const update = () => form.put(route('todos.update', {todo: props.todo.id}))


  </script>


  <style scoped>
  label {
    margin-right: 2em;
  }
  div {
    padding: 2px
  }
  </style>
