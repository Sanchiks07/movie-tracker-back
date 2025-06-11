<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    public function index() {
        $entries = Entry::all();
        return view("entries.index", compact("entries"));
    }
    
    public function show(Entry $entry) {
        return view("entries.show", compact("entry"));
    }

    public function create() {
        return view("entries.create");
    }

    public function store(Request $request) {
        $validated = $request->validate([
            "title" => ["required", "string", "max:255"],
            "type" => ["required", "in:movie,tv_show"],
            "genre" => ["nullable", "array"],
            "genre.*" => ["string", "max:255"],
            "year" => ["nullable", "integer", "min:1800", "max:" . (date('Y') + 1)],
            "status" => ["required", "in:watching,watched,plan_to_watch,dropped"],
            "rating" => ["nullable", "integer", "min:0", "max:10"]
        ]);
        Entry::create([
            "title" => $validated["title"],
            "type" => $validated["type"],
            "genre" => $validated["genre"] ?? [],
            "year" => $validated["year"],
            "status" => $validated["status"],
            "rating" => $validated["rating"]
        ]);
        return redirect("/entries");
    }

    public function edit(Entry $entry) {
        return view("entries.edit", compact("entry"));
    }

    public function update(Request $request, Entry $entry) {
        $validated = $request->validate([
            "title" => ["required", "string", "max:255"],
            "type" => ["required", "in:movie,tv_show"],
            "genre" => ["nullable", "array"],
            "genre.*" => ["string", "max:255"],
            "year" => ["nullable", "integer", "min:1800", "max:" . (date('Y') + 1)],
            "status" => ["required", "in:watching,watched,plan_to_watch,dropped"],
            "rating" => ["nullable", "integer", "min:0", "max:10"]
        ]);

        $entry->title = $validated["title"];
        $entry->type = $validated["type"];
        $entry->genre = $validated["genre"] ?? [];
        $entry->year = $validated["year"];
        $entry->status = $validated["status"];
        $entry->rating = $validated["rating"];
        $entry->save();

        return redirect("/entries");
    }

    public function destroy(Entry $entry) {
        $entry->delete();
        return redirect("/entries");
    }

    public function api() {
        return Entry::all();
    }
}