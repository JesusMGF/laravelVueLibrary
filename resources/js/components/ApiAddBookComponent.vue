<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add BOOK</div>

                    <div class="card-body">
                        <form action="" v-on:submit.prevent="newBook()">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" v-model="title">
                                <label>Description</label>
                                <input type="text" class="form-control" name="description" v-model="description">
                                <label>Category</label>
                                <select class="form-control" v-model="cat">
                                    <option v-for="categorie in categories" :key="categorie.id" :value="categorie.id"> {{categorie.name}} </option>
                                </select>
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
                categories : [],
                title : '',
                description : '',
                config : { headers: {'Content-Type' : 'application/json', 'Authorization' : 'Bearer '+document.cookie.match("(^|;) ?Token=([^;]*)(;|$)")[2]}, withCredentials: true}
            }
        },
        mounted() {
            axios.get('/api/categories', this.config).then( (response) => {
                this.categories = response.data;
            });
        },
        methods: {
            newBook(){
                const params = {
                    name : this.title,
                    description : this.description,
                    category : this.cat
                };

                axios.post('/api/items', params, this.config).then( (response) =>  {
                     //const item = response.data;
                     this.$emit('newBook');
                });
                
            }   
        }
    }
</script>