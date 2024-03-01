<?php include_once "db_export.php";

if (!empty($_POST)) {
    echo "您希望匯出";
    print_r($_POST['select']);
    echo "以上資料";
    //有問題
    $dates = find('20200706', ['投票所編號' => $_POST['select']]);
    echo ($dates);



    $rows = all('20200706', " where `投票所編號` in ('" . join("','", $_POST['select']) . "') ");
    print_r($rows);
    $th =
        $filename = date("Ymd") . rand(10000000, 99999999);
    $file = fopen("./doc/{$filename}.csv", 'w');
    //編碼 BIG5 轉 UTF8
    fwrite($file, "\xEF\xBB\xBf");

    $chk = false;

    foreach ($rows as $row) {
        if (!$chk) {
            $cols = array_keys($row);
            fwrite($file, join(",", $cols) . "`\r\n");
            $chk = true;
        }
        fwrite($file, join(",", $row) . "`\r\n");
    }
    fclose($file);
    echo "<a href='./doc/{$filename}.csv' download>檔案已匯出，請點連結下載</a>";
}

?>

<style>
    table {
        border-collapse: collapse;
    }

    td {
        border: 1px solid #666;
    }

    th {
        border: 1px solid #666;
        background-color: black;
        color: white;
    }
.form-check-input{
    width: 100%;
    height: 100%;
}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="./js/jquery-1.9.1.min.js"></script>
<div class="container">
    <div class="row">
        <form class="form-control" action="?" method="post">
            <input class="btn btn-primary my-3" type="submit" value="匯出選擇的資料">
            <table class='table table-striped table-hover px-3'>
                <tr>
                    <th width=5%>選取
                        <input class="form-check-input" type="checkbox" name="" id="select">
                    </th>
                    <th>投票所編號</th>
                    <th width=20%>投票所</th>
                    <th width=5%>候選人1</th>
                    <th>候選人1票數</th>
                    <th width=5%>候選人2</th>
                    <th>候選人2票數</th>
                    <th width=5%>候選人3</th>
                    <th>候選人3票數</th>
                    <th>有效票數</th>
                    <th>無效票數</th>
                    <th>投票數</th>
                    <th>已領未投票數</th>
                    <th>發出票數</th>
                    <th>用餘票數</th>
                    <th>選舉人數</th>
                    <th>投票率</th>
                </tr>
                <?php
                $rows = all('20200706');
                foreach ($rows as $row) {
                    echo "<tr>";
                    echo "<td>";
                    echo "<input class='form-check-input' type='checkbox' name='select[]' value='{$row['投票所編號']}'>";
                    echo "</td>";

                    foreach ($row as $value) {
                        echo "<td>";
                        echo $value;
                        echo "</td>";
                    }
                    echo "</tr>";
                }
                ?>

            </table>
        </form>
    </div>
</div>
<script>
    $("#select").on('change', function() {
        if ($(this).prop('checked')) {
            $("input[name='select[]']").prop('checked', true);
        } else {
            $("input[name='select[]']").prop('checked', false);

        }
    })
</script>