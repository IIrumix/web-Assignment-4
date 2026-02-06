/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js}"],
  theme: {
    extend: {
      fontFamily: {
        // 'sans' overrides the default Tailwind sans font
        // 'thai' creates a custom class: font-thai
        thai: ['"IBM Plex Sans Thai"', 'sans-serif'],
      },
    },
  },
  plugins: [],
}