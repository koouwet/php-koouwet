const display = document.getElementById('display');

function append(value) {
    display.textContent += value;
}

function clearDisplay() {
    display.textContent = '';
}

function calculate() {
    const expression = display.textContent;

    fetch(`calculator.php?expression=${encodeURIComponent(expression)}`)
        .then(res => res.json())
        .then(data => {
            display.textContent = data.result;
        })
        .catch(err => {
            display.textContent = 'Ошибка';
            console.error(err);
        });
}