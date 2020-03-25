<template>
    <div>

        <v-card flat light>
            <v-navigation-drawer
                    floating
                    permanent
                    expand-on-hover
            >
                <v-list>
                    <v-list-item class="px-2">
                        <v-list-item-avatar>
                            <v-img src="https://randomuser.me/api/portraits/women/85.jpg"></v-img>
                        </v-list-item-avatar>
                    </v-list-item>

                    <v-list-item link>
                        <v-list-item-content>
                            <v-list-item-title>Sandra Adams</v-list-item-title>
                            <v-list-item-subtitle>sandra_a88@gmail.com</v-list-item-subtitle>
                        </v-list-item-content>
                    </v-list-item>
                </v-list>

                <v-divider></v-divider>

                <v-list
                        nav
                        dense
                >
                    <v-list-item link>
                        <v-list-item-icon>
                            <v-icon>mdi-folder</v-icon>
                        </v-list-item-icon>
                        <v-list-item-title>My Files</v-list-item-title>
                    </v-list-item>
                    <v-list-item link>
                        <v-list-item-icon>
                            <v-icon>mdi-account-multiple</v-icon>
                        </v-list-item-icon>
                        <v-list-item-title>Shared with me</v-list-item-title>
                    </v-list-item>
                    <v-list-item link>
                        <v-list-item-icon>
                            <v-icon>mdi-star</v-icon>
                        </v-list-item-icon>
                        <v-list-item-title>Starred</v-list-item-title>
                    </v-list-item>
                    <v-list-item link>
                        <v-list-item-icon>
                            <v-icon>mdi-account-multiple</v-icon>
                        </v-list-item-icon>
                        <v-list-item-title>Shared with me</v-list-item-title>
                    </v-list-item>
                    <v-list-item link>
                        <v-list-item-icon>
                            <v-icon>mdi-star</v-icon>
                        </v-list-item-icon>
                        <v-list-item-title>Starred</v-list-item-title>
                    </v-list-item>
                </v-list>
            </v-navigation-drawer>
        </v-card>

    </div>
</template>

<!--    <v-container>-->
<!--        -->
<!--        <div class="sidemenu">-->
<!--            <h2>Modern Business Features</h2>-->
<!--            <p>The Modern Business template by Start Bootstrap includes:</p>-->
<!--            <form class="form-inline">-->
<!--                <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search">-->
<!--                <button class="btn btn-primary" type="submit">Search</button>-->
<!--            </form>-->
<!--            <ul v-for="projects in projectList"-->
<!--                :key="projects.id">-->
<!--                <li>{{ projects.projectName }}</li>-->
<!--            </ul>-->
<!--            <router-link :to="{ name: 'salut'}">User</router-link>-->

<!--        </div>-->
<!--    </v-container>-->

<script>
    export default {
        name: 'Navbar',
        data() {
            return {
                projectList: []
            };
        },
        methods: {},
        created() {
            //AJAX with Fetch Api
            let myHeaders = new Headers({
                "Content-Type": "application/json",
                // "Access-Control-Allow-Credentials": true,
                "Access-Control-Allow-Origin": "*"
            });
            let myInit = {
                method: 'GET',
                headers: myHeaders,
                mode: 'cors',
                cache: 'default'
            };
            fetch('/apip/projects', myInit)
                .then(response => {
                    response.json().then(data =>
                        this.projectList = data["hydra:member"]
                    )
                })
                .catch(error => {
                    alert(error.message);
                });
        },
    };
</script>
<style >

</style>


