<?php
@session_start();
include('settings/db.php');
require_once('settings/classes/save.php');
require_once('settings/controller/empty_var.php');
if (isset($_SESSION["name"])) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Cars</title>
        <link rel="stylesheet" type="text/css" href="assets/styles/create.css">
        <link rel="stylesheet" href="https://use.typekit.net/kdi6adg.css">
    </head>
    <body>
    <header>
        <a href="indexExample.php" class="logo"><h2>carz.</h2></a>
        <a href="admin.php"><img src="assets/img/arrow_btn.png" alt="arrow" class="arrow_btn"></a>
    </header>
        <?php include('./settings/htmls/cars_list.html');

        //კავშირი
        $con = new database();

        //შენახვ
        if (isset($_POST['save'])) {
            $save = new save();
            $save->saveInfo($_POST);
        }
        //მონიშვნა
        $result = new emptyvar();
        $result->selectRow();
        if (count($result->data) > 0) {
            foreach ($result->data as $row) {
                ?>

                <table class="td-list">
                    <tr>
                        <td><?php echo $row["brand"]; ?></td>
                        <td><?php echo $row["model"]; ?></td>
                        <td><?php echo $row["date"]; ?></td>
                        <td><?php echo $row["color"]; ?></td>
                        <td><?php echo $row["petrol"]; ?></td>
                        <td><?php echo $row["power"]; ?></td>
                    </tr>
                </table>

                <?php
            }

            echo "</table>";
        }
        ?>
        </div>
        </div>
        </div>
        </div>

        <p class="create">create</p>
        <?php include('./settings/htmls/form.html'); ?>

    </body>
    </html>
    <?php
} else {
    header('Location: http://localhost/tekla/new-crud/log-in.php');
}
?>