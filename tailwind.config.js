 /** @type {import('tailwindcss').Config} */
 export default {
  content: ["./src/**/*.html", "./src/**/*.js"],
  theme: {
    extend: {
      colors: {
        'teal': {
                  500: '#00617B',
                  600: '#0A6978',
                  700: '#085967'
              },
              'pink': {
                  100: '#FFF2F4',
                  200: '#FFE1E1',
                  300: '#FFD2D2'
              },
        primary: '#00617B',    // Exemple : bleu principal
        secondary: '#FFF2F4',  // Exemple : violet secondaire
      }
    },
  },
  plugins: [],
}
