<?php

namespace App\Services;

use App\Models\Book;

class BookService extends BaseService
{
    public function model()
    {
        return Book::class;
    }
}
