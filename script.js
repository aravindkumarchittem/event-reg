document.addEventListener('DOMContentLoaded', () => {
    const events = [
        { id: 1, name: 'Tech Talk', description: 'A talk on the latest tech trends.', date: '2024-06-15' },
        { id: 2, name: 'Coding Workshop', description: 'Hands-on coding workshop.', date: '2024-06-20' },
        { id: 3, name: 'Robotics Exhibition', description: 'Showcase of robotic projects.', date: '2024-06-25' },
        // Add more events as needed
    ];

    const eventsGrid = document.querySelector('.events-grid');

    events.forEach(event => {
        const eventCard = document.createElement('div');
        eventCard.classList.add('event-card');

        eventCard.innerHTML = `
            <h3>${event.name}</h3>
            <p>${event.description}</p>
            <p><strong>Date:</strong> ${event.date}</p>
            <a href="#" class="button">Register</a>
        `;

        eventsGrid.appendChild(eventCard);
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

