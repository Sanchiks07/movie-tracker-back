<x-layout>
    <x-slot:title>
        Pievienot filmu/seriālu
    </x-slot:title>
    
    <h1>Pievienot filmu/seriālu</h1>

    <form method="POST" action="/entries">
        @csrf

        <label>
            Filmas/Seriāla nosaukums
            <input name="title"></input>
        </label><br>

        @error("title")
            <p>{{ $message }}</p>
        @enderror<br>

        <label>
            Tips
            <select name="type">
                <option value="movie">Filma</option>
                <option value="tv_show">Seriāls</option>
            </select>
        </label><br>

        @error("type")
            <p>{{ $message }}</p>
        @enderror<br>

        <label>
            Žanrs<br>
                <label><input type="checkbox" name="genre[]" value="Action"> Action</label>
                <label><input type="checkbox" name="genre[]" value="Comedy"> Comedy</label>
                <label><input type="checkbox" name="genre[]" value="Drama"> Drama</label>
                <label><input type="checkbox" name="genre[]" value="Thriller"> Thriller</label>
                <label><input type="checkbox" name="genre[]" value="Sci-fi"> Sci-Fi</label>
                <label><input type="checkbox" name="genre[]" value="Horror"> Horror</label>
                <label><input type="checkbox" name="genre[]" value="Animation"> Animation</label>
                <label><input type="checkbox" name="genre[]" value="Romance"> Romance</label>
                <label><input type="checkbox" name="genre[]" value="Fantasy"> Fantasy</label>
        </label><br>

        @error("genre")
            <p>{{ $message }}</p>
        @enderror<br>

        <label>
            Izlaišanas gads
            <input name="year" type="number"></input>
        </label><br>

        @error("year")
            <p>{{ $message }}</p>
        @enderror<br>

        <label>
            Statuss
            <select name="status">
                <option value="Watching">Watching</option>
                <option value="Watched">Watched</option>
                <option value="Plan to watch">Plan to watch</option>
                <option value="Dropped">Dropped</option>
            </select>
        </label><br>

        @error("status")
            <p>{{ $message }}</p>
        @enderror<br>

        <label>
            Vērtējums (0-10)
            <input name="rating" type="number" step="0.01" min="0" max="10">
        </label>

        @error("rating")
            <p>{{ $message }}</p>
        @enderror<br>

        <button type="submit" class="save">Saglabāt</button>
    </form>
</x-layout>