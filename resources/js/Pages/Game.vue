<script setup>
import Layout from "@/Layouts/Layout.vue";
import TopBar from "@/Components/TopBar.vue";
import Chat from "@/Pages/Chat.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { ref } from "vue";
import Dice from '@/Components/Dice.vue';

const props = defineProps({
    user: Object,
    players: Array,
    messages: Array,
    game: Object,
    in_progress_games: Object,
});

const params = ref({ doubles: 0, });

const state = props.game.game_state;

const dice = ref([]);

const cmd = (command) => {
    window.axios.put(route('games.command', { game: props.game }), { command, params: params.value, })
        .then(r => {
            dice.value = [r.data[0], r.data[1]];
            params.value = params.value = { doubles: r.data[2].doubles };
        })
        .catch(e => { console.log(e.response.data)})
}

</script>

<template>
    <x-head :title="`Playing Game '${game.game_id}'`" />

    <layout>
        <div class="h-full grid grid-cols-12">
            <div class="col-span-9 h-screen overflow-y-scroll">
                <top-bar :game="game" />

                <div class="p-8">
                    <primary-button @click.prevent="cmd('roll_dice')">
                        Roll Dice
                    </primary-button>

                    <div>
                        <div class="flex space-x-4 items-center">
                            <p class="my-3">You rolled: {{ dice.reduce((a, c) => a + c, 0) }}!</p>

                            <dice :number="num" v-for="num in dice" />
                        </div>
                    </div>
                    <h1 class="text-2xl mb-4">game</h1>
                    <pre class="text-xs text-white p-4 bg-gray-950 h-96 overflow-y-scroll">{{ JSON.stringify(game, null, 2) }}</pre>
                </div>
            </div>

            <Chat :user="user" :messages="messages" :game="game" :channel="`game.${game.game_id}`"/>
        </div>
    </layout>
</template>

<style scoped>

</style>
