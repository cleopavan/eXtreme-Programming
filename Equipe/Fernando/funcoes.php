<?php 
	function produtosTable(){
		connect();
		//######### INICIO Paginação
        $numreg = 9; // Quantos registros por página vai ser mostrado
        if (!isset($_GET['pg'])) {
                $_GET['pg'] = 0;
        }
        $inicial = $_GET['pg'] * $numreg;
        
//######### FIM dados Paginação
        
        // Faz o Select pegando o registro inicial até a quantidade de registros para página
        if(isset($_SESSION['codCategoria'])){
$sql = "SELECT * FROM produtos p JOIN categoriasProduto cp ON(p.codigoProduto = cp.codigoProduto_FK ) JOIN categorias cat ON(cat.codigoCategoria = cp.codigoCategoria_FK AND cat.codigoCategoria=".$_SESSION['codCategoria'].") ORDER BY(dataProduto) DESC LIMIT $inicial, $numreg";
		
$sql_conta = "SELECT * FROM produtos p JOIN categoriasProduto cp ON(p.codigoProduto = cp.codigoProduto_FK )JOIN categorias cat ON(cat.codigoCategoria = cp.codigoCategoria_FK AND cat.codigoCategoria=".$_SESSION['codCategoria'].") ORDER BY(dataProduto) DESC";
	
		$sql = mysql_query($sql);
		$sql_conta = mysql_query($sql_conta);
		}else{
$sql = "SELECT * FROM produtos p JOIN categoriasProduto cp ON(p.codigoProduto = cp.codigoProduto_FK ) JOIN categorias cat ON(cat.codigoCategoria = cp.codigoCategoria_FK AND cat.codigoCategoria=0) ORDER BY(dataProduto) DESC LIMIT $inicial, $numreg";
		
$sql_conta = "SELECT * FROM produtos p JOIN categoriasProduto cp ON(p.codigoProduto = cp.codigoProduto_FK )JOIN categorias cat ON(cat.codigoCategoria = cp.codigoCategoria_FK AND cat.codigoCategoria=0) ORDER BY(dataProduto) DESC";
		$sql = mysql_query($sql);
		$sql_conta = mysql_query($sql_conta);
		}
    	//$res = mysql_query($sql);
		$quantreg = mysql_num_rows($sql_conta); // Quantidade de registros pra paginação
		$x = 1;
        
        
        
        
        
        //echo "<br><br>"; // Vai servir só para dar uma linha de espaço entre a paginação e o conteúdo
        echo "<table>";
		echo "<tr>";
        while ($aux = mysql_fetch_array($sql)) {
             echo"<td>
								<div id=\"produtoCenter1\">
									<div id=\"produtoCenter2\">
										<div id=\"produtoCenterTOP\"></div>
									</div>
									<div id=\"produtoCenterReal\">
										<div class=\"titulo\">".$aux['nomeProduto']."</div>
										<div class=\"foto\"><center><a href=\"index.php?verCategorias=".$aux['codigoProduto']."\"><img src=\"produtos/".$aux['codigoProduto']."/principal.jpg\" height=\"115px\" class=\"alignnone\" /></a></center></div>
										<div class=\"descricao\">
											<pre>".$aux['descricaoProduto']."</pre>
										</div>
										<div class=\"preco\">";
										if($aux['precoDe'] != ""){
											echo"De R$ ".$aux['precoDe']." Por R$ ".$aux['precoProduto']."";
										}else{
											echo "R$ ".$aux['precoProduto']."";
										}
										echo"
										</div>
										<div class=\"botoes\">
									<div class=\"gradientbuttons\"><ul><li><a href=\"index.php?verCategorias=".$aux['codigoProduto']."\">Ver+</a></li></ul></div>	
										</div>
									</div>
								</div>
							</td>";
							
						
						if($x % 3 == 0){
							echo "</tr><tr>";
						}
						$x++;
					}
					echo "</tr></table>";
		include("php/paginacao.php"); // Chama o arquivo que monta a paginação. ex: << anterior 1 2 3 4 5 próximo >>	
		
	}
	
	function newTable(){
		connect();
		$sql = "SELECT * FROM new";
    	$res = mysql_query($sql);
		$x = 1;
		while ($row = mysql_fetch_array($res)) {					
		echo"
		<div class='temp'>
                	<div class='temphol'>
                        <img src='produtos/new/".$row['codigo']."/foto2/fotoNew.jpg' alt='Your Blog' border='0'/>
                        <img src='produtos/new/".$row['codigo']."/foto1/fotoNew.jpg' class='front' alt='color structure' border='0'/>  <div class='new'></div>
                        <a href='index.php?verPromocoes=".$row['codigoProduto']."' class='thumb'>Your Blog</a>
                  	</div> <!-- fim temhol -->
                    <div class='tempde'>
                        <div class='tempname'>".$row['titulo']."</div>
                        <div class='tempprice'>R$ "; newPreco($row['codigoProduto']);  echo"</div>
                        <div class='clear'></div>
                    </div> <!-- fim tempde -->
         </div> <!-- fim temp -->";
		}
	}
	function newPreco($cod){
		connect();
		$sql2 = "SELECT precoProduto FROM produtos WHERE codigoProduto=".$cod." ";
		$res2 = mysql_query($sql2);		
		$row2 = mysql_fetch_array($res2);
		echo $row2['precoProduto'];
	}
	function listar(){
		connect();
		$sql = "SELECT * FROM produtos p JOIN categoriasProduto cp ON(p.codigoProduto = cp.codigoProduto_FK )
		JOIN categorias cat ON(cat.codigoCategoria = cp.codigoCategoria_FK AND cat.codigoCategoria=".$_GET['cat'].") ORDER BY(codigoProduto)";
			
		$res = mysql_query($sql);
		echo"<table><tr><td>Codigo</td><td>Nome</td><td>Valor</td><td>visitas</td><td>data</td></tr>";		
		while ($row = mysql_fetch_array($res)) {
			echo" 
			
				<tr>
					<td>".$row['codigoProduto']."</td>
					<td>".$row['nomeProduto']."</td>
					<td>".$row['precoProduto']."</td>
					<td>".$row['visitas']."</td>"; $rData = explode("-", $row['dataProduto']); $rData = $rData[2].'-'.$rData[1].'-'.$rData[0]; echo"
					<td width=\"90px\">".$rData."</td>
					<td class=\"branco\">
						<a href=\"php/excluir.php?codigoProduto=".$row['codigoProduto']."\" onclick=\"return confirm('Tem certeza que vai excluir?');\">
						<img src=\"img/error.png\" height=\"15px\" border=\"0\" title=\"Excluir\"/></a>
					</td>
					<td class=\"branco\">
						<a href=\"administrador.php?op=4&codigoProduto=".$row['codigoProduto']."\">
						<img src=\"img/editar.png\" height=\"15px\" border=\"0\" title=\"Editar\" /></a>
					</td>
					<td class=\"branco\">
						<a href=\"administrador.php?op=5&codigoProduto=".$row['codigoProduto']."\">
						<img src=\"img/foto.png\" height=\"15px\" border=\"0\" title=\"Colocar Fotos\"/></a>
					</td>
				</tr>";
	
		}
		echo"</table>";			

	}
	function newListar(){
		connect();
		$sql = "SELECT * FROM new";
			
		$res = mysql_query($sql);
		echo"<table><tr><td>Numero</td><td>Titulo</td><td>Codigo do Produto</td><td>Editar</td><td>Foto1</td><td>Foto2</td></tr>";		
		while ($row = mysql_fetch_array($res)) {
			echo" 
				<tr height=\"70px\">
					<td>".$row['codigo']."</td>
					<td>".$row['titulo']."</td>
					<td>".$row['codigoProduto']."</td>
					<td class=\"branco\">
						<a href=\"administrador.php?op=21&codigo=".$row['codigo']."\">
						<img src=\"img/editar.png\" height=\"20px\" border=\"0\" title=\"Editar\"/></a>
					</td>
					<td class=\"branco\">
						<a href=\"administrador.php?op=22&codigo=".$row['codigo']."\">
						<img src=\"img/foto.png\" height=\"20px\" border=\"0\" title=\"Upload Foto 1\"/></a>
					</td>
					<td class=\"branco\">
						<a href=\"administrador.php?op=23&codigo=".$row['codigo']."\">
						<img src=\"img/foto.png\" height=\"30px\" border=\"0\" title=\"Uploat Foto 2\"/></a>
					</td>
				</tr>";
	
		}
		echo"</table>";			
		
	}
	function slidesListar(){
		connect();
		$sql = "SELECT * FROM slides";
			
		$res = mysql_query($sql);
		echo"<table><tr><td>Slide</td><td>Titulo</td><td>Descricao</td><td>Codigo do Produto</td><td>Nome do Produto</td></tr>";		
		while ($row = mysql_fetch_array($res)) {
			$sql2 = "SELECT nomeProduto FROM produtos WHERE codigoProduto='".$row['codigoProduto']."'";
			$res2 = mysql_query($sql2);
			$row2 = mysql_fetch_array($res2);
			echo" 
			
				<tr height=\"70px\">
					<td>".$row['codigo']."</td>
					<td>".$row['titulo']."</td>
					<td>".$row['descricao']."</td>
					<td>".$row['codigoProduto']."</td>
					<td>".$row2['nomeProduto']."</td>
					<td class=\"branco\">
						<a href=\"administrador.php?op=11&codigo=".$row['codigo']."\">
						<img src=\"img/editar.png\" height=\"30px\" border=\"0\" title=\"Editar\"/></a>
					</td>
					<td class=\"branco\">
						<a href=\"administrador.php?op=12&codigo=".$row['codigo']."\">
						<img src=\"img/foto.png\" height=\"30px\" border=\"0\" title=\"Editar Foto\"/></a>
					</td>
				</tr>";
	
		}
		echo"</table>";			
		
	}
	function slidesTitulo($cod){
		connect();
		$sql = "SELECT titulo FROM slides WHERE codigo=".$cod." ";
		$res = mysql_query($sql);		
		$row = mysql_fetch_array($res);
		echo $row['titulo'];
	}
	function slidesDescricao($cod){
		connect();
		$sql = "SELECT descricao FROM slides WHERE codigo=".$cod." ";
		$res = mysql_query($sql);		
		$row = mysql_fetch_array($res);
		echo $row['descricao'];
	}
	function slidesCodigoProduto($cod){
		connect();
		$sql = "SELECT codigoProduto FROM slides WHERE codigo=".$cod." ";
		$res = mysql_query($sql);		
		$row = mysql_fetch_array($res);
		echo $row['codigoProduto'];
	}
	function destaques(){
		connect();
		
		$sql = "SELECT * FROM produtos p JOIN categoriasProduto cp ON(p.codigoProduto = cp.codigoProduto_FK )
		JOIN categorias cat ON(cat.codigoCategoria = cp.codigoCategoria_FK AND cat.codigoCategoria=10) ORDER BY(dataProduto) DESC";
			
		$res = mysql_query($sql);

		while ($row = mysql_fetch_array($res)) {
		echo"
		<div id=\"destaquesReal\"> 
			<div class=\"titulo\"> 
				".$row['nomeProduto']."
			</div>
			<div class=\"botoes\">	
				<div class=\"gradientbuttons destaquesBlue\"><ul><li><a href=\"index.php?verDestaques=".$row['codigoProduto']."\">Ver+</a></li></ul></div>
			</div>
			<div class=\"foto\">		
				<center><a href=\"index.php?verDestaques=".$row['codigoProduto']."\"><img src=\"produtos/".$row['codigoProduto']."/principal.jpg\" border=\"0\" class=\"alignnone\"/></a></center>
			</div>
			<div class=\"preco\">";
				if($row['precoDe'] != ""){
					echo"De R$ ".$row['precoDe']." Por R$ ".$row['precoProduto']."";
				}else{
					echo "R$ ".$row['precoProduto']."";
				}
			echo"	
			</div>";
			echo "<hr width=\"90%\" align=\"center\" />";
			echo "</div> ";	
		}
	}
	function recuperarTudo(){
		connect();
		$sql = "SELECT * FROM produtos WHERE codigoProduto='".$_GET['codigoProduto']."'";
    	$res = mysql_query($sql);
		$row = mysql_fetch_array($res);
		$_SESSION['nome'] = $row['nomeProduto'];
		$_SESSION['descricao'] = $row['descricaoProduto'];
		$_SESSION['preco'] = $row['precoProduto'];
		$_SESSION['precoDe'] = $row['precoDe'];
	}
	function slidesRecuperarTudo(){
		connect();
		$sql = "SELECT * FROM slides WHERE codigo='".$_GET['codigo']."'";
    	$res = mysql_query($sql);
		$row = mysql_fetch_array($res);
		$_SESSION['titulo'] = $row['titulo'];
		$_SESSION['descricao'] = $row['descricao'];
		$_SESSION['fotoMenor'] = $row['fotoMenor'];
		$_SESSION['fotoMaior'] = $row['fotoMaior'];
		$_SESSION['codigoProduto'] = $row['codigoProduto'];
	}
	function newRecuperarTudo(){
		connect();
		$sql = "SELECT * FROM new WHERE codigo='".$_GET['codigo']."'";
    	$res = mysql_query($sql);
		$row = mysql_fetch_array($res);
		$_SESSION['titulo'] = $row['titulo'];
		$_SESSION['codigoProduto'] = $row['codigoProduto'];
	}
	function preco(){
		connect();
		$sql = "SELECT precoProduto FROM produtos WHERE codigoProduto='".$_GET['codProduto']."'";
    	$res = mysql_query($sql);
		$row = mysql_fetch_array($res);
		echo $row['precoProduto'];
	}
	function descricao(){
		connect();
		$sql = "SELECT descricaoProduto FROM produtos WHERE codigoProduto='".$_GET['codProduto']."'";
    	$res = mysql_query($sql);
		$row = mysql_fetch_array($res);
		echo $row['descricaoProduto'];
		
	}
	
	function nome(){
		connect();
		$sql = "SELECT nomeProduto FROM produtos WHERE codigoProduto='".$_GET['codProduto']."'";
    	$res = mysql_query($sql);
		$row = mysql_fetch_array($res);
		echo $row['nomeProduto'];
		
	}
	function nomeCodigoProduto(){
		connect();
		$sql = "SELECT nomeProduto FROM produtos WHERE codigoProduto='".$_GET['codigoProduto']."'";
    	$res = mysql_query($sql);
		$row = mysql_fetch_array($res);
		echo $row['nomeProduto'];
		
	}
	function categoria(){
		connect();
		$sql = "SELECT nomeCategoria FROM categorias WHERE codigoCategoria='".$_SESSION['codCategoria']."'";
    	$res = mysql_query($sql);
		$row = mysql_fetch_array($res);
		echo $row['nomeCategoria'];
		
	}
	
	function checked($num){
		connect();
		$sql = "SELECT codigoCategoria_FK FROM categoriasProduto WHERE codigoProduto_FK = '".$_GET['codigoProduto']."' ";
			
		$res = mysql_query($sql);
		while ($row = mysql_fetch_array($res)) {
			if($num == $row['codigoCategoria_FK']){
				//$_SESSION['numCat']='checked';
				return "checked";
			}
		}
	}
	function connect(){
		$Arq = fopen("block/sn.txt", 'rb');
		while (!feof($Arq)) {$sn = fgets($Arq);}
		
		$Arq = fopen("block/user.txt", 'rb');
		while (!feof($Arq)) {$user = fgets($Arq);}
		
		$Arq = fopen("block/local.txt", 'rb');
		while (!feof($Arq)) {$local = fgets($Arq);}
		
		$Arq = fopen("block/db.txt", 'rb');
		while (!feof($Arq)) {$db = fgets($Arq);}

		if(!($conexao = mysql_connect($local,$user,$sn))) {
		   echo "--> 1 - Nao foi possivel estabelecer uma conexao com o gerenciador MySQL. Favor Contactar o Administrador.";
		   exit;
		} 
		if(!($conect = mysql_select_db($db,$conexao))) { 
		   echo "--> 2 - Nao foi possivel estabelecer uma conexao com o gerenciador MySQL. Favor Contactar o Administrador.";
		   exit; 
		}
	}
	
	function estatisticas(){
		connect();
		$sql = "SELECT * FROM contadores";
			
		$res = mysql_query($sql);
		while ($row = mysql_fetch_array($res)) {
			echo "<br/><hr>";			
			echo "Visitas ao <b>Site</b>: ".$row['site'];
			echo "<br/><br/>Visitas portal <b>Chapeco</b>: ".$row['cco'];
			echo "<br/><br/>Visitas portal <b>Pato Branco</b>: ".$row['pto'];
			echo "<br/><br/>Visitas <b>FaceBook</b>: ".$row['face'];
			echo "<br/><hr>";			
			echo "Cliques na <b>Logo</b>: ".$row['logo'];			
			echo "<br/><br/>Visualizado por <b>Slides:</b> ".$row['slides'];
			echo "<br/><br/>Visualizado por <b>Destaques</b>: ".$row['destaques'];
			echo "<br/><br/>Visualizado por <b>Promocoes</b>: ".$row['promocoes'];
			echo "<br/><br/>Visualizado por <b>Categorias</b>: ".$row['categorias'];						


		}
	}
	function duvidas(){
		connect();
		$sql = "SELECT * FROM duvidas ORDER BY(data) DESC";	
		$res = mysql_query($sql);
		echo"<table>";		
		while ($row = mysql_fetch_array($res)) {
			echo" 
				<tr align=\"left\">
					<!--<tr><td align=\"left\" width=\"100px\">Codigo</td><td width=\"400px\">".$row['codigo']."</td></tr>-->
					<tr><td align=\"left\" width=\"100px\">Nome</td><td width=\"400px\">".$row['nome']."</td></tr>
					<tr><td align=\"left\" width=\"100px\">Telefone</td><td width=\"400px\">".$row['telefone']."</td></tr>
					<tr><td align=\"left\" width=\"100px\">Email</td><td width=\"400px\">".$row['email']."</td></tr>
					<tr><td align=\"left\" width=\"100px\">Mensagem</td><td width=\"400px\">".$row['mensagem']."</td></tr>
					<tr><td align=\"left\" width=\"100px\">Produto</td><td width=\"400px\">".$row['produto']."</td></tr>
					<tr><td align=\"left\" width=\"100px\">Data</td><td width=\"400px\">".$row['data']."</td></tr>
					<tr height=\"10px\"></tr>
				</tr>";
		}
		echo"</table>";			
	}
	function encomendas(){
		connect();
		$sql = "SELECT * FROM encomendas ORDER BY(data) DESC";	
		$res = mysql_query($sql);
		echo"<table>";		
		while ($row = mysql_fetch_array($res)) {
			echo" 
				<tr align=\"left\">
					<!--<tr><td align=\"left\" width=\"100px\">Codigo</td><td width=\"400px\">".$row['codigo']."</td></tr>-->
					<tr><td align=\"left\" width=\"100px\">Nome</td><td width=\"400px\">".$row['nome']."</td></tr>
					<tr><td align=\"left\" width=\"100px\">Telefone</td><td width=\"400px\">".$row['telefone']."</td></tr>
					<tr><td align=\"left\" width=\"100px\">Email</td><td width=\"400px\">".$row['email']."</td></tr>
					<tr><td align=\"left\" width=\"100px\">Endereco</td><td width=\"400px\">".$row['endereco']."</td></tr>
					<tr><td align=\"left\" width=\"100px\">Cidade</td><td width=\"400px\">".$row['cidade']."</td></tr>
					<tr><td align=\"left\" width=\"100px\">Produto</td><td width=\"400px\">".$row['produto']."</td></tr>
					<tr><td align=\"left\" width=\"100px\">Preco</td><td width=\"400px\">".$row['preco']."</td></tr>
					<tr><td align=\"left\" width=\"100px\">Data</td><td width=\"400px\">".$row['data']."</td></tr>
					<tr height=\"10px\"></tr>
				</tr>";
		}
		echo"</table>";			
	}
	function atendimento(){
		connect();
		$sql = "SELECT * FROM atendimento ORDER BY(data) DESC";	
		$res = mysql_query($sql);
		echo"<table>";		
		while ($row = mysql_fetch_array($res)) {
			echo" 
				<tr align=\"left\">
					<!--<tr><td align=\"left\" width=\"100px\">Codigo</td><td width=\"400px\">".$row['codigo']."</td></tr>-->
					<tr><td align=\"left\" width=\"100px\">Nome</td><td width=\"400px\">".$row['nome']."</td></tr>
					<tr><td align=\"left\" width=\"100px\">Telefone</td><td width=\"400px\">".$row['telefone']."</td></tr>
					<tr><td align=\"left\" width=\"100px\">Email</td><td width=\"400px\">".$row['email']."</td></tr>
					<tr><td align=\"left\" width=\"100px\">Mensagem</td><td width=\"400px\">".$row['mensagem']."</td></tr>
					<tr><td align=\"left\" width=\"100px\">Data</td><td width=\"400px\">".$row['data']."</td></tr>
					<tr height=\"10px\"></tr>
				</tr>";
		}
		echo"</table>";			
	}
	
?>