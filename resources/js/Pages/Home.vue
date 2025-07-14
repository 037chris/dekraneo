<template>
    <Head title="| FAQ">
        <meta head-key="description" content="Home desc is following">
    </Head>
    <div class="max-w-3xl mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">FAQ</h1>
        <div v-for="faq in faqs" :key="faq.id" class="mb-4">
            <Link :href="`/faqs/${faq.id}`" class="block text-lg text-green-600">
                {{ faq.question }}
            </Link>
            <p>{{ faq.answer }}</p>
            <small class="text-sm">Kategorie: {{ faq.tag.name }}</small>
        </div>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';

const props = defineProps({
    faqs: Array
});
</script>
