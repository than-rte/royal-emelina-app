<template>
    <div v-if="!link.linkItems">
        <v-list-item class="pl-9 font-weight-bold" :to="{name: link.link}">
            <v-list-item-icon>
                <v-icon 
                v-text="link.icon"   
                large
                color="orange darken-2"
                ></v-icon>
            </v-list-item-icon>
            <v-list-item-content>
                <v-list-item-title v-text="link.text"></v-list-item-title>
            </v-list-item-content>
        </v-list-item>
    </div>
    <div v-else>
        <v-list-group
            no-action
            
        >
            <template v-slot:activator>
                <v-list-item-icon class="pl-5">
                <v-icon 
                v-text="link.icon"   
                large
                color="orange darken-2"
                ></v-icon>
            </v-list-item-icon>
                <v-list-item-content class="font-weight-bold">
                    <v-list-item-title v-text="link.text"></v-list-item-title>
                </v-list-item-content>
            </template>

            <v-list-item 
                v-for="child in link.linkItems"
                :key="child.text"
                class="pl-lg-14"
                :to="{name: child.link}"
            >   
                <v-icon class="pr-4"
                v-text="child.icon"   
                large
                color="orange darken-2"
                ></v-icon>
                <v-list-item-content class="font-weight-bold">
                    <v-list-item-title v-text="child.text"></v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </v-list-group>
    </div>
</template>

<script>
export default {
    props: {
        link: {
            text: '',
            icon: '',
            link: '',
            linkItems: [],
        }
    }
}
</script>

<style>

</style>