<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Image Scramble</title>
	<link href='https://fonts.googleapis.com/css?family=Lato:400,100,300,400italic,700' rel='stylesheet' type='text/css'>
	<link href="css/reset.css" rel="stylesheet" type="text/css">
	<link href="css/imgscramble.css" rel="stylesheet" type="text/css">
	<script type="text/javascript">

		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-28367526-1']);
		_gaq.push(['_setDomainName', 'xpy.github.io']);
		_gaq.push(['_trackPageview']);

		(function () {
			var ga = document.createElement('script');
			ga.type = 'text/javascript';
			ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(ga, s);
		})();
	</script>
</head>
<body>
<?



$hor = isset($_GET['hor']) ? $_GET['hor'] : 10;
$ver = isset($_GET['ver']) ? $_GET['ver'] : $hor;

for ($i = 0; $i < $hor; $i++) {

    for ($j = 0; $j < $hor; $j++) {
        for ($l = 0; $l < 4; $l++) {
            ?>
		<input type="radio" id="radio_<?=$i;?>_<?=$j;?>_<?=$l;?>" name="radio_<?=$i;?>_<?=$j;?>" autocomplete="off">
            <?
        }

    }
}
?>
<style type="text/css">
    <? for ($i = 0; $i < $hor; $i++) {

        for ($j = 0; $j < $hor; $j++) {
            for ($l = 0; $l < 4; $l++) {
                ?>
            #radio_<?=$i;?>_<?=$j;?>_<?=$l;?>:checked ~ #wrapper #square_<?=$i;?>_<?=$j;?> { -moz-transform : rotate(<?=(-90) * $l;?>deg) !important; }
			#radio_<?=$i;?>_<?=$j;?>_<?=$l;?>:checked ~ #wrapper #square_<?=$i;?>_<?=$j;?> label[ for = "radio_<?=$i;?>_<?=$j;?>_<?=$l;?>" ] { display : none; z-index : -1; }
			#radio_<?=$i;?>_<?=$j;?>_<?=$l;?>:checked ~ #wrapper #square_<?=$i;?>_<?=$j;?> label[ for = "radio_<?=$i;?>_<?=$j;?>_<?=$l;?>" ] + label { z-index : -1; }
			#radio_<?=$i;?>_<?=$j;?>_<?=$l;?>:checked ~ #wrapper #square_<?=$i;?>_<?=$j;?> label[ for = "radio_<?=$i;?>_<?=$j;?>_<?=$l;?>" ] + label + label { z-index : -1; }
                <?
            }
        }
    }

    ?>
	.SQUARE { width : <?= 100 / $hor; ?>%; height : <?= 100 / $ver; ?>%; display : inline-block; vertical-align : top; background : inherit; cursor : pointer; position : relative; }

	.squareLabel { position : absolute; width : 100%; height : 100%; top : 0; left : 0; }

	input[type='radio'] { display : none; }
</style>
<div id="wrapper">
	<div id="taker" contenteditable="true"></div>
	<div id="puzzle">
		<table>
			<tbody>
            <? for ($i = 0; $i < $hor; $i++) {

                for ($j = 0; $j < $hor; $j++) {
                    $randomRotate = rand(0, 3)*90;
					$bgPos= [(100 + ($i*11))%100,(100 + ($j*11))%100]
                    ?>
				<div class="SQUARE" id="square_<?=$i;?>_<?=$j;?>" style="transform:rotate(<?=$randomRotate?>deg); background-position:<?= $bgPos[1].'% '.$bgPos[0].'%;' ?>"><?
                    for ($l = 0; $l < 4; $l++) { ?>
						<label class="squareLabel" for="radio_<?=$i;?>_<?=$j;?>_<?=$l;?>"></label>
                        <? } ?>
				</div>
                    <?
                }
            }
            ?></tbody>
		</table>
	</div>
	<div class="info">Drag an image into the box...</div>
</div>
</body>
</html>