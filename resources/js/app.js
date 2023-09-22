import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])


// RECUPERO TUTTI I DELETE_BUTTON DI OGNI ANIMALE
const dishDeleteButton = document.querySelectorAll('.dish-delete-button');

// CICLO L'ARRAY CONTENENTE TUTTI I DELETE_BUTTON
dishDeleteButton.forEach((button) => {

    // PER OGNI DELETE_BUTTON, AGGIUNGO UN EVENT_LISTENER "CLICK"
    button.addEventListener('click', (event) => {

        // QUANDO L'UTENTE CLICCA SUL DELETE_BUTTON, IL FORM NON VIENE AVVIATO GRAZIE A QUESTO COMANDO
        event.preventDefault();

        // QUANDO L'UTENTE CLICCA SUL DELETE_BUTTON, MI VIENE PASSATO UN DATA ATTRIBUTE, LO RECUPERO TRAMITE QUESTA STRINGA
        const dishName = button.getAttribute('data-dish-name');

        // RECUPERO IL TAG HTML DELLA MODALE DOVE INSERIRE IL DATA ATTRIBUTE RECUPERATO PRIMA
        const modaldishName = document.getElementById('modal-dish-name');

        // INSERISCO IL DATA ATTRIBUTE DENTRO IL "MODAL_dish_NAME"
        modaldishName.innerText = dishName;

        // RECUPERO L'HTML DELLA MODALE "MODAL_dish_DELETE", DALLA VIEW ADMIN -> PARTIALS
        const modal = document.getElementById('dishConfirmDeleteModal');

        // CREO LA MODALE COME OGGETTO DI BOOTSTRAP, PARTENDO DALL'HTML DELLA MODALE RECUPERATA PRIMA
        const bootstrapModal = new bootstrap.Modal(modal);

        // QUANDO L'UTENTE CLICCA NEL DELETE_BUTTON, MOSTRO LA "BOOTSTRAP_MODAL"
        bootstrapModal.show();

        // RECUPERO IL PULSANTE DI "CONFERMA CANCELLAZIONE" PRESENTE NELLA MODALE
        const dishConfirmDeleteButton = document.getElementById('dish-confirm-delete-button');

        // AL PULSANTE DI "CONFERMA CANCELLAZIONE", AGGIUNGO UN EVENT_LISTENER "CLICK"
        dishConfirmDeleteButton.addEventListener('click', () => {

            // QUANDO L'UTENTE CLICCA IL PULSANTE DI "CONFERMA CANCELLAZIONE", RECUPERO IL "DELETE_BUTTON", ED ESEGUO LA FORM DI CANCELLAZIONE
            button.submit();
        })
    })
})


// Questa parte assicura che il codice JavaScript venga eseguito solo quando il DOM è completamente caricato.
document.addEventListener("DOMContentLoaded", function () {

    // Seleziona il campo di input della password.
    let passwordField = document.getElementById('password');

    // Seleziona il campo di input della conferma password.
    let confirmPasswordField = document.getElementById('password-confirm');

    // Seleziona l'elemento HTML in cui verrà visualizzato il messaggio di errore.
    let confirmPasswordError = document.getElementById('password-confirm-error');


    // Seleziona tutte le caselle di controllo all'interno del modulo.
    let checkboxes = document.querySelectorAll('input[type="checkbox"]');

    // Seleziona il modulo del formulario.
    let form = document.querySelector('form');

    // Seleziona l'elemento HTML in cui verrà visualizzato il messaggio di errore.
    let errorSpan = document.getElementById('checkboxError');

    // Aggiunge un ascoltatore di eventi al modulo del formulario quando viene inviato.
    form.addEventListener("submit", function (event) {

        // Verifica se il valore del campo "Password" e "Conferma Password" corrispondono.
        if (passwordField.value !== confirmPasswordField.value) {
            // Mostra il messaggio di errore impostando lo stile "display" su "block".
            confirmPasswordError.style.display = "block";

            // Impedisci l'invio del modulo prevenendo il comportamento predefinito del modulo.
            event.preventDefault();
        }

        // Inizializza una variabile per verificare se almeno una casella di controllo è selezionata.
        let checked = false;

        // Loop attraverso tutte le caselle di controllo.
        checkboxes.forEach(function (checkbox) {
            if (checkbox.checked) {
                checked = true; // Imposta a true se almeno una casella di controllo è selezionata.
            }
        });

        // Se nessuna casella di controllo è selezionata.
        if (!checked) {
            // Mostra il messaggio di errore impostando lo stile "display" su "block".
            errorSpan.style.display = "block";

            // Impedisci l'invio del modulo prevenendo il comportamento predefinito del modulo.
            event.preventDefault();
        } else {
            // Nascondi il messaggio di errore impostando lo stile "display" su "none".
            errorSpan.style.display = "none";
        }
    });
});




