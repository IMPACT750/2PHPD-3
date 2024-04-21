/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",  // Assurez-vous que les chemins correspondent à l'endroit où vos fichiers utilisent des classes Tailwind
    "./templates/**/*.html.twig",
  ],
  theme: {
    extend: {
      colors: {
        'custom-blue': '#243c5a',  // Ajoute une nouvelle couleur personnalisée
      },
      spacing: {
        '72': '18rem',  // Ajoute une nouvelle taille de spacing
        '84': '21rem',
      },
      borderRadius: {
        'xl': '1.5rem'  // Ajoute une nouvelle taille pour border-radius
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),  // Ajoute le plugin pour les formulaires
    require('@tailwindcss/typography'),  // Ajoute le plugin pour la typographie
  ],
}
