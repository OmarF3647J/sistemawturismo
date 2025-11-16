<script setup>
import Form from './Form.vue';

const props = defineProps({
    actividadturist: {type:Object}, 
    centrosturist: {type:Object}, 
    guiasturist_actividadturist: {type:Object}, 
    centrosturist_guiasturist: {type:Object},
});

</script>

<template>

<Form
    :guiasturist="null" 
    :actividadturist="actividadturist" 
    :centrosturist="centrosturist" 
    :guiasturist_actividadturist="[]" 
    :centrosturist_guiasturist="[]"
    />

</template>