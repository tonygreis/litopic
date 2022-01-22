<template>
    <Head title="Tags Edit" />
    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Tag
            </h2>
        </template>
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="updateTag">
                            <div>
                                <Label for="tag_name" value="Name" />
                                <Input
                                    id="tag_name"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.tag_name"
                                    autofocus
                                    autocomplete="tag_name"
                                />
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
const props = defineProps({
    tag: Object
});
const form = useForm({
    tag_name: props.tag.tag_name,
});

const updateTag = () => {
    form.put("/admin/tags/" + props.tag.id);
};
</script>
