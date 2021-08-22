<div class="modal-header">
    <h5 class="modal-title" id="staticBackdropLabel">Add new provider client</h5>
    <button type="button" class="close" aria-label="Close" data-dismiss="modal">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#add_provider">Add client</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#add_provider_addition">On log-in actions</a>
    </li>
</ul>
<!-- Блоки с контентом -->
<div class="tab-content">
    <!-- Первый блок (он отображается по умолчанию, т.к. имеет классы show и active) -->
    <div class="tab-pane fade show active" id="add_provider">
        <div class="modal-body">
            <form class="data_form" action="{{ url('/plugins/oauth2/provider_clients') }}" method="post">
                <div class="form-group">
                    <label for="name">Provider name:</label>
                    <select class="form-control" id="name" name="provider_id" required>
                        @foreach($providers as $provider)
                            <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="client_id" class="col-form-label">Client ID:</label>
                    <input type="text" class="form-control" id="client_id" name="client_id" required>
                </div>
                <div class="form-group">
                    <label for="client_secret" class="col-form-label">Client secret:</label>
                    <input type="text" class="form-control" id="client_secret" name="client_secret" required>
                </div>
                <div class="form-group">
                    <label for="host" class="col-form-label">Host:</label>
                    <input type="text" class="form-control" id="host" name="host">
                </div>
                <div class="form-group">
                    <label for="role_id" class="col-form-label">Default role for a new users:</label>
                    <select class="form-control" id="role_id" name="role_id">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary save_provider_client" data-method="post" data-url="{{ url('/plugins/oauth2/provider_clients') }}">Save</button>
        </div>
        <script>
            $('.selectpicker').selectpicker();
        </script>
    </div>
    <!-- Второй блок -->
    <div class="tab-pane fade" id="add_provider_addition">
        <div class="modal-body">
            @include('oauth2::actions_list')
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary show_add_action_form" data-method="get" data-url="{{ url('/plugins/oauth2/actions/add') }}">Add action</button>
        </div>
        <script>
            $('.selectpicker').selectpicker();
        </script>
    </div>
</div>


