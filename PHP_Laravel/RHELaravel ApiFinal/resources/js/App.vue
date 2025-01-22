<template>
    <div class="container">
      <div class="text-center" style="margin: 20px 0px; background-color:#2769b0; color: #FFFF;">
        <h2>Site monopage Laravel-Vue avec authentification</h2>
      </div>
      <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color:#3485dc; color: #FFFF;">
        <div class="collapse navbar-collapse">
          <!-- Logged-in User -->
          <div class="navbar-nav" v-if="isLoggedIn">
            <router-link to="/dashboard" class="nav-item nav-link">Dashboard</router-link>
            <router-link to="/pieces" class="nav-item nav-link">Pieces</router-link>
            <a class="nav-item nav-link" style="cursor: pointer;" @click="logout">Logout</a>
          </div>
          <!-- Non-Logged-in User -->
          <div class="navbar-nav" v-else>
            <router-link to="/" class="nav-item nav-link">Home</router-link>
            <router-link to="/pieces" class="nav-item nav-link">Pieces</router-link>
            <router-link to="/login" class="nav-item nav-link">Login</router-link>
            <router-link to="/register" class="nav-item nav-link">Register</router-link>
            <router-link to="/about" class="nav-item nav-link">About</router-link>
          </div>
        </div>
        <!-- SearchBar Component -->
        <div>
          <SearchBar />
        </div>
      </nav>
      <br />
      <router-view />
    </div>
  </template>
  
  <script>
  import SearchBar from './pages/SearchBar.vue';
  
  export default {
    name: "App",
    components: {
      SearchBar,
    },
    data() {
      return {
        isLoggedIn: false,
      };
    },
    created() {
      // Set login state from Laravel variable
      if (window.Laravel.isLoggedin) {
        this.isLoggedIn = true;
      }
    },
    methods: {
      logout(e) {
        e.preventDefault();
        this.$axios.get('/sanctum/csrf-cookie').then(() => {
          this.$axios.post('/api/logout')
            .then((response) => {
              if (response.data.success) {
                this.isLoggedIn = false;
                window.location.href = "/";
              } else {
                console.error(response.data.message);
              }
            })
            .catch((error) => {
              console.error("Logout Error:", error.response ? error.response.data : error.message);
            });
        });
      },
    },
  };
  </script>
  