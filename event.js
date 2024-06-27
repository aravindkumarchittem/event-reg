document.addEventListener('DOMContentLoaded', () => {
    const events = [
        { id: 1, name: 'Tech Talk', description: 'A talk on the latest tech trends.', venue: 'Main Auditorium', time: '2024-06-15 10:00 AM', category:'workshop' },
        { id: 2, name: 'Coding Workshop', description: 'Hands-on coding workshop.', venue: 'Room 101', time: '2024-06-20 2:00 PM', category:'workshop'},
        { id: 3, name: 'Robotics Exhibition', description: 'Showcase of robotic projects.', venue: 'Robotics Lab', time: '2024-06-25 11:00 AM', category:'workshop' },
        { id: 4, name: 'Data Science Conference', description: 'Conference on data science trends.', venue: 'Conference Hall', time: '2024-07-01 9:30 AM', category:'conference' },
        { id: 5, name: 'Web Development Seminar', description: 'Seminar covering latest web dev tools.', venue: 'Seminar Room A', time: '2024-07-05 3:00 PM', category:'seminar' },
        { id: 6, name: 'Artificial Intelligence Workshop', description: 'Hands-on workshop on AI applications.', venue: 'AI Lab', time: '2024-07-10 10:30 AM', category:'workshop' },
        { id: 7, name: 'Startup Pitch Competition', description: 'Competition for aspiring startups.', venue: 'Startup Hub', time: '2024-07-15 1:00 PM', category:'conferences' },
        { id: 8, name: 'Design Thinking Workshop', description: 'Interactive workshop on design thinking.', venue: 'Design Studio', time: '2024-07-20 11:30 AM', category:'workshop' },
        { id: 9, name: 'Blockchain Conference', description: 'Conference exploring blockchain technologies.', venue: 'Blockchain Hall', time: '2024-07-25 9:00 AM',category:'conference' },
        { id: 10, name: 'Mobile App Development Workshop', description: 'Learn to develop mobile apps from scratch.', venue: 'Mobile Lab', time: '2024-07-30 2:30 PM', category:'workshop' },
        { id: 11, name: 'Digital Marketing Seminar', description: 'Seminar on effective digital marketing strategies.', venue: 'Marketing Room', time: '2024-08-05 4:00 PM',category:'seminar' },
        { id: 12, name: 'Cloud Computing Workshop', description: 'Hands-on workshop on cloud computing.', venue: 'Cloud Lab', time: '2024-08-10 10:00 AM', category:'workshop' },
        { id: 13, name: 'Virtual Reality Showcase', description: 'Explore the latest in virtual reality.', venue: 'VR Lab', time: '2024-08-15 1:30 PM',category:'workshops' },
        { id: 14, name: 'Machine Learning Conference', description: 'Conference on machine learning advancements.', venue: 'ML Hall', time: '2024-08-20 3:30 PM',category:'conference' },
        { id: 15, name: 'UI/UX Design Workshop', description: 'Workshop focusing on UI/UX principles.', venue: 'Design Lab', time: '2024-08-25 11:00 AM', category:'workshop' },
        { id: 16, name: 'IoT Seminar', description: 'Seminar on the Internet of Things technologies.', venue: 'IoT Room', time: '2024-09-01 2:00 PM', category:'seminar' },
        { id: 17, name: 'Cybersecurity Workshop', description: 'Workshop on cybersecurity best practices.', venue: 'Security Lab', time: '2024-09-05 10:30 AM', category:'workshop' },
        { id: 18, name: 'Big Data Conference', description: 'Conference on big data and analytics.', venue: 'Big Data Hall', time: '2024-09-10 1:00 PM', category:'conference' },
        { id: 19, name: 'AR Applications Workshop', description: 'Hands-on workshop on Augmented Reality.', venue: 'AR Lab', time: '2024-09-15 3:30 PM', category:'workshop' },
        { id: 20, name: 'Python Programming Seminar', description: 'Seminar covering Python programming language.', venue: 'Python Room', time: '2024-09-20 11:00 AM', category:'seminar' }
    ];

    const slidesContainer = document.querySelector('.slides-container');
    const filterButtons = document.querySelectorAll('.filter-button');
    const searchInput = document.getElementById('searchInput');

    let currentFilter = 'all';

    // Function to generate event cards
    function generateEventCards(eventsData) {
        slidesContainer.innerHTML = '';

        eventsData.forEach(event => {
            const eventCard = document.createElement('div');
            eventCard.classList.add('event-card');

            eventCard.innerHTML = `
                <h3>${event.name}</h3>
                <p>${event.description}</p>
                <div class="venue-time">
                    <p><strong>Venue:</strong> ${event.venue}</p>
                    <p><strong>Time:</strong> ${event.time}</p>
                </div>
                <a href="#" class="button">Register</a>
            `;

            slidesContainer.appendChild(eventCard);
        });
    }

    // Initial generation of event cards
    generateEventCards(events);

    // Function to filter events by category
    function filterEvents(category) {
        if (category === 'all') {
            generateEventCards(events);
        } else {
            const filteredEvents = events.filter(event => event.category === category);
            generateEventCards(filteredEvents);
        }
    }

    // Event listeners for filter buttons
    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            currentFilter = button.dataset.filter;
            filterEvents(currentFilter);
        });
    });

    // Function to handle search input
    searchInput.addEventListener('input', () => {
        const searchTerm = searchInput.value.toLowerCase();
        const filteredEvents = events.filter(event =>
            event.name.toLowerCase().includes(searchTerm) ||
            event.description.toLowerCase().includes(searchTerm) ||
            event.venue.toLowerCase().includes(searchTerm)
        );
        generateEventCards(filteredEvents);
    });

});

let mybutton = document.getElementById("backToTop");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {
  scrollFunction();
};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE, and Opera
}