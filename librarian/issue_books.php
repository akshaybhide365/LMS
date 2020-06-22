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
        <h3>Plain Page</h3>
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
            <h2>Issued Books</h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <form name="form1" action="" method="post" class="col-lg-6">

              <table>

                <tr>
                  <td>
                    <select name="enr" id="" class="form-control selectpicker ">
                      <?php
                      $res = mysqli_query($link, "select enrollment from student_registration");
                      while ($row = mysqli_fetch_array($res)) {
                        echo "<option>";
                        echo $row["enrollment"];
                        echo "</option>";
                      }
                      ?>
                    </select>
                  <td>
                  <td>
                    <input type="submit" name=submit1 value="Search" class="form-control btn btn-default" style="margin-top:5px;">
                  </td>
                  </td>
                </tr>
              </table>




              <?php
              if (isset($_POST['submit1'])) {

                $res5 = mysqli_query($link, "select * from student_registration where enrollment=$_POST[enr]");
                while ($row5 = mysqli_fetch_array($res5)) {
                  $firstname = $row5["firstname"];
                  $lastname = $row5["lastname"];
                  $username = $row5["username"];
                  $email = $row5["email"];
                  $contact = $row5["contact"];
                  $sem = $row5["sem"];
                  $enrollment = $row5["enrollment"];
                  $_SESSION["enrollment"] = $enrollment;
                  $_SESSION["username"] = $username;
                }
              ?>

                <table class="table table-bordered">
                  <tr>
                    <td><input type="text" name="enrollment" class="form-control" placeholder="Enrollment Number" value="<?php echo $enrollment; ?>" disabled></td>
                  </tr>

                  <tr>
                    <td><input type="text" name="studentname" class="form-control" placeholder="Student's Name" value="<?php echo $firstname . ' ' . $lastname; ?>"></td>
                  </tr>

                  <tr>
                    <td><input type="text" name="studentsem" class="form-control" placeholder="Student's Sem" value="<?php echo $sem; ?>"></td>
                  </tr>

                  <tr>
                    <td><input type="text" name="studentcontact" class="form-control" placeholder="Student's Contact" value="<?php echo $contact; ?>"></td>
                  </tr>

                  <tr>
                    <td><input type="text" name="studentemail" class="form-control" placeholder="Student's Email" value="<?php echo $email; ?>"></td>
                  </tr>

                  <tr>
                    <td>
                      <select name="bookname" id="" class="form-control selectpicker">
                        <?php
                        $res = mysqli_query($link, "select book_name from add_books");
                        while ($row = mysqli_fetch_array($res)) {
                          echo "<option>";
                          echo $row["book_name"];
                          echo "</option>";
                        }
                        ?>

                  <tr>
                    <td><input type="text" name="bookissuedt" class="form-control" placeholder="Book's Issue Date" value="<?php echo date("d/m/yy"); ?>"></td>
                  </tr>

                  <!-- <tr>
                                    <td><input type="text" name="bookreturndt" class="form-control" placeholder="Book's Return Date"></td>
                                  </tr> -->

                  <tr>
                    <td><input type="text" name="studentusername" class="form-control" placeholder="Student's Username" disabled value="<?php echo $username; ?>"></td>
                  </tr>

                  <tr>
                    <td><input type="submit" name="submit2" value="Issue Books" class="form-control btn btn-default" style="width:30%;"></td>
                  </tr>

                  </select>
                  </td>
                  </tr>

                </table>

              <?php
              }

              ?>

            </form>

            <?php

            if (isset($_POST["submit2"])) {

              $qty = 0;

              $res = mysqli_query($link, "select * from add_books where book_name='$_POST[bookname]'");
              while ($row = mysqli_fetch_array($res)) {
                $qty = $row["available_quantity"];
              }


              if ($qty == 0) {

            ?>

                <div class="alert alert-danger col-lg-6 col-lg-push-0">
                  <strong style="color:white">These books are not in stock</strong>
                </div>
              <?php

              } else {

                mysqli_query($link, "insert into issue_books values('','$_SESSION[enrollment]','$_POST[studentname]','$_POST[studentsem]','$_POST[studentcontact]','$_POST[studentemail]','$_POST[bookname]','$_POST[bookissuedt]','','$_SESSION[username]')");

                mysqli_query($link, "update add_books set available_quantity=available_quantity-1 where book_name='$_POST[bookname]' ");

              ?>

                <script type="text/javascript">
                  alert("Books issued successfully!");
                  window.location.href = window.location.href;
                </script>

            <?php


              }
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