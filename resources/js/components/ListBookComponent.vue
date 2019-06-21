<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">

                            <input v-if="editMode" type="text" class="form-control" v-model="item.name">
                            <p v-else>{{ item.name }}</p>
                            <input v-if="editMode" type="text" class="form-control" v-model="item.description">
                            <p v-else>{{ item.description }}</p>

                        </div>
                        <div class="panel-footer">
                            <button v-if="editMode" class="btn btn-success" v-on:click="onClickUpdate(item.id)">
                                Save
                            </button>
                            <button v-else class="btn btn-default" v-on:click="onClickEdit()">
                                Edit
                            </button>

                            <button class="btn btn-danger" v-on:click="onClickDelete(item.id)">
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['item'],
        data() {
            return {
                editMode: false
            };
        },
        mounted() {
            //axios.get('items')
        },
        methods: {
            onClickDelete(id) {
                axios.delete('/items/'+id).then((response) => {
                    this.$emit('delete');
                });
            },
            onClickEdit() {
                this.editMode = true;
            },
            onClickUpdate(id) {
                const params = {
                    name: this.item.name,
                    description: this.item.description
                };
                axios.put('/items/'+id , params).then((response) => {
                    this.editMode = false;
                    const item = response.data;
                    this.$emit('update', item);
                });
            }
        }
    }
</script>