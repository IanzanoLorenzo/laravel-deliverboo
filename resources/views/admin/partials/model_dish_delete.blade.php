 <div class="modal fade" id="dishConfirmDeleteModal" tabindex="-1" aria-labelledby="dishConfirmDeleteLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dishConfirmDeleteLabel">Conferma Cancellazione dishe</h5>
                <button type="button" class="btn close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Sei sicuro di voler cancellare il piatto <span id="modal-dish-name"></span>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                <button type="button" class="btn btn-danger" id="dish-confirm-delete-button">Cancella</button>
            </div>
        </div>
    </div>
</div>