 /** @type {import('tailwindcss').Config} */
 export default {
  content: ["./src/**/*.html", "./src/**/*.js"],
  theme: {
    extend: {
      colors: {
        primary: '#00617B',    // Exemple : bleu principal
        secondary: '#FFF2F4',  // Exemple : violet secondaire
        //accent: '#F59E0B',     // Exemple : orange accent
        //background: '#F3F4F6', // Exemple : fond clair
        //text: '#1F2937',       // Exemple : texte foncé
      }
    },
  },
  plugins: [],
}