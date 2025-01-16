<template>
    <div class="col-span-3 h-screen overflow-y-none">
        <div class="bg-gray-200 h-screen border-l border-gray-400">
            <div class="flex flex-col justify-between h-full w-full">
                <div>
                    <div class="text-gray-600 text-sm font-medium p-2">{{ online.length }} players online.</div>
                    <div class="h-[75vh] overflow-y-scroll">
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
                                  class="w-full bg-white resize-none placeholder:text-gray-400 p-1.5 border border-gray-500 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent"
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
</template>
<script setup>
import { useForm, usePage, usePoll } from "@inertiajs/vue3";
import { onMounted, ref } from "vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import moment from 'moment/moment';

const online = ref([]);
const messageForm = ref(null);
const messages = ref([]);
const typing = ref(false);
const typingName = ref(null);
const app = usePage();

const audio = new Audio('/chirp.mp3');
audio.load();

const props = defineProps({
    user: Object,
    messages: Object,
    game: Object,
    channel: String,
});

const channel = props.game !== undefined ? props.game.game_id : 'lobby';

const ws = window.Echo.join(props.channel)
    .here((users) => {
        users.forEach(user => online.value.push(user));
    })
    .joining((user) => {
        online.value.push(user);
        audio.play();
        messages.value.push({ type: 'join', content: `${user.username} has joined #${channel}` });
    })
    .leaving((user) => {
        audio.play();
        messages.value.push({ type: 'part', content: `${user.username} has left #${channel}.` });
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
    game_id: props.game?.game_id
})

onMounted(() => {
    props.messages.reverse().forEach(msg => messages.value.push({ type: 'message', from: msg.user, content: msg }));
});
</script>
