<script setup>
import { onMounted, ref, defineProps, defineEmits, defineExpose } from 'vue'

// Props für v-model und weitere Einstellungen
const props = defineProps({
    modelValue: { type: [String, Number], required: true },
    autofocus: { type: Boolean, default: false },
    placeholder: { type: String, default: '' },
    type: { type: String, default: 'text' },
})

// Emit für v-model
const emit = defineEmits(['update:modelValue'])

// Lokales Ref ans Input-Element
const input = ref(null)

onMounted(() => {
    if (props.autofocus && input.value) {
        input.value.focus()
    }
})

defineExpose({ focus: () => input.value && input.value.focus() })

function updateValue(e) {
    emit('update:modelValue', e.target.value)
}
</script>

<template>
    <input ref="input" :type="type" :value="props.modelValue" @input="updateValue" :placeholder="placeholder"
        class="w-full rounded border-gray-300 shadow-sm bg-white border px-3 py-2 placeholder-gray-400 focus:outline-none" />
</template>
