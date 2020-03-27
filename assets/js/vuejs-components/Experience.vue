<template>
  <div class="parallax2">
    <v-row>
      <v-col>
        <v-hover>
          <template v-slot="{ hover }">
            <v-card class="mx-auto" width="400" :elevation="hover ? 24 : 3">
              <v-card-text class="text-center">
                <v-icon x-large class="blue--text text--lighten-2">mdi-flash</v-icon>
              </v-card-text>
              <v-card-title primary-title class="layout justify-center">
                <div class="headline">Structures & données</div>
              </v-card-title>
              <v-card-text>
                Cras facilisis mi vitae nunc lobortis pharetra. Nulla volutpat tincidunt orne.
                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac
                turpis egestas.am in aliquet odio. Aliquam eu est vitae tellus bibendum tinc.
              </v-card-text>
            </v-card>
          </template>
        </v-hover>
      </v-col>
      <v-col>
        <v-hover>
          <template v-slot="{ hover }">
            <v-card class="mx-auto" width="400" :elevation="hover ? 24 : 3">
              <v-card-text class="text-center">
                <v-icon x-large class="blue--text text--lighten-2">mdi-flash</v-icon>
              </v-card-text>
              <v-card-title primary-title class="layout justify-center">
                <div class="headline">Frameworks</div>
              </v-card-title>
              <v-card-text>
                Cras facilisis mi vitae nunc lobortis pharetra. Nulla volutpat tincidunt orne.
                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac
                turpis egestas.am in aliquet odio. Aliquam eu est vitae tellus bibendum tinc.
              </v-card-text>
            </v-card>
          </template>
        </v-hover>
      </v-col>
      <v-col>
        <v-hover>
          <template v-slot="{ hover }">
            <v-card class="mx-auto" width="400" :elevation="hover ? 24 : 3">
              <v-card-text class="text-center">
                <v-icon x-large class="blue--text text--lighten-2">mdi-wrench</v-icon>
              </v-card-text>
              <v-card-title primary-title class="layout justify-center">
                <div class="headline text-center">Bases de données</div>
              </v-card-title>
              <v-card-text>
                Cras facilisis mi vitae nunc lobortis pharetra. Nulla volutpat tincidunt orna.
                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac.
                Nullam in aliquet odio. Aliquam eu est vitae tellus bibendum tincidunt.
              </v-card-text>
            </v-card>
          </template>
        </v-hover>
      </v-col>
    </v-row>
    <v-row>
      <v-col>
        <v-hover>
          <template v-slot="{ hover }">
            <v-card class="mx-auto" width="400" :elevation="hover ? 24 : 3">
              <v-card-text class="text-center">
                <v-icon x-large class="blue--text text--lighten-2">mdi-code-not-equal-variant
                </v-icon>
              </v-card-text>
              <v-card-title primary-title class="layout justify-center">
                <div class="headline text-center">Responsive & design</div>
              </v-card-title>
              <v-card-text>
                Cras facilisis mi vitae nunc lobortis pharetra. Nulla volutpat tincidunt orna.
                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac.
                Nullam in aliquet odio. Aliquam eu est vitae tellus bibendum tincidunt.
              </v-card-text>
            </v-card>
          </template>
        </v-hover>
      </v-col>
      <v-col>
        <v-hover>
          <template v-slot="{ hover }">
            <v-card class="mx-auto" width="400" :elevation="hover ? 24 : 3">
              <v-card-text class="text-center">
                <v-icon x-large class="blue--text text--lighten-2">mdi-wrench</v-icon>
              </v-card-text>
              <v-card-title primary-title class="layout justify-center">
                <div class="headline text-center">Back-end</div>
              </v-card-title>
              <v-card-text>
                Cras facilisis mi vitae nunc lobortis pharetra. Nulla volutpat tincidunt orna.
                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac.
                Nullam in aliquet odio. Aliquam eu est vitae tellus bibendum tincidunt.
              </v-card-text>
            </v-card>
          </template>
        </v-hover>
      </v-col>
      <v-col>
        <v-hover>
          <template v-slot="{ hover }">
            <v-card class="mx-auto" width="400" :elevation="hover ? 24 : 3">
              <v-card-text class="text-center">
                <v-icon x-large class="blue--text text--lighten-2">mdi-file-code-outline</v-icon>
              </v-card-text>
              <v-card-title primary-title class="layout justify-center">
                <div class="headline text-center">Languages</div>
              </v-card-title>
              <v-card-text>
                Cras facilisis mi vitae nunc lobortis pharetra. Nulla volutpat tincidunt orna.
                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac.
                Nullam in aliquet odio. Aliquam eu est vitae tellus bibendum tincidunt.
              </v-card-text>
            </v-card>
          </template>
        </v-hover>
      </v-col>
    </v-row>
  </div>
</template>
<script>
export default {
  name: 'Experience',

  data() {
    return {};
  },
  methods: {},
  created() {
    // crochets
  },
};
</script>

<style scoped>


</style>
