const cardItems = document.querySelectorAll('.bank-card');
const modalBc = document.querySelector('.modal-bc');
const card = document.querySelector('.modal-bc .card');
const cancelBtn = document.querySelector('#cancel');
const addCardBtn = document.querySelector('#addCard');
const confirmBtn = document.querySelector('#confirm');
const machinesBox = document.querySelector('.machines-box');
const numberInput = document.querySelector('#card-number');
const cardsBody = document.querySelector('#bank-cards');
const dateToInp = document.querySelector('#date_to');
const fullNameInp = document.querySelector('#full_name');
const cvvInp = document.querySelector('#cvv');
const cards = getCards();

cancelBtn.addEventListener('click', closeWindow);
confirmBtn.addEventListener('click', closeWindow);

addCardBtn.addEventListener('click', openWindow);

document.body.addEventListener('click', () => {
    closeWindow();
});

card.addEventListener('click', (e) => {
    e.stopPropagation();
});


function getCards() {
    if (localStorage.getItem('cards')) {
        return JSON.parse(localStorage.getItem('cards'));
    } else {
        return [];
    }
}

function closeWindow() {
    modalBc.classList.remove('active');
}

function openWindow(e) {
    modalBc.classList.add('active');
    e.stopPropagation();
    e.preventDefault();
}

async function storeCard() {
    const response = await fetch('/api/cards', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            date_to: dateToInp.value,
            full_name: fullNameInp.value,
            cvv: cvvInp.value,
            number: numberInput.value,
        })
    });
    const json = await response.json()
    console.log(json);

    location.reload();
}
