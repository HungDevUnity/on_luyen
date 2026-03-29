//===========3.1========
<?php
class Book {
    private $isbn, $title, $author, $price, $publishYear;

    public function __construct($isbn, $title, $author, $price, $publishYear) {
        $this->isbn = $isbn;
        $this->title = $title;
        $this->author = $author;
        $this->price = $price;
        $this->publishYear = $publishYear;
    }

    public function getIsbn() { return $this->isbn; }
    public function getTitle() { return $this->title; }
    public function getAuthor() { return $this->author; }
    public function getPrice() { return $this->price; }
    public function getPublishYear() { return $this->publishYear; }

    public function getAge() {
        return 2025 - $this->publishYear;
    }

    public function isExpensive() {
        return $this->price > 500000;
    }
}
?>




//===========3.2========
<?php
$library = [
    new Book("978-1", "Book A", "Author A", 300000, 2010),
    new Book("978-2", "Book B", "Author B", 600000, 2015),
    new Book("978-3", "Book C", "Author C", 450000, 2020),
    new Book("978-4", "Book D", "Author D", 800000, 2005),
];

echo "<table border='1'>";
echo "<tr>
<th>ISBN</th><th>Title</th><th>Author</th>
<th>Price</th><th>Year</th><th>Age</th><th>Expensive?</th>
</tr>";

foreach ($library as $book) {
    echo "<tr>";
    echo "<td>".$book->getIsbn()."</td>";
    echo "<td>".$book->getTitle()."</td>";
    echo "<td>".$book->getAuthor()."</td>";
    echo "<td>".number_format($book->getPrice())."</td>";
    echo "<td>".$book->getPublishYear()."</td>";
    echo "<td>".$book->getAge()."</td>";
    echo "<td>".($book->isExpensive() ? "Yes" : "No")."</td>";
    echo "</tr>";
}

echo "</table>";
?>