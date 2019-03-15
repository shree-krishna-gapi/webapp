<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url(''); ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>NilKrishna Gapi</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li class="treeview company-li">
          <a href="#">
            <i class="fa fa-snowflake-o"></i> 
            <span>Company</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu company-ul">
            <li class="co1"><a href="<?= base_url('purchase'); ?>"><i class="fa fa-circle-o"></i> 
             Buy from Company</a></li>
            <li class="co2"><a href="<?= base_url('company'); ?>"><i class="fa fa-circle-o"></i>Company Info</a></li>
            <!-- <li class="co3"><a href="<?= base_url('company/company_list'); ?>"><i class="fa fa-circle-o"></i>Payment Info</a></li> -->
            <li class="co4"><a href="<?= base_url('company/register'); ?>"><i class="fa fa-circle-o"></i>Register</a></li>
          </ul>
        </li>
        <li class="treeview customer-li">
          <a href="#">
            <i class="fa fa-user-circle-o"></i>
            <span>Customer</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>              
            </span>
          </a>
          <ul class="treeview-menu customer-ul">
            <li class="cu1"><a href="<?= base_url('sales'); ?>"><i class="fa fa-circle-o"></i>Sales to Customer</a></li>
            <li class="cu2"><a href="<?= base_url('customer'); ?>"><i class="fa fa-circle-o"></i>Customer Info</a></li>
            
            <li class="cu3"><a href="<?= base_url('customer/payment'); ?>"><i class="fa fa-circle-o"></i>Payment Info</a></li>
            <li class="cu4"><a href="<?= base_url('customer/register'); ?>"><i class="fa fa-circle-o"></i>Register</a></li>
        
          </ul>
        </li>
        <!-- <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Payment</span></a></li> -->
        
        <li class="header">LABELS</li>
        <li><a href="<?= base_url('stock'); ?>"><i class="fa fa-circle-o text-aqua"></i> <span>Stock</span></a></li>
        <li class="stmt"><a href="<?= base_url('statement'); ?>"><i class="fa fa-circle-o text-red"></i> <span>Statement</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>