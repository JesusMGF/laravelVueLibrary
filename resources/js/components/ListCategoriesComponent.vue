<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <select class="form-group" v-model="selectedCat" @change="setCategorie($event)" >
                            <option value=""></option>
                            <option value="0">All</option>
                            <option v-for="categorie in categories" :key="categorie.id" :value="categorie.id"> {{categorie.name}} </option>
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
                displayList: false
            }
        },

        mounted() {
            axios.get('/categories').then( (response) => {
                this.categories = response.data;
            });
        },

        methods: {
            setCategorie(event){
                this.displayList = true;
                this.display = false;
                this.displayCategory = false;
                if (event.target.value === ''){
                    this.displayList = false;
                    this.display = false;
                    this.displayCategory = false;
                }
                else if (event.target.value === '0')
                {
                    axios.get('/items').then( (response) => {
                        this.items = response.data;
                    });
                }
                else 
                {
                    axios.get('/items/'+event.target.value).then( (response) => {
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
                this.selectedCat = '';
                this.displayList = false;
                this.display = false;
                this.displayCategory = false;
                axios.get('/categories').then( (response) => {
                    this.categories = response.data;
                });
            },
        }
    }
</script>