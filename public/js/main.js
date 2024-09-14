function toggleHeaderLocations() {
    const locationsBlock = document.querySelector('.header__location-unvisible');
    locationsBlock.classList.toggle('active');

    const locationsVisibleBlock = document.querySelector('.header__location-visible');
    locationsVisibleBlock.classList.toggle('active');

    const locationArrow = document.querySelector(".header-location__arrow");
    locationArrow.classList.toggle('active');
}

function closeModal() {
    const modal = document.querySelector('.modal__block');

    modal.style.display = 'none';
    document.querySelectorAll('.modal-content').forEach((elem) => elem.style.display = 'none');
    document.querySelector('body').style.overflow = 'auto';
}

function openModal(formName) {
    const modal = document.querySelector('.modal__block');
    const form = document.querySelector('.' + formName);

    modal.style.display = 'flex';
    form.style.display = 'block';
    document.querySelector('body').style.overflow = 'hidden';
}

function calcCreditPrice(changeMonth, price) {
    const months = parseInt(changeMonth.value);
    const pricePerMonth = price / months;
    const pricePerMonthUah = pricePerMonth * 40;

    const pricePerMonthFormatted = formatCurrency(pricePerMonth);
    const pricePerMonthUahFormatted = formatCurrency(pricePerMonthUah);

    document.querySelector('.calc-credit__price').textContent = `${pricePerMonthFormatted} $`;
    document.querySelector('.calc-credit__price-uah').textContent = `${pricePerMonthUahFormatted} грн.`;
}

function formatCurrency(amount) {
    return new Intl.NumberFormat('uk-UA', {
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
    }).format(amount);
}

