<template>
    <v-container fluid>

            <SearchProject/>
            <SearchTechno/>
            <SearchTool/>

    </v-container>
</template>
<script>

    import SearchProject from './SearchProject';
    import SearchTechno from './SearchTechno';
    import SearchTool from './SearchTool';

    export default {
        name: "GlobalSearch",
        components: {SearchTechno, SearchTool, SearchProject},
        data() {
            return {};
        },
        computed: {},
        methods: {},
        created() {
        }
    };
</script>
<style>

</style>
