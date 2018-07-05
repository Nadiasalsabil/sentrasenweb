<div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li> <a href="index"><i class="fa fa-tachometer"></i>
						<span class="hide-menu">Dashboard</span></a>
                        </li>
						<?php if($level == 1){ ?>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-columns"></i>
						<span class="hide-menu">Data Master <span class="label label-rouded label-primary pull-right">5</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <!--<li><a href="master_tarif">Master Tarif</a></li>-->
                                <li><a href="master_customer">Master Customer</a></li>
								<!--<li><a href="master_tujuan">Master Tujuan</a></li>-->
                                <li><a href="master_truck">Master Truck</a></li>
                                <li><a href="master_supir">Master Supir</a></li>
                                <li><a href="master_harga">Master Ongkir</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-bar-chart"></i>
						<span class="hide-menu">Transaksi <span class="label label-rouded label-primary pull-right">2</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="transaksi_pengiriman">Pengiriman</a></li>
                                <li><a href="transaksi_invoice">Invoice</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-suitcase"></i>
						<span class="hide-menu">Tracking <span class="label label-rouded label-primary pull-right">1</span></span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="tracking_status">View Status</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-wpforms"></i>
						<span class="hide-menu">Laporan <span class="label label-rouded label-primary pull-right">2</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="laporan_pengiriman">Data Pengiriman</a></li>
                                <li><a href="laporan_invoice">List Invoice</a></li>
                            </ul>
                        </li>
						<?php }else if($level == 2){ ?>
						<li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-suitcase"></i>
						<span class="hide-menu">Tracking <span class="label label-rouded label-primary pull-right">1</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="tracking_rubahstatus">Rubah Status</a></li>
                            </ul>
                        </li>
						<?php }else{} ?>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>