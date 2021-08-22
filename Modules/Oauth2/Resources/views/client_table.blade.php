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
        <th scope="col"></th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    @foreach($providerClients as $client)
        <tr>
            <td style="color: #9561e2">{{ $client->id }}</td>
            <td>{{ $client->provider->name }}</td>
            <td>@if(mb_strlen($client->client_id) > 15) {{ substr($client->client_id, 0, 15) . '...' }} @else {{ $client->client_id }} @endif</td>
            <td style="color: #f66d9b">@if(mb_strlen($client->client_secret) > 60) {{ substr($client->client_secret, 0, 60) . '...' }} @else {{ $client->client_secret }} @endif</td>
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
