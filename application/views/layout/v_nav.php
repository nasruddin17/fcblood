<div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
           
						
						<li class="nav-item">
              <a class="nav-link active" href="<?= base_url('home') ?>"><i class="fa fa-home"></i> Home</a>
            </li>

						<?php if ($this->session->userdata('username')<>"") { ?>
            <li class="nav-item">
              <a href="<?= base_url('user') ?>" class="nav-link" >User</a>
            </li>

						<li class="nav-item">
              <a href="<?= base_url('kasus') ?>" class="nav-link" >Darah</a>
           </li>
            
						<li class="nav-item">
              <a  href="<?= base_url('kasus/prediksi') ?>" class="nav-link" >Prediksi</a>
            </li>
						<?php } ?>
						<?php if ($this->session->userdata('username')=="") { ?>
							<li class="nav-item">
              <a  href="<?= base_url('login') ?>" class="nav-link">Login</a>
           	 	</li>
						<?php }else{ ?>
							<li class="nav-item">
              <a  href="<?= base_url('login/logout') ?>" class="nav-link" href="contact.html">Logout</a>
           	 	</li>
						<?php } ?>
					
        
            
          </ul>
        </div>
      </div>
    </nav>

<!-- Page Content -->
<div class="container">

<!-- Page Heading/Breadcrumbs -->
<h3 class="mt-4 mb-3"><?= $title ?></h3>

