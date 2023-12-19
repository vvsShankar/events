   
      
    $(document).ready(function() {
        $('.event-slider').slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            infinite: false,
            arrows: true,
            variablewidth: true,
            dots: false,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ],
            prevArrow: '<button type="button" class="prev"><i class="fa-sharp fa-solid fa-arrow-left"></i></button>',
            nextArrow: '<button type="button" class="next"><i class="fa-sharp fa-solid fa-arrow-right"></i></button>',

        });

    });




   
   // Function to fetch data from the API and handle errors
    const fetchData = () => {
        fetch('https://jsonplaceholder.typicode.com/users')
        .then(res => {
        if (!res.ok) {
            throw new Error('*** Failed to fetch data');
        }
        return res.json();
        })
        .then(data => {
        const userDetails = data.map(user => {
            const nameMarkup = `<h4 class="name">${user.name}</h4>`;
            const emailMarkup = `<p class="email">${user.email}</p>`;
            return `<div class="list">${nameMarkup}${emailMarkup}</div>`;
        });
        document.querySelector('.spekers-sliders').innerHTML = userDetails.join('');

        // Cache the fetched data in the browser's local storage
        localStorage.setItem('cachedUserData', JSON.stringify(data));
        })
        .catch(error => {
        console.log('Error:', error.message);
        const errorMessage = `<p>Failed to fetch data. Please try again later.</p>`;
        document.querySelector('.spekers-sliders').innerHTML = errorMessage;
        
        // Attempt to retrieve cached data and display it if available
        const cachedData = localStorage.getItem('cachedUserData');
        if (cachedData) {
            const data = JSON.parse(cachedData);
            const userDetails = data.map(user => {
            const nameMarkup = `<h4 class="name">${user.name}</h4>`;
            const emailMarkup = `<p class="email">${user.email}</p>`;
            return `<div class="list">${nameMarkup}${emailMarkup}</div>`;
            });
            document.querySelector('.spekers-sliders').innerHTML = userDetails.join('');
        }
        });
    };

    // Fetch data when the DOM content is loaded
    document.addEventListener('DOMContentLoaded', fetchData);

    //slick slider settings
 