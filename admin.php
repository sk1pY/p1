<a href="/" class="m-3 btn btn-primary">main</a>
<?php
include 'connect.php';
echo date( "d.m.y H:i" );
delete($link);
status($link);
updateId($link);
contentAdd($link);
function updateId($link){
    if(isset($_GET['update'])){
        $update = $_GET['update'];
        $query = "UPDATE text set date1 = now() where id = '$update'";
        mysqli_query($link,$query) or die(mysqli_error($link));
    }
}
function contentAdd($link){
    $query = "SELECT * FROM text where status ='0'";
    $res = mysqli_query($link,$query);
//    $result = mysqli_fetch_assoc($res);
//    var_dump($result);
    for($data = [];$row = mysqli_fetch_assoc($res);$data[] = $row);
    $content .= '<table style="width: 600px" class="m-3 table table-success">
<tr>
    <th>№</th>
    <th>Обьявление</th>
    <th>Категория</th>
    <th>Одобрить</th>
    <th>Отказать</th>
    <th>Поднять обьяление</th>
</tr>';
    foreach ($data as $elem){
        $content .= "<tr> 
        <td>{$elem['id']}</td>
        <td>{$elem['category']}</td>
        <td>{$elem['text']}</td>
        <td><a href='?status={$elem['id']}' class='btn btn-success'>+</a></td>
        <td><a href='?delete={$elem['id']}' class='btn btn-danger'>-</a></td>
        <td><a href='?update={$elem['id']}' class='btn btn-danger'>поднять</a></td>
        </tr>";
    }
    $content .= '</table>';
    echo $content;
}
function delete($link){
    if(isset($_GET['delete'])){
        $delete = $_GET['delete'];
        $query = "DELETE FROM text WHERE id = '$delete'";
        mysqli_query($link,$query);
    }
}
function status($link){
    if(isset($_GET['status'])){
        $status = $_GET['status'];
        $query = "UPDATE text SET status = '1' WHERE id='$status'";
        $res = mysqli_query($link,$query) or mysqli_error($link);
        $_SESSION['message'] = "<div class ='text-success fw-bold'>Успешно Добавлен анекдот</div>";
        header('location: / ');
    }
}
?>


