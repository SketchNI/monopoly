<script setup>
import { toWords } from "number-to-words";

const props = defineProps({
    number: Number,
})
</script>

<template>
    <div v-if="number === 1" class="dice one">
        <span class="dot"> </span>
    </div>

    <div v-if="number === 2" class="dice two">
        <span class="dot"> </span>
        <span class="dot"> </span>
    </div>

    <div v-if="number === 3" class="dice three">
        <span class="dot"> </span>
        <span class="dot"> </span>
        <span class="dot"> </span>
    </div>

    <div v-if="number === 4" class="dice four">
        <div class="col">
            <span class="dot"> </span>
            <span class="dot"> </span>
        </div>
        <div class="col">
            <span class="dot"> </span>
            <span class="dot"> </span>
        </div>
    </div>

    <div v-if="number === 5" class="dice five">
        <div class="col">
            <span class="dot"></span>
            <span class="dot"></span>
        </div>

        <div class="col">
            <span class="dot"></span>
        </div>

        <div class="col">
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </div>

    <div v-if="number === 6" class="dice six">
        <div class="col">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
        <div class="col">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </div>
</template>

<style scoped lang="postcss">
.dice {
    @apply p-2 rounded-lg size-14 border-2 border-gray-500 bg-white shadow-lg shadow-gray-500;
}

.dot {
    @apply block size-2.5 rounded-full bg-gray-950;
}

.one {
    @apply flex justify-center items-center;
}

.two {
    @apply flex justify-between;

    .dot:nth-of-type(2) {
        @apply self-end;
    }
}

.three {
    @apply flex justify-between;

    .dot:nth-of-type(3) {
        @apply self-end;
    }

    .dot:nth-of-type(2) {
        @apply self-center;
    }
}

.four {
    @apply flex justify-between;

    .col {
        @apply flex justify-between flex-col;
    }
}

.five {
    @apply flex justify-between;

    .col {
        @apply flex justify-between flex-col;
    }

    .col:nth-of-type(2) {
        @apply justify-center;
    }
}

.six {
    @apply flex justify-between;

    .col {
        @apply flex justify-between flex-col;
    }
}
</style>
