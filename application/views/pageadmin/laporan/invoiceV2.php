<html>

<head>
	<style>
		.invoice-box {
			max-width: 800px;
			margin: auto;
			padding: 30px;
			border: 1px solid #eee;
			box-shadow: 0 0 10px rgba(0, 0, 0, .15);
			font-size: 16px;
			line-height: 24px;
			font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			color: #555;
		}

		.invoice-box table {
			width: 100%;
			line-height: inherit;
			text-align: left;
		}

		.invoice-box table td {
			padding: 5px;
			vertical-align: top;
		}

		.invoice-box table tr td:nth-child(2) {
			text-align: right;
		}

		.invoice-box table tr.top table td {
			padding-bottom: 20px;
		}

		.invoice-box table tr.top table td.title {
			font-size: 45px;
			line-height: 45px;
			color: #333;
		}

		.invoice-box table tr.information table td {
			padding-bottom: 40px;
		}

		.invoice-box table tr.heading td {
			background: #eee;
			border-bottom: 1px solid #ddd;
			font-weight: bold;
		}

		.invoice-box table tr.details td {
			padding-bottom: 20px;
		}

		.invoice-box table tr.item td {
			border-bottom: 1px solid #eee;
		}

		.invoice-box table tr.item.last td {
			border-bottom: none;
		}

		.invoice-box table tr.total td:nth-child(2) {
			border-top: 2px solid #eee;
			font-weight: bold;
		}

		@media only screen and (max-width: 600px) {
			.invoice-box table tr.top table td {
				width: 100%;
				display: block;
				text-align: center;
			}

			.invoice-box table tr.information table td {
				width: 100%;
				display: block;
				text-align: center;
			}
		}

		/** RTL **/
		.rtl {
			direction: rtl;
			font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
		}

		.rtl table {
			text-align: right;
		}

		.rtl table tr td:nth-child(2) {
			text-align: left;
		}

		.invoice {
			text-align: center;
			font-size: 26px;
			margin-bottom: 8px;
			color: blue;
		}
	</style>
</head>

<body>
	<div class="invoice-box">



		<table cellpadding="0" cellspacing="0">
			<tr class="information">
				<td colspan="2">
					<img src="<?= base_url() ?>assets/bawah.png" width="150px">&nbsp;
				</td>
				<td colspan="2">
					<div class="invoice">
						<br>
						<p><b>INVOICE</b> &nbsp;
							&nbsp;
							&nbsp;
						</p>
					</div>
				</td>

				<td colspan="2">
					<img src="<?= base_url() ?>assets/atas.png" width="150px">
				</td>
			</tr>
		</table>

		<table cellpadding="0" cellspacing="0">
			<tr class="information">
				<td colspan="2">
					<table>
						<?php foreach ($user as $value) {
							echo ' 			<tr>
													<td>
													 	Kepada : <br> <b>' . strtoupper($value['name']) . '</b> <br>
														' . $value['no_wa'] . ' <br>
														' . $value['address'] . ' <br>
														<br>
													 </td>
											 </tr>';
						} ?>
					</table>
				</td>
				<td colspan="2">
					<table>
						<?php
						echo ' 			<tr>
													<td>
													 	<b>ID Pelanggan </b>&nbsp;&nbsp; &nbsp;&nbsp;: ' . $value['no_services'] . ' <br>
														<b>Tanggal Invoice</b> &nbsp;: ' . $createdAt . ' <br>
														<b>Jatuh Tempo</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :  ' . $due_date . '
													 </td>
											 </tr>';
						?>
					</table>
				</td>
			</tr>
		</table>
		<table>
			<tr class="heading">
				<td>
					Item
				</td>
				<td style="text-align:left">
					Status
				</td>
				<td>
					Harga
				</td>
			</tr>

			<?php
			$no = 1;
			$total = 0;
			foreach ($item_list as $value) {
				if ($value['status'] == 0) {
					$status = '<td style="text-align:left">
					<b><p style="color:red">BELUM BAYAR </p></b>
			</td>';
				} else {
					$status = '<td style="text-align:left"><p style="color:green">
					SUDAH BAYAR </p></b>
			</td>';
				}
				echo '
							<tr class="item">
									<td style="text-align:left">
											' . $value['nama_layanan'] . ' Periode ' . $monthname . ' ' . $value['year'] . '
									</td> ' .
					$status . '
									<td>
									Rp. ' . number_format($value['price'], 0, ',', '.') . '
								</td>
							</tr>
							
						';

				$total += $value['price'];
			}
			?>
		</table>
		<br>
		<table>
			<tr class="total">
				<td>
					<p>* <i>Terbilang : <?php $tot = $total + $kode_unik;
										echo terbilang($tot); ?> </i></p>
					<br>
					<p style="color:red"><b>Catatan : </b></p>
					<?php $kata5 = $this->db->query("select kata5 from template_invoice")->result_array();
					echo $kata5[0]['kata5']; ?>
					<br>
					<?php $kata = $this->db->query("select kata from template_invoice")->result_array();
					echo $kata[0]['kata']; ?>

				</td>
				<td></td>
				<td></td>
				<td>
					Kode Unik :
					<br>
					<b>Total Tagihan: <b>
				</td>
				<td style="text-align: right;">

					<?php echo number_format(($kode_unik), 0, ',', '.'); ?>
					<br>
					<b><?php echo 'Rp.' . number_format(($total + $kode_unik), 0, ',', '.'); ?></b>
				</td>
			</tr>
		</table>
		<br>
		<div class="footer">

		</div>
		<?php $date = date('d M Y'); ?>
		<br>
		<div class="footer">
			<table>

			</table>
			<br>
			<br>
			<br>
			<table>

			</table>
		</div>
	</div>
</body>

</html>

<?php
function penyebut($nilai)
{
	$nilai = abs($nilai);
	$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
	$temp = "";
	if ($nilai < 12) {
		$temp = " " . $huruf[$nilai];
	} else if ($nilai < 20) {
		$temp = penyebut($nilai - 10) . " belas";
	} else if ($nilai < 100) {
		$temp = penyebut($nilai / 10) . " puluh" . penyebut($nilai % 10);
	} else if ($nilai < 200) {
		$temp = " seratus" . penyebut($nilai - 100);
	} else if ($nilai < 1000) {
		$temp = penyebut($nilai / 100) . " ratus" . penyebut($nilai % 100);
	} else if ($nilai < 2000) {
		$temp = " seribu" . penyebut($nilai - 1000);
	} else if ($nilai < 1000000) {
		$temp = penyebut($nilai / 1000) . " ribu" . penyebut($nilai % 1000);
	} else if ($nilai < 1000000000) {
		$temp = penyebut($nilai / 1000000) . " juta" . penyebut($nilai % 1000000);
	} else if ($nilai < 1000000000000) {
		$temp = penyebut($nilai / 1000000000) . " milyar" . penyebut(fmod($nilai, 1000000000));
	} else if ($nilai < 1000000000000000) {
		$temp = penyebut($nilai / 1000000000000) . " triliun" . penyebut(fmod($nilai, 1000000000000));
	}
	return $temp;
}

function terbilang($nilai)
{
	if ($nilai < 0) {
		$hasil = "minus " . trim(penyebut($nilai));
	} else {
		$hasil = trim(penyebut($nilai));
	}
	return $hasil;
}
?>
