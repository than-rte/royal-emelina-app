<template>
    <div>
        <router-view></router-view>
    </div>
</template>

<script>

import axios from 'axios'

export default {
    name: 'App',
    data () {
      return {
      }
    },
    props: ['user'],
    created () {
        localStorage.setItem(
            'id',
            this.user.id
        )

        localStorage.setItem(
            'first_name',
            this.user.fname
        )

        localStorage.setItem(
            'last_name',
            this.user.lname
        )

        localStorage.setItem(
            'rylapp_token',
            this.user.api_token
        )

        axios.defaults.headers.common["Authorization"] = "Bearer " + this.user.api_token
        
        console.log(this.user)
    }
}
</script>
