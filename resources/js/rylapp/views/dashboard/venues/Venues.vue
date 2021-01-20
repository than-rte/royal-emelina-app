<template>
  <v-container fluid>
    <transition name="router-anim">
      <router-view></router-view>
    </transition>
  </v-container>
</template>

<script>
export default {
  name: "venues",
}
</script>

<style scoped>
.router-anim-enter-active {
  animation: fadeIn ease 0.5s;
}
@keyframes fadeIn {
  0% {
    transform: translateY(-15px);
    opacity: 0;
  }
  100% {
    transform: translateY(0);
    opacity: 1;
  }
}

.router-anim-leave-active {
  animation: fadeOut ease;
}
@keyframes fadeOut {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
  }
}
</style>
