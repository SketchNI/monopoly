<script setup>
import Layout from "@/Layouts/Layout.vue";
import { useForm, usePage } from "@inertiajs/vue3";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

defineOptions({ layout: Layout });

const page = usePage();

const form = useForm({
    username: '',
});

const doLogin = () => {
    form.post(route('login'));
}
</script>

<template>
    <x-head title="Log In" />

    <div class="flex items-center justify-center h-screen max-w-md mx-auto">
        <div class="rounded-md shadow-sm bg-gray-50 w-full p-6">
            <h1 class="text-2xl mb-4">Log In!</h1>

            <form @submit.prevent="doLogin" class="flex flex-col space-y-4">
                <div v-if="page.props.app.hasOwnProperty('flash') && page.props.app.flash !== null">
                    <div v-if="page.props.app.flash.type === 'success'"
                         class="bg-green-700 text-white rounded-md shadow-sm shadow-gray-700 text-base px-6 py-4">
                        {{ page.props.app.flash.message }}
                    </div>
                    <div v-else-if="page.props.app.flash.type === 'error'"
                         class="bg-red-700 text-white rounded-md shadow-sm shadow-gray-700 text-base px-6 py-4">
                        {{ page.props.app.flash.message }}
                    </div>
                </div>

                <div>
                    <input-label for="username" value="Username" />
                    <text-input type="text" id="username" v-model="form.username" />
                    <input-error :message="form.errors.username" />
                </div>

                <div class="flex justify-end">
                    <primary-button type="submit">
                        Log In
                    </primary-button>
                </div>
            </form>
        </div>
    </div>
</template>

<style scoped>

</style>
