/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            // Add custom scrollbar utilities
            scrollbar: {
                'hide': {
                    'scrollbar-width': 'none',  /* Firefox */
                    'ms-overflow-style': 'none', /* IE and Edge */
                },
                'hide-webkit': {
                    '::-webkit-scrollbar': {
                        display: 'none',  /* WebKit browsers (Chrome, Safari) */
                    },
                },

            },
        },
    },
    plugins: [
        function ({ addUtilities }) {
            addUtilities(
                {
                    '.scrollbar-hide': {
                        'overflow': 'hidden',  /* Hide scrollbar */
                        'scrollbar-width': 'none', /* Firefox */
                        'ms-overflow-style': 'none', /* IE and Edge */
                    },
                    '.scrollbar-hide::-webkit-scrollbar': {
                        'display': 'none', /* WebKit browsers (Chrome, Safari) */
                    },
                },
                ['responsive', 'hover']
            );
        },
    ],
}
