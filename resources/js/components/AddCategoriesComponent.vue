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
                title : ''
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            newCategory(){
                const params = {
                    name : this.title
                };

                axios.post('/categories', params).then( (response) =>  {
                     //const item = response.data;
                     this.$emit('newCategory');
                });
                
            }   
        }
    }
</script>