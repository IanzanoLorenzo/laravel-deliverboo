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