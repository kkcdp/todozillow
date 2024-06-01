<template>
    <span>
      {{ group }}
    </span>
  </template>

  <script setup>
  defineProps({
    group: {
        typeof: Object
    }
  })
  </script>
