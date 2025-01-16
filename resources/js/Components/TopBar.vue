<script setup>
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { router } from "@inertiajs/vue3";
import DangerButton from "@/Components/DangerButton.vue";
import { ref } from "vue";
import TopBarLink from "@/Components/TopBarLink.vue";
import { HomeIcon } from '@heroicons/vue/20/solid';
import Modal from "@/Components/Modal.vue";

defineProps({
    game: Object|null|undefined,
})

const showForfeitModal = ref(false);

const logoutAction = () => {
    window.axios.post(route('logout')).then(() => {
        router.visit(route('index'));
    })
}
</script>

<template>
    <div class="bg-gradient-to-b from-blue-400 from-10% to-blue-500 border-b border-blue-600 px-4 space-x-4 flex items-center justify-between shadow shadow-gray-500/60">
        <div>
            <top-bar-link :href="route('index')">
                <home-icon class="size-4" />
                <span>Home</span>
            </top-bar-link>
        </div>

        <div class="space-x-4">
            <secondary-button @click.prevent="logoutAction">Log Out</secondary-button>

            <danger-button @click="showForfeitModal = true"
                           v-if="game !== undefined"
                           class="focus:ring-offset-blue-500">
                Forfeit
            </danger-button>
        </div>

        <modal :show="showForfeitModal" max-width="sm">
            <div class="p-6 text-black">
                <p>Are you sure you wish to forfeit this game?</p>

            </div>

                <div class="flex justify-center mt-6">
                    <secondary-button class="w-1/2 !text-base justify-center rounded-none rounded-bl-md" @click.prevent="showForfeitModal = false">Cancel</secondary-button>
                    <danger-button class="focus:ring-0 focus:bg-red-700 w-1/2 !text-base justify-center rounded-none rounded-br-md">Forfeit</danger-button>
                </div>
        </modal>
    </div>
</template>

