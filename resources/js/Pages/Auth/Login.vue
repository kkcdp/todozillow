<template>

    <div class="flex justify-center">
    <div class="">

    <form @submit.prevent="login">
      <div>
        <div class="mt-20 ml-4 mr-4">
          <label for="email" class="label">E-mail</label>
          <input id="email" v-model="form.email" type="text" class="input" />
          <div class="input-error" v-if="form.errors.email">{{form.errors.email}}</div>
        </div>
        <div class="mt-4 ml-4 mr-4">
          <label for="password" class="label">Password</label>
          <input id="password" v-model="form.password" type="password" class="input" />
          <div class="input-error" v-if="form.errors.password">{{form.errors.password}}</div>
        </div>
        <div class="flex justify-center mt-4">
          <button class="btn-primary-login" type="submit">Login</button>
        </div>
      </div>
      <div class="btn-primary-register mt-4 flex justify-center">
          <Link :href="route('user-account.create')">Register instead</Link>
      </div>

    </form>
</div>
</div>
  </template>

  <script setup>
  import { Link, useForm } from '@inertiajs/vue3'
  import FirstLayout from '@/Layouts/FirstLayout.vue'
  const form = useForm({
    email: null,
    password: null,
  })
  const login = () => form.post(route('login.store'))

  defineOptions({ layout: FirstLayout })
  </script>
