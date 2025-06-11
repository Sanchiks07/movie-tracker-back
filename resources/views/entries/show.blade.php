<x-layout>
    <x-slot:title>
        {{ $entry->title }}
    </x-slot:title>
    
    <h1>{{ $entry->title }}</h1>
    <p><strong>Žanrs:</strong> {{ is_array($entry->genre) ? implode(', ', $entry->genre) : $entry->genre }}</p>
    <p><strong>Izlaišanas gads:</strong> {{ $entry->year }}</p>
    <p><strong>Status:</strong> {{ $entry->status }}</p>
    <p><strong>Vērtējums:</strong> {{ $entry->rating }}</p>

    <a class="edit" href="/entries/{{ $entry->id }}/edit">Rediģēt</a>

    <form method="POST" action="/entries/{{ $entry->id }}">
        @csrf
        @method("delete")
        <button class="delete">Dzēst</button>
    </form>
</x-layout>