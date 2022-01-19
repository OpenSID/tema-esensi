<div class="box box-primary box-solid">
	<div class="box-header">
		<h3 class="box-title"><i class="fas fa-chart-line"></i> Statistik Pengunjung</h3>
	</div>
	<div class="box-body">
		<?php
		function num_toimage($tot,$jumlah)
		{
			$pattern='';
			for($j=0; $j<strlen($jumlah ); $j++)
			{
				$pattern .= '0';
			}

			$len = strlen($tot);
			$length = strlen($pattern)-$len;
			$start = substr($pattern,0,$length).substr($tot,0,$len-1);
			$last = substr($tot,$len-1,1);
			$last_rpc= '<img src="_BASE_URL_/assets/images/counter/animasi/'.$last.'.gif" align="absmiddle" />';
			$inc = str_replace($last,$last_rpc,$last);
			for($i=0;$i<=9;$i++)
			{
				$rpc ='<img src="_BASE_URL_/assets/images/counter/'.$i.'.gif" align="absmiddle"/>';
				$start=str_replace($i,$rpc,$start);
			}

			$num = $start.$inc;
			$num = str_replace('_BASE_URL_',base_url(),$num);
			return $num;
		}
		?>
		<div class="">
			<table cellpadding="0" cellspacing="0" class="counter w-full border-0 divide-y">
				<tr class="py-2">
					<td> Hari ini</td>
					<td class="inline-flex w-full justify-end text-right">
						<?= num_toimage($statistik_pengunjung['hari_ini'], $statistik_pengunjung['total']); ?></td>
				</tr>
				<tr class="py-2">
					<td valign="middle" height="20">Kemarin </td>
					<td valign="middle" class="inline-flex w-full justify-end text-right">
						<?= num_toimage($statistik_pengunjung['kemarin'], $statistik_pengunjung['total']); ?></td>
				</tr>
				<tr class="py-2">
					<td valign="middle" height="20">Jumlah pengunjung</td>
					<td valign="middle" class="inline-flex w-full justify-end text-right">
						<?= num_toimage($statistik_pengunjung['total'], $statistik_pengunjung['total']); ?></td>
				</tr>
			</table>
		</div>
	</div>
</div>