<?php
@session_start();
if (isset($_SESSION["name"])) {
    include('db.php');
    require_once('new-crud/settings/classes/delete.php');
    require_once('new-crud/settings/classes/redact.php');
    require_once('new-crud/settings/controller/empty_var.php');
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Cars</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
              crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="assets/styles/edit.css">
        <link rel="stylesheet" href="https://use.typekit.net/kdi6adg.css">
    </head>
    <body>
    <header>
        <a href="indexExample.php" class="logo"><h2>carz.</h2></a>
        <a href="admin.php"><img src="assets/img/arrow_btn.png" alt="arrow" class="arrow_btn"></a>
    </header>
    <?php include('./settings/htmls/edit_list.html'); ?>
    <?php
    //კავშირი
    $con = new database();


    //წაშლა
    $delete = new delete();
    if (isset($_GET['delete'])) {
        $delete->deleteRow();
    }

    // რედაქტირება
    $redct = new redact();
    if (isset($_POST) && !empty($_POST)) {
        $redct->update($_POST);
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
                    <td>
                        <button type="button" class="editt_btn edit_btn"
                                data-id="<?php echo $row["id"]; ?>" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                 fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd"
                                      d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </button>
                        </a>
                        <a href="edit.php?delete=<?php echo $row['id']; ?>" class="delete_btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                 fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd"
                                      d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                        </a></td>
                </tr>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php include('./settings/htmls/edit_form.html'); ?>

                </div>
            </div>
        </div>
    </div>
    </div>
    <p></p>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
            integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
            integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.edit_btn').click(function () {
                let dataid = $(this).attr('data-id');
                $.ajax('/tekla/new-crud/settings/view/edit_post.php', {
                    type: 'POST',  // გაგზავნის მეთოდი
                    data: {myData: dataid},  // გასაგზავნი მონაცემები
                    dataType: 'json',
                    success: function (data, status, xhr) {
                        //ეკრანზე გამოტანა
                        $('.brand').val(data.brand);
                        $('.model').val(data.model);
                        $('.date').val(data.date);
                        $('.color').val(data.color);
                        $('.power').val(data.power);
                        $('.petrol').val(data.petrol);
                        $('.hidden_id').val(data.id);
                        $(".save_btn").hide();
                        $(".update_btn").show();
                    },
                    error: function (jqXhr, textStatus, errorMessage) {
                        console.log(errorMessage);
                    }
                });
            });

        });

    </script>
    </body>
    </html>
    <?php
} else {
    header('Location: http://localhost/tekla/new-crud/log-in.php');
}
?>