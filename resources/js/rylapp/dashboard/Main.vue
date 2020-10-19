<template>
    <v-app>
        <v-sheet class="d-flex">
            <sidebar />
            <router-view></router-view>
        </v-sheet>
    </v-app>
</template>

<script>
import  { VApp, VSheet } from 'vuetify/lib'
import sidebar from '../dashboard/components/Sidebar'
export default {
    components: {
        sidebar,
    }
}
</script>