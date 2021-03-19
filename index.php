
<a href="login_admin.php" class="m-3 btn btn-primary">LOGIN</a>
<a href="/" class="m-3 btn btn-primary">MAIN</a>
<form action="" method="post">
    <textarea type="text" name ='text' style="margin: 1%;width: 400px;height: 100px;"></textarea>
    <input type="submit" name = 'submit'>
    <select name = 'category'>
        <option>техника</option>
        <option>электроника</option>
        <option>хобби, спорт</option>

    </select>
</form>
<?php
include 'connect.php';
if(isset($_SESSION['message'])){
    echo $_SESSION['message'];
}
if($_SESSION['admin'] == 'admin'){
    $content = '<a href="admin.php" class="m-3 btn btn-primary">ADMIN PAGE</a>';
    echo $content;
}

function offerText($link){
    if(isset($_POST['submit'])){
        $text = $_POST['text'];
        $category = $_POST['category'];
        $query = "Insert into text set text = '$text',category = '$category', status = '0'";
        mysqli_query($link,$query);
    }
}

if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{$page = 1;}

$notesOnPages = 3;
$from = ($page-1)*$notesOnPages;

    function updateId($link){
        if(isset($_GET['update'])){
            $update = $_GET['update'];
            $query = "UPDATE text set date1 = now() where id = '$update'";
            mysqli_query($link,$query) or die(mysqli_error($link));
        }
    }

function contentAdd($link,$notesOnPages,$from){
    $query = "SELECT * 
                FROM text  
                WHERE status = '1' 
                ORDER BY date1 DESC  
                LIMIT $from , $notesOnPages";
    $res = mysqli_query($link,$query) or die(mysqli_error($link));
    for($data = [];$row = mysqli_fetch_assoc($res);$data[] = $row);
    $content .= '<table style="width: 600px" class="m-3 table table-success">
<tr>
    <th>№</th>
    <th>xoba</th>
</tr>';
    foreach ($data as $elem){
        $content .= "<tr>
        <td>{$elem['id']}</td>
        <td>{$elem['text']}</td>
        <td><a href='?update={$elem['id']}' class='btn btn-danger'>поднять</a></td>

        </tr>";
    }
    $content .= '</table>';
    echo $content;
}
updateId($link);
offerText($link);
contentAdd($link,$notesOnPages,$from);
?>

<a href="?page=1">1</a>
<a href="?page=2">2</a>
<a href="?page=3">3</a>


