import "./bootstrap";

import Alpine from "alpinejs";
import collapse from "@alpinejs/collapse";

// dropzone();
Alpine.plugin(collapse);

Alpine.store("darkMode", {
    init() {
        // Check if there is a saved theme in localStorage
        const savedTheme = localStorage.getItem("darkMode");

        // If a saved theme exists, use it; otherwise, use the system preference
        if (savedTheme !== null) {
            this.dark = savedTheme === "true";
        } else {
            this.dark = window.matchMedia(
                "(prefers-color-scheme: dark)"
            ).matches;
        }

        // Apply the theme on load
        this.applyTheme();
    },

    dark: true,

    toggle() {
        // Toggle theme
        this.dark = !this.dark;

        // Save the updated theme in localStorage
        localStorage.setItem("darkMode", this.dark);

        // Apply the theme after toggling
        this.applyTheme();
    },

    applyTheme() {
        if (this.dark) {
            document.documentElement.classList.add("dark");
        } else {
            document.documentElement.classList.remove("dark");
        }
    },
});

window.Alpine = Alpine;

Alpine.start();
