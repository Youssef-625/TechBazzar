import './bootstrap';

    document.addEventListener('DOMContentLoaded', () => {
    const items = document.querySelectorAll('.carousel-item');
    let currentIndex = 0;

    const showItem = index => {
    items.forEach((item, i) => {
    item.style.opacity = i === index ? 1 : 0;
});
};

    const nextItem = () => {
    currentIndex = (currentIndex + 1) % items.length;
    showItem(currentIndex);
};

    const prevItem = () => {
    currentIndex = (currentIndex - 1 + items.length) % items.length;
    showItem(currentIndex);
};

    document.getElementById('nextBtn').addEventListener('click', nextItem);
    document.getElementById('prevBtn').addEventListener('click', prevItem);

    // Auto-slide every 5 seconds
    setInterval(nextItem, 10000);

    // Show the first item
    showItem(currentIndex);
});
