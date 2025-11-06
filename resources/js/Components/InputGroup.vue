<template>
    <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
        <input class="rounded block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" 
        :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" ref="input" placeholder="Texto"
        :type="type" :required="required" :accept="acept"/>
        <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
            <slot>

            </slot>
        </div>
    </div>
</template>

<script setup>
import { onMounted, ref } from 'vue';

defineProps(['modelValue','text', 'type', 'required', 'acept']);

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});
</script>
