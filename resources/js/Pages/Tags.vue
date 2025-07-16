<template>
    <div class="max-w-6xl mx-auto p-4 space-y-4">

        <Head title="| Tags" />

        <div class="flex items-center justify-between mb-4">


            <div class="flex flex-col">
                <h2 class="text-lg text-[var(--clr-custom-green-400)]">
                    Tag Verwaltung
                </h2>
                <span class="text-[var(--clr-gray-600)] text-xs">
                    {{ totalTags }} Tags insgesamt
                </span>
            </div>

            <button @click="showTagModal = true">Neuen Tag erstellen</button>
            <CreateTagModal v-model:show="showTagModal" @created="(name) => console.log('Neuer Tag:', name)" />
        </div>

        <table class="
            min-w-full
            bg-white
            rounded-[8px]
            border-collapse      
            divide-y divide-white
            divide-x divide-white 
            shadow-lg
        ">
            <thead>
                <tr class="bg-[var(--clr-custom-green-400)] text-[var(--clr-custom-green-200)] text-sm">
                    <th class="px-4 py-3 text-left rounded-tl-[8px] border-r border-white">Name</th>
                    <th class="px-4 py-3 text-left border-r border-white">Erstellt am</th>
                    <th v-if="user" class="px-4 py-3 text-left rounded-tr-[8px]">
                        Aktionen
                    </th>
                </tr>
            </thead>

            <tbody class="border border-[var(--clr-gray-200)] rounded-bl-[8px] rounded-br-[8px]">
                <tr v-for="tag in tags.data" :key="tag.id"
                    class="text-sm border-b border-white bg-[var(--clr-gray-100)] last:border-0 hover:bg-gray-50">
                    <td class="px-4 py-3 border-r border-white">{{ tag.name }}</td>
                    <td class="px-4 py-3 border-r border-white">{{ new
                        Date(tag.created_at).toLocaleDateString('de-DE', {
                            day: '2-digit',
                            month: '2-digit', year: 'numeric'
                        }) }}</td>
                    <td v-if="user" class="px-4 py-2 space-x-2">
                        <button class="text-blue-600 hover:underline">Bearbeiten</button>
                        <!-- Delete-Button -->
                        <button @click="openDelete(tag)" class="text-red-600 hover:underline">
                            Löschen
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- Delete-Modal -->
        <DeleteConfirmationModal v-model:show="deleteModalOpen"
            :tagName="`${tagToDelete.name}`"
            @confirm="deleteTag(tagToDelete.id, tagToDelete.name)" />

        <!-- Pagination -->
        <div class="mt-6 flex justify-center">
            <ul class="flex gap-1 text-sm">
                <li v-for="link in tags.links" :key="link.label" class="flex-1">
                    <Link v-if="link.url" :href="link.url" :class="[
                        'block w-full text-center text-xs px-0.5 py-1 rounded-[3px] border',
                        link.active
                            ? 'bg-[var(--clr-custom-green-400)] text-white border-transparent'
                            : 'border-[var(--clr-custom-green-400)] text-[var(--clr-custom-green-400)] bg-white hover:bg-[var(--clr-custom-green-400)] hover:text-white transition duration-200',
                    ]">
                    {{ link.label }}
                    </Link>
                    <span v-else
                        class="block w-full text-center text-xs px-0.5 py-1 rounded-[3px] border border-[var(--clr-custom-green-400)] text-[var(--clr-custom-green-400)] bg-white">
                        {{ link.label }}
                    </span>
                </li>
            </ul>
        </div>



    </div>
</template>

<script setup>
import { usePage, Link, Head } from '@inertiajs/vue3'
import { ref } from 'vue'
import CreateTagModal from '@/Components/CreateTagModal.vue'
import DeleteConfirmationModal from '@/Components/DeleteConfirmationModal.vue'
import { Inertia } from '@inertiajs/inertia'

const page = usePage()

const props = defineProps({
    tags: Object,
    totalTags: Number,

})

const user = page.props.auth.user
const showTagModal = ref(false)
const deleteModalOpen = ref(false)
const tagToDelete = ref({ id: null, name: '' })

function openDelete(tag) {
    tagToDelete.value = tag
    deleteModalOpen.value = true
}

// function deleteTag(id, name) {
//     if (!confirm(`Tag „${name}“ wirklich löschen?`)) {
//         return
//     }
//     Inertia.delete(route('tags.destroy', id), {
//         onSuccess: () => {
//             // FLUSH ERGÄNZEN
//         }
//     })
// }
</script>
