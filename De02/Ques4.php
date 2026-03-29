//=========4.1========
<?php
class Product {
    private $id, $name, $price, $quantity, $category;

    public function __construct($id, $name, $price, $quantity, $category) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->category = $category;
    }

    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getPrice() { return $this->price; }
    public function getQuantity() { return $this->quantity; }
    public function getCategory() { return $this->category; }

    public function getTotalValue() {
        return $this->price * $this->quantity;
    }

    public function getStatus() {
        if ($this->quantity == 0) return "Out of Stock";
        if ($this->quantity < 5) return "Low Stock";
        return "Available";
    }
}
?>



//=========4.2========
<?php
session_start();

if (!isset($_SESSION['productList'])) {
    $_SESSION['productList'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $category = $_POST['category'];

    $product = new Product($id, $name, $price, $quantity, $category);
    $_SESSION['productList'][] = $product;

    echo "Product $name (ID: $id) added successfully!<br>";
}
?>

<form method="POST">
ID: <input type="text" name="id"><br>
Name: <input type="text" name="name"><br>
Price: <input type="number" name="price"><br>
Quantity: <input type="number" name="quantity"><br>
Category:
<select name="category">
<option>Electronics</option>
<option>Clothing</option>
<option>Food</option>
<option>Others</option>
</select><br>
<button type="submit">Add Product</button>
</form>

<h3>Product List</h3>
<table border="1">
<tr>
<th>ID</th><th>Name</th><th>Price</th><th>Qty</th>
<th>Category</th><th>Total</th><th>Status</th>
</tr>

<?php
foreach ($_SESSION['productList'] as $p) {
    echo "<tr>";
    echo "<td>".$p->getId()."</td>";
    echo "<td>".$p->getName()."</td>";
    echo "<td>".number_format($p->getPrice())."</td>";
    echo "<td>".$p->getQuantity()."</td>";
    echo "<td>".$p->getCategory()."</td>";
    echo "<td>".number_format($p->getTotalValue())."</td>";
    echo "<td>".$p->getStatus()."</td>";
    echo "</tr>";
}
?>
</table>


