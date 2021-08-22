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
