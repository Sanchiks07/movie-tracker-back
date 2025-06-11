<x-layout>
    <x-slot:title>
        {{ $entry->title }}
    </x-slot:title>

    <h1>Rediģēt filmu/seriālu: "{{ $entry->title }}"</h1>
    
    <form method="POST" action="/entries">
        @csrf

        <label>
            Filmas/Seriāla nosaukums
            <input name="title" value="{{ old('title', $entry->title) }}"></input>
        </label><br>

        @error("title")
            <p>{{ $message }}</p>
        @enderror<br>

        <label>
            Tips
            <select name="type">
                <option value="movie" {{ old('type', $entry->type) === 'movie' ? 'selected' : '' }}>Filma</option>
                <option value="tv_show" {{ old('type', $entry->type) === 'tv_show' ? 'selected' : '' }}>Seriāls</option>
            </select>
        </label><br>

        @error("type")
            <p>{{ $message }}</p>
        @enderror<br>

        <label>
            Žanrs<br>
                <label><input type="checkbox" name="genre[]" value="Action"
                    {{ (is_array(old('genre', $entry->genre)) && in_array('Action', old('genre', $entry->genre))) ? 'checked' : '' }}>
                    Action</label>
                <label><input type="checkbox" name="genre[]" value="Comedy"
                    {{ (is_array(old('genre', $entry->genre)) && in_array('Comedy', old('genre', $entry->genre))) ? 'checked' : '' }}>
                    Comedy</label>
                <label><input type="checkbox" name="genre[]" value="Drama"
                    {{ (is_array(old('genre', $entry->genre)) && in_array('Drama', old('genre', $entry->genre))) ? 'checked' : '' }}>
                    Drama</label>
                <label><input type="checkbox" name="genre[]" value="Thriller"
                    {{ (is_array(old('genre', $entry->genre)) && in_array('Thriller', old('genre', $entry->genre))) ? 'checked' : '' }}>
                    Thriller</label>
                <label><input type="checkbox" name="genre[]" value="Sci-fi"
                    {{ (is_array(old('genre', $entry->genre)) && in_array('Sci-fi', old('genre', $entry->genre))) ? 'checked' : '' }}>
                    Sci-Fi</label>
                <label><input type="checkbox" name="genre[]" value="Horror"
                    {{ (is_array(old('genre', $entry->genre)) && in_array('Horror', old('genre', $entry->genre))) ? 'checked' : '' }}>
                    Horror</label>
                <label><input type="checkbox" name="genre[]" value="Animation"
                    {{ (is_array(old('genre', $entry->genre)) && in_array('Animation', old('genre', $entry->genre))) ? 'checked' : '' }}>
                    Animation</label>
                <label><input type="checkbox" name="genre[]" value="Romance"
                    {{ (is_array(old('genre', $entry->genre)) && in_array('Romance', old('genre', $entry->genre))) ? 'checked' : '' }}>
                    Romance</label>
                <label><input type="checkbox" name="genre[]" value="Fantasy"
                    {{ (is_array(old('genre', $entry->genre)) && in_array('Fantasy', old('genre', $entry->genre))) ? 'checked' : '' }}>
                    Fantasy</label>
        </label><br>

        @error("genre")
            <p>{{ $message }}</p>
        @enderror<br>

        <label>
            Izlaišanas gads
            <input name="year" type="number" value="{{ old('year', $entry->year) }}"></input>
        </label><br>

        @error("year")
            <p>{{ $message }}</p>
        @enderror<br>

        <label>
            Statuss
            <select name="status">
                <option value="Watching" {{ old('status', $entry->status) === 'Watching' ? 'selected' : '' }}>Watching</option>
                <option value="Watched" {{ old('status', $entry->status) === 'Watched' ? 'selected' : '' }}>Watched</option>
                <option value="Plan to watch" {{ old('status', $entry->status) === 'Plan to watch' ? 'selected' : '' }}>Plan to watch</option>
                <option value="Dropped" {{ old('status', $entry->status) === 'Dropped' ? 'selected' : '' }}>Dropped</option>
            </select>
        </label><br>

        @error("status")
            <p>{{ $message }}</p>
        @enderror<br>

        <label>
            Vērtējums (0-10)
            <input name="rating" type="number" step="0.01" min="0" max="10" value="{{ old('rating', $entry->rating) }}">
        </label>

        @error("rating")
            <p>{{ $message }}</p>
        @enderror<br>

        <button type="submit" class="save">Saglabāt</button>
    </form>
</x-layout>