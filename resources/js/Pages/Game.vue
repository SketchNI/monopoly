<script setup>
import Layout from "@/Layouts/Layout.vue";
import { onMounted, ref } from "vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    user: Object,
    players: Array,
    messages: Array,
    game: Object,
});

const online = ref(null);
const messages = ref([]);
const typing = ref(false);
const typingName = ref(null);

const audio = new Audio('/chirp.mp3');
audio.load();

const ws = window.Echo.join(`game.${props.game.game_id}`)
    .here((users) => {
        users.forEach(user => online.value.push(user));
    })
    .joining((user) => {
        online.value.push(user);
        audio.play();
        messages.value.push({ type: 'join', content: `${user.username} has joined #${props.game.game_id}.` });
    })
    .leaving((user) => {
        audio.play();
        messages.value.push({ type: 'part', content: `${user.username} has left #${props.game.game_id}.` });
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
        messages.value.push({
            type: event.type,
            game_id: event.message.game_id,
            from: event.from,
            content: event.message
        });
        audio.play();
    });

const sendMessage = () => {
    window.axios.post(route('messages.store'), message)
        .then(message => {
            messages.value.push({
                type: message.type,
                game_id: message.game_id,
                from: message.from,
                content: message.message
            });
        })
        .finally(() => {
            message.reset('message');
        });
}

const message = useForm({
    message: '',
    game_id: props.game.game_id,
});

onMounted(() => {
    props.messages.reverse().forEach(msg => messages.value.push({
        type: 'message',
        game_id: msg.game_id,
        from: msg.user,
        content: msg
    }));
})
</script>

<template>
    <x-head :title="`Playing Game '${game.game_id}'`" />

    <layout>

    </layout>
</template>

<style scoped>

</style>
