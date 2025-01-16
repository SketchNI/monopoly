<script setup>
import { onMounted, ref } from 'vue';

defineProps({
    modelValue: String|Number,
});

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        ref="input"
        class="flex bg-white w-full rounded-md border-0 py-1.5 px-3 shadow-sm ring-1 ring-inset ring-gray-500 text-black placeholder:text-gray-700 focus:ring-2 focus:ring-inset focus:ring-blue-500 sm:text-sm sm:leading-6"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
    >
</template>
