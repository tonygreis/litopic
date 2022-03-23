<template>
    <Head title="Topics Edit" />
    <AdminLayout>
        <template #header>
                Edit Topic
        </template>
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white sm:max-w-md overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200">
                        <form @submit.prevent="updateTopic" class="space-y-4">
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
                                <div class="flex justify-center">
                                    <img :src="image" :alt="topic.name" class="w-32 h-32 rounded">
                                </div>
                                <Label for="poster_path" value="Poster" />
                                <input type="file" id="poster_path" @input="form.poster_path = $event.target.files[0]" />
                                <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                                    {{ form.progress.percentage }}%
                                </progress>
                            </div>

                            <div class="flex items-center justify-end mt-4">
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
import {Head, useForm} from '@inertiajs/inertia-vue3';
import AdminLayout from "@/Layouts/Admin"
import Button from "@/Components/Button.vue";
import Input from "@/Components/Input.vue";
import Label from "@/Components/Label.vue";
import { defineProps} from "vue";
import {Inertia} from "@inertiajs/inertia";

const props = defineProps({
    topic: Object,
    image: String
});
const form = useForm({
    name: props.topic.name,
    poster_path: null,
});

const updateTopic = () => {
    Inertia.post(`/admin/topics/${props.topic.id}`, {
        _method: 'put',
        name: form.name,
        poster_path: form.poster_path
    })
};
</script>
