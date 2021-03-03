<!DOCTYPE html>
<title>Postagens</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/estilos.css">

<html>
    <header> ​
        <!-- Navbar -->
        <div class="w3-top">
            <div class="w3-bar w3-purple w3-card">
                <a href="Principal.html" class="w3-bar-item w3-button w3-padding-large">HOME</a>
                <a href="TestePadwansPost.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">POSTAGENS</a>
                <a href="TestePadwansAlbuns.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">ÁLBUNS</a>
                <a href="TestePadwansTodos.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">TODOS</a>
            </div>
            ​
        </div>
    </header>

    <body>

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
        <table border="1" cellpadding="10">
            <tr>
                <th>Codigo usuario</th>
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

        <!-- Paginacao -->
        <?php for ($x = 1; $x <= $total_pages; $x++) : ?>
            <a id="paginacao" href='TestePadwansPost.php?page=<?php echo $x; ?>'><?php echo $x; ?></a>
        <?php endfor; ?>

        <footer class="container-fluid text-center bg-grey">
        <a href="TestePadwansTodos.php" title="To Top">
            <span class="glyphicon glyphicon-chevron-up"></span>
        </a>
        <p>Feito por <a href="https://www.linkedin.com/in/victor-hugo-156953114/" title="Visite o likedln">Victor Braga</a></p>
    </footer>

    </body>

</html>