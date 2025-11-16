<script setup>
import Form from './Form.vue';

const props = defineProps({
    guiasturist: {type:Object},
    actividadturist: {type:Object}, 
    centrosturist: {type:Object}, 
    guiasturist_actividadturist: {type:Object}, 
    centrosturist_guiasturist: {type:Object},
});

</script>

<template>

<Form
    :guiasturist="guiasturist" 
    :actividadturist="actividadturist" 
    :centrosturist="centrosturist" 
    :guiasturist_actividadturist="guiasturist_actividadturist"
    :centrosturist_guiasturist="centrosturist_guiasturist"
    />

</template>