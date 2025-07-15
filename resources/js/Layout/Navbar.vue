<template>
    <nav :class="[
        'fixed top-0 left-0 right-0 z-50 backdrop-blur-sm transition-bg duration-100',
        scrolledPastMain ? 'bg-[var(--clr-custom-green-400)]' : 'bg-[var(--clr-custom-green-400)]/60'
    ]" role="navigation" aria-label="Hauptnavigation">

        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 flex items-center justify-between h-[105px]">
            <!-- Logo / Brand als Inertia-Link -->
            <div class="flex-shrink-0">
                <Link href="/" aria-label="Zur Startseite" class="inline-block">
                <img :src="logo" alt="DEKRA Logo" class="h-[45px] w-auto" />
                </Link>
            </div>

            <!-- Desktop-Navi -->
            <div class="hidden md:flex space-x-8 text-white">
                <Link href="/" :class="[
                    ' hover:text-[var(--clr-custom-green-200)]',
                    isActive('Home') ? 'font-bold !text-[var(--clr-custom-green-200)]' : ''
                ]">
                FAQ
                </Link>

                <Link href="/tags" :class="[
                    ' hover:text-[var(--clr-custom-green-200)]',
                    isActive('Tags') ? 'font-bold text-[var(--clr-custom-green-200)]' : ''
                ]">
                Tags
                </Link>

                <Link href="/login" class="hover:text-[var(--clr-custom-green-200)]">
                Login
                </Link>
            </div>

            <!-- Burger-Icon (Mobile) -->
            <button @click="open = !open"
                class="md:hidden inline-flex items-center justify-center p-2 rounded-md text-[var(--clr-custom-green-600)] bg-[var(--clr-custom-green-200)] cursor-pointer focus:outline-none"
                :aria-expanded="open.toString()" aria-controls="mobile-menu" aria-label="Hauptmenü umschalten">
                <span class="sr-only">Menü {{ open ? 'schließen' : 'öffnen' }}</span>

                <!-- Neues Open-Icon -->
                <svg v-if="!open" viewBox="0 0 48 49" xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6 fill-[var(--clr-custom-green-600)]" fill="currentColor">
                    <path
                        d="M46.1538 35.3874C47.1734 35.3874 47.9999 36.1737 48 37.1435C48 38.1134 47.1735 38.8996 46.1538 38.8996H9.23077C8.21117 38.8996 7.38462 38.1134 7.38462 37.1435C7.38471 36.1737 8.21123 35.3874 9.23077 35.3874H46.1538ZM46.1538 22.7439L46.3422 22.7525C47.2734 22.8423 48 23.5907 48 24.5C47.9998 25.4093 47.2732 26.1569 46.3422 26.2467L46.1538 26.2561H1.84615C0.826672 26.2561 0.000195271 25.4698 0 24.5C0 23.5302 0.826551 22.7439 1.84615 22.7439H46.1538ZM46.1538 10.0996C47.1735 10.0996 48 10.8858 48 11.8557C48 12.8256 47.1735 13.6118 46.1538 13.6118H24C22.9804 13.6118 22.1538 12.8256 22.1538 11.8557C22.1538 10.8858 22.9804 10.0996 24 10.0996H46.1538Z"
                        fill="white" />
                </svg>

                <!-- Close-Icon bleibt unverändert -->
                <svg v-else class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" v-show="open" class="md:hidden p-4 bg-var(--clr-custom-green-400)] border-t border-var(--clr-custom-green-200)]"
            :aria-hidden="(!open).toString()">
            <Link href="/" class="text-white block px-4 py-2 text-gray-700 hover:bg-gray-100">
            Home
            </Link>
            <Link href="/tags" class="text-white block px-4 py-2 text-gray-700 hover:bg-gray-100">
            Tags
            </Link>
            <Link href="/login" class="text-white block px-4 py-2 text-gray-700 hover:bg-gray-100">
            Login
            </Link>
        </div>
    </nav>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue'
import { usePage } from '@inertiajs/vue3'
import logo from '@/assets/dekra-logo-white.svg'

const open = ref(false)
const page = usePage()

// route
console.log(page.component)

// Hilfsfunktion für Active-Check
const isActive = (name) => page.component === name


// navi scroll check

const scrolledPastMain = ref(false)
let mainOffsetTop = 0
function onScroll() {
    scrolledPastMain.value = window.scrollY >= mainOffsetTop
}

onMounted(() => {
    // ermittel die Position des main-Elements
    const main = document.querySelector('main')
    if (main) {
        mainOffsetTop = main.getBoundingClientRect().top + window.scrollY
    }
    window.addEventListener('scroll', onScroll, { passive: true })
})

onBeforeUnmount(() => {
    window.removeEventListener('scroll', onScroll)
})
</script>
