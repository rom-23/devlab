<template>
  <div class="parallax5">
      <v-row class="justify-center">
        <v-col cols="12" sm="6" md="4">
          <v-carousel height="20em" continu>
            <v-carousel-item v-for="(item,i) in items" :key="i">
              <v-img :src="item.src" height="100%" contain aspect-ratio="1">
              </v-img>
            </v-carousel-item>
          </v-carousel>
        </v-col>
        <v-col cols="12" sm="6" md="4">
          <v-container>
            <v-hover>
              <template v-slot="{ hover }">
                <v-card class="mx-auto pb-3" max-width="330" :elevation="hover ? 16 : 3">
                  <v-card-title primary-title class="layout justify-center">
                    <div class="headline text-center">Projets réalisés</div>
                  </v-card-title>
                  <v-card-text>
                    Cras facilisis mi vitae nunc lobortis pharetra. Nulla volutpat tincidunt orna.
                    Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac.
                    Nullam in aliquet odio. iquet odio. Aliquam eu est vitae tellus bibendum tincid.
                  </v-card-text>
                </v-card>
              </template>
            </v-hover>
            <v-container class="headline text-center pt-5">
              <v-btn class="mx-2" fab dark color="indigo">
                <v-icon dark>mdi-plus</v-icon>
              </v-btn>
              <v-btn class="mx-2" fab dark color="teal">
                <v-icon dark>mdi-format-list-bulleted-square</v-icon>
              </v-btn>
              <v-btn class="mx-2" fab dark color="cyan">
                <v-icon dark>mdi-pencil</v-icon>
              </v-btn>
            </v-container>
          </v-container>
        </v-col>
        <v-col cols="12" sm="6" md="4">
          <v-carousel height="20em" continu>
            <v-carousel-item v-for="(item2,i) in itemsNext" :key="i">
              <v-img :src="item2.src" height="100%" contain aspect-ratio="1">
              </v-img>
            </v-carousel-item>
          </v-carousel>
        </v-col>
      </v-row>
    </div>

</template>
<script>
export default {
  name: 'Development',

  data() {
    return {
      items: [
        {
          // eslint-disable-next-line global-require
          src: require('../../images/growup-screen01.jpg'),
        },
        {
          // eslint-disable-next-line global-require
          src: require('../../images/growup-screen03.jpg'),
        },
        {
          // eslint-disable-next-line global-require
          src: require('../../images/growup-screen01.jpg'),
        },
      ],
      itemsNext: [
        {
          // eslint-disable-next-line global-require
          src: require('../../images/webshop-screen01.jpg'),
        },
        {
          // eslint-disable-next-line global-require
          src: require('../../images/webshop-screen02.jpg'),
        },
        {
          // eslint-disable-next-line global-require
          src: require('../../images/webshop-screen03.jpg'),
        },
      ],
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
