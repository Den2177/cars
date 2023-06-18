const bookingItems = document.querySelectorAll('.booking-item');
const fromInp = document.querySelector('#fromInput');
const toInp = document.querySelector('#toInput');
const oldPrice = document.querySelector('#old-price');
const newPrice = document.querySelector('#new-price');
const priceInp = document.querySelector('#all-price');
const carsSelect = document.querySelector('#all-cars');
let globalCalced = 0;
let globalDifference = 0;
let carIds = [];

let currentPrice = 0;

bookingItems.forEach(item => {
    item.onclick = (e) => {
        item.classList.toggle('added');
        let price = item.querySelector('.price-box h3').innerText;
        price = parseInt(price);

        if (item.classList.contains('added')) {
            item.querySelector('.btn').innerText = 'Отменить выбор';
            carIds.push(+item.id.slice(1));
        } else {
            item.querySelector('.btn').innerText = 'Выбрать';
            carIds = carIds.filter(carId => +item.id.slice(1) !== +carId)
        }

        renderCarsSelect();

        if (!emptyDates()) printPrice();
    }
});

toInp.addEventListener('change', () => {
    printPrice();
});

function renderCarsSelect() {
    carsSelect.innerHTML = '';

    carIds.forEach(id => {
        carsSelect.innerHTML += `<option selected value="${id}">nevazhno</option>`
    });
}

function emptyDates() {
    return (!fromInp.value || !toInp.value);
}

function getDiffInDays(date1, date2) {
    return Math.ceil((new Date(date1).getTime() - new Date(date2).getTime()) / (3600 * 24 * 1000));
}

function countSale(difference) {
    let skidka = 0;

    for (let i = 0; i < Math.floor(difference / 3); i++) {
        if (skidka === 25) {
            break;
        }

        skidka += 5;
    }
    return skidka;
}

function countWithSale(price, sale) {
    return Math.round(price - (price * (sale / 100)));
}

function printPrice() {
    const difference = getDiffInDays(toInp.value, fromInp.value);

    let result = 0;
    carIds.forEach(carId => {
        let price = document.querySelector('#e' + carId).querySelector('#price').innerText;
        price = parseInt(price);
        result += (price * difference);
    });

    currentPrice = result;

    if (difference >= 3 && currentPrice) {
        const saleProcent = countSale(difference);
        const old = currentPrice;
        currentPrice = countWithSale(currentPrice, saleProcent);
        printPriceWithSale(old, currentPrice);
    } else {
        printCommonPrice();
    }

    priceInp.value = currentPrice;
}

function printCommonPrice() {
    newPrice.innerText = '';
    oldPrice.style.textDecoration = 'none';
    oldPrice.style.fontSize = '1.8rem';

    oldPrice.innerText = currentPrice + ' ₽';
}

function printPriceWithSale(old, current) {
    oldPrice.innerText = old + ' ₽';
    oldPrice.style.textDecoration = 'line-through';
    oldPrice.style.fontSize = '.8rem';
    newPrice.innerText = currentPrice + ' ₽';
}
