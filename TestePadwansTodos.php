<!DOCTYPE html>
<html>

    <head>
        <title>Todos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="img/icon.png">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://kryogenix.org/code/browser/sorttable/sorttable.js"></script>
        <link rel="stylesheet" href="css/estilos.css">
    </head>

    <body>

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#" title="Visite meu likedln">Victor Braga</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="TestePadwansPost.php">Postagens</a></li>
                    <li><a href="TestePadwansAlbuns.php">Álbuns</a></li>
                    <li class="active"><a href="TestePadwansTodos.php">Todos</a></li>
                </ul>
            </div>
        </nav>

        <div class="container">

            <?php
            $sample_data = file_get_contents("https://jsonplaceholder.typicode.com/todos");

            // just normal getting data
            $raw_data = json_decode($sample_data, true);
            // var_dump($raw_data);
            //$raw_data = $raw_data['qqq'];

            // use get variable to paging number
            $page = !isset($_GET['page']) ? 1 : $_GET['page'];
            $limit = 10; // five rows per page
            $offset = ($page - 1) * $limit; // offset
            $total_items = count($raw_data); // total items
            $total_pages = ceil($total_items / $limit);
            $final = array_splice($raw_data, $offset, $limit); // splice them according to offset and limit

            ?>
            <table class="table table-hover sortable">
                <tr>
                    <th>Codigo usuario</th>
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>Completo</th>
                </tr>
                <?php foreach ($final as $key => $value) : ?>
                    <tr>
                        <?php foreach ($value as $index => $element) : ?>
                            <?php if ($index == 'completed') {
                                if ($element) {
                                    $completed = 'True';
                                } else {
                                    $completed = 'False';
                                }
                                echo "<td>" . $completed . "</td>";
                            } else {
                                echo "<td>" . $element . "</td>";
                            }
                            ?>

                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </table>

            <!-- print links -->
            <?php for ($x = 1; $x <= $total_pages; $x++) : ?>
                <ul class="pagination">
                    <li <?php if ($page == $x) {
                            echo "class='page-item active'";
                        } else {
                            echo "class='page-item'";
                        } ?>><a class="page-item" href='TestePadwansTodos.php?page=<?php echo $x; ?>'><?php echo $x; ?></a></li>
                </ul>
            <?php endfor; ?>
        </div>

    </body>

</html>