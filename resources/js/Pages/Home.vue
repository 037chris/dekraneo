<template>

    <Head :title="`${title} | FAQ`">
        <meta head-key="description" :content="text" />
    </Head>

    <div class="max-w-6xl mx-auto p-4 space-y-4">

        <!-- Kategorie-Buttons -->
        <div class="mb-6 flex flex-wrap gap-2">
            <button v-for="cat in categories" :key="cat" @click="selected = cat" :class="[
                'px-4 py-2 rounded-full transition cursor-pointer',
                selected === cat
                    ? 'bg-[var(--clr-custom-green-400)] text-white font-bold'
                    : 'bg-gray-200 text-gray-700 hover:bg-gray-300'
            ]">
                {{ cat }}
            </button>
        </div>

        <p class="text-xl font-semibold">
            Fragen aus dem Bereich {{ selected }}
        </p>

        <!-- Gefilterte FAQs im Accordion -->
        <div class="space-y-4">
            <Accordion v-for="faq in filteredFaqs" :key="faq.id" :question="faq.question" :answer="faq.answer" />
        </div>



    </div>
</template>

<script setup>
import { defineProps, ref, computed } from 'vue'
import { Link } from '@inertiajs/vue3'
import Accordion from '@/Components/Accordion.vue'

const props = defineProps({
    categories: Array,
    faqs: Array,
    title: { type: String, default: 'FAQ' },
    text: { type: String, default: '' },
})

// aktuell ausgewählte Kategorie, default erste
let selected = ref(props.categories[0])
//console.log("selected " + selected)

// Computed Property für gefilterte FAQs
const filteredFaqs = computed(() =>
    props.faqs.filter(faq => faq.category.name === selected.value)
)
</script>
