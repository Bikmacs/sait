<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchQuery = $_POST['search'];

    // SQL инъекций
    $searchQuery = mysqli_real_escape_string($conn, $searchQuery);

    $query = "SELECT * FROM book WHERE name_book LIKE '%$searchQuery%' OR author LIKE '%$searchQuery%' OR genre LIKE '%$searchQuery%'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<table class='book-table'>";
        echo "<thead>
                <tr>
                    <th>ID</th>
                    <th>Название книги</th>
                    <th>Автор</th>
                    <th>Жанр</th>
                    <th>Год публикации</th>
                    <th>Издатель</th>
                </tr>
              </thead>";
        echo "<tbody>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . $row['ID'] . "</td>
                    <td>" . $row['name_book'] . "</td>
                    <td>" . $row['author'] . "</td>
                    <td>" . $row['genre'] . "</td>
                    <td>" . $row['year_publication'] . "</td>
                    <td>" . $row['publisher'] . "</td>
                </tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p>По вашему запросу ничего не найдено.</p>";
    }
}
?>

<style>
    .book-table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }

    .book-table th, .book-table td {
        padding: 8px 15px;
        border: 1px solid #ddd;
        text-align: left;
    }

    .book-table th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    .book-table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .book-table tr:hover {
        background-color: #f1f1f1;
    }

    p {
        font-size: 18px;
        color: #888;
    }
</style>
