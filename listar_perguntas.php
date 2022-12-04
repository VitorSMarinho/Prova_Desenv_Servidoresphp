<?php
include "conexao.php";
if(isset($_POST) && !empty($_POST))
{
    $pergunta = $_POST["pergunta"];
    $query = "insert into perguntas (pergunta) values ('$pergunta')";
    $resultado = mysqli_query($conexao,$query);
}

$query = "select * from perguntas";
$resultado = mysqli_query($conexao,$query);
?>
<form action="listar_perguntas.php" method="post">
    <input type="text" name="pergunta"/>
    <br>
    <br>
    <button type="submit">Salvar</button>
</form>
<table>
    <thead>
        <tr>
            <th>id</th>
            <th>Pergunta</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php 
            while($linha = mysqli_fetch_array($resultado))
            {
                echo "<tr style='border: 1px solid black'>";
                echo "<td>".$linha['id']."</td>";
                echo "<td>".$linha['pergunta']."<td>";
                echo "<td> <a href='./alternativas.php?pergunta_id=".$linha['id']."'>Lista de Alternativas</a> </td>";
                echo "</tr>";

            }
        ?>
    </tbody>
</table>