<template>
    <Teleport to="body">
        <div v-if="show" class="fixed top-[100px] inset-0 bg-black/40 backdrop-blur-sm z-50 flex items-center justify-center"
            @click.self="close">
            <div class="bg-[var(--clr-white)] rounded-[20px] shadow-lg w-full max-w-lg p-6">
                <div class="flex items-baseline justify-between mb-4 gap-6">
                    <h2 class="text-2xl font-semibold text-[var(--clr-custom-green-300)]">Sind Sie sich sicher, dass Sie
                        den folgen Tag löschen wollen?</h2>

                    <button
                        class="min-w-8 min-h-8 text-white rounded-[4px] bg-[var(--clr-custom-green-300)] hover:bg-[var(--clr-custom-green-200)] hover:text-gray-800 cursor-pointer transition duration-200"
                        @click="close">&times;</button>
                </div>
                <div>
                    <p class="text-sm text-[var(--clr-gray-600)] mt-2">Tag</p>
                    <p class="text-[var(--clr-gray-600)] mt-2 bold">{{ tagName }}</p>
                </div>
                <div class="flex mt-4 justify-between">
                    <button type="button"
                        class="px-3 py-2 bg-gray-400 text-white py-2 rounded hover:bg-gray-300 transition"
                        @click="close">
                        Abbrechen
                    </button>
                    <button type="button"
                        class="px-3 py-2 bg-red-600 text-white py-2 rounded hover:bg-red-500 transition"
                        @click="confirm">
                        {{ confirmText }}
                    </button>
                </div>
            </div>
        </div>
    </Teleport>
</template>

<script setup>
const props = defineProps({
    show: { type: Boolean, required: true },
    title: { type: String, default: 'Löschen bestätigen' },
    tagName: { type: String, required: true },
    confirmText: { type: String, default: 'Löschen' }
})
const emit = defineEmits(['update:show', 'confirm'])

function close() {
    emit('update:show', false)
}

function confirm() {
    emit('confirm')
    close()
}
</script>
