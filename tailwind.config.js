/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.jsx",
        'node_modules/flowbite-react/**/*.{js,jsx,ts,tsx}',
    ],
    theme: {
        extend: {},
    },
    plugins: [
        require('flowbite/plugin')
    ],
}
