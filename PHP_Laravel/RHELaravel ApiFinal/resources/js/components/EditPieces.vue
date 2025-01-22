<template>
  <div v-if="piece">
    <h1>Modifier la pièce: {{ piece.partName }}</h1>
    <form @submit.prevent="submitForm">
      <div class="form-group">
        <label for="partName">Titre de la pièce</label>
        <input type="text" id="partName" v-model="piece.partName" class="form-control" required />
      </div>

      <div class="form-group">
        <label for="supplier">Fournisseur</label>
        <input type="text" id="supplier" v-model="piece.supplier" class="form-control" required />
      </div>

      <div class="form-group">
        <label for="price">Prix</label>
        <input type="number" id="price" v-model="piece.price" class="form-control" step="0.01" required />
      </div>

      <div class="form-group">
        <label for="carModel">Modèle de la pièce</label>
        <input type="text" id="carModel" v-model="piece.carModel" class="form-control" required />
      </div>

      <div class="form-group">
        <label for="photo">Modifier l'image</label>
        <input type="file" id="photo" class="form-control" @change="handleFileUpload" />
      </div>

      <button type="submit" class="btn btn-primary">Mettre à jour</button>
      <router-link :to="`/pieces`" class="btn btn-info">Annuler</router-link>
    </form>
  </div>
  <div v-else>
    <p>Chargement de la pièce...</p>
  </div>
</template>

<script>
export default {
  data() {
    return {
      piece: null,  
      warningMessage: null,
    };
  },
  created() {
    const pieceId = this.$route.params.id;  
    this.fetchPiece(pieceId);  
  },
  methods: {

    fetchPiece(id) {
      this.$axios.get(`/pieces/edit/${id}`)
        .then(response => {
          this.piece = response.data;  
        })
        .catch(error => {
          console.error('Erreur lors du chargement de la pièce:', error);
          this.warningMessage = 'Erreur lors du chargement de la pièce.';
        });
    },

    handleFileUpload(event) {
      this.piece.photo = event.target.files[0];  
    },


    async submitForm() {
      const formData = new FormData();
      formData.append('partName', this.piece.partName);
      formData.append('supplier', this.piece.supplier);
      formData.append('price', this.piece.price);
      formData.append('carModel', this.piece.carModel);
      if (this.piece.photo) {
        formData.append('photo', this.piece.photo); 
      }

      try {
        await this.$axios.put(`/pieces/update/${this.piece.id}`, formData, {
          headers: {
            'Content-Type': 'multipart/form-data',
          },
        });
        this.$router.push(`/admin/pieces/${this.piece.id}`);  
      } catch (error) {
        console.error('Erreur lors de la mise à jour de la pièce:', error);
        this.warningMessage = error.response?.data?.message || 'Une erreur est survenue.';
      }
    },
  },
};
</script>
