<template>
  <Head title="Components Index" />
  <AdminLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Components Index
      </h2>
    </template>
    <div class="py-2">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
          <section class="container mx-auto p-6 font-mono">
            <div class="w-full flex mb-4 p-2 justify-end">
              <ButtonLink :link="route('admin.components.create')"
                >Create Component</ButtonLink
              >
            </div>

            <div
              class="w-full mb-8 overflow-hidden bg-white rounded-lg shadow-lg"
            >
              <div class="p-2 m-2">
                <Filter
                  v-model:search="search"
                  v-model:per-page="perPage"
                  @getPerPage="getComponent"
                />
              </div>

              <div
                class="
                  w-full
                  overflow-x-auto
                  border-b border-gray-200
                  sm:rounded-lg
                "
              >
                <Table>
                  <template v-slot:tableHeader>
                    <TableHead>Name</TableHead>
                    <TableHead>Slug</TableHead>
                    <TableHead>Poster</TableHead>
                    <TableHead></TableHead>
                  </template>
                  <TableRow
                    v-for="component in components.data"
                    :key="component.id"
                  >
                    <TableData>{{ component.name }}</TableData>
                    <TableData>{{ component.slug }}</TableData>
                    <TableData>
                      <img
                        :src="component.poster_path"
                        class="w-12 h-12 rounded"
                      />
                    </TableData>
                    <TableData>
                      <div class="flex justify-around">
                        <ButtonLink
                          :link="route('admin.sections.index', component.id)"
                          >sections</ButtonLink
                        >
                        <ButtonLink
                          :link="route('admin.components.edit', component.id)"
                          >Edit</ButtonLink
                        >
                        <ButtonLink
                          class="bg-red-500 hover:bg-red-700"
                          method="delete"
                          as="button"
                          type="button"
                          :link="
                            route('admin.components.destroy', component.id)
                          "
                          >Delete</ButtonLink
                        >
                      </div>
                    </TableData>
                  </TableRow>
                </Table>
                <div class="m-2 p-2" v-if="components">
                  <Pagination :links="components.links" />
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
import { Head } from "@inertiajs/inertia-vue3";
import AdminLayout from "@/Layouts/Admin";
import ButtonLink from "@/Components/ButtonLink";
import Filter from "@/Components/Filter";
import Table from "@/Components/Table";
import TableHead from "@/Components/TableHead";
import TableRow from "@/Components/TableRow";
import TableData from "@/Components/TableData";
import Pagination from "@/Components/Pagination";
import { ref, defineProps, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
  components: Object,
  filters: Object,
});

const search = ref(props.filters.search);
const perPage = ref(props.filters.perPage);

watch(search, (value) => {
  Inertia.get(
    "/admin/components",
    { search: value, perPage: perPage.value },
    {
      preserveState: true,
      replace: true,
    }
  );
});

function getComponents(value) {
  Inertia.get(
    "/admin/components",
    { perPage: value, search: search.value },
    {
      preserveState: true,
      replace: true,
    }
  );
}
</script>
