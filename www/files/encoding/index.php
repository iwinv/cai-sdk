<?php


/*
 * 프레임워크 파일을 불러옵니다.
 */
include_once '../../inc/config.inc' ;

$title = 'encoding' ;
include_once INC . DIRECTORY_SEPARATOR . 'header.inc' ;

/*
 * Token 생성
 */
$AUTH -> getToken () ;

$files = $AUTH->encodingFilesSelect ( '' , $_GET['key'] ) ;
$files = $files->encoding ;
?>


<div class="div_main">

	<input type="hidden" id="token" value="<?= $AUTH -> token ; ?>">


	<div class="item">

		<h3>파일 목록 : </h3>

		<div class="item_body">
			<table>
			<colgroup>
				<col width="5%">
				<col width="20%">
				<col width="10%">
				<col width="10%">
				<col width="20%">
				<col width="10%">
				<col width="20%">
				<col width="20%">
			</colgroup>
			<thead>
			<tr>
				<th>인코딩 이름</th>
				<th>키</th>
				<th>이미지 링크</th>
			</tr>
			</thead>
			<tbody>
				<?php if ( $files ) : ?>
					<?php
					foreach ( $files as $v ) :
					?>
					<tr>
						<td><?=$v->name?></td>
						<td><?=$v->key?></td>
						<td><a href="<?=$AUTH::$downloadUrl . ( $v->name == '원본' ? 'origin_' . $v->key : $v->key )?>">링크</a></td>
					</tr>
					<?php endforeach ; ?>
				<?php else : ?>
				<tr>
					<td colspan="8"><span>인코딩 값이 없습니다.</span></td>
				</tr>
				<?php endif ; ?>
			</tbody>
			</table>
		</div>
	</div>
</div>

</body>
<!-- jQuery -->
<script src="<?=DOMAIN ?>/jquery.min.js" type="text/javascript"></script>



