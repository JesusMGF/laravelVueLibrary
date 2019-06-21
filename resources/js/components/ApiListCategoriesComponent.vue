<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <select class="form-group" v-model="selectedCat" @change="setCategorie($event)" >
                            <option value=""></option>
                            <option value="0">All</option>
                            <option v-for="categorie in categories" :key="categorie.id" :value="categorie.id" :selected="categorie.id === selectedCat"> {{categorie.name}} </option>
                        </select>

                        <button class="btn btn-success" v-on:click="onClickAdd()">
                            New Book
                        </button>
                        <button class="btn btn-success" v-on:click="onClickAddCategory()">
                            New Category
                        </button>
                    </div>

                    <div>

                        <listbook-component
                                v-show="displayList"
                                v-for="item in items"
                                :key="item.id"
                                :item="item"
                                @update="refreshBook"
                                @delete="refreshCategory"
                        ></listbook-component>

                        <addbook-component 
                            v-if="display"
                            @newBook="refreshBook"
                        ></addbook-component>
                        <addcategories-component 
                            v-if="displayCategory"
                            @newCategory="refreshCategory"
                        ></addcategories-component>

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
                selectedCat : '',
                categories : [],
                items : [], 
                display: false,
                displayCategory: false,
                displayList: false,
                config : { headers: {'Content-Type' : 'application/json', 'Authorization' : 'Bearer '+document.cookie.match("(^|;) ?Token=([^;]*)(;|$)")[2]}, withCredentials: true}
            }
        },

        mounted() {
            axios.get('/api/categories', this.config).then( (response) => {
                this.categories = response.data;
            });
        },

        methods: {
            setCategorie(event){

                this.displayList = true;
                this.display = false;
                this.displayCategory = false;
                console.log(this.config)
                if (event.target.value === ''){
                    this.displayList = false;
                    this.display = false;
                    this.displayCategory = false;
                }
                else if (event.target.value === '0')
                {
                    axios.get('/api/items', this.config).then( (response) => {
                        this.items = response.data;
                    });
                }
                else 
                {
                    axios.get('/api/items/'+event.target.value, this.config).then( (response) => {
                        this.items = response.data;
                    });
                }
            },
            onClickAdd(){
                this.displayList = false;
                this.display = true;
                this.displayCategory = false;
            },
            onClickAddCategory(){
                this.displayList = false;
                this.display = false;
                this.displayCategory = true;
            },
            refreshBook(){
                this.selectedCat = '';
                this.displayList = false;
                this.display = false;
                this.displayCategory = false;
                this.key = '';
            },
            refreshCategory(){
                this.displayList = false;
                this.display = false;
                this.displayCategory = false;
                axios.get('/api/categories', this.config).then( (response) => {
                    this.selectedCat = '';
                    this.categories = response.data;
                });
            },
        }
    }
</script>