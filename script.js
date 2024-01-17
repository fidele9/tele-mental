
    document.addEventListener('DOMContentLoaded', function () {
        // Select all links with hashes
        document.querySelectorAll('a[href^=""]').forEach(anchor => {
            // Smooth scrolling when the link is clicked
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('home')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    });

