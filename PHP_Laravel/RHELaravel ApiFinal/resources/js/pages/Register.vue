<template>
  <div class="container">
    <h2 class="text-center">Inscription</h2>
    <form @submit.prevent="handleSubmit">
      <div class="form-group">
        <label for="name">Nom</label>
        <input
          type="text"
          id="name"
          v-model="form.name"
          class="form-control"
          required
        />
      </div>
      
      <div class="form-group">
        <label for="email">Adresse e-mail</label>
        <input
          type="email"
          id="email"
          v-model="form.email"
          class="form-control"
          required
        />
      </div>
      
      <div class="form-group">
        <label for="password">Mot de passe</label>
        <input
          type="password"
          id="password"
          v-model="form.password"
          class="form-control"
          required
        />
      </div>

      <div class="form-group">
        <label for="confirmPassword">Confirmer le mot de passe</label>
        <input
          type="password"
          id="confirmPassword"
          v-model="form.confirmPassword"
          class="form-control"
          required
        />
      </div>

      <div v-if="error" class="alert alert-danger mt-2">
        {{ error }}
      </div>

      <div v-if="message" class="alert alert-success mt-2">
        {{ message }}
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">
          Inscription
        </button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        name: '',
        email: '',
        password: '',
        confirmPassword: '',
      },
      message: '',
      error: '',
    };
  },
  methods: {
    handleSubmit() {
      this.error = '';
      this.message = '';

      if (this.form.password !== this.form.confirmPassword) {
        this.error = 'Les mots de passe ne correspondent pas!';
        return;
      }

      const registrationData = {
        name: this.form.name,
        email: this.form.email,
        password: this.form.password,
      };

      this.$axios.post('/api/register', registrationData)
        .then(response => {
          this.message = 'Inscription réussie! Veuillez vérifier votre e-mail pour confirmer votre compte.';
          this.$router.push({ name: 'login' });
        })
        .catch(error => {
          if (error.response && error.response.data) {
            this.error = error.response.data.message || 'Une erreur est survenue. Veuillez réessayer.';
          } else {
            this.error = 'Une erreur inattendue est survenue. Veuillez réessayer.';
          }
        });
    },
  },
};
</script>

<style scoped>
.container {
  max-width: 500px;
  margin: 0 auto;
  padding-top: 50px;
}

.form-group {
  margin-bottom: 15px;
}

.btn {
  margin-top: 15px;
}
</style>
