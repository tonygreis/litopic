<template>
  <Head title="Section Create" />
  <AdminLayout>
    <template #header> Section Create </template>
    <div class="py-2">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div
          class="bg-white sm:max-w-md overflow-hidden shadow-sm sm:rounded-lg"
        >
          <div class="p-6 border-b border-gray-200">
            <form @submit.prevent="updateSection" class="space-y-4">
              <div>
                <Label for="name" value="Name" />
                <Input
                  id="name"
                  type="text"
                  class="mt-1 block w-full"
                  v-model="form.name"
                  autofocus
                  autocomplete="name"
                />
              </div>
                <div class="flex items-center justify-end mt-4">
                <Button
                  class="ml-4"
                  :class="{ 'opacity-25': form.processing }"
                  :disabled="form.processing"
                >
                  Update Section
                </Button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </AdminLayout>
</template>

<script setup>
import { Head, useForm } from "@inertiajs/inertia-vue3";
import AdminLayout from "@/Layouts/Admin";
import Button from "@/Components/Button.vue";
import Input from "@/Components/Input.vue";
import Label from "@/Components/Label.vue";

const props = defineProps({
  component: Object,
    section: Object
});
const form = useForm({
  name: props.section.name
});

const updateSection = () => {
  form.put(`/admin/components/${props.component?.id}/sections/${props.section.id}`);
};
</script>
