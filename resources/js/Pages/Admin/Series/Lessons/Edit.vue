<template>
    <Head title="Lesson Edit" />
    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Lesson
            </h2>
        </template>
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white sm:max-w-md overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200">
                        <form @submit.prevent="updateLesson" class="space-y-4">
                            <div class="space-y-1">
                                <Label for="title" value="Title" />
                                <Input
                                    id="title"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.title"
                                    autofocus
                                    autocomplete="title"
                                />
                                <InputError :message="form.errors.title" />
                            </div>
                            <div class="space-y-1">
                                <Label for="duration" value="Duration" />
                                <Input
                                    id="duration"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.duration"
                                    autofocus
                                    autocomplete="duration"
                                />
                                <InputError :message="form.errors.duration" />
                            </div>
                            <div class="space-y-1">
                                <Label for="embed_html" value="Embed" />
                                <textarea
                                    id="embed_html"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.embed_html"
                                    autofocus
                                ></textarea>
                                <InputError :message="form.errors.embed_html" />
                            </div>
                            <div class="space-y-1">
                                <Label for="thumbnail_url" value="Thumbnail" />
                                <Input
                                    id="thumbnail_url"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.thumbnail_url"
                                    autofocus
                                    autocomplete="thumbnail_url"
                                />
                                <InputError :message="form.errors.thumbnail_url" />
                            </div>
                            <div class="space-y-1">
                                <Label for="external_id" value="External Id" />
                                <Input
                                    id="external_id"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.external_id"
                                    autofocus
                                    autocomplete="external_id"
                                />
                                <InputError :message="form.errors.external_id" />
                            </div>
                            <div class="space-y-1">
                                <Label for="description" value="Description" />
                                <Input
                                    id="description"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.description"
                                    autofocus
                                    autocomplete="description"
                                />
                                <InputError :message="form.errors.description" />
                            </div>

                            <div class="flex items-center mt-4">
                                <Button
                                    class="ml-4"
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                >
                                    Update
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
import { Head, useForm } from '@inertiajs/inertia-vue3';
import AdminLayout from "@/Layouts/Admin"
import Button from "@/Components/Button.vue";
import Input from "@/Components/Input.vue";
import Label from "@/Components/Label.vue";
import { defineProps } from "vue";
import InputError from "@/Components/InputError";

const props = defineProps({
    serie: Object,
    lesson: Object
});
const form = useForm({
    title: props.lesson.title,
    duration: props.lesson.duration,
    embed_html: props.lesson.embed_html,
    thumbnail_url: props.lesson.thumbnail_url,
    external_id: props.lesson.external_id,
    description: props.lesson.description,
});

const updateLesson = () => {
    form.put(`/admin/series/${props.serie.id}/lessons/${props.lesson.id}`)
};
</script>
