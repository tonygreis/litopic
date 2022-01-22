<template>
    <Head title="Tags Index" />
    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Lessons Index
            </h2>
        </template>
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                    <section class="container mx-auto p-6 font-mono">
                        <div class="w-full flex mb-4 p-2 justify-end">
                            <form @submit.prevent="storeLesson" class="flex space-x-4 shadow bg-white rounded-md m-2 p-2">
                                <div class="p-1 flex items-center">
                                    <label for="tmdb_id_g" class="block text-sm font-medium text-gray-700 mr-4">
                                        Youtube Id</label>
                                    <div class="relative rounded-md shadow-sm">
                                        <input
                                            v-model="form.youtubeId"
                                            id="tmdb_id_g"
                                            name="tmdb_id_g"
                                            class="px-3 py-2 border border-gray-300 rounded"
                                            placeholder="Youtube ID">
                                    </div>
                                </div>
                                <div class="p-1">
                                    <button type="submit"
                                            class="inline-flex items-center justify-center py-2 px-4 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-green-600 hover:bg-green-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-green-700 transition duration-150 ease-in-out disabled:opacity-50">
                                        <span>Generate</span></button>
                                </div>
                            </form>
                        </div>

                        <div  v-if="lessons.data.length"
                            class="w-full mb-8 overflow-hidden bg-white rounded-lg shadow-lg"
                        >
                            <div class="p-2 m-2">
                                <Filter v-model:search="search" v-model:per-page="perPage" @getPerPage="getLessons" />
                            </div>

                            <div class="w-full overflow-x-auto border-b border-gray-200 sm:rounded-lg">
                                <Table>
                                    <template v-slot:tableHeader>
                                        <TableHead>Name</TableHead>
                                        <TableHead>Slug</TableHead>
                                        <TableHead></TableHead>
                                    </template>
                                    <TableRow v-for="lesson in lessons.data" :key="lesson.id">
                                        <TableData>{{ lesson.title }}</TableData>
                                        <TableData>{{ lesson.slug }}</TableData>
                                        <TableData>
                                            <div class="flex space-x-2">
                                                <ButtonLink :link="`/admin/series/${serie.id}/lessons/${lesson.id}/edit`">Edit</ButtonLink>
                                                <ButtonLink
                                                    class="bg-red-500 hover:bg-red-700"
                                                    method="delete"
                                                    as="button"
                                                    type="button"
                                                    :link="`/admin/series/${serie.id}/lessons/${lesson.id}`">Delete</ButtonLink>
                                            </div>
                                        </TableData>
                                    </TableRow>
                                </Table>
                                <div class="m-2 p-2" v-if="lessons">
                                    <Pagination :links="lessons.links" />
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import { Head, useForm } from '@inertiajs/inertia-vue3';
import AdminLayout from "@/Layouts/Admin"
import ButtonLink from "@/Components/ButtonLink";
import Filter from "@/Components/Filter";
import Table from "@/Components/Table";
import TableHead from "@/Components/TableHead";
import TableRow from "@/Components/TableRow";
import TableData from "@/Components/TableData";
import Pagination from "@/Components/Pagination";
import { ref, defineProps, watch} from "vue";
import {Inertia} from "@inertiajs/inertia";

const props = defineProps({
    serie: Object,
    filters: Object,
    lessons: Object
});

const search = ref(props.filters.search);
const perPage = ref(props.filters.perPage);

const form = useForm({
    youtubeId: ''
})

watch(search, (value) => {
    Inertia.get(
        `/admin/series/${props.serie.id}/lessons`,
        { search: value, perPage: perPage.value },
        {
            preserveState: true,
            replace: true,
        }
    );
});

function getSeries(value) {
    Inertia.get(
        `/admin/series/${props.serie.id}/lessons`,
        { perPage: value, search: search.value },
        {
            preserveState: true,
            replace: true,
        }
    );
}

function storeLesson(){
    form.post(`/admin/series/${props.serie.id}/lessons`,{
        preserveScroll: true,
        onSuccess: () => form.reset('youtubeId'),
    })
}
</script>
