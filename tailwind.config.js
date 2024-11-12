import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import daisyui from "daisyui";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        fontSize: {
            xs: "0.75rem",
            sm: "0.875rem",
            base: "1rem",
            lg: "1.125rem",
            xl: "1.25rem",
            "2xl": "1.5rem",
            "3xl": "1.875rem",
            "4xl": "2.25rem",
            "5xl": "3rem",
            "6xl": "3.75rem",
            "7xl": "4.5rem",
            "8xl": "6rem",
            "9xl": "8rem",
            "10xl": "10rem",
        },
        extend: {
            fontFamily: {
                inter: ["Inter", "sans-serif"],
                zain: ["Zain", "sans-serif"],
            },
            colors: {
                primary: "#8057DA",
                secondary: "#9D76EC",
                "fg-primary": "#181D27",
                "fg-primary-dark": "#F7F7F7",
                "fg-secondry": "#414651",
                "fg-secondry-hover": "#252B37",
                "fg-secondry-dark": "#CECFD2",
                "fg-secondry-dark-hover": "#ECECED",
                "fg-tertiary": "#535862",
                "fg-tertiary-dark": "#94979C",
                "fg-quaternary": "#717680",
                "fg-quaternary-dark": "#94979C",
                "border-primary": "#D5D7DA",
                "border-primary-dark": "#373A41",
                "border-secondry": "#E9EAEB",
                "border-secondry-dark": "#22262F",
            },
            backgroundColor: {
                "bg-primary": "#FFFFFF",
                "bg-active": "#FAFAFA",
                "bg-secondry": "#FAFAFA",
                "bg-primary-dark": "#0C0E12",
                "bg-active-dark": "#22262F",
                "bg-secondry-dark": "#13161B",
            },
        },
        darkMode: "selector",
        backgroundImage:{
            'grid-pattern':`linear-gradient(90deg,rgba(0,0,0,0.1) 1px,transparent 1px),
                            linear-gradient (180deg,rgba(0,0,0,0.1) 1px,transparent 1px)`
        },
    },

    plugins: [forms, daisyui],
};
