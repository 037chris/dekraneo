<template>
    
    <Head :title="`${title} | FAQ`">
        <meta head-key="description" :content="text" />
    </Head>

    <div class="max-w-6xl mx-auto p-4 space-y-4">

        <!-- Kategorie-Buttons -->
        <div class="mb-6 flex flex-wrap gap-2 lg:gap-6 justify-between">
            <button v-for="cat in categories" :key="cat" @click="selected = cat"
                class="relative text-left text-xl px-6 py-11 rounded-[25px] transition cursor-pointer overflow-hidden w-[48%] md:flex-1 shadow-lg border border-white"
                :class="selected === cat
                    ? 'bg-[var(--clr-custom-green-400)] text-[var(--clr-custom-green-200)] !border-[var(--clr-custom-green-200)]'
                    : 'bg-[var(--clr-white)] border-[var(--clr-custom-green-200)] hover:bg-[var(--clr-custom-green-400)] hover:text-[var(--clr-custom-green-200)]'">
                {{ cat }}

                <!-- badge -->
                <span
                    class="absolute top-[-10px] right-[-10px] h-19 w-19 bg-[var(--clr-darkgreen-100)] rounded-full flex items-center justify-center">
                    <img v-if="cat === 'Allgemeines'" :src="allgemeines" alt="Allgemeines Icon" class="text-[var(--clr-custom-green-400)] h-10 w-10" />
                    <img v-else-if="cat === 'Services'" :src="services" alt="Services Icon" class="text-[var(--clr-custom-green-400)] h-10 w-10" />
                    <img v-else-if="cat === 'Medien'" :src="medien" alt="Medien Icon" class="text-[var(--clr-custom-green-400)] h-10 w-10" />
                    <img v-else-if="cat === 'Zahlungen'" :src="zahlungen" alt="Zahlungen Icon" class="text-[var(--clr-custom-green-400)] h-10 w-10" />
                </span>
            </button>
        </div>





        <p class="text-xl text-[var(--clr-custom-green-400)]">
            Fragen aus dem Bereich <span class="font-bold">{{ selected }}</span>
        </p>

        <!-- Gefilterte FAQs im Accordion -->
        <div class="space-y-4">
            <Accordion v-for="faq in filteredFaqs" :key="faq.id" :question="faq.question" :answer="faq.answer" />
        </div>



    </div>
</template>

<script setup>
import { defineProps, ref, computed } from 'vue'
import Accordion from '@/Components/Accordion.vue'
import allgemeines from '@/assets/icons/icon-categorie-allgemeines.svg?component'
import medien from '@/assets/icons/icon-categorie-medien.svg?component'
import zahlungen from '@/assets/icons/icon-categorie-payment.svg?component'
import services from '@/assets/icons/icon-categorie-services.svg?component'


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
