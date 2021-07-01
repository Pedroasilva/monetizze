<?php

	require 'jogos.php';

	$mega = new megaSena(6,10);

	$mega->setQtdDezenas(6);
	$mega->setTotalJogos(7);
	$mega->gerarCartela();
	$mega->sortearNumeros();
	$jogos = $mega->getJogos();

?>

<table border="1">
    <tr>
      <td>Qtd Dezenas</td>
      <td><?php echo $mega->getQtdDezenas(); ?></td>
    </tr>
    <tr>
      <td>Qtd jogos</td>
      <td><?php echo $mega->getTotalJogos(); ?></td>
  </tr>
  <tr>
      <td>Números Sorteado</td>
      <td>
      <?php 
      	foreach($mega->getResultado() as $numero){
      		echo $numero.' ';
      	}
      ?>      	
      </td>
  </tr>
	<?php
		foreach($jogos as $index => $jogo){
			echo "<tr>";
			echo "<td>";
			echo "Jogo ".($index+1);
			echo "</td>";
			echo "<td>";
			foreach($jogo as $numero){
				echo $numero.' ';
			}
			echo ' - '.$mega->conferirJogo($jogo);
			echo "</td>";
			echo "</tr>";
		}
	?>
</table>