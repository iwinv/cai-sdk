<?php
/**
 * 기본 설정을 불러옵니다.
 */
include_once '../inc/config.inc' ;

/*
 * Token 생성
 */
$AUTH -> getToken () ;

$title = 'Rules';

include_once INC . DIRECTORY_SEPARATOR . 'header.inc' ;

$rule = $AUTH->ruleSelect () ;
$rule = (array) $rule->rules ;
?>


<div class="div_main">

	<input type="hidden" id="token" value="<?= $AUTH -> token ; ?>">

	<div class="item">
		<h3>인코딩 rule 목록 :</h3>
		<div class="item_body">
			<table>
				<thead>
					<tr>
						<th width="11%">Memo</th>
						<th width="7%">Rule type</th>
						<th width="3%">Quality</th>
						<th width="5%">Ttype</th>
						<th width="3%">Cut</th>
						<th width="3%">Rotate</th>
						<th width="4%">Resize</th>
						<th width="4%">Width</th>
						<th width="4%">Height</th>
						<th width="4%">Crop</th>
						<th width="5%">Bg Color</th>
						<th width="3%">Upsize</th>
						<th width="26%">Watermark</th>
						<th width="5%">Filter</th>

					</tr>
				</thead>
				<tbody>
					<?php if ( empty ( $rule ) ) : ?>
					<td colspan="14">결과가 없습니다.</td>
					<?php else : ?>
					<?php
					foreach ( $rule as $v ) :
						$v = (array) $v ;
					?>
					<tr>
						<td><?=$v['memo']?></td>
						<td><?=$v['type']?></td>
						<td><?=$v['quality']?></td>
						<td><?=$v['ttype'] ? $v['ttype'] : '원본 유지' ?></td>
						<td><?=$v['cut']?></td>
						<td><?=$v['rotate']?></td>
						<td><?=$v['r_type'] ? $v['r_type'] : '-' ?></td>
						<td><?=$v['r_w'] ? $v['r_w'] : '-' ?></td>
						<td><?=$v['r_h'] ? $v['r_h'] : '-' ?></td>
						<td><?=$v['r_crop'] ? $v['r_crop'] : '-' ?></td>
						<td><?=$v['r_bg'] ? '#' . $v['r_bg'] : '-' ?></td>
						<td><?=$v['r_upsize']? $v['r_upsize'] : '-' ?></td>
						<td class='text-break'><?=$v['wm_path']?$v['wm_path'] . '(align:'.$v['wm_align'].';x:'.$v['wm_x'].';y:'.$v['wm_y'].')' : '-' ?></td>
						<td><?=$v['f_type'] ? ( $v['f_type'] == 'greyscale' ? $v['f_type'] : $v['f_type'].'('.$v['f_val'].')' ) : '-' ?></td>
					</tr>
					<?php endforeach ; ?>
					<?php endif ; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- jQuery -->
<script src="<?=DOMAIN ?>/jquery.min.js" type="text/javascript"></script>

<script>
(function(){
})();
</script>