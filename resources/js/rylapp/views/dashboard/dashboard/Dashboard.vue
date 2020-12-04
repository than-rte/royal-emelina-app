<template>
  <v-container fluid>
    <div>
        <h2 class="body-1 my-2">GENERAL</h2>
    </div>
    <v-row>
      <v-col>
        <v-card
          max-width="344"
          outlined
        >
          <v-list-item>
            <v-card-text>
              <p class="headline text--primary">
                Venues
              </p>
              <v-divider class="mb-3"></v-divider>
              <p class="text--primary">
                Available venues: 40
              </p>
               <p class="text--primary">
                Closed venues: 15
              </p>
            </v-card-text>
          </v-list-item>
          <v-card-actions>
            <v-spacer></v-spacer>
             <v-btn
              outlined
              rounded
              text
              color="primary"
            >
              Add
            </v-btn>
            <v-btn
              outlined
              rounded
              text
            >
              View
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-col>
      <v-col>
       <v-card
          max-width="344"
          outlined
        >
          <v-list-item>
            <v-card-text>
              <p class="headline text--primary">
                Events
              </p>
              <v-divider class="mb-3"></v-divider>
              <p class="text--primary">
                Available events: 5
              </p>
               <p class="text--primary">
                Disabled events: 2
              </p>
            </v-card-text>
          </v-list-item>
          <v-card-actions>
            <v-spacer></v-spacer>
             <v-btn
              outlined
              rounded
              text
              color="primary"
            >
              Add
            </v-btn>
            <v-btn
              outlined
              rounded
              text
            >
              View
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-col>
      <v-col>
       <v-card
          max-width="344"
          outlined
        >
          <v-list-item>
            <v-card-text>
              <p class="headline text--primary">
                Food Packages
              </p>
              <v-divider class="mb-3"></v-divider>
              <p class="text--primary">
                Available Foodsets: 5
              </p>
               <p class="text--primary">
                Disabled Foodsets: 0
              </p>
            </v-card-text>
          </v-list-item>
          <v-card-actions>
            <v-spacer></v-spacer>
             <v-btn
              outlined
              rounded
              text
              color="primary"
            >
              Add
            </v-btn>
            <v-btn
              outlined
              rounded
              text
            >
              View
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-col>
    </v-row>
    <v-row class="mb-6">
      <v-col class="col-4">
        <div>
          <h2 class="body-1 my-2">CUSTOMERS</h2>
        </div>
        <v-card
          max-width="344"
          outlined
        >
          <v-list-item>
            <v-card-text>
              <p class="headline text--primary">
                Enquiries
              </p>
              <v-divider class="mb-3"></v-divider>
              <p class="text--primary">
                Unread enquiries: 2
              </p>
               <p class="text--primary">
                Read enquiries: 125
              </p>
            </v-card-text>
          </v-list-item>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn
              outlined
              rounded
              text
            >
              View
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-col>
      <v-col class="col-8">
        <div>
            <h2 class="body-1 my-2">BOOKS</h2>
        </div>
       <v-card
          max-width="344"
          outlined
        >
          <v-list-item>
            <v-card-text>
              <p class="headline text--primary">
                Event Calendar
              </p>
              <v-divider class="mb-3"></v-divider>
              <p class="text--primary">
                Events today: 2
              </p>
              <p class="text--primary">
                Incoming events: 14
              </p>
              <p class="text--primary">
                Finished events: 102
              </p>
            </v-card-text>
          </v-list-item>
          <v-card-actions>
            <v-spacer></v-spacer>
             <v-btn
              outlined
              rounded
              text
              color="primary"
            >
              Add
            </v-btn>
            <v-btn
              outlined
              rounded
              text
            >
              View
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import { VContainer } from 'vuetify/lib'

export default {
    name: 'dashboard',
}
</script>

<style>

</style>
