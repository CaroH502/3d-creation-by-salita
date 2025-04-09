 /** @type {import('tailwindcss').Config} */
 export default {
  content: ["./src/**/*.html", "./src/**/*.js"],
  theme: {
    extend: {
      colors: {
        primary: '#9333EA',    // Exemple : bleu principal
        secondary: '#9333EA',  // Exemple : violet secondaire
        accent: '#F59E0B',     // Exemple : orange accent
        background: '#F3F4F6', // Exemple : fond clair
        text: '#1F2937',       // Exemple : texte foncé
      }
    },
  },
  plugins: [],
}