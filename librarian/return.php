<?php


include "connection.php";
$id = $_GET["id"];
$a = date("d/m/Y");
$res = mysqli_query($link, "update issue_books set book_return_date='$a' where id=$id");

$books_name;
$res = mysqli_query($link, "select * from issue_books where id=$id");
while ($row = mysqli_fetch_array($res)) {
  $books_name = $row["book_name"];
}

mysqli_query($link, "update add_books set available_quantity=available_quantity+1 where book_name='$books_name' ");


?>


<script type="text/javascript">
  window.location = "return_book.php";
</script>