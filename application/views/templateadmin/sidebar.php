  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
  	<!-- Brand Logo -->
  	<a href="<?php echo base_url() . 'dashboard/index' ?>" class="brand-link">
  		<img src="<?= base_url() ?>assets/atas2.png" alt="AdminLTE Logo" class="brand-image " style="opacity: .8"><br>
  		<p><span class="brand-text font-weight-light">&nbsp;&nbsp;&nbsp;<b>Leadtime Control</b></span></p>
  	</a>

  	<!-- Sidebar -->
  	<div class="sidebar">
  		<!-- Sidebar user panel (optional) -->
  		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
  			<div class="image">
  				<img src="<?= base_url() ?>assets/website/icon.png" class="img-circle elevation-2" alt="User Image">
  			</div>
  			<div class="info">
  				<a href="#" class="d-block"><?= $this->session->userdata('Username'); ?></a>
  			</div>
  		</div>

  		<!-- Sidebar Menu -->
  		<nav class="mt-2">
  			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
  				<li class="nav-item has-treeview menu-open">
  					<a href="<?php echo base_url() . 'dashboard/index' ?>" class="nav-link active">
  						<i class="nav-icon fas fa-tachometer-alt"></i>
  						<p>
  							Dashboard
  						</p>
  					</a>
  				</li>
  				<?php
					$session = $this->session->userdata('level');
					$menus = $this->session->userdata('Menus');
					$grup = $this->session->userdata('Grup');
					?>
  				<li class="nav-header">MENU</li>
  				<?php $menu = $this->db->query("select * from TxMenu where Id in ($grup)")->result_array();
				 	$menus = explode(",", $menus);
					foreach ($menu as $value) {
					?>
  					<li class="nav-item has-treeview">
  						<a href="#" class="nav-link">
  							<i class="<?= $value['Icon']; ?>"></i>
  							<p>
  								<?= $value['NamaMenu']; ?>
  								<i class="fas fa-angle-left right"></i>
  							</p>
  						</a>
  						<?php $submenu = $this->db->query("select * from TxSubMenu where IdMenu = " . $value['Id'] . "")->result_array();
							foreach ($submenu as $valuesub) {
								if(in_array($valuesub['Id'], $menus)){
							?>
  							<ul class="nav nav-treeview">
  								<li class="nav-item">
  									<a href="<?php echo base_url() . $valuesub['Link']; ?>" class="nav-link">
  										<i class="far fa-circle nav-icon"></i>
  										<p><?= $valuesub['NamaSubMenu']; ?></p>
  									</a>
  								</li>
  							</ul>
  						<?php
								}

							}
							?>
  					</li>

  				<?php
					}
					?>
  				</li>
  			</ul>
  		</nav>
  		<!-- /.sidebar-menu -->
  	</div>
  	<!-- /.sidebar -->
  </aside>