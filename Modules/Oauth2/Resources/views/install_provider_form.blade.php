@if($providers->isEmpty())
    <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Install new provider</h5>
        <button type="button" class="close" aria-label="Close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <span>All providers are installed.</span>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
    </div>
@else
<div class="modal-header">
    <h5 class="modal-title" id="staticBackdropLabel">Install new provider</h5>
    <button type="button" class="close" aria-label="Close" data-dismiss="modal">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form class="data_form" action="{{ url('/plugins/oauth2/providers') }}" method="post">
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="name">Provider name:</label>
            <select class="form-control" id="name" name="provider_id" required>
                @foreach($providers as $provider)
                    <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                @endforeach
            </select>
        </div>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary install_provider" data-method="put" data-url="{{ url('/plugins/oauth2/providers') }}">Install</button>
</div>
@endif

