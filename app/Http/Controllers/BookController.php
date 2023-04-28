<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Services\BookService;
use Illuminate\Http\Response;

class BookController extends Controller
{
    /**
     * @var BookService
     */
    private $bookService;

    /**
     * BookController constructor.
     * @param BookService $bookService
     */
    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return BookResource::collection($this->bookService->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return BookResource
     */
    public function store(BookRequest $request)
    {
        return new BookResource($this->bookService->store($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return BookResource
     */
    public function show($id)
    {
        return new BookResource($this->bookService->findById($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(BookRequest $request, $id)
    {
        $this->bookService->update($id, $request->all());

        return response()->json([
            'message' => 'Book successfully updated',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->bookService->destroy($id);

        return response()->json([
            'message' => 'Book successfully destroyed',
        ], 200);
    }
}
