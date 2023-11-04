// Create a PHP class named Library to manage a library's book catalog. The Library class should have the following functionalities:

// Initialize the library with a list of books and their details (title, author, publication year, and availability status).

// Provide methods to:

// Add a new book to the catalog.
// Remove a book from the catalog.
// Display a list of all available books.
// Search for books by title or author and display the search results.
// Implement a reservation system where library members can reserve books. Ensure that the availability status is updated accordingly.

// Calculate and display statistics, such as the total number of books, the number of available books, and the most popular author (the author with the most books).

// You have 30 minutes to write the Library class and demonstrate its functionality. You can use sample data to initialize the library catalog and perform various operations to showcase the class's features.

class Library {
    private $catalog = [];

    // Initialize the library with a list of books
    public function __construct($initialCatalog = []) {
        $this->catalog = $initialCatalog;
    }

    // Add a new book to the catalog
    public function addBook($book) {
        $this->catalog[] = $book;
    }

    // Remove a book from the catalog
    public function removeBook($title) {
        foreach ($this->catalog as $key => $book) {
            if ($book['title'] === $title) {
                unset($this->catalog[$key]);
            }
        }
    }

    // Display a list of all available books
    public function displayAvailableBooks() {
        $availableBooks = array_filter($this->catalog, function ($book) {
            return $book['availability'] === 'Available';
        });

        foreach ($availableBooks as $book) {
            echo "Title: {$book['title']}, Author: {$book['author']}, Publication Year: {$book['year']}\n";
        }
    }

    // Search for books by title or author
    public function searchBooks($query) {
        $searchResults = array_filter($this->catalog, function ($book) use ($query) {
            return strpos($book['title'], $query) !== false || strpos($book['author'], $query) !== false;
        });

        foreach ($searchResults as $book) {
            echo "Title: {$book['title']}, Author: {$book['author']}, Publication Year: {$book['year']}\n";
        }
    }

    // Implement a reservation system
    public function reserveBook($title) {
        foreach ($this->catalog as &$book) {
            if ($book['title'] === $title && $book['availability'] === 'Available') {
                $book['availability'] = 'Reserved';
                return true;
            }
        }

        return false;
    }

    // Calculate and display statistics
    public function displayStatistics() {
        $totalBooks = count($this->catalog);
        $availableBooks = count(array_filter($this->catalog, function ($book) {
            return $book['availability'] === 'Available';
        }));

        $authors = array_count_values(array_column($this->catalog, 'author'));
        arsort($authors);
        $mostPopularAuthor = key($authors);

        echo "Total Books: $totalBooks\n";
        echo "Available Books: $availableBooks\n";
        echo "Most Popular Author: $mostPopularAuthor\n";
    }
}
