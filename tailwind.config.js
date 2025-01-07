import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            colors:{
                nearyellow:'#FCB859',
                neargray:'#555555',
                foodbg:'#F5F8FD',
                foodheader:'#00A149',
                footerbg:'#1E1E1EF0',
                closeryellow:'#DA802F',
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                Oswald: ['Oswald', 'sans-serif'],
                Inter: ['Inter', 'sans-serif'],
                FredokaOne: ['Fredoka One', 'sans-serif'],
                Epilogue: ['Epilogue', 'sans-serif'],

            },
        },
    },
    plugins: [],
};
