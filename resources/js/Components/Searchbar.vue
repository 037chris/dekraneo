<template>
    <form @submit.prevent="onSearch" class="flex max-w-md mx-auto mt-[20px]">
        <input v-model="query" type="text" placeholder="Suche nach etwas..." class="
        flex-1 
        bg-white 
        border-none 
        border-r 
        border-r-gray-300 
        rounded-tl-[10px] 
        rounded-bl-[10px] 
        px-4 
        py-2 
        focus:outline-none 
        focus:none
        text-black
        placeholder-black
        " />
        <button type="submit"
            class="bg-[var(--clr-custom-green-200)] hover:bg-[var(--clr-custom-green-400)] text-[var(--clr-custom-green-600)] font-semibold px-4 py-2 rounded-r">
            Suchen
        </button>
    </form>
</template>

<script setup>
import { ref } from 'vue';

const query = ref('');

function onSearch() {
    console.log('Suche nach:', query.value);
}
</script>
