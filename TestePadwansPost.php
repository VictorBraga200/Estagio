<!DOCTYPE html>
<html>
    <title>Postagens</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/icon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
                    <li class="active"><a href="TestePadwansPost.php">Postagens</a></li>
                    <li><a href="TestePadwansAlbuns.php">Álbuns</a></li>
                    <li><a href="TestePadwansTodos.php">Todos</a></li>
                </ul>
            </div>
        </nav>
        <div class="container">

            <?php
            $sample_data = file_get_contents("https://jsonplaceholder.typicode.com/posts");

            // just normal getting data
            $raw_data = json_decode($sample_data, true);
            //$raw_data = $raw_data['qqq'];

            // use get variable to paging number
            $page = !isset($_GET['page']) ? 1 : $_GET['page'];
            $limit = 10; // five rows per page
            $offset = ($page - 1) * $limit; // offset
            $total_items = count($raw_data); // total items
            $total_pages = ceil($total_items / $limit);
            $final = array_splice($raw_data, $offset, $limit); // splice them according to offset and limit
            ?>
            <table class="table table-hover">
                <tr>
                    <th>Usuario</th>
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>Corpo</th>
                </tr>
                <?php foreach ($final as $key => $value) : ?>
                    <tr>
                        <?php foreach ($value as $index => $element) : ?>
                            <td><?php echo !is_array($element) ? $element : implode(',', $element); ?></td>
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
                        } ?>><a class="page-item" href='TestePadwansPost.php?page=<?php echo $x; ?>'><?php echo $x; ?></a></li>
                </ul>
            <?php endfor; ?>

        </div>
    </body>
</html>