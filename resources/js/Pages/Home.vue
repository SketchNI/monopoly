<script setup>
import Layout from "@/Layouts/Layout.vue";
import { useForm } from "@inertiajs/vue3";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import ColorInput from "@/Components/ColorInput.vue";
import SelectInput from "@/Components/SelectInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { PlayIcon, PlusIcon } from "@heroicons/vue/24/outline";
import { RadioGroup, RadioGroupOption } from "@headlessui/vue";
import { ref } from "vue";
import TopBar from "@/Components/TopBar.vue";
import Chat from "@/Pages/Chat.vue";

const props = defineProps({
    user: {
        id: Number,
        username: String,
        color: String,
        token: String,
    },
    messages: Object,
    in_progress_games: Array,
});


const newGame = useForm({
    game_id: '',
    color: props.user.color,
    token: props.user.token,
    player_count: 2,
})

const joinGame = useForm({
    game_id: '',
    color: props.user.color,
    token: props.user.token,
});

const options = [
    { icon: '', label: 'Choose Token', selected: true, },
    { icon: '🐕', label: 'Dog', },
    { icon: '🚗', label: 'Car', },
    { icon: '🚢', label: 'Ship', },
    { icon: '🎩', label: 'Hat', },
    { icon: '🐈', label: 'Cat', },
    { icon: '🦆', label: 'Duck', },
    { icon: '🐎', label: 'Horse', },
    { icon: '💩', label: 'Poop', },
    { icon: '🎱', label: '8-Ball', },
    { icon: '✈️', label: 'Plane', },
    { icon: '🚂', label: 'Train', },
    { icon: '👟', label: 'Show', },
]

const newGameAction = () => {
    newGame.post(route('games.store'));
}

const joinGameAction = () => {
    joinGame.put(route('games.update', { game: joinGame.game_id }));
}

const view = ref('new')
</script>

<template>
    <x-head title="New Game" />

    <layout>
        <div class="h-full grid grid-cols-12">
            <div class="col-span-9 h-screen overflow-y-scroll">
                <top-bar />

                <div class="w-full">
                    <div class="flex flex-col items-center justify-center h-screen max-w-lg mx-auto">
                        <div class="md:rounded-md shadow-sm bg-gray-50 w-full">

                            <div class="px-4 pt-2">
                                <RadioGroup v-model="view" class="mt-2 grid grid-cols-2 gap-3 sm:grid-cols-2">
                                    <RadioGroupOption as="template"
                                                      v-for="option in [{ label: 'New', value: 'new' }, { label: 'Join', value: 'join' }]"
                                                      :key="option.value"
                                                      :value="option.value"
                                                      v-slot="{ active, checked }">
                                        <div
                                            :class="['cursor-pointer focus:outline-none', active ? 'ring-2 ring-blue-600 ring-offset-2' : '', checked ? 'bg-blue-600 text-white ring-0 hover:bg-blue-500' : 'bg-gray-300 text-gray-900 ring-1 ring-gray-300 hover:bg-gray-200', !active && !checked ? 'ring-inset' : '', active && checked ? 'ring-2' : '', 'flex items-center justify-center rounded-md px-3 py-3 text-sm font-semibold uppercase sm:flex-1']">
                                            {{ option.label }} Game
                                        </div>
                                    </RadioGroupOption>
                                </RadioGroup>
                            </div>

                            <div class="flex justify-between w-full">
                                <div class="p-6 w-full" v-if="view === 'new'">
                                    <h1 class="text-2xl mb-4">Create New Game!</h1>

                                    <div>
                                        <form @submit.prevent="newGameAction" class="space-y-3">
                                            <div>
                                                <input-label for="game_id" value="Game ID" />
                                                <text-input type="text" id="game_id" v-model="newGame.game_id" />
                                                <input-error :message="newGame.errors.game_id" />
                                            </div>

                                            <div>
                                                <input-label for="color" value="Colour" />
                                                <color-input type="color" id="color" v-model="newGame.color" />
                                                <input-error :message="newGame.errors.color" />
                                            </div>

                                            <div>
                                                <input-label for="token" value="Token" />
                                                <select-input :options="options" :selectedToken="newGame.token" />

                                                <input-error :message="newGame.errors.token" />
                                            </div>

                                            <div>
                                                <input-label for="number" value="Amount of Players" />
                                                <text-input type="number" id="number" v-model="newGame.player_count" />
                                                <input-error :message="newGame.errors.player_count" />
                                            </div>

                                            <div class="flex justify-end pt-4">
                                                <primary-button type="submit">
                                                    <plus-icon class="size-4" />
                                                    <span>New Game</span>
                                                </primary-button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="p-6 w-full" v-if="view === 'join'">
                                    <h1 class="text-2xl mb-4">Join Existing Game!</h1>

                                    <div>
                                        <form @submit.prevent="joinGameAction" class="space-y-3">
                                            <div>
                                                <input-label for="game_id" value="Game ID" />
                                                <text-input type="text" id="game_id" v-model="joinGame.game_id" />
                                                <input-error :message="joinGame.errors.game_id" />
                                            </div>

                                            <div>
                                                <input-label for="color" value="Colour" />
                                                <color-input type="color" id="color" v-model="joinGame.color" />
                                                <input-error :message="joinGame.errors.color" />
                                            </div>

                                            <div>
                                                <input-label for="token" value="Token" />
                                                <select-input :options="options" :selected-token="joinGame.token" />

                                                <input-error :message="joinGame.errors.token" />
                                            </div>

                                            <div class="flex justify-end pt-4">
                                                <primary-button type="submit">
                                                    <play-icon class="size-4" />
                                                    <span>Join Game</span>
                                                </primary-button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div v-if="in_progress_games.length > 0" class="mt-2">
                            <h2>You also have the following games in progress:</h2>
                            <ul>
                                <li v-for="game in in_progress_games" :key="game.id">
                                    <x-link :href="route('games.show', { game })"
                                        class="text-blue-600 hover:underline hover:text-blue-500 focus:text-blue-600 transition duration-150 ease-in">
                                        {{ game.game_id }}
                                    </x-link>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <Chat :user="user" :messages="messages" channel="lobby" />
        </div>
    </layout>
</template>

