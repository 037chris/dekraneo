<template>
    <footer class="py-4 pt-[35px]">
        <div class="max-w-6xl mx-auto text-center text-[var(--clr-custom-green-600)]">
            {{ year }} | DEKRA Neo GmbH
        </div>
    </footer>
</template>

<script setup>
    const year = new Date().getFullYear()
</script>
