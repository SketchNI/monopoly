<script setup>
import Layout from "@/Layouts/Layout.vue";
import TopBar from "@/Components/TopBar.vue";
import Chat from "@/Pages/Chat.vue";

const props = defineProps({
    user: Object,
    players: Array,
    messages: Array,
    game: Object,
    in_progress_games: Object,
});

</script>

<template>
    <x-head :title="`Playing Game '${game.game_id}'`" />

    <layout>
        <div class="h-full grid grid-cols-12">
            <div class="col-span-9 h-screen overflow-y-scroll">
                <top-bar :game="game" />

                <div class="p-8">
                    <h1 class="text-2xl mb-4">game</h1>
                    <pre class="text-white p-4 bg-gray-950">{{ JSON.stringify(game, null, 2) }}</pre>
                    <h1 class="text-2xl mb-4">messages</h1>
                    <pre class="text-white p-4 bg-gray-950">{{ JSON.stringify(messages, null, 2) }}</pre>
                    <h1 class="text-2xl mb-4">user</h1>
                    <pre class="text-white p-4 bg-gray-950">{{ JSON.stringify(user, null, 2) }}</pre>
                    <h1 class="text-2xl mb-4">players</h1>
                    <pre class="text-white p-4 bg-gray-950">{{ JSON.stringify(players, null, 2) }}</pre>
                </div>
            </div>

            <Chat :user="user" :messages="messages" :game="game" :channel="`game.${game.game_id}`"/>
        </div>
    </layout>
</template>

<style scoped>

</style>
