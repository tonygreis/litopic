<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <Disclosure as="nav" class="bg-gray-900" v-slot="{ open }">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <DisclosureButton class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                        <span class="sr-only">Open main menu</span>
                        <MenuIcon v-if="!open" class="block h-6 w-6" aria-hidden="true" />
                        <XIcon v-else class="block h-6 w-6" aria-hidden="true" />
                    </DisclosureButton>
                </div>
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <a href="/" class="flex-shrink-0 flex items-center">
                        <h1 class="block lg:hidden text-3xl font-semibold font-serif text-transparent bg-gradient-to-r bg-clip-text from-pink-700 to-purple-600">L</h1>
                        <h1 class="hidden lg:block text-3xl font-semibold font-serif text-transparent bg-gradient-to-r bg-clip-text from-pink-700 to-purple-600">Laraveller</h1>
                    </a>
                    <div class="hidden sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <FrontNavLink :href="route('frontend.topics.index')" :active="route().current('frontend.topics.index')">
                                Topic
                            </FrontNavLink>
                            <FrontNavLink :href="route('frontend.series.index')" :active="route().current('frontend.series.index')">
                            Series
                        </FrontNavLink>
                            <FrontNavLink :href="route('frontend.lessons.index')" :active="route().current('frontend.lessons.index')">
                            Lessons
                        </FrontNavLink>
                        </div>
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                   <SearchModal class="w-12 md:w-64 md:w-72" />
                </div>
            </div>
        </div>

        <DisclosurePanel class="sm:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <FrontResponsiveNavLink :href="route('frontend.topics.index')" :active="route().current('frontend.topics.index')">Topics</FrontResponsiveNavLink>
                <FrontResponsiveNavLink :href="route('frontend.series.index')" :active="route().current('frontend.series.index')">Series</FrontResponsiveNavLink>
                <FrontResponsiveNavLink :href="route('frontend.lessons.index')" :active="route().current('frontend.lessons.index')">Lessons</FrontResponsiveNavLink>
            </div>
        </DisclosurePanel>
    </Disclosure>
</template>

<script>
import { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { BellIcon, MenuIcon, XIcon } from '@heroicons/vue/outline'
import FrontNavLink from "@/Components/FrontNavLink";
import FrontResponsiveNavLink from "@/Components/FrontResponsiveNavLink";
import SearchModal from "@/Components/SearchModal";

export default {
    components: {
        SearchModal,
        FrontResponsiveNavLink,
        Disclosure,
        DisclosureButton,
        DisclosurePanel,
        Menu,
        MenuButton,
        MenuItem,
        MenuItems,
        BellIcon,
        MenuIcon,
        XIcon,
        FrontNavLink
    },
}
</script>
