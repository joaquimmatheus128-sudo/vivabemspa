module.exports = {
    content: [
        './resources/views/**/*.blade.php',
    ],
    theme: {
        screens: {
            sm: '640px',
            md: '768px',
            lg: '1024px',
            xl: '1280px',
            xxl: '1320px',
        },
        extend: {
            colors: {
                mainColor: '#ffffff',
                primaryColor: '#121212',
                bodyBackground: '#121212',
                headingColor: '#ffffff',
                bodyColor: '#999999',
                blackColor: '#000000',
                blackColorSolid: '#000000',
                lighterColor: '#1c1c1c',
                subtitleColor: '#c9c9c9',
                borderColor: '#353535',
                'border-color': '#353535',
                buttonBorder: '#353535',
                'primatext-primaryColor': '#121212',
                'lighbg-lighterColor': '#1c1c1c',
            },
            fontFamily: {
                textFont: ['Poppins', 'sans-serif'],
                titleFont: ['Oswald', 'sans-serif'],
                'awesome-5-pro': ['Font Awesome 5 Pro'],
            },
        },
    },
    plugins: [],
};
