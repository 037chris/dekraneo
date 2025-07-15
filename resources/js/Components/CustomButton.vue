<template>
    <button :class="[
        'inline-flex items-center px-4 py-2 focus:outline-none focus:ring-2 focus:ring-offset-2',
        bgColorClass,
        textColorClass,
        { 'opacity-50 cursor-not-allowed': disabled }
    ]" :style="borderRadiusStyle" :disabled="disabled" @click="$emit('click', $event)">
        <component v-if="icon" :is="icon" class="h-5 w-5 mr-2 flex-shrink-0" aria-hidden="true" />
        <span>
            <slot />
        </span>
    </button>
</template>

<script setup>
import { computed, defineProps } from 'vue'

/**
 * Props Definition:
 * @prop {String} bgColor    - Hintergrundfarbe (Tailwind-Klasse oder CSS-Wert).
 * @prop {String} textColor  - Textfarbe (Tailwind-Klasse oder CSS-Wert).
 * @prop {Object|Function|null} icon       - Vue-Komponente als Icon vor dem Text.
 * @prop {Boolean} disabled   - Deaktiviert Button (setzt Opazität und Cursor).
 * @prop {String|null} radiusTL - Border-Radius oben links (z.B. '8px' oder '0.5rem').
 * @prop {String|null} radiusTR - Border-Radius oben rechts.
 * @prop {String|null} radiusBR - Border-Radius unten rechts.
 * @prop {String|null} radiusBL - Border-Radius unten links.
 */

const props = defineProps({
    bgColor: { type: String, default: 'bg-gray-200' },
    textColor: { type: String, default: 'text-black' },
    icon: { type: [Object, Function], default: null },
    disabled: { type: Boolean, default: false },
    radiusTL: { type: String, default: null },
    radiusTR: { type: String, default: null },
    radiusBR: { type: String, default: null },
    radiusBL: { type: String, default: null },
})

const bgColorClass = computed(() => props.bgColor)
const textColorClass = computed(() => props.textColor)

const borderRadiusStyle = computed(() => {
    const style = {}
    if (props.radiusTL) style.borderTopLeftRadius = props.radiusTL
    if (props.radiusTR) style.borderTopRightRadius = props.radiusTR
    if (props.radiusBR) style.borderBottomRightRadius = props.radiusBR
    if (props.radiusBL) style.borderBottomLeftRadius = props.radiusBL
    return style
})
</script>
