@extends('oauth2::layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{url('/admin')}}" class="btn btn-secondary btn-sm mb-3"><- Back to Admin</a>
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <div class="mb-0">
                                <button id="providers" class="btn btn-light btn-sm" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Providers
                                </button>
                                <span class="float-right">
                                    <button type="button" class="install_new_provider btn btn-success btn-sm" data-method="get" data-url="{{ url('/plugins/oauth2/providers/install') }}">
                                        Install New Provider
                                    </button>
                                </span>
                            </div>
                        </div>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body table-responsive">
                                @if($providers->isEmpty())
                                    <span>Providers not found, please, install new provider.</span>
                                @else
                                    <table class="table table-hover table-sm">
                                        <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Redirect URI</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($providers as $provider)
                                            <tr>
                                                <td>{{ $provider->id }}</td>
                                                <td>{{ $provider->name }}</td>
                                                <td>{{ $provider->redirect_uri }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <div class="mb-0">
                                <button id="clients" class="btn btn-light btn-sm" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    Clients
                                </button>
                                <span class="float-right">
                                    <button type="button" @if($providers->isEmpty()) disabled @endif class="add_provider_client btn btn-primary btn-sm" data-method="get" data-url="{{ url('/plugins/oauth2/provider_clients/add') }}">
                                        Add Client
                                    </button>
                                </span>
                            </div>

                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body table-responsive">
                                @if($providerClients->isEmpty())
                                    <span>Please, add a new client.</span>
                                @else
                                    <table class="table table-hover table-sm">
                                        <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Provider</th>
                                            <th scope="col">Client ID</th>
                                            <th scope="col">Client Secret</th>
                                            <th scope="col">Role</th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($providerClients as $client)
                                            <tr>
                                                <td style="color: #9561e2">{{ $client->id }}</td>
                                                <td>{{ $client->provider->name ?? '' }}</td>
                                                <td>@if(mb_strlen($client->client_id) > 15) {{ substr($client->client_id, 0, 15) . '...' }} @else {{ $client->client_id }} @endif</td>
                                                <td style="color: #f66d9b">@if(mb_strlen($client->client_secret) > 60) {{ substr($client->client_secret, 0, 60) . '...' }} @else {{ $client->client_secret }} @endif</td>
                                                <td>{{ $client->role->name ?? '' }}</td>
                                                <td>
                                                    <span class="edit_provider_client" style="text-decoration: none; color: #3490dc; cursor: pointer" data-method="get" data-url="{{ url('/plugins/oauth2/provider_clients/edit/' . $client->id) }}"><span style="font-size: 15px" class="glyphicon glyphicon-pencil" aria-hidden="true"></span></span>
                                                </td>
                                                <td>
                                                    <span class="delete_provider_client" style="text-decoration: none; color: #e3342f; cursor: pointer" data-method="delete" data-url="{{ url('/plugins/oauth2/provider_clients/' . $client->id) }}"><span style="font-size: 15px" class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <div class="mb-0">
                                <button id="accounts" class="btn btn-light btn-sm" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Accounts
                                </button>
                            </div>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body table-responsive">
                                @if($socialAccounts->isEmpty())
                                    <span>Accounts not found.</span>
                                @else
                                    <table class="table table-hover table-sm">
                                        <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">User</th>
                                            <th scope="col">User ID</th>
                                            <th scope="col">Provider User ID</th>
                                            <th scope="col">Provider</th>
                                            <th scope="col">Created At</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($socialAccounts as $account)
                                            <tr>
                                                <td>{{ $account->id }}</td>
                                                <td>{{ $account->user->name ?? 'Not Found' }}</td>
                                                <td>{{ $account->user->id ?? 'Deleted' }}</td>
                                                <td>{{ $account->oauth_uid }}</td>
                                                <td>{{ $account->provider->name }}</td>
                                                <td>{{ $account->created_at }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingFour">
                            <div class="mb-0">
                                <button class="btn btn-light btn-sm" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                    Instructions
                                </button>
                            </div>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                            <div class="card-body">
                                <ul class="list-group list-group-flush" style="overflow: auto">
                                    <li class="list-group-item">1. Install a new provider if yours is not on the list of <a href="#providers" class="badge badge-light">Providers</a> by clicking on the <a class="badge badge-success">Install New Provider</a> button.</li>
                                    <li class="list-group-item">2. Click to <a href="#providers" class="badge badge-light">Providers</a> and copy <b>Redirect URI</b> of your provider needed.</li>
                                    <li class="list-group-item">3. Go to the credentials page of the required provider, for example for Google it is:
                                        <a href="https://console.developers.google.com/apis/credentials">Google Credentials</a></li>
                                    <li class="list-group-item">
                                        4. On the provider page, create a new <a href="https://{{ config('app.locale') }}.wikipedia.org/wiki/OAuth">Oauth 2.0</a> client, remembering to specify the <b>Redirect URI</b> you copied earlier in the appropriate field, preceded by your domain name, for example: <code>https://your_domain_name.com/login/google/callback</code>
                                    </li>
                                    <li class="list-group-item">
                                        5. Click to <a class="badge badge-primary">Add Client</a> button on <a href="#clients" class="badge badge-light">Clients</a>. Select the required provider, fill in the required fields with the data of the provider client you created and save it.
                                    </li>
                                    <li class="list-group-item">
                                        6. Go to <a href="#clients" class="badge badge-light">Clients</a>, copy the required <b>ID</b> to form the following link for login, for example:
                                        <code>/login/<span style="color: #9561e2">23</span></code>
                                    </li>
                                    <li class="list-group-item">
                                        7. Paste your login link anywhere on your website.  <a href="/login/23" class="btn btn-primary btn-sm"><img src="https://developers-dot-devsite-v2-prod.appspot.com/identity/sign-in/g-normal.png" width="16px" alt=""> Login with Google</a>
                                    </li>
                                    <li class="list-group-item">
                                        8. You can view authorized accounts on the <a href="#accounts" class="badge badge-light">Accounts</a>.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection


