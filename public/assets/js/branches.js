const branchItems = document.querySelectorAll('.branch-item');
const bookingItems = document.querySelectorAll('.booking-item');
const modalBc = document.querySelector('.modal-bc');
const card = document.querySelector('.modal-bc .card');
const cancelBtn = document.querySelector('#cancel');
const confirmBtn = document.querySelector('#confirm');
const machinesBox = document.querySelector('.machines-box');

cancelBtn.addEventListener('click', closeWindow);
confirmBtn.addEventListener('click', closeWindow);

branchItems.forEach(item => {
    item.onclick = (e) => {
        openWindow(e);
        hideBookingItems(e.target.dataset.name);
    }
});


bookingItems.forEach(item => {
    item.onclick = () => {
        item.classList.toggle('added');
    }
})

document.body.addEventListener('click', () => {
    closeWindow();
});

card.addEventListener('click', (e) => {
    e.stopPropagation();
});

function hideBookingItems(name) {
    const models = [...machinesBox.children];
    console.log(models);
    models.forEach(item => {
        if (item.id === name) {
            item.classList.add('active');
            return null;
        }

        item.classList.remove('active');
    })
}

function closeWindow() {
    document.body.style.overflow = 'auto';
    modalBc.classList.remove('active');
}

function openWindow(e) {
    document.body.style.overflow = 'hidden';
    modalBc.classList.add('active');
    e.stopPropagation();
    e.preventDefault();
}

