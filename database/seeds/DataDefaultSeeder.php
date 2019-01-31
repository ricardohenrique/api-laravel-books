<?php

use Illuminate\Database\Seeder;

use App\Models\Author;
use App\Models\Discipline;
use App\Models\Level;
use App\Models\Book;
use App\Models\BookAuthor;
use App\Models\BookDiscipline;

class DataDefaultSeeder extends Seeder
{

	/**
     * @var Author $author
     */
	public $author;

	/**
     * @var Author $author
     */
	public $discipline;

	/**
     * @var Level $level
     */
	public $level;

	/**
     * @var Book $book
     */
	public $book;

	/**
     * @var BookAuthor $bookAuthor
     */
	public $bookAuthor;

	/**
     * @var BookDiscipline $bookDiscipline
     */
	public $bookDiscipline;

	function __construct(
		Author $author, 
		Discipline $discipline, 
		Level $level,
		Book $book,
		BookAuthor $bookAuthor,
		BookDiscipline $bookDiscipline
	)
	{
		$this->author = $author;
		$this->discipline = $discipline;
		$this->level = $level;
		$this->book = $book;
		$this->bookAuthor = $bookAuthor;
		$this->bookDiscipline = $bookDiscipline;
	}

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = json_decode(file_get_contents(database_path('fixtures/data.json')));

        foreach ($data as $key => $value) {
        	$authors = $this->insertAuthors($value->author);
        	$disciplines = $this->insertDisciplines($value->discipline);
        	$level = $this->insertLevel($value->level);

        	$book = factory(Book::class)->create([
			    'isbn' => $value->isbn,
			    'title' => $value->title,
			    'cover' => $value->cover,
			    'level_id' => $level,
			    'price' => $value->price
			]);	

			$this->insertBookAuthor($book->id, $authors);
			$this->insertBookDiscipline($book->id, $disciplines);
        }
    }

	/**
     * Insert level
     * 
     * @param array $data
     * @return void
     */
    private function insertLevel(string $data): int
    {
    	$level = [];
		if(!$this->level->where('name', $data)->exists()) {
		    $level = factory(Author::class)->create([
			    'name' => $data
			]);	
		}else{
			$level = $this->level->where('name', $data)->first();
		}

    	return $level->id;
    }

	/**
     * Insert authors
     * 
     * @param array $data
     * @return void
     */
    private function insertAuthors(array $data): array
    {
    	$authors = [];
    	foreach ($data as $key => $value) {
    		if(!$this->author->where('name', $value)->exists()) {
    		    $authors[] = factory(Author::class)->create([
				    'name' => $value
				]);	
    		}else{
    			$authors[] = $this->author->where('name', $value)->first();
    		}
    	}

    	return $this->getIds($authors);
    }

    /**
     * Insert disciplines
     * 
     * @param array $data
     * @return void
     */
    private function insertDisciplines(array $data): array
    {
    	$disciplines = [];
    	foreach ($data as $key => $value) {
    		if(!$this->discipline->where('name', $value)->exists()) {
    		    $disciplines[] = factory(Discipline::class)->create([
				    'name' => $value
				]);	
    		}else{
    			$disciplines[] = $this->discipline->where('name', $value)->first();
    		}
    	}

    	return $this->getIds($disciplines);
    }

    /**
     * Insert book authors
     * 
     * @param int $bookId
     * @param array $authors
     * @return void
     */
    private function insertBookAuthor(int $bookId, array $authors): void
    {
    	foreach ($authors as $value) {
    		if(!$this->bookAuthor->where('book_id', $bookId)->where('author_id', $value)->exists()) {
    		    factory(BookAuthor::class)->create([
				    'book_id' => $bookId,
				    'author_id' => $value
				]);	
    		}
    	}
    }

    /**
     * Insert book disciplines
     * 
     * @param int $bookId
     * @param array $disciplines
     * @return void
     */
    private function insertBookDiscipline(int $bookId, array $disciplines): void
    {
    	foreach ($disciplines as $value) {
    		if(!$this->bookDiscipline->where('book_id', $bookId)->where('discipline_id', $value)->exists()) {
    		    factory(BookDiscipline::class)->create([
				    'book_id' => $bookId,
				    'discipline_id' => $value
				]);	
    		}
    	}
    }

	/**
     * Get id
     * 
     * @param array $entities
     * @return array
     */
    private function getIds(array $entities): array
    {
    	$ids = [];
    	foreach ($entities as $key => $value) {
    		$ids[] = $value->id;
    	}

    	return $ids;
    }
}
