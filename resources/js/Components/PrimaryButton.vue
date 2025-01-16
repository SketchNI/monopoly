<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
    processing: false,
});
</script>

<template>
    <button :type="type" :class="[processing ? 'opacity-25' : '', 'primary-button']">
        <slot />
    </button>
</template>

<style scoped>
.primary-button {
    @apply inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs;
    @apply text-white uppercase tracking-widest space-x-1 select-none;
    @apply transition duration-150 ease-in;

    &:hover {
        @apply bg-blue-600;
    }

    &:focus {
        @apply bg-gray-700 outline-none ring-2 ring-blue-500 ring-offset-2 ring-offset-gray-200;
    }

    &:active {
        @apply bg-blue-700;
    }

    &:disabled {
        @apply cursor-not-allowed opacity-50;
    }
}
</style>
