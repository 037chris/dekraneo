<template>
    <Teleport to="body">
        <div v-if="show" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-50 flex items-center justify-center"
            @click.self="close">
            <div class="bg-[var(--clr-gray-100)] rounded-[20px] shadow-lg w-full max-w-md p-6">
                <div class="flex items-baseline justify-between mb-4 gap-8">
                    <div>
                        <h2 class="text-2xl font-semibold text-[var(--clr-custom-green-300)]">Neuen Tag erstellen</h2>
                        <p class="text-xs text-[var(--clr-gray-600)] mt-2">Vergeben Sie ein aussagekräftigen Namen für den neuen Tag</p>
                    </div>

                    <button
                        class="w-8 h-8 text-white rounded-[4px] bg-[var(--clr-custom-green-300)] hover:bg-[var(--clr-custom-green-200)] hover:text-gray-800 cursor-pointer transition duration-200"
                        @click="close">&times;</button>
                </div>
                <form @submit.prevent="submit">
                    <TextInput v-model="form.name" label="Tag-Name" type="text" placeholder="Name des Tags"
                        :error="form.errors.name" autofocus />

                    <div class="flex gap-2 mt-4">
                        <button type="submit" @click="close"
                            class="w-full bg-red-600 text-white py-2 rounded hover:bg-[var(--clr-custom-green-200)] disabled:opacity-50">
                            Abbrechen
                        </button>

                        <button type="submit" :disabled="form.processing"
                            class="w-full bg-[var(--clr-custom-green-300)] text-[var(--clr-custom-green-200)] py-2 rounded hover:bg-[var(--clr-custom-green-200)] disabled:opacity-50">
                            Erstellen
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </Teleport>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import TextInput from '@/Components/TextInput.vue'

const props = defineProps({
    show: { type: Boolean, required: true }
})
const emit = defineEmits(['update:show', 'created'])

function close() {
    emit('update:show', false)
}

const form = useForm({
    name: ''
})

function submit() {
    // Post to your tag creation endpoint
    form.post('/tags', {
        onSuccess: (page) => {
            emit('created', form.data)
            close()
        }
    })
}
</script>
