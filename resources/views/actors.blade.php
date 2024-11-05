<x-layout>
    <h1>Actors</h1>

    <form method="POST" action="/actors">
        @csrf
        <div class="mb-3 d-flex align-items-center justify-content-between">
            <label for="first-name" class="form-label">First&nbsp;name</label>
            <input type="text" class="form-control mx-2" id="first-name" name="first_name">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

    @isset($count)
        <p>Number of actors: {{ $count }}</p>
    @endisset

    <table class="table table-striped table-dark table-hover">
        @foreach ($actors as $actor)
            <tr>
                <td>{{ $actor->actor_id }}</td>
                <td>{{ $actor->first_name }}</td>
                <td>{{ $actor->last_name }}</td>
                <td>{{ $actor->last_update }}</td>
            </tr>
        @endforeach
    </table>
</x-layout>
