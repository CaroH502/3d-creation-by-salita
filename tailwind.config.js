/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js}"],
  theme: {
                extend: {
                    colors: {
                        'teal': {
                            500: '#0D7A8A',
                            600: '#0A6978',
                            700: '#085967',
                        },
                        'pink': {
                            100: '#FFF0F0',
                            200: '#FFE1E1',
                            300: '#FFD2D2',
                            400: '#E594A3',
                            500: '#DA7C8E',
                        }
                    },
                    spacing: {
                        '14': '3.5rem',   // 56px - title to content spacing
                        '30': '7.5rem',   // 120px - figma margins
                        '40': '10rem',    // 160px - section spacing
                    },
                    maxWidth: {
                        'figma': '1200px', // 1440px - (120px * 2)
                    }
                }
            },
  plugins: [],
}
