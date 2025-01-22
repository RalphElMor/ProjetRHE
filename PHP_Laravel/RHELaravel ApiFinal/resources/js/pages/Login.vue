<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ $t('Connexion') }}</div>
          <div class="card-body">
            <form @submit.prevent="submitLogin">
              <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">
                  {{ $t('Adresse e-mail') }}
                </label>
                <div class="col-md-6">
                  <input
                    id="email"
                    type="email"
                    class="form-control"
                    v-model="email"
                    required
                    autocomplete="email"
                    autofocus
                  />
                  <span v-if="errors.email" class="invalid-feedback">
                    <strong>{{ errors.email }}</strong>
                  </span>
                </div>
              </div>

              <div class="row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-end">
                  {{ $t('Mot de passe') }}
                </label>
                <div class="col-md-6">
                  <input
                    id="password"
                    type="password"
                    class="form-control"
                    v-model="password"
                    required
                    autocomplete="current-password"
                  />
                  <span v-if="errors.password" class="invalid-feedback">
                    <strong>{{ errors.password }}</strong>
                  </span>
                </div>
              </div>

              <div class="row mb-0">
                <div class="col-md-8 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    {{ $t('Connexion') }}
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Login",
  data() {
    return {
      email: "",
      password: "",
      errors: {}, 
    };
  },
  methods: {
    async submitLogin() {
    
      this.errors = {};

      if (this.password.length < 8) {
        this.errors.password = "Le mot de passe doit comporter au moins 8 caractères.";
        return;
      }
      try {
  
        await axios.get('/sanctum/csrf-cookie', { withCredentials: true });

        const response = await axios.post('api/login', {
          email: this.email,
          password: this.password,
        }, {
          headers: {
            Accept: 'application/json',
          },
          withCredentials: true,  
        });

        console.log("Connexion réussie:", response.data);

        if (response.data.token) {
          localStorage.setItem("token", response.data.token);
        }

        this.$router.push('/dashboard');
      } catch (error) {
        console.error("Échec de la connexion", error);

        if (error.response && error.response.data) {
          this.errors = error.response.data.errors || { general: 'Identifiants invalides' };
        } else {
          this.errors.general = "Une erreur inattendue est survenue. Veuillez réessayer.";
        }
      }
    },
  },
};
</script>
