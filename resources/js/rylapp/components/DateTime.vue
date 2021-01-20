<template>
  <span>
    {{ `${d.getMonth() + 1}/${d.getDate()}/${d.getFullYear()}` }}
  </span>
</template>

<script>
export default {
  name: "date-time",
  props: ["d"],
}
</script>

<style>
</style>