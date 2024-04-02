<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Requests\BookIntervalRequest;
use App\Http\Resources\BookResource;
use App\Models\UserReadingInterval;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::orderBy('num_of_read_pages', 'DESC')->limit(5)->get();
        return BookResource::collection($books);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookIntervalRequest $request)
    {
        $book = Book::find($request->book_id);
        $pages_number = array_unique(array_merge($book->reading_pages, range($request->start_page, $request->end_page)) );
 
        DB::transaction(function () use ($request, $pages_number, $book) {
            
            $book_interval = new UserReadingInterval();
            $book_interval->user_id = $request->user_id;
            $book_interval->book_id = $request->book_id;
            $book_interval->start_page = $request->start_page;
            $book_interval->end_page = $request->end_page;
            $book_interval->save();

            $book->update(['reading_pages' => $pages_number, 'num_of_read_pages' => count($pages_number)]);

        });

        return response()->json([
            'message' => 'Reading Intervals successfully added',
            'book_interval' => [
                'start_page' => $request->start_page,
                'end_page' => $request->end_page
            ]
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       //
    }
}
