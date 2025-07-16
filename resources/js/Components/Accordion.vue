<template>
    <div :class="[
        'rounded-[20px] border transition-colors overflow-hidden w-full',
        open
            ? 'bg-[var(--clr-custom-green-300)] border-[var(--clr-custom-green-300)]'
            : 'bg-[var(--clr-gray-100)] border-[var(--clr-gray-200)]'
    ]">
        <button class="w-full flex items-center justify-between px-6 py-4 cursor-pointer focus:outline-none" @click="toggle">
            <span :class="[
                'font-semibold text-left',
                open ? 'text-[var(--clr-gray-100)]' : 'text-[var(--clr-custom-green-300)]'
            ]">
                <span class="text-lg">{{ question }}</span>
            </span>
            <span class="inline-flex items-center justify-center flex-none h-10 w-10 rounded-full transition-colors duration-200"
                :class="open
                    ? 'bg-[var(--clr-custom-green-100)]'
                    : 'bg-[var(--clr-custom-green-300)]'">
                <svg class="h-7 w-7 transform transition-transform duration-200"
                    :class="open ? 'rotate-180 text-[var(--clr-custom-green-300)]' : 'rotate-0 text-[var(--clr-gray-200)]'"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 9l-7 7-7-7" />
                </svg>
            </span>
        </button>
        <div v-if="open" class="px-6 pb-6 border-t border-transparent">
            <p class="text-xl text-[var(--clr-gray-100)]">
                {{ answer }}
            </p>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue'
const props = defineProps({
    /** Frage */
    question: { type: String, required: true },
    /** Antwort */
    answer: { type: String, required: true }
})
const open = ref(false)
function toggle() {
    open.value = !open.value
}
</script>
