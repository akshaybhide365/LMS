<?php
session_start();
if (!isset($_SESSION["librarian"])) {

?>
  <script type="text/javascript">
    window.location = "login.php";
  </script>
<?php
}

include "header.php";
include "connection.php";
?>


<!-- page content area main -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Display Books</h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>
    <div class="row" style="min-height:500px">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Books Available</h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table class="table">
              <tr>
                <td>
                  <form action="" name="form1" method="post">
                    <input type="text" class="form-control" name="t1" placeholder="Enter Book's Name">
                </td>
                <td><input type="submit" name="submit1" value="Search Books" class="btn btn-default">
                </td>

              </tr>

            </table>


            </form>



            <?php
            if (isset($_POST['submit1'])) {
              $res = mysqli_query($link, "select * from add_books where book_name like('$_POST[t1]%')");
              echo "<table class='table table-bordered'>";
              echo "<tr>";
              echo "<th>";
              echo "Book";
              echo "</th>";
              echo "<th>";
              echo "Book Name";
              echo "</th>";
              echo "<th>";
              echo "Author Name";
              echo "</th>";
              echo "<th>";
              echo "Publication Name";
              echo "</th>";
              echo "<th>";
              echo "Publication Date";
              echo "</th>";
              echo "<th>";
              echo "Book Price";
              echo "</th>";
              echo "<th>";
              echo "Quantity";
              echo "</th>";
              echo "<th>";
              echo "Available Quantity";
              echo "</th>";
              echo "<th>";
              echo "Delete Books";
              echo "</th>";
              echo "</tr>";
              while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<td>"; ?> <img src="<?php echo $row["book_image"]; ?>" height="100" width="100"> <?php echo "</td>";
                                                                                                        echo "<td>";
                                                                                                        echo $row["book_name"];
                                                                                                        echo "</td>";

                                                                                                        echo "<td>";
                                                                                                        echo $row["book_author_name"];
                                                                                                        echo "</td>";
                                                                                                        echo "<td>";
                                                                                                        echo $row["book_publication_name"];
                                                                                                        echo "</td>";
                                                                                                        echo "<td>";
                                                                                                        echo $row["book_purchase_date"];
                                                                                                        echo "</td>";
                                                                                                        echo "<td>";
                                                                                                        echo $row["book_price"];
                                                                                                        echo "</td>";
                                                                                                        echo "<td>";
                                                                                                        echo $row["book_quantity"];
                                                                                                        echo "</td>";
                                                                                                        echo "<td>";
                                                                                                        echo $row["available_quantity"];
                                                                                                        echo "</td>";
                                                                                                        echo "<td>";
                                                                                                        ?> <a href="delete_books.php?id=<?php echo $row["id"]; ?>">Delete Books</a> <?php
                                                                                                                                                                                    echo "</td>";
                                                                                                                                                                                    echo "</tr>";
                                                                                                                                                                                  }
                                                                                                                                                                                  echo "</table>";
                                                                                                                                                                                } else {
                                                                                                                                                                                  $res = mysqli_query($link, "select * from add_books");
                                                                                                                                                                                  echo "<table class='table table-bordered'>";
                                                                                                                                                                                  echo "<tr>";
                                                                                                                                                                                  echo "<th>";
                                                                                                                                                                                  echo "Book";
                                                                                                                                                                                  echo "</th>";
                                                                                                                                                                                  echo "<th>";
                                                                                                                                                                                  echo "Book Name";
                                                                                                                                                                                  echo "</th>";
                                                                                                                                                                                  echo "<th>";
                                                                                                                                                                                  echo "Author Name";
                                                                                                                                                                                  echo "</th>";
                                                                                                                                                                                  echo "<th>";
                                                                                                                                                                                  echo "Publication Name";
                                                                                                                                                                                  echo "</th>";
                                                                                                                                                                                  echo "<th>";
                                                                                                                                                                                  echo "Publication Date";
                                                                                                                                                                                  echo "</th>";
                                                                                                                                                                                  echo "<th>";
                                                                                                                                                                                  echo "Book Price";
                                                                                                                                                                                  echo "</th>";
                                                                                                                                                                                  echo "<th>";
                                                                                                                                                                                  echo "Quantity";
                                                                                                                                                                                  echo "</th>";
                                                                                                                                                                                  echo "<th>";
                                                                                                                                                                                  echo "Delete Books";
                                                                                                                                                                                  echo "</th>";
                                                                                                                                                                                  echo "<th>";
                                                                                                                                                                                  echo "Available Quantity";
                                                                                                                                                                                  echo "</th>";
                                                                                                                                                                                  echo "</tr>";
                                                                                                                                                                                  while ($row = mysqli_fetch_array($res)) {
                                                                                                                                                                                    echo "<tr>";
                                                                                                                                                                                    echo "<td>"; ?> <img src="<?php echo $row["book_image"]; ?>" height="100" width="100"> <?php echo "</td>";
                                                                                                                                                                                                                                                                            echo "<td>";
                                                                                                                                                                                                                                                                            echo $row["book_name"];
                                                                                                                                                                                                                                                                            echo "</td>";

                                                                                                                                                                                                                                                                            echo "<td>";
                                                                                                                                                                                                                                                                            echo $row["book_author_name"];
                                                                                                                                                                                                                                                                            echo "</td>";
                                                                                                                                                                                                                                                                            echo "<td>";
                                                                                                                                                                                                                                                                            echo $row["book_publication_name"];
                                                                                                                                                                                                                                                                            echo "</td>";
                                                                                                                                                                                                                                                                            echo "<td>";
                                                                                                                                                                                                                                                                            echo $row["book_purchase_date"];
                                                                                                                                                                                                                                                                            echo "</td>";
                                                                                                                                                                                                                                                                            echo "<td>";
                                                                                                                                                                                                                                                                            echo $row["book_price"];
                                                                                                                                                                                                                                                                            echo "</td>";
                                                                                                                                                                                                                                                                            echo "<td>";
                                                                                                                                                                                                                                                                            echo $row["book_quantity"];
                                                                                                                                                                                                                                                                            echo "</td>";
                                                                                                                                                                                                                                                                            echo "<td>";
                                                                                                                                                                                                                                                                            echo $row["available_quantity"];
                                                                                                                                                                                                                                                                            echo "</td>";
                                                                                                                                                                                                                                                                            echo "<td>";
                                                                                                                                                                                                                                                                            ?> <a href="delete_books.php?id=<?php echo $row["id"]; ?>">Delete Books</a> <?php
                                                                                                                                                                                                                                                                                                                                                        echo "</td>";
                                                                                                                                                                                                                                                                                                                                                        echo "</tr>";
                                                                                                                                                                                                                                                                                                                                                      }
                                                                                                                                                                                                                                                                                                                                                      echo "</table>";
                                                                                                                                                                                                                                                                                                                                                    }


                                                                                                                                                                                                                                                                                                                                                        ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->


<?php
include "footer.php";

?>