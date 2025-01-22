<template>
  <div class="row my-3">
    <div class="col-lg-8 mx-auto">
      <div class="card shadow">
        <div class="card-header bg-primary">
          <h1 class="text-light fw-bold">Ajouter une pièce</h1>
        </div>
        <div v-if="warningMessage" class="alert alert-warning">
          <p>{{ warningMessage }}</p>
        </div>
        <div class="card-body p-4">
          <form @submit.prevent="submitForm">
            <div class="form-group mb-3">
              <label for="partName"><strong>Titre de la pièce</strong></label>
              <input
                type="text"
                class="form-control"
                id="partName"
                v-model="form.partName"
                placeholder="Entrez le titre de la pièce"
              />
            </div>

            <div class="form-group mb-3">
              <label for="supplier"><strong>Fournisseur de la pièce</strong></label>
              <input
                type="text"
                class="form-control"
                id="supplier"
                v-model="form.supplier"
                placeholder="Entrez le fournisseur"
              />
            </div>

            <div class="form-group mb-3">
              <label for="price"><strong>Prix de la pièce</strong></label>
              <input
                type="number"
                step="0.01"
                class="form-control"
                id="price"
                v-model="form.price"
                placeholder="Entrez le prix"
                required
              />
            </div>

            <div class="form-group mb-3">
              <label for="carModel"><strong>Modèle de la pièce</strong></label>
              <input
                type="text"
                class="form-control"
                id="carModel"
                v-model="form.carModel"
                placeholder="Entrez le modèle"
              />
            </div>

            <div class="form-group mb-3">
              <label><strong>Image de la pièce</strong></label>
              <input
                type="file"
                class="form-control"
                id="photo"
                accept="image/*"
                @change="handleFileUpload"
              />
            </div>

            <div>
              <button type="submit" class="btn btn-primary">Publier</button>
              <router-link to="/pieces" class="btn btn-info">
                Retour à l'accueil
              </router-link>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        partName: "",
        supplier: "",
        price: "",
        carModel: "",
        photo: null,
      },
      warningMessage: null,
      isLoggedIn: false,
    };
  },
  created() {
    this.checkLoginStatus();
  },
  methods: {
    checkLoginStatus() {
      if (window.Laravel && window.Laravel.isLoggedin) {
        this.isLoggedIn = true;
      } else {
        this.isLoggedIn = false;
        this.warningMessage = "Utilisateur non authentifié.";
      }
    },

    handleFileUpload(event) {
      this.form.photo = event.target.files[0];
    },

    async submitForm() {
      if (!this.isLoggedIn) {
        this.warningMessage = "Utilisateur non authentifié.";
        return;
      }

      const formData = new FormData();
      formData.append('user_id', window.Laravel.user.id);

      for (const key in this.form) {
        formData.append(key, this.form[key]);
      }

      try {
        const response = await axios.post("/api/pieces", formData);
        this.$router.push("/pieces");
      } catch (error) {
        this.warningMessage = error.response?.data?.message || "Une erreur est survenue.";
      }
    },
  },
};
</script>
