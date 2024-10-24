<div class="container">
<h1 class="text-center">Lista użytkowników</h1>
<?php
$html = '<table class="table">';
$html .= '<thead><tr><th>#</th><th>imię i nazwisko</th><th>email</th><th class="text-center">aktywność</th><th>akcje</th></tr></thead>';
$html .= '<tbody>';
$sql = "SELECT * FROM users";
$res = $db->query($sql);
if ($res->num_rows > 0)
{
	while ($row = $res->fetch_assoc())
	{
        $name = $row['user_name'] . ' ' . $row['user_surname'];
		$html .= '<tr>';
        $html .= '<td>' . $row['id'] . '</td>';
        $html .= '<td>' . $name . '</td>';
        $html .= '<td>' . $row['user_email'] . '</td>';
        $html .= '<td class="text-center">' . showStatusIcon($row['active']) . '</td>';
        $html .= '<td><a class="action" href="?action=delete&id=' . $row ['id'] . '" title="usuń" onclick="return confirm(\'Czy na pewno chcesz usunąć ten wpis?\');"><i class="fa fa-times text-danger"></i>usuń</a></td>';
        $html .= '</tr>';
	}
    $html .= "</tbody>";
    $html .= "</table>";

    echo $html;
}
else
{
    echo '<p class="text-danger">Nie znaleziono wpisów</p>';
}
?>
</div>