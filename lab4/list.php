<?php
$dom = new DOMDocument();
$dom->load('data.xml');
$students = $dom->getElementsByTagName('students')->item(0);
?>

<div class="container-fuild">
    <div class="card">
        <div class="card-header">
            <h1>Запись на стрижку</h1>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr class="row">
                    <th>№</th>
                    <th>Имя & Фамилия</th>
                    <th>Телефон</th>
                    <th>Время</th>
                    <th>Изменить</th>
                    <th>Удалить</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;
                $student = $students->getElementsByTagName('student');
                while (is_object($student->item($i++))) {
                    ?>
                    <tr class="row">
                        <td><?php echo $i ?></td>
                        <td><?php echo $student->item($i - 1)->getElementsByTagName('name')->item(0)->nodeValue ?></td>
                        <td><?php echo $student->item($i - 1)->getElementsByTagName('phone')->item(0)->nodeValue ?></td>
                        <td><?php echo $student->item($i - 1)->getElementsByTagName('time')->item(0)->nodeValue ?></td>
                        <td>
                            <a href="index.php?page_layout=update&id=<?php echo $student->item($i - 1)->getElementsByTagName('id')->item(0)->nodeValue; ?>"  id="edit" >
                                Редакт..</a></td>
                        <td>
                            <a onclick="return Del('<?php echo $student->item($i - 1)->getElementsByTagName('name')->item(0)->nodeValue; ?>',<?php echo $i ?> )"
                               href="index.php?page_layout=delete&id=<?php echo $student->item($i - 1)->getElementsByTagName('id')->item(0)->nodeValue; ?>" id="delete" >Удалить</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <a href="index.php?page_layout=create" id="add">Добавить Клиента</a>
        </div>
    </div>

</div>

<script>
    function Del(name, id) {
        var x = parseInt(id);
        var s = "th";
        if (x % 10 === 1) {
            s = "st";
        } else if (x % 10 === 2) {
            s = "nd";
        } else if (x % 10 === 3) {
            s = "rd";
        }
        return confirm("Are you sure to delete " + id + s + " student " +name+" ?");
    }
</script>