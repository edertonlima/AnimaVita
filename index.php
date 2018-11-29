<!-- TELAVITA
	 Projeto de avaliação para vaga de desenvolvedor frontend.
	 Este documento pertence ao processo de recrutamento da empresa
	 e não deve ser compartilhado ou replicado sem prévia autorização.
  -->
<!DOCTYPE html>
<html lang="pt-br">
<head>

<?php 
	$titulo = '';
	$descricao = '';
	$image = '';
	$url = '';
	$autor = '';
?>

<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="shortcut icon" href="" type="image/x-icon" />
<link rel="icon" href="" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="pt" />
<meta name="rating" content="General" />
<meta name="description" content="<?php echo $descricao; ?>" />
<meta name="keywords" content="" />
<meta name="robots" content="index,follow" />
<meta name="author" content="<?php echo $autor; ?>" />
<meta name="language" content="pt-br" />
<meta name="title" content="<?php echo $titulo; ?>" />

<!-- SOCIAL META -->
<meta itemprop="name" content="<?php echo $titulo; ?>" />
<meta itemprop="description" content="<?php echo $descricao; ?>" />
<meta itemprop="image" content="<?php echo $image; ?>" />

<html itemscope itemtype="<?php echo $url; ?>" />
<link rel="image_src" href="<?php echo $image; ?>" />
<link rel="canonical" href="<?php echo $url; ?>" />

<meta property="og:type" content="website">
<meta property="og:title" content="<?php echo $titulo; ?>" />
<meta property="og:type" content="article" />
<meta property="og:description" content="<?php echo $descricao; ?>" />
<meta property="og:image" content="<?php echo $image; ?>" />
<meta property="og:url" content="<?php echo $url; ?>" />
<meta property="og:site_name" content="<?php echo $titulo; ?>" />
<meta property="fb:admins" content="<?php echo $autor; ?>" />
<meta property="fb:app_id" content="1205127349523474" /> 

<meta name="twitter:card" content="summary" />
<meta name="twitter:url" content="<?php echo $url; ?>" />
<meta name="twitter:title" content="<?php echo $titulo; ?>" />
<meta name="twitter:description" content="<?php echo $descricao; ?>" />
<meta name="twitter:image" content="<?php echo $image; ?>" />
<!-- SOCIAL META -->

<title><?php echo $titulo; ?></title>

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="assets/css/style.css" media="screen" />

<!-- JQUERY -->
<script type="text/javascript" src="assets/js/jquery.min.js"></script>


<script type="text/javascript">
  /*jQuery.noConflict();

  jQuery(document).ready(function(){
  });*/
</script>

</head>
<body>

<header class="header">

</header>

<section>
	<div class="container">
		<div class="row">
			
			<div class="list-card">
				
			</div>

		</div>
	</div>
</section>

<footer>
<?php 
echo file_get_contents('http://buffernow.com/');

$html2pdf = new HTML2PDF('P', 'A4');
$html2pdf->writeHTML($html_content);
$file = $html2pdf->Output('temp.pdf','F');

$im = new imagick('temp.pdf');
$im->setImageFormat( "jpg" );
$img_name = time().'.jpg';
$im->setSize(800,600);
$im->writeImage($img_name);
$im->clear();
$im->destroy();

?>
</footer>

<script type="text/javascript">

	jQuery(document).ready(function(){ 
		jQuery.noConflict();
		jQuery.getJSON('https://kitsu.io/api/edge/characters?page[limit]=2&page[offset]=0', function(data){	
			//console.log(data);
			

			card_html = '';

			jQuery.each(data.data, function (key, val) {

				card = val.attributes;
				//console.log(card);

				card_html += '<div class="col-4"><h3>' + card.name + '</h3></div>';
			
				//console.log('Descrição: '+card.description);
				//console.log('Imagem: '+card.image.original);

				/*console.log('Outros nome: ');
				jQuery.each(card.otherNames, function (key, val) {
					console.log(val);	
				});*/

			});

			jQuery('.list-card').html(card_html);

		});
	});
	
</script>