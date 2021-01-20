<template>
  <v-app>
    <router-view></router-view>
  </v-app>
</template>

<script>
export default {
  name: "App",
  props: ["user"],
  created() {
    localStorage.setItem("id", this.user.id)

    localStorage.setItem("first_name", this.user.fname)

    localStorage.setItem("last_name", this.user.lname)

    localStorage.setItem("rylapp_token", this.user.api_token)

    axios.defaults.headers.common["Authorization"] = "Bearer " + this.user.api_token

    console.log(this.user)
  },
}
</script>

<style>
.ck-editor__editable {
  min-height: 300px;
}
</style>
