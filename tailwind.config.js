/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        primary: "#FEFFC4",
        second: "#FFDE63",
        third: "#FFBC4C",
        myBlue: "#799EFF",
      },
    },
  },
  plugins: [],
};
