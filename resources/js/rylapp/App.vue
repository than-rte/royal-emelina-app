<template>
    <div>
        <router-view></router-view>
    </div>
</template>

<script>


export default {
    name: 'App',
    data () {
      return {
      }
    },
    props: ['user'],
    mounted () {
        console.log(this.user)
    }
}
</script>
