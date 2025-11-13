<script setup>
import Form from './Form.vue';

const props = defineProps({
  productos: { type: Array, default: () => [] },
  actividadturist: { type: Array, default: () => [] },
  guiasturist: { type: Array, default: () => [] },
  centrosturist_actividadturist: { type: Array, default: () => [] },
  centrosturist_guiasturist: { type: Array, default: () => [] },
  
});
</script>

<template>
  <Form 
    :centrosturist="null"
    :centrosturist_actividadturist="[]"
    :centrosturist_guiasturist="[]"
    :productos="productos"
    :actividadturist="actividadturist"
    :guiasturist="guiasturist"
  />
</template>
