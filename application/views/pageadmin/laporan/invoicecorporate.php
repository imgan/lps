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
			font-size: 18px;
			margin-bottom: 10px;
		}
	</style>
</head>

<body>
	<div class="invoice-box">
		<div class="invoice">
			<p><b>INVOICE</b></p>
		</div>
		<table cellpadding="0" cellspacing="0">
			<tr class="information">
				<td colspan="2">
					<table>
						<?php foreach ($user as $value) {
							echo ' 			<tr>
													<td>
													 	<b>To : ' . strtoupper($value['name']) . '</b> <br>
														Address : ' . $value['address'] . ' <br>
														<br>
														Up : 	 Finance <br>
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
													 	<b>From &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: PT. Juragan Wifi Indonesia</b> <br>
														No Invoice&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ' . $invoice . ' <br>
														No PO &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ' . $nopo . ' <br>
														No Quotation : ' . $noqo . ' <br>
														Date   &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp;: ' . $createdAt . ' <br>
														Due Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :  ' . $due_date . '
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
					No
				</td>
				<td style="text-align:left">
					Description
				</td>
				<td>
					Qty
				</td>
				<td>
					Unit Price
				</td>
				<td>
					Amount
				</td>
			</tr>

			<?php
			$no = 1;
			$total = 0;
			foreach ($item_list as $value) {
				echo '
							<tr class="item">
									<td style="width:10%">
											' . $no . '
									</td>
									<td style="text-align:left">
											' . $value['nama_layanan'] . '
									</td>
									<td>
										 1
									</td>
									<td>
										Rp. ' . number_format($value['price'], 0, ',', '.') . '
									</td>
									<td>
									Rp. ' . number_format($value['price'], 0, ',', '.') . '
								</td>
							</tr>
							
						';
				$no++;
				$total += $value['price'];

			}
			?>
		</table>
		<br>
							<br>
							<br>
							<br>
		<br>
		<table>
			<tr class="total">
			<td>
			<?php $kata = $this->db->query("select kata2 from template_invoice")->result_array();
						echo $kata[0]['kata2']; ?>
			</td>
		
				
				<td?></td?>
				<td></td>
				<td>SubTotal :
					<br>
					Tax :
					<br>
					Materai :
					<br>
					<b>Grand Total: <b>
				</td>
				<td>
					<?php echo 'Rp.' . number_format($total, 0, ',', '.'); ?>
					<br>
					<?php echo 'Rp.' . number_format(($total * 0.1), 0, ',', '.'); ?>
					<br>
					<?php echo '-'; ?>
					<br>
					<b><?php echo 'Rp.' . number_format(($total * 0.1) + $total, 0, ',', '.'); ?></b>
				</td>
			</tr>
		</table>
		<br>
		<div class="footer">
			<?php $kata = $this->db->query("select kata3 from template_invoice")->result_array();
						echo $kata[0]['kata3']; ?>
			</td>
			
		</div>
		<?php $date = date('d M Y'); ?>
		<br>
		<div class="footer">
			<table>
				<tr>
					<td style="text-align: right;"><?= date('l', strtotime($date)) . ', ' . date('d M Y'); ?></td>
				</tr>
			</table>
			<br>
			<br>
			<br>
			<table>
				<tr>
					<td style="text-align: right;  margin-right:10%;">
					<?php $kata = $this->db->query("select kata4 from template_invoice")->result_array();
						echo $kata[0]['kata4']; ?>
					</td>
				</tr>
			</table>
		</div>
	</div>
</body>

</html>
