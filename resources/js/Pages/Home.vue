<template>

    <Head :title="`${title} | FAQ`">
        <meta head-key="description" :content="text" />
    </Head>

    <div class="max-w-6xl mx-auto p-4 space-y-4">
        <Accordion v-for="faq in faqs" :key="faq.id" :question="faq.question" :answer="faq.answer" />
    </div>
</template>

<script setup>
import { defineProps } from 'vue'
import { Link } from '@inertiajs/vue3'
import Accordion from '@/Components/Accordion.vue'

const props = defineProps({
    faqs: Array,
    title: { type: String, default: 'FAQ' },
    text: { type: String, default: '' },
})
</script>
