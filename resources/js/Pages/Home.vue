<script setup>
import Layout from "@/Layouts/Layout.vue";
import { Deferred, useForm, usePage } from "@inertiajs/vue3";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import ColorInput from "@/Components/ColorInput.vue";
import SelectInput from "@/Components/SelectInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { PlayIcon, PlusIcon } from "@heroicons/vue/24/outline";
import { RadioGroup, RadioGroupOption } from "@headlessui/vue";
import { onMounted, ref } from "vue";
import moment from "moment/moment";

const props = defineProps({
    user: {
        id: Number,
        username: String,
        color: String,
        token: String,
    },
    messages: Object
})


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

const audio = new Audio('/chirp.mp3');
audio.load();

const view = ref('new')
const online = ref([]);
const messageForm = ref(null);
const messages = ref([]);
const typing = ref(false);
const typingName = ref(null);
const lastMsgId = ref(null);
const app = usePage();

const ws = window.Echo.join('lobby')
    .here((users) => {
        users.forEach(user => online.value.push(user));
    })
    .joining((user) => {
        online.value.push(user);
        audio.play();
        messages.value.push({ type: 'join', content: `${user.username} has joined #lobby.` });
    })
    .leaving((user) => {
        audio.play();
        messages.value.push({ type: 'part', content: `${user.username} has left #lobby.` });
    })
    .listenForWhisper('typing', (event) => {
        typing.value = true;
        typingName.value = event.user.username;
        setTimeout(() => {
            typing.value = false
        }, 1500);
    })
    .listenForWhisper('stopTyping', () => {
        typing.value = false;
        typingName.value = null;
    })
    .listen('.message.sent', event => {
        messages.value.push({ type: event.type, from: event.from, content: event.message });
        audio.play();
    })

const sendMessage = () => {
    window.axios.post(route('messages.store'), message)
        .then(message => {
            messages.value.push({ type: message.type, from: message.from, content: message.message });
        })
        .finally(() => {
            message.reset('message');
        });
}

const message = useForm({
    message: '',
})

onMounted(() => {
    props.messages.reverse().forEach(msg => messages.value.push({ type: 'message', from: msg.user, content: msg }));
})
</script>

<template>
    <x-head title="New Game" />

    <layout>
        <div class="flex h-full w-full">
            <div class="w-full">
                <div class="flex items-center justify-center h-screen max-w-lg mx-auto">
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
                </div>
            </div>

            <div class="bg-gray-200 w-[30rem] border-l border-gray-400">
                <div class="flex flex-col justify-between h-full w-full">
                    <div>
                        <div class="text-gray-600 text-sm font-medium p-2">{{ online.length }} players online.</div>
                        <div class="h-[75vh] overflow-y-auto">
                            <div class="border-b border-gray-400" />
                            <div v-for="(user, i) in online" :key="i">
                                <div class="text-blue-600 px-2 py-0.5 font-mono">
                                    * {{ user.username }} is online
                                </div>
                            </div>
                            <div v-for="(message, i) in messages" :key="i">
                                <div v-if="message.type === 'join'"
                                     class="text-green-600 px-2 py-0.5 font-mono">
                                    * {{ message.content }}
                                </div>
                                <div v-if="message.type === 'part'"
                                     class="text-red-600 px-2 py-0.5 font-mono">
                                    * {{ message.content }}
                                </div>
                                <div v-if="message.type === 'message'"
                                     class="text-gray-800 px-2 py-0.5 font-mono">
                                    <span class="text-gray-600">
                                        [{{ moment(message.content.created_at).format("hh:mm A") }}]
                                    </span>
                                    &lt;<span class="text-pink-500 font-bold">{{ message.from.username }}</span>&gt;
                                    {{ message.content.message }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col w-full">
                        <form @submit.prevent="sendMessage" ref="messageForm" class="w-full px-4 pb-4 pt-2">
                        <textarea rows="2" id="message" v-model="message.message"
                                  @keydown.enter.prevent="sendMessage"
                                  @keydown="ws.whisper('typing', { user: app.props.user })"
                                  @blur="ws.whisper('stopTyping')"
                                  class="w-full resize-none placeholder:text-gray-400 p-1.5 border border-gray-500 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent"
                                  placeholder="Send a message..." />
                            <div class="flex justify-between mt-2">
                                <div>
                                    <div class="text-sm text-gray-600 font-bold" v-if="typing">
                                        {{ typingName }} is typing...
                                    </div>
                                </div>

                                <primary-button>Send</primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </layout>
</template>

