<template>
  <Head title="Tags Index" />
  <AdminLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Tags Index
      </h2>
    </template>
    <div class="py-2">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
          <section class="container mx-auto p-6 font-mono">
            <div class="w-full flex mb-4 p-2 justify-end">
             <ButtonLink :link="route('admin.tags.create')">Create Tag</ButtonLink>
            </div>

            <div
              class="w-full mb-8 overflow-hidden bg-white rounded-lg shadow-lg"
            >
              <div class="p-2 m-2">
               <Filter v-model:search="search" v-model:per-page="perPage" @getPerPage="getTags" />
              </div>

              <div class="w-full overflow-x-auto border-b border-gray-200 sm:rounded-lg">
                <Table>
                  <template v-slot:tableHeader>
                      <TableHead>Name</TableHead>
                      <TableHead>Slug</TableHead>
                      <TableHead></TableHead>
                  </template>
                    <TableRow v-for="tag in tags.data" :key="tag.id">
                        <TableData>{{ tag.tag_name }}</TableData>
                        <TableData>{{ tag.slug }}</TableData>
                        <TableData>
                            <div class="flex justify-around">
                             <ButtonLink :link="route('admin.tags.edit', tag.id)">Edit</ButtonLink>
                             <ButtonLink class="bg-red-500 hover:bg-red-700" method="delete" as="button" type="button" :link="route('admin.tags.destroy', tag.id)">Delete</ButtonLink>
                            </div>
                        </TableData>
                    </TableRow>
                </Table>
                <div class="m-2 p-2" v-if="tags">
                  <Pagination :links="tags.links" />
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
import { Head, Link } from "@inertiajs/inertia-vue3";
import AdminLayout from "@/Layouts/Admin";
import Table from "@/Components/Table.vue";
import TableHead from "@/Components/TableHead";
import TableRow from "@/Components/TableRow";
import TableData from "@/Components/TableData";
import { ref, watch, defineProps } from "vue";
import { Inertia } from "@inertiajs/inertia";
import Pagination from "@/Components/Pagination";
import Filter from "@/Components/Filter";
import ButtonLink from "@/Components/ButtonLink";

const props = defineProps({
  tags: Object,
  filters: Object
});

const search = ref(props.filters.search);
const perPage = ref(props.filters.perPage);

watch(search, (value) => {
    Inertia.get(
        "/admin/tags",
        { search: value, perPage: perPage.value },
        {
            preserveState: true,
            replace: true,
        }
    );
});

function getTags(value) {
    Inertia.get(
        "/admin/tags",
        { perPage: value, search: search.value },
        {
            preserveState: true,
            replace: true,
        }
    );
}
</script>
