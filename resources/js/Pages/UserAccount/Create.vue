<template>
    <div class="flex justify-center">
    <div class="">

    <form @submit.prevent="register">
      <div>
        <div class="mt-14 ml-4 mr-4">
          <label for="name" class="label">Your Name</label>
          <input id="name" v-model="form.name" type="text" class="input" />
          <div class="input-error" v-if="form.errors.name">{{form.errors.name}}</div>
        </div>

        <div class="mt-4 ml-4 mr-4">
          <label for="email" class="label">E-mail</label>
          <input id="email" v-model="form.email" type="text" class="input" />
          <div class="input-error" v-if="form.errors.email">{{form.errors.email}}</div>
        </div>

        <div class="mt-4 ml-4 mr-4">
          <label for="password" class="label">Password</label>
          <input id="password" v-model="form.password" type="password" class="input" />
          <div class="input-error" v-if="form.errors.password">{{form.errors.password}}</div>
        </div>
        <div class="mt-4 ml-4 mr-4">
          <label for="password_confirmation" class="label">Confirm Password</label>
          <input id="password_confirmation" v-model="form.password_confirmation" type="password" class="input" />
        </div>

        <div class="flex justify-center mt-4">
          <button class="btn-primary" type="submit">Create account</button>
        </div>
      </div>

    </form>
</div>
</div>
  </template>

  <script setup>
  import { useForm } from '@inertiajs/vue3'
  import FirstLayout from '@/Layouts/FirstLayout.vue'
  const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null
  })
  const register = () => form.post(route('user-account.store'))

  defineOptions({ layout: FirstLayout })
  </script>
