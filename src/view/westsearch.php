<?php
include '../lib/db_con.php';

if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);

    // Your SQL query for searching the database with a category condition
    $sql = "SELECT * FROM products WHERE pname LIKE '%$search%' AND category = 'whitevest'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Display search results
            echo '<div class="search-result-item">';
            echo '<div class="image-container">';
            echo '<a href="../products/?pid=' . $row['pid'] . '" class="search-result-item">';
            echo '<img src="../images/' . $row['img'] . '" alt="' . $row['pname'] . '">';
            echo '</div>';
            echo '<div class="product-details">';
            echo '<p>' . $row['pname'] . '</p>';
            echo '<p>RS.' . $row['price'] . '</p>';
            echo '</div>';
            echo '</div>';
            echo '<hr>';
        }
    } else {
        // No search results message
        echo '<div class="no-results-message">';
        echo '<h4>No products found in the "white vest" category</h4>';
        echo '<p>Try a different search or explore other categories.</p>';
        echo '</div>';
    }

    $conn->close();
} else {
    // No search query provided
    echo '<div class="no-results-message">';
    echo '<h4>No search query provided</h4>';
    echo '<p>Please enter a search query to find products.</p>';
    echo '</div>';
}
?>
