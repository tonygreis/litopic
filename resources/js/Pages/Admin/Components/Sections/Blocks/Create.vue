<template>
  <Head title="Block Create" />
  <AdminLayout>
    <template #header> Block Create </template>
    <div class="py-2">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div
          class="bg-white sm:max-w-md overflow-hidden shadow-sm sm:rounded-lg"
        >
          <div class="p-6 border-b border-gray-200">
            <form @submit.prevent="storeBlock" class="space-y-4">
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
                <div>
                    <Label for="html" value="Html Code" />
                    <textarea
                        id="html"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.html"></textarea>
                </div>
                <div>
                    <Label for="vue" value="Vue Code" />
                    <textarea
                        id="vue"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.vue"></textarea>
                </div>
                <div>
                    <Label for="react" value="React Code" />
                    <textarea
                        id="react"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.react"></textarea>
                </div>
                <div>
                    <Label for="poster_path" value="Poster" />
                    <input
                        type="file"
                        id="poster_path"
                        @input="form.poster_path = $event.target.files[0]"
                    />
                    <progress
                        v-if="form.progress"
                        :value="form.progress.percentage"
                        max="100"
                    >
                        {{ form.progress.percentage }}%
                    </progress>
                </div>
                <div class="flex items-center justify-end mt-4">
                <Button
                  class="ml-4"
                  :class="{ 'opacity-25': form.processing }"
                  :disabled="form.processing"
                >
                  Create Block
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
  name: "",
  poster_path: null,
  html: "",
  vue: "",
  react: ""
});

const storeBlock = () => {
  form.post(`/admin/components/${props.component?.id}/sections/${props.section.id}/blocks`);
};
</script>
