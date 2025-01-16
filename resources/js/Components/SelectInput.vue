<template>
    <Listbox as="div" v-model="selected">
        <div class="relative mt-2">
            <ListboxButton
                class="grid w-full cursor-default grid-cols-1 rounded-md bg-white py-1.5 pl-3 pr-2 text-left text-gray-900 border border-gray-500 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                <span class="col-start-1 row-start-1 truncate pr-6">{{ selected.icon }} <span
                    class="text-gray-700">{{ selected.label }}</span></span>
                <ChevronUpDownIcon
                    class="col-start-1 row-start-1 size-5 self-center justify-self-end text-gray-500 sm:size-4"
                    aria-hidden="true" />
            </ListboxButton>

            <transition leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100"
                        leave-to-class="opacity-0">
                <ListboxOptions
                    class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base border border-gray-500 focus:outline-none sm:text-sm">
                    <ListboxOption as="template" v-for="(option, i) in options" :key="i" :value="option"
                                   v-slot="{ active, selected }">
                        <li :class="[active ? 'bg-blue-600 text-white outline-none' : 'text-gray-900', 'relative cursor-default select-none py-2 pl-6 pr-9']">
                            <span v-if="selected"
                                  :class="[active ? 'text-white' : 'text-blue-600', 'absolute inset-y-0 left-0 flex items-center pl-3']">
                                <CheckIcon class="size-4" aria-hidden="true" />
                            </span>
                            <span :class="[selected ? 'font-semibold text-white' : 'font-normal', 'inline-flex pl-3']">
                                <span>{{ option.icon }}</span>
                                <span :class="[active ? 'text-white' : 'text-gray-800', 'pl-2']">{{ option.label
                                    }}</span>
                            </span>
                        </li>
                    </ListboxOption>
                </ListboxOptions>
            </transition>
        </div>
    </Listbox>
</template>

<script setup>
import { ref } from 'vue'
import { Listbox, ListboxButton, ListboxOption, ListboxOptions } from '@headlessui/vue'
import { ChevronUpDownIcon } from '@heroicons/vue/16/solid'
import { CheckIcon } from '@heroicons/vue/20/solid'

const props = defineProps({
    options: {
        type: Array
    },
    selectedToken: String
})

const selected = ref(props.options.filter(opt => opt.icon === props.selectedToken)[0]);
</script>
