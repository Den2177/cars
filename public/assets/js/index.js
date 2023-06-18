const advantageBlock = document.querySelector('#advantage');
const newsBlock = document.querySelector('#news');
const banner = document.querySelector('#banner');

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('active');
        }
    });
}, {
    threshold: 0.25,
});

observer.observe(advantageBlock);
observer.observe(newsBlock);
observer.observe(banner);