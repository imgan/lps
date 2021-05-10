  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
  	<!-- Brand Logo -->
  	<a href="<?php echo base_url() . 'dashboard/index' ?>" class="brand-link">
  		<img src="<?= base_url() ?>assets/website/icon2.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
  		<span class="brand-text font-weight-light">Dashboard</span>
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
					?>
  				<li class="nav-header">MENU</li>
  				<li class="nav-item has-treeview">
  					<a href="<?php echo base_url() . 'administrator/customer'; ?>" class="nav-link">
  						<i class="nav-icon fas fa-search-plus"></i>
  						<p>
  							Pencarian
  							<i class="fas fa-angle-left right"></i>
  						</p>
  					</a>

  					<ul class="nav nav-treeview">
  						<li class="nav-item">
  							<a href="<?php echo base_url() . 'administrator/searching'; ?>" class="nav-link">
  								<i class="far fa-circle nav-icon"></i>
  								<p>Pencarian</p>
  							</a>
  						</li>
  					</ul>
  				</li>
  				<li class="nav-item has-treeview">
  					<a href="<?php echo base_url() . 'administrator/customer'; ?>" class="nav-link">
  						<i class="nav-icon fas fa-file-signature"></i>
  						<p>
  							Request MRO
  							<i class="fas fa-angle-left right"></i>
  						</p>
  					</a>

  					<ul class="nav nav-treeview">
  						<li class="nav-item">
  							<a href="<?php echo base_url() . 'administrator/request'; ?>" class="nav-link">
  								<i class="far fa-circle nav-icon"></i>
  								<p>Quotation Inquiry</p>
  							</a>
  						</li>
  					</ul>
  				</li>
  				<li class="nav-item has-treeview">
  					<a href="<?php echo base_url() . 'administrator/customer'; ?>" class="nav-link">
  						<i class="nav-icon fas fa-file-signature"></i>
  						<p>
  							IPPS Input
  							<i class="fas fa-angle-left right"></i>
  						</p>
  					</a>

  					<ul class="nav nav-treeview">
  						<li class="nav-item">
  							<a href="<?php echo base_url() . 'administrator/lop'; ?>" class="nav-link">
  								<i class="far fa-circle nav-icon"></i>
  								<p>LOP</p>
  							</a>
  						</li>
  					</ul>
  					<ul class="nav nav-treeview">
  						<li class="nav-item">
  							<a href="<?php echo base_url() . 'administrator/pr'; ?>" class="nav-link">
  								<i class="far fa-circle nav-icon"></i>
  								<p>PR</p>
  							</a>
  						</li>
  					</ul>
  					<ul class="nav nav-treeview">
  						<li class="nav-item">
  							<a href="<?php echo base_url() . 'administrator/po'; ?>" class="nav-link">
  								<i class="far fa-circle nav-icon"></i>
  								<p>PO</p>
  							</a>
  						</li>
  					</ul>
  				</li>
  				<li class="nav-item has-treeview">
  					<a href="<?php echo base_url() . 'administrator/customer'; ?>" class="nav-link">
  						<i class="nav-icon fas fa-book"></i>
  						<p>
  							Report
  							<i class="fas fa-angle-left right"></i>
  						</p>
  					</a>

  					<ul class="nav nav-treeview">
  						<li class="nav-item">
  							<a href="<?php echo base_url() . 'administrator/report'; ?>" class="nav-link">
  								<i class="far fa-circle nav-icon"></i>
  								<p>Report</p>
  							</a>
  						</li>
  					</ul>
  				</li>

  				<li class="nav-header">Master</li>

  				<li class="nav-item has-treeview">
  					<a href="<?php echo base_url() . 'administrator/customer'; ?>" class="nav-link">
  						<i class="nav-icon fas fa-chart-pie"></i>
  						<p>
  							Master Data
  							<i class="fas fa-angle-left right"></i>
  						</p>
  					</a>

  					<ul class="nav nav-treeview">
  						<li class="nav-item">
  							<a href="<?php echo base_url() . 'administrator/user'; ?>" class="nav-link">
  								<i class="far fa-circle nav-icon"></i>
  								<p>Master User</p>
  							</a>
  						</li>
  					</ul>

  					<ul class="nav nav-treeview">
  						<li class="nav-item">
  							<a href="<?php echo base_url() . 'administrator/status'; ?>" class="nav-link">
  								<i class="far fa-circle nav-icon"></i>
  								<p>Master Status</p>
  							</a>
  						</li>
  					</ul>

  					<ul class="nav nav-treeview">
  						<li class="nav-item">
  							<a href="<?php echo base_url() . 'administrator/department'; ?>" class="nav-link">
  								<i class="far fa-circle nav-icon"></i>
  								<p>Master Department</p>
  							</a>
  						</li>
  					</ul>

  					<ul class="nav nav-treeview">
  						<li class="nav-item">
  							<a href="<?php echo base_url() . 'administrator/level'; ?>" class="nav-link">
  								<i class="far fa-circle nav-icon"></i>
  								<p>Master Level User</p>
  							</a>
  						</li>
  					</ul>
  				</li>
  			</ul>
  		</nav>
  		<!-- /.sidebar-menu -->
  	</div>
  	<!-- /.sidebar -->
  </aside>