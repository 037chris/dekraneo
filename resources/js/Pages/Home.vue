<template>

    <Head :title="`${title} | FAQ`">
        <meta head-key="description" :content="text" />
    </Head>

    <div class="max-w-3xl mx-auto p-4">
        <div v-for="faq in faqs" :key="faq.id" class="mb-4">
            <Link :href="`/faqs/${faq.id}`" class="block text-lg text-green-600">
            {{ faq.question }}
            </Link>
            <p>{{ faq.answer }}</p>
            <small class="text-sm">Kategorie: {{ faq.category.name }}</small>
        </div>
    </div>
</template>

<script setup>
import { defineProps } from 'vue'
import { Link } from '@inertiajs/vue3'

const props = defineProps({
    faqs: Array,
    title: { type: String, default: 'FAQ' },
    text: { type: String, default: '' },
})
</script>
