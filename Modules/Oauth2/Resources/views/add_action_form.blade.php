<div class="modal-header">
    <h5 class="modal-title" id="staticBackdropLabel">Add new action</h5>
    <button type="button" class="close" aria-label="Close" data-dismiss="modal">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    settings
</div>
<div class="modal-footer">
    <button type="button"
            class="back btn btn-secondary"
            data-method="get"
            data-url="{{ url('/plugins/oauth2/provider_clients/add') }}">
        Back
    </button>
    <button type="submit" class="btn btn-primary save_provider_client" data-method="post" data-url="{{ url('/plugins/oauth2/provider_clients') }}">Saves</button>
</div>
<script>
    $('.selectpicker').selectpicker();
</script>
