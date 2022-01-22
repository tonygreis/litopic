<template>
    <section class="text-gray-600 font-black font-serif">
        <div class="container mx-auto flex px-5 py-4 md:flex-row flex-col items-center">
            <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                <h1 class="text-4xl md:text-6xl mb-4 font-bold flex flex-col">
                    <span class="text-transparent bg-gradient-to-r bg-clip-text from-pink-700 to-purple-600">Laravel Vuejs Livewire</span>
                    <span class="text-transparent bg-gradient-to-r bg-clip-text from-blue-500 to-green-500">Tutorials</span>
                </h1>
                <p class="mb-8 leading-relaxed text-gray-200">
                    Learn best Laravel topics. Go from beginners to advanced with Laraveller.com
                </p>
                <div class="flex justify-center">
                    <a href="https://laraveller.com/topics"
                       class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded-large text-lg">Start</a>
                    <a href="https://youtube.com/channel/UCfBCNl3xbAC2wbbjA_9vaYg"
                       class="ml-4 inline-flex text-gray-700 bg-red-600 border-0 py-2 px-6 focus:outline-none hover:bg-red-400 rounded-large text-lg"
                       rel="noopener noreferrer"
                       target="_blank"
                    >Youtube</a>
                </div>
            </div>
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                <img class="object-cover object-center rounded" alt="hero" src="@/img/hero.svg">
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "FrontendHero"
}
</script>

<style scoped>

</style>
