<script setup>
import { onMounted, ref } from 'vue';

defineProps({
    modelValue: String,
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
        class="flex w-16 border shadow-sm border-gray-500  focus:ring-2 focus:ring-inset focus:ring-blue-500"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
    >
</template>
