<div class="accordion" id="actions">
    @foreach($actions as $action)
        <div class="card">
            <form class="action-data-form-{{ $action->id }}" action="">
                <div class="card-header" id="heading{{ $action->id }}">
                    <h5 class="mb-0">
                        <button class="btn btn-toolbar w-100" type="button" data-toggle="collapse" data-target="#action{{ $action->id }}" aria-expanded="false" aria-controls="action{{ $action->id }}">
                            <input type="text" name="name" class="form-control" placeholder="Please, enter the action name" value="{{ $action->name }}">
                        </button>
                    </h5>
                </div>
                <div id="action{{ $action->id }}" class="collapse" aria-labelledby="heading{{ $action->id }}" data-parent="#actions">
                    <div class="card-body">
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="status-{{ $action->id }}" name="status" @if($action->status) checked @endif>
                            <label class="custom-control-label" for="status-{{ $action->id }}" style="user-select: none">Enabled</label>
                        </div>

                        <div class="form-group">
                            <label for="priority">Priority</label>
                            <input type="text" name="priority" class="form-control" required value="{{ $action->priority }}">
                        </div>

                        <div class="form-group">
                            <label for="provider_client">Provider Client</label>
                            <select class="form-control" id="provider_client" name="provider_client_id">
                                @foreach($providerClients as $client)
                                    <option value="{{ $client->id }}" @if($action->provider_client_id == $client->id) selected @endif>{{ $client->id }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="source">Source</label>
                            <select class="form-control" id="source" name="source">
                                <option value="remoteUser">Remote user</option>
                                <option value="model">Model</option>
                                <option value="dataSource">Data source</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="model">Target model</label>
                            <select class="form-control" id="model" name="model_class">
                                @foreach($models as $model)
                                    <option value="{{ $class = isset($model->parent) ? $model->parent->namespace : $model->namespace }}" @if($action->model_class == $class) selected @endif>{{ $model->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="button" class="btn btn-danger delete_action" data-method="delete" data-action="{{ $action->id }}" data-url="{{ url('/plugins/oauth2/actions/delete/' . $action->id) }}" >Remove action</button>
                            <button type="button" class="btn btn-secondary add_row" data-method="get" data-action="{{ $action->id }}" data-url="{{ url('/plugins/oauth2/add_row') }}" >Add row</button>
                            <button type="submit" class="btn btn-success save_new_action" data-method="post" data-action="{{ $action->id }}" data-url="{{ url('/plugins/oauth2/actions/update/' . $action->id) }}" >Save action</button>
                        </div>

                        @if($action->data)
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Source_field</th>
                                    <th scope="col">Model_field</th>
                                    <th scope="col">Unique</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($action->data as $key => $data)
                                    <tr class="text-center">
                                        <td><input type="text" name="data[]" class="form-control" data-key="value" required value="{{ $key }}"></td>
                                        <td><input type="text" name="data[]" class="form-control" data-key="name" required value="{{ $data }}"></td>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="status-{{ $data }}" value="{{ $key }}" name="unique_data[{{ $data }}]" @if(is_array($action->unique_data) && in_array($key, $action->unique_data)) checked @endif>
                                            </div>
                                        </td>
                                        <td><span class="clear_row" style="text-decoration: none; color: #e3342f; cursor: pointer"><span style="font-size: 15px" class="glyphicon glyphicon-remove" aria-hidden="true"></span></span></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Source_field</th>
                                    <th scope="col">Model_field</th>
                                    <th scope="col">Unique</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        @endif
            </form>
        </div>
</div>
</div>
@endforeach
</div>
