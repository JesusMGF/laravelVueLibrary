<template>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <button class="btn btn-dark col-12" type="button" v-on:click="logout()">
            Logout
        </button>
    </nav>
</template>

<script>
    export default {
        data() {
            return {
            }
        },
        mounted() {
        },
        methods: {
            logout(){
                document.cookie = 'Token=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
                window.location = '/';
            }
        }
    }
</script>