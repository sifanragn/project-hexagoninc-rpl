/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./index.html",
    "./src/**/*.{vue,js,ts,jsx,tsx}", // Scan semua file di src
  ],
  theme: {
    extend: {
      colors: {
        primary: "#1d4ed8",   // Biru (Tailwind blue-700)
        secondary: "#9333ea", // Ungu (Tailwind purple-600)
        accent: "#f59e0b",    // Kuning/Orange (Tailwind amber-500)
        dark: "#111827",      // Dark gray (Tailwind gray-900)
        light: "#f3f4f6",     // Light gray (Tailwind gray-100)
      },
      fontFamily: {
        sans: ["Inter", "sans-serif"],
        heading: ["Poppins", "sans-serif"],
      },
      spacing: {
        18: "4.5rem",
        22: "5.5rem",
        26: "6.5rem",
      },
      borderRadius: {
        "4xl": "2rem",
      },
      boxShadow: {
        soft: "0 2px 8px rgba(0,0,0,0.08)",
        strong: "0 4px 16px rgba(0,0,0,0.12)",
      },
    },
  },
  plugins: [
    require("@tailwindcss/forms"),
    require("@tailwindcss/typography"),
    require("@tailwindcss/line-clamp"),
    require("@tailwindcss/aspect-ratio"),
  ],
}
