<template>
  <table  class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
      <tr
        class="
          text-md
          font-semibold
          tracking-wide
          text-left text-gray-900
          bg-gray-100
          uppercase
          border-b border-gray-600
        "
      >
        <slot name="tableHeader"></slot>
      </tr>
    </thead>
    <tbody class="bg-white">
      <slot />
    </tbody>
  </table>
</template>

<script>
export default {};
</script>

<style>
</style>
