<template>
    <div>
        <h4 class="text-center">Liste des pièces</h4><br />
        <div class="d-flex justify-content-end mb-3">
            <button type="button" class="btn btn-success" @click="$router.push({ name: 'addpieces' })">
                Ajouter une pièce
            </button>
        </div>
        <div v-if="message" class="alert alert-success">
            <p>{{ message }}</p>
        </div>
        <div class="row">
            <div v-for="piece in pieces" :key="piece.id" class="col-md-4">
                <div class="card card-body">
                    <h2>{{ piece.partName }}</h2>
                    <h3>{{ piece.supplier }}</h3>
                    <h4>{{ piece.price }}</h4>
                    <div v-if="piece.photo">
                        <img :src="`../images/upload/${piece.photo}`" class="card-img-top img-fluid" />
                    </div>
                    <div class="mt-2">
                        <router-link :to="{ name: 'editpieces', params: { id: piece.id } }" class="btn btn-outline-primary">
                            Savoir
                        </router-link>
                    </div>
                    <div class="mt-2">
                        <button @click="deletePiece(piece.id)" class="btn btn-outline-danger">
                            Supprimer
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-4">
            <pagination :data="pagination" @pagination-change-page="fetchPieces"></pagination>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            pieces: []
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(() => {
            this.$axios.get('api/pieces')
                .then(response => {
                    this.pieces = response.data;
                })
                .catch(error => {
                    console.error(error);
                });
        });
    },
    methods: {
        deletePiece(id) {
            this.$axios.get('/sanctum/csrf-cookie').then(() => {
                this.$axios.delete(`/api/pieces/${id}`)  // Updated route for deletion
                    .then(() => {
                        const i = this.pieces.findIndex(item => item.id === id);
                        if (i !== -1) this.pieces.splice(i, 1);
                    })
                    .catch(error => {
                        console.error(error);
                    });
            });
        }
    }
}
</script>
