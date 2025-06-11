<x-layout>
    <x-slot:title>
        Pievienot filmu/seriālu
    </x-slot:title>
    
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
                <label><input type="checkbox" name="genre[]" value="action"> Action</label>
                <label><input type="checkbox" name="genre[]" value="comedy"> Comedy</label>
                <label><input type="checkbox" name="genre[]" value="drama"> Drama</label>
                <label><input type="checkbox" name="genre[]" value="thriller"> Thriller</label>
                <label><input type="checkbox" name="genre[]" value="sci-fi"> Sci-Fi</label>
                <label><input type="checkbox" name="genre[]" value="horror"> Horror</label>
                <label><input type="checkbox" name="genre[]" value="animation"> Animation</label>
                <label><input type="checkbox" name="genre[]" value="romance"> Romance</label>
                <label><input type="checkbox" name="genre[]" value="fantasy"> Fantasy</label>
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
                <option value="watching">Watching</option>
                <option value="watched">Watched</option>
                <option value="plan_to_watch">Plan to watch</option>
                <option value="dropped">Dropped</option>
            </select>
        </label><br>

        @error("status")
            <p>{{ $message }}</p>
        @enderror<br>

        <label>
            Vērtējums (0-10)
            <input name="rating" type="number"></input>
        </label>

        @error("rating")
            <p>{{ $message }}</p>
        @enderror<br>

        <button type="submit" class="save">Saglabāt</button>
    </form>
</x-layout>