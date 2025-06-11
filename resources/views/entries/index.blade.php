<x-layout>
    <x-slot:title>
        Filmas un Seriāli
    </x-slot:title>
    
    <h2>Filmas</h2>
    @foreach ($entries->where('type', 'movie') as $entry)
        <a href="{{ route('entries.show', $entry->id) }}">
            {{ $entry->title }}
        </a>
    @endforeach

    <h2>Seriāli</h2>
    @foreach ($entries->where('type', 'tv_show') as $entry)
        <a href="{{ route('entries.show', $entry->id) }}">
            {{ $entry->title }}
        </a>
    @endforeach
</x-layout>