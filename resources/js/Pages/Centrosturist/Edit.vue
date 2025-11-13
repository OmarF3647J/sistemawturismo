<script setup>
import Form from './Form.vue';

const props = defineProps({
  centrosturist: { type: Object, required: true },
  productos: { type: Array, default: () => [] },
  actividadturist: { type: Array, default: () => [] },
  guiasturist: { type: Array, default: () => [] },
  centrosturist_actividadturist: { type: Array, default: () => [] },
  centrosturist_guiasturist: { type: Array, default: () => [] },
});

// const props = defineProps({
//   centrosturist: { type: Object, required: true },
//   productos: { type: Array, default: () => [] },
//   actividadturist: { type: Array, default: () => [] },
//   guiasturist: { type: Array, default: () => [] },
//   centrosturist_actividadturist: { type: Array, default: () => [] },
//   centrosturist_guiasturist: { type: Array, default: () => [] },
// })


</script>

<template>
    <Form :centrosturist="centrosturist"
    :productos="productos" 
    :actividadturist="actividadturist"
    :guiasturist="guiasturist"
    :centrosturist_actividadturist="centrosturist_actividadturist"
:centrosturist_guiasturist="centrosturist_guiasturist">
    </Form>
</template>

