<template>
    <form @submit.prevent="create">
      <div>
            <div>
                <label>Group</label>
                    <input v-model="form.group_name" type="text" />
                        <div v-if="form.errors.group_name">
                            {{ form.errors.group_name }}
                        </div>
            </div>

            <div class="hidden">
                    <input v-model="form.color" type="text" />
                        <div v-if="form.errors.color">
                            {{ form.errors.color }}
                        </div>
            </div>



            <div>
                    <button type="submit"

                    >Create</button>
            </div>
      </div>
    </form>
  </template>

  <script setup>
  import { useForm } from '@inertiajs/vue3'
  import MainLayoutTodos from '@/Layouts/MainLayoutTodos.vue';

  const form = useForm({
    group_name: "",
    color: "#" + Math.floor(Math.random() * 16777215).toString(16),
  })

  const props = defineProps({
    group: Object,
  })

//   defineOptions({ layout: MainLayoutTodos })


const create = () =>form.post(route('groups.store'))


  </script>

  <style scoped>
  label {
    margin-right: 2em;
    margin-left: 2em;
  }
  div {
    padding: 2px
  }

  button {
    margin-right: 2em;
    margin-left: 2em;
  }


  </style>
