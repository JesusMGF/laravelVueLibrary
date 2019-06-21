<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        <form action="" v-on:submit.prevent="login()">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" v-model="email">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" v-model="password">

                            </div>
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {


        mounted() {
            console.log('Login mounted');
        },

        methods: {
            login(){
                const params = {
                    email : this.email,
                    password : this.password
                };
                axios.post('/api/login', params).then( (response) => {
                    let d = new Date();                
                    d.setTime(d.getTime() + (1*24*60*60*1000));
                    let expires = "expires="+ d.toUTCString();
                    document.cookie = "Token=" + response.data.success.token + ";" + expires + ";path=/";
                    window.location="/mainapi";
                }).catch(function (error) {
                    console.log(error);
                });
            },
        }
    }
</script>