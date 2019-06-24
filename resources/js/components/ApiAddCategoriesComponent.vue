<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add CATEGORY</div>

                    <div class="card-body">
                        <form action="" v-on:submit.prevent="newCategory()">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" v-model="title">
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Add
                            </button>
                            <button type="submit" class="btn btn-secundary">
                                Cancel
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
        data (){
            return{
                title : '',
                config : { headers: {'Content-Type' : 'application/json', 'Authorization' : 'Bearer '+document.cookie.match("(^|;) ?Token=([^;]*)(;|$)")[2]}, withCredentials: true}
            }
        },
        mounted() {
        },
        methods: {
            newCategory(){
                const params = {
                    name : this.title
                };

                axios.post('/api/categories', params, this.config).then( (response) =>  {
                     //const item = response.data;
                     this.$emit('newCategory');
                });
                
            }   
        }
    }
</script>