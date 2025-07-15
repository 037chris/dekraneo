<script setup>
import { Link, Head } from '@inertiajs/vue3';
import Navbar from './Navbar.vue'
import Footer from './Footer.vue'
import Searchbar from '../Components/Searchbar.vue'


const props = defineProps({
    /** Überschrift */
    title: { type: String, required: true },
    /** Beschreibungstext */
    text: { type: String, default: '' },
})

</script>

<template>

    <Head>
        <meta head-key="description" name="description" content="default description">
        <title>Placeholder</title>
    </Head>

    <body>
        <header class="relative lg:pt-[105px] lg:pb-[95px] bg-[var(--clr-custom-green-600)] place-items-center">
            <Navbar />
            <div class="grid text-white max-w-6xl">
                <div class="place-items-center py-8 px-4 md:px-16 mt-[85px] lg:mt-[40px] header-design">
                    <h1 class="text-3xl md:text-4xl lg:text-5xl tracking-wider font-light mb-2 z-index-10">{{ title }}</h1>
                    <p class="text-center font-light md:text-lg max-w-[900px] relative z-index-10">{{ text }}</p>
                    <!-- <Searchbar /> -->
                </div>
            </div>

        </header>
        <main>
            <slot />
        </main>
        <Footer />
    </body>

</template>