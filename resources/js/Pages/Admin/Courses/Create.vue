<template>
  <Head title="Course Create" />
  <AdminLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Course Create
      </h2>
    </template>
    <div class="py-2">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div
          class="bg-white sm:max-w-md overflow-hidden shadow-sm sm:rounded-lg"
        >
          <div class="p-6 border-b border-gray-200">
            <form @submit.prevent="storeCourse" class="space-y-4">
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
                <Label for="description" value="Description" />
                <textarea
                  id="description"
                  type="text"
                  class="mt-1 block w-full"
                  v-model="form.description"
                  autofocus
                  autocomplete="description"
                ></textarea>
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
                  Create Course
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

const form = useForm({
  name: "",
  description: "",
  poster_path: "",
});

const storeCourse = () => {
  form.post("/admin/courses");
};
</script>
