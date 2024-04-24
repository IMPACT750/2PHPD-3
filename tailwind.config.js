/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
  ],
  theme: {
    extend: {
      colors: {
        'brand-blue': '#007ace',  // Une couleur bleue vibrante pour la marque
        'warm-gray': '#f5f5f5',  // Un gris doux pour les arrière-plans
        'rich-black': '#080808',  // Un noir profond pour le texte et les éléments
      },
      fontFamily: {
        'sans': ['Helvetica Neue', 'Arial', 'sans-serif'],  // Utilisation de Helvetica Neue pour les textes sans serif
        'serif': ['Georgia', 'Times New Roman', 'serif']    // Georgia comme police par défaut pour les textes serif
      },
      fontSize: {
        'xs': '.75rem',    // Taille extra small
        'sm': '.875rem',   // Taille small
        'lg': '1.25rem',   // Taille large
        'xl': '1.5rem',    // Taille extra large
      },
      boxShadow: {
        'custom': '0 4px 6px rgba(0, 0, 0, 0.1)',  // Ombre personnalisée pour les éléments flottants
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),  // Active le support amélioré pour les formulaires
  ],
}
