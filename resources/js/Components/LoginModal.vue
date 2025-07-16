<template>
    <Teleport to="body">
        <div v-if="show" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-1 flex items-center justify-center z-50"
            @click.self="close">
            <div class="bg-[var(--clr-gray-100)] rounded-[20px] shadow-lg w-full max-w-md p-6">
                <div class="flex items-baseline justify-between mb-4">
                    <h2 class="text-2xl font-semibold text-[var(--clr-custom-green-300)]">Login</h2>
                    <button
                        class="w-8 h-8 text-white rounded-[4px] bg-[var(--clr-custom-green-300)] hover:bg-[var(--clr-custom-green-200)] hover:text-gray-800 cursor-pointer transition duration-200"
                        @click="close">&times;</button>
                </div>
                <form @submit.prevent="submit">
                    <div class="mb-4">
                        <label class="hidden">E-Mail</label>
                        <TextInput v-model="form.email" label="E-Mail" type="email" placeholder="E-Mail"
                            :error="form.errors.email" autofocus />
                    </div>

                    <div class="mb-4">
                        <label class="hidden">Passwort</label>
                        <TextInput v-model="form.password" label="Passwort" type="password" placeholder="Passwort"
                            :error="form.errors.password" />
                    </div>

                    <div class="flex items-center justify-between mb-4">
                        <label class="inline-flex items-center text-sm">
                            <input v-model="form.remember" type="checkbox" class="
                                appearance-none
                                h-5 w-5
                                bg-white
                                border border-gray-200
                                rounded
                                cursor-pointer
                                transition
                                duration-150
                                focus:outline-none focus:ring-0
                                checked:bg-[var(--clr-custom-green-400)]
                                checked:border-[var(--clr-white)] " />
                            <span class="ml-2">Angemeldet bleiben</span>
                        </label>
                    </div>

                    <button type="submit" :disabled="form.processing"
                        class="w-full bg-[var(--clr-custom-green-300)] text-[var(--clr-custom-green-200)] py-2 rounded hover:bg-green-700 disabled:opacity-50">
                        Anmelden
                    </button>
                </form>
            </div>
        </div>
    </Teleport>
</template>

<script setup>
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3'
import TextInput from '@/Components/TextInput.vue'

const props = defineProps({ show: { type: Boolean, required: true } })
const emit = defineEmits(['update:show'])

function close() {
    emit('update:show', false)
}

const form = useForm({
    email: '',
    password: '',
    remember: false,
})

function submit() {
    form.post('/login', {
        onSuccess: () => close(),
    })
}
</script>
