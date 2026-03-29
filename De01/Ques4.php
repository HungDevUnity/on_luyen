//======4.1
<?php
class Product {
    private $code, $name, $price, $stock;

    public function __construct($code, $name, $price, $stock) {
        $this->code = $code;
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
    }

    public function getCode() { return $this->code; }
    public function getName() { return $this->name; }
    public function getPrice() { return $this->price; }
    public function getStock() { return $this->stock; }

    public function isInStock() {
        return $this->stock > 0;
    }

    public function getInfo() {
        return "Code: $this->code - Name: $this->name - Price: $this->price VND - Stock: $this->stock";
    }
}
?>

//======4.2 + 4.3 =======
<?php
session_start();
require_once "Product.php";

if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product = new Product(
        $_POST['code'],
        $_POST['name'],
        $_POST['price'],
        $_POST['stock']
    );

    $_SESSION['products'][] = $product;
    echo "Added successfully!";
}
?>

<form method="POST">
    Code: <input type="text" name="code"><br>
    Name: <input type="text" name="name"><br>
    Price: <input type="number" name="price"><br>
    Stock: <input type="number" name="stock"><br>
    <button type="submit">Add Product</button>
</form>

<h3>Product List</h3>
<table border="1">
<tr><th>Code</th><th>Name</th><th>Price</th><th>Stock</th><th>Status</th></tr>

<?php
foreach ($_SESSION['products'] as $p) {
    echo "<tr>
        <td>{$p->getCode()}</td>
        <td>{$p->getName()}</td>
        <td>{$p->getPrice()}</td>
        <td>{$p->getStock()}</td>
        <td>" . ($p->isInStock() ? "In Stock" : "Out of Stock") . "</td>
    </tr>";
}
?>
</table>