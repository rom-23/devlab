<template>
  <v-footer padless>
    <v-row justify="center" no-gutters>
      <v-col class="foot py-4 text-center white--text" cols="12">
        <strong>RomDev - Lab v1</strong> — {{ new Date().getFullYear() }}
      </v-col>
    </v-row>
  </v-footer>
</template>
<script>
export default {
  name: 'Footer',
  data() {
    return {};
  },
  created() {

  },
  methods: {},


};
</script>

<style scoped>

</style>
