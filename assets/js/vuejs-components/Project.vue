<template>
  <div class="parallax3">
    <v-row>
      <v-col>
        <v-hover>
          <template v-slot="{ hover }">
        <v-card class="mx-auto transparent" width="500" :elevation="hover ? 20 : 4">
          <v-toolbar dense flat color="tertiary" class="cardFooter" elevation="1">
            <v-app-bar-nav-icon/>
            <v-toolbar-title>GrowUp Website</v-toolbar-title>
            <v-spacer/>
            <v-btn icon>
              <v-icon>mdi-magnify</v-icon>
            </v-btn>
          </v-toolbar>
          <v-card-text class="text-center p-0 m-0">
            <v-row class="justify-center">
              <a href="#">
              <v-img :src='require("../../images/logo3.png")' max-width="7em"/>
              </a>
            </v-row>
          </v-card-text>
          <v-card-title primary-title class="layout justify-center">
            <div class="headline text-center">GrowUp Website</div>
          </v-card-title>
          <v-card-text class="white pt-3 text-center">
            Cras facilisis mi vitae nunc lobortis pharetra. Nulla volutpat tincidunt orne.
            Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac
            Nullam in aliquet odio. Aliquam eu est vitae tellus bibendum tincidunt.
          </v-card-text>
          <v-card-actions class="cardFooter pt-4">
            <v-btn class="mb-2 ml-5 text-lowercase bouts" elevation="5">Voir le projet
            </v-btn>
            <div class="flex-grow-1"></div>
            <v-btn icon @click="show = !show" class="bouts" elevation="5">
              <v-icon>{{ show ? 'mdi-arrow-up-bold-outline' : 'mdi-plus' }}</v-icon>
            </v-btn>
          </v-card-actions>
          <v-expand-transition>
            <div v-show="show">
              <v-card-text>I'm a thing. But, like most politicians, he promised more than he
                could
                deliver. You won't have time for sleeping, soldier, not with all the bed making
                you'
                ll be doing. Then we'll go with that data file! Hey, you add a one and two zeros
                to
                that or we walk! You're going to do his laundry? I've got to find a way to
                escape.
              </v-card-text>
            </div>
          </v-expand-transition>
        </v-card>
          </template>
        </v-hover>
      </v-col>
      <!--      Seconde carte-->
      <v-col>
        <v-hover>
          <template v-slot="{ hover }">
        <v-card class="mx-auto transparent" width="500" :elevation="hover ? 20 : 4">
          <v-toolbar dense flat color="tertiary" class="cardFooter" elevation="1">
            <v-app-bar-nav-icon/>
            <v-toolbar-title>GrowUp WebApp</v-toolbar-title>
            <v-spacer/>
            <v-btn icon>
              <v-icon>mdi-magnify</v-icon>
            </v-btn>
          </v-toolbar>
          <v-card-text>
          <a href="#">
            <v-img
            class="white--text align-end"
            :src='require("../../images/growup-screen01.jpg")'>
          </v-img>
          </a>
          </v-card-text>
          <v-card-text class="white pt-3 text-center">
            Cras facilisis mi vitae nunc lobortis pharetra. Nulla volutpat tincidunt orne.
            Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac
            Nullam in aliquet odio. Aliquam eu est vitae tellus bibendum tincidunt.
          </v-card-text>
          <v-card-actions class="cardFooter pt-4">
            <v-btn class="mb-2 ml-5 text-lowercase bouts" elevation="5">Voir le projet
            </v-btn>
            <div class="flex-grow-1"></div>
            <v-btn icon @click="show2 = !show2" class="bouts" elevation="5">
              <v-icon>{{ show2 ? 'mdi-arrow-up-bold-outline' : 'mdi-plus' }}</v-icon>
            </v-btn>
          </v-card-actions>
          <v-expand-transition>
            <div v-show="show2">
              <v-card-text>I'm a thing. But, like most politicians, he promised more than he
                could
                deliver. You won't have time for sleeping, soldier, not with all the bed making
                you'
                ll be doing. Then we'll go with that data file! Hey, you add a one and two zeros
                to
                that or we walk! You're going to do his laundry? I've got to find a way to
                escape.
              </v-card-text>
            </div>
          </v-expand-transition>
        </v-card>
          </template>
        </v-hover>
      </v-col>
      <v-col>
        <v-hover>
          <template v-slot="{ hover }">
        <v-card class="mx-auto transparent" width="500" :elevation="hover ? 20 : 4">
          <v-toolbar dense flat color="tertiary" class="cardFooter" elevation="1">
            <v-app-bar-nav-icon/>
            <v-toolbar-title>Web Shop</v-toolbar-title>
            <v-spacer/>
            <v-btn icon>
              <v-icon>mdi-magnify</v-icon>
            </v-btn>
          </v-toolbar>
          <v-card-text>
            <a href="#">
              <v-img
                class="text--black align-end"
                :src= "require('../../images/webshop-screen02.jpg')">
              </v-img>
            </a>
          </v-card-text>
          <v-card-text class="white pt-3 text-center">
            Cras facilisis mi vitae nunc lobortis pharetra. Nulla volutpat tincidunt orne.
            Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac
            Nullam in aliquet odio. Aliquam eu est vitae tellus bibendum tincidunt.
          </v-card-text>
          <v-card-actions class="cardFooter pt-4">
            <v-btn class="mb-2 ml-5 text-lowercase bouts" elevation="5">Voir le projet
            </v-btn>
            <div class="flex-grow-1"></div>
            <v-btn icon @click="show3 = !show3" class="bouts" elevation="5">
              <v-icon>{{ show3 ? 'mdi-arrow-up-bold-outline' : 'mdi-plus' }}</v-icon>
            </v-btn>
          </v-card-actions>
          <v-expand-transition>
            <div v-show="show3">
              <v-card-text>I'm a thing. But, like most politicians, he promised more than he
                could
                deliver. You won't have time for sleeping, soldier, not with all the bed making
                you'
                ll be doing. Then we'll go with that data file! Hey, you add a one and two zeros
                to
                that or we walk! You're going to do his laundry? I've got to find a way to
                escape.
              </v-card-text>
            </div>
          </v-expand-transition>
        </v-card>
          </template>
        </v-hover>
      </v-col>
    </v-row>
    <v-row>
      <v-col>
        <v-card class="mx-auto transparent" elevation="4" outlined width="500">
          <v-card-text class="text-center">
            <v-row class="justify-center">
              <v-img :src='require("../../images/logo.png")' max-width="7em"/>
            </v-row>
          </v-card-text>
          <v-card-title primary-title class="layout justify-center">
            <div class="headline text-center">Material Design- PROJECT</div>
          </v-card-title>
          <v-card-text>
            Cras facilisis mi vitae nunc lobortis pharetra. Nulla volutpat tincidunt orne.
            Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac
            Nullam in aliquet odio. Aliquam eu est vitae tellus bibendum tincidunt.
          </v-card-text>
        </v-card>
      </v-col>
      <v-col>
        <v-card class="mx-auto transparent" elevation="4" outlined width="500">
          <v-card-text class="text-center">
            <v-row class="justify-center">
              <v-img :src='require("../../images/logo3.png")' max-width="7em"/>
            </v-row>
          </v-card-text>
          <v-card-title primary-title class="layout justify-center">
            <div class="headline">Fast development</div>
          </v-card-title>
          <v-card-text>
            Cras facilisis mi vitae nunc lobortis pharetra. Nulla volutpat tincidunt orna.
            Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac
            Nullam in aliquet odio. Aliquam eu est vitae tellus bibendum tincidunt. Suspe
          </v-card-text>
        </v-card>
      </v-col>
      <v-col>
        <v-card class="mx-auto transparent" elevation="4" outlined width="500">
          <v-card-text class="text-center">
            <v-row class="justify-center">
              <v-img :src='require("../../images/logo3.png")' max-width="7em"/>
            </v-row>
          </v-card-text>
          <v-card-title primary-title class="layout justify-center">
            <div class="headline text-center">Completely Open Sourced</div>
          </v-card-title>
          <v-card-text>
            Cras facilisis mi vitae nunc lobortis pharetra. Nulla volutpat tincidunt orne.
            ac turpis egestas. Nullam in aliquet odio. Aliquam eu est vitae tellus bibndum
            tincidunt. Suspendisse potenti.
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </div>
</template>

<script>
export default {
  name: 'Project',
  data() {
    return {
      show: false,
      show2: false,
      show3: false,
    };
  },
  methods: {},
  created() {
    // crochets
  },
};
</script>

<style scoped>

</style>
