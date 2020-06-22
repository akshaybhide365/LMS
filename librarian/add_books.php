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
            <h2>Add Books Information</h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/formdata">
              <table class="table table-bordered">
                <tr>
                  <td><input type="text" name="bookname" class="form-control" placeholder="Book Name" required=""></td>
                </tr>

                <tr>
                  <td>Upload Image of Book:<br><br><input type="file" name="f1" required=""></td>
                </tr>

                <tr>
                  <td><input type="text" name="bauthorname" class="form-control" placeholder="Book's Author Name" required=""></td>
                </tr>

                <tr>
                  <td><input type="text" name="pname" class="form-control" placeholder="Book's Publication Name" required=""></td>
                </tr>

                <tr>
                  <td><input type="text" name="bpurchasedt" class="form-control" placeholder="Book's Publication Date" required=""></td>
                </tr>

                <tr>
                  <td><input type="text" name="bprice" class="form-control" placeholder="Book's Price" required=""></td>
                </tr>

                <tr>
                  <td><input type="text" name="bqty" class="form-control" placeholder="Book's Quantity" required=""></td>
                </tr>

                <tr>
                  <td><input type="text" name="aqty" class="form-control" placeholder="Book's Available Quantity" required=""></td>
                </tr>

                <tr>
                  <td>
                    <input type="submit" value="Insert Book's Details" name="submit1" class="btn btn-default submit">
                  </td>
                </tr>


              </table>
            </form>


          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->
<?php
if (isset($_POST["submit1"])) {

  $tm = md5(time());
  $fnm = $_FILES["f1"]["name"];
  $dst = "./book_images/" . $tm . $fnm;
  $dst1 = "book_image/" . $tm . $fnm;
  move_uploaded_file($fnm, $dst);

  mysqli_query($link, "insert into add_books values('','$_POST[bookname]','$dst1','$_POST[bauthorname]','$_POST[pname]','$_POST[bpurchasedt]','$_POST[bprice]','$_POST[bqty]','$_POST[aqty]','$_SESSION[librarian]')");
}

?>
<script type="text/javascript">
  alert("Books added Succesfully!");
</script>

<?php

include "footer.php";

?>