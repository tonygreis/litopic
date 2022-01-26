<template>
    <Head title="Series Edit" />
    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Tag
            </h2>
        </template>
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white m-2 grid grid-cols-1 md:grid-cols-3 gap-4 overflow-hidden shadow-sm sm:rounded-lg">
                   <div class="m-2">
                       <h1 class="font-semibold text-indigo-700 text-2xl">Form</h1>
                       <div class="p-6">
                           <form @submit.prevent="updateSerie" class="space-y-4">
                               <div class="space-y-1">
                                   <Label for="name" value="Name" />
                                   <Input
                                       id="name"
                                       type="text"
                                       class="mt-1 block w-full"
                                       v-model="form.name"
                                       autofocus
                                       autocomplete="name"
                                   />
                                   <InputError :message="form.errors.name" />
                               </div>
                               <div class="space-y-1">
                                   <Label for="description" value="Description" />
                                   <textarea
                                       id="description"
                                       type="text"
                                       class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                                       v-model="form.description"
                                       autofocus
                                   ></textarea>
                                   <InputError :message="form.errors.description" />
                               </div>
                               <div>
                                   <div class="flex justify-center">
                                       <img :src="image" :alt="serie.name" class="w-32 h-32 rounded">
                                   </div>
                                   <Label for="poster_path" value="Poster" />
                                   <input type="file" id="poster_path" @input="form.poster_path = $event.target.files[0]" />
                                   <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                                       {{ form.progress.percentage }}%
                                   </progress>
                               </div>


                               <div class="flex items-center justify-end mt-4">
                                   <Button
                                       class="ml-4 bg-indigo-500 hover:bg-indigo-700"
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
                <div class="bg-white m-2 grid grid-cols-1 md:grid-cols-3 gap-4 overflow-x-visible shadow-sm sm:rounded-lg">
                    <div class="m-2">
                        <h1 class="font-semibold text-indigo-700 text-2xl">Topics</h1>
                        <div class="grid grid-cols-3">
                            <div class="m-2 p-2 text-indigo-700 font-semibold text-sm" v-for="t in serieTopics" :key="t.id" >{{ t.name }}</div>
                        </div>
                        <div class="m-2">
                           <form @submit.prevent="addTopic" class="space-y-4">
                               <div class="space-y-4">
                                   <VueMultiselect
                                       v-model="topicForm.topics"
                                       :multiple="true"
                                       :close-on-select="true"
                                       placeholder="Pick some"
                                       label="name"
                                       track-by="name"
                                       :options="topics">
                                   </VueMultiselect>
                               </div>
                               <Button class="bg-indigo-500 hover:bg-indigo-700">Add Topic</Button>
                           </form>
                        </div>
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
    import VueMultiselect from 'vue-multiselect'
    import {Inertia} from "@inertiajs/inertia";


    const props = defineProps({
        serie: Object,
        topics: Array,
        serieTopics: Array,
        image: String
    });
    const form = useForm({
        name: props.serie.name,
        description: props.serie.description,
        poster_path: null
    });

    const topicForm = useForm({
        topics: props.serieTopics
    })

    // function getTopicIds(item) {
    //     const topicIds = [item.id].join(" ");
    //     return topicIds;
    // }

    const updateSerie = () => {
        Inertia.post(`/admin/series/${props.serie.id}`, {
            _method: 'put',
            name: form.name,
            poster_path: form.poster_path,
            description: form.description
        })
    };

   function addTopic() {
        // topicForm.topics = topicForm.topics.map(getTopicIds);
        topicForm.post(`/admin/series/${props.serie.id}/add-topic`,{
            onFinish: () => topicForm.topics = props.serieTopics
        })
    }
</script>
<style src="vue-multiselect/dist/vue-multiselect.css"></style>
