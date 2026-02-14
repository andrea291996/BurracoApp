
const radioButtons = document.querySelectorAll('input[name="tipologia-utente"]');
const divGiocatore = document.getElementById('form-giocatore');
const divCircolo = document.getElementById('form-circolo');

radioButtons.forEach(radio => {
    radio.addEventListener('change', () => {
        if (radio.value === 'giocatore') {
            divGiocatore.style.display = 'block';
            divCircolo.style.display = 'none';
        } else {
            divGiocatore.style.display = 'none';
            divCircolo.style.display = 'block';
        }
    });
});