import { createI18n } from 'vue-i18n';

// Define translations
const messages = {
  en: {
    Login: "Login",
    Email: "Email Address",
    Password: "Password",
  },
  fr: {
    Login: "Connexion",
    Email: "Adresse e-mail",
    Password: "Mot de passe",
  }
};

// Create i18n instance
const i18n = createI18n({
  locale: 'en',
  fallbackLocale: 'en',
  messages,
});

export default i18n;
