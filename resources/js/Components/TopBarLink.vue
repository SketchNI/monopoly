<template>
    <x-link class="text-white space-x-2 flex items-center bg-gradient-to-b hover:from-blue-600 hover:from-10% hover:to-blue-700 px-4 py-3 duration-150 transition ease-linear"
            :href="href">
        <slot />
    </x-link>
</template>

<script setup>
defineProps({
    href: {
        type: String,
    }
})
</script>
