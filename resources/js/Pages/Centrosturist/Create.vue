<script setup>
import Form from './Form.vue';

const props = defineProps({
  productos: { type: Array, default: () => [] },
  actividadturist: { type: Array, default: () => [] },
  guiasturist: { type: Array, default: () => [] },
  serviciosturist: { type: Array, default: () => [] },
  centrosturist_actividadturist: { type: Array, default: () => [] },
  centrosturist_guiasturist: { type: Array, default: () => [] },
  centrosturist_serviciosturist: { type: Array, default: () => [] },
});
</script>

<template>
  <Form 
    :centrosturist="null"
    :centrosturist_actividadturist="[]"
    :centrosturist_guiasturist="[]"
    :centrosturist_serviciosturist="[]"
    :productos="productos"
    :serviciosturist="serviciosturist"
    :actividadturist="actividadturist"
    :guiasturist="guiasturist"
  />
</template>
