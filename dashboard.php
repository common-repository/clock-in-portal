<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

global $wpdb;
$staff_attendance_table = $wpdb->base_prefix . "sm_attendance";
$staff_table            = $wpdb->base_prefix . "sm_staffs";
$staff_category_table   = $wpdb->base_prefix . "sm_staff_category";
$staff_user_ip          = $wpdb->base_prefix . "sm_user_ip";
$date_format            = get_option('date_format');
$time_format            = get_option('time_format');
$current_date           = date("Y-m-d");
?>
<style>
.cip-upgrade-banner {
   
    border-radius: 10px;
    padding: 25px 25px;
	    margin: 15px 0px 0px 0px;
	    background: #32373c;
}


</style>
<nav class="navbar navbar-dark bg-dark main-dashboard-cip">
	<a class="navbar-brand" href="<?php echo admin_url('admin.php?page=clock-in-portal'); ?>"><i class="fas fa-home"></i></a>
  	<a class="navbar-brand" href="#"><?php esc_html_e('Dashboard', CIP_FREE_TXTDM ); ?></a>
  	<div class="form-inline my-2 my-lg-0">
      	<a class="navbar-brand" href="<?php echo esc_url( admin_url( 'admin.php?page=cip-settings' ) ); ?>"><i class="fas fa-cog"></i></a>
    </div>
</nav>

<!-- <div class="cip-upgrade-banner">
	 <img src="<?php echo plugin_dir_url(__FILE__); ?>/image/christmas.png" class="img-responsive" style="width:100%;height:auto;" alt="Weblizar" > 
</div> -->


<div class="container-fluid pro-features-cont">
	<div class="col-md-12 form-group cs-back">	
		<div class="row">
			<div class="col-md-4 pro-features-logo-titel text-center">
				<img src="<?php echo plugin_dir_url(__FILE__); ?>/image/logo.png" class="img-responsive" alt="Weblizar" >
				<h2>  <?php esc_html_e('Clock in Portal', CIP_FREE_TXTDM );?>  </h2>
				<p> <?php esc_html_e('Best Staff Management WordPress Plugin', CIP_FREE_TXTDM );?>  </p>

				<a class="btn download-pro" target="_new" href="https://www.infigosoftware.in/clock-in-pro-plugin/" > <?php esc_html_e('Upgrade to Pro in', CIP_FREE_TXTDM );?> <span><?php esc_html_e('Just $14', CIP_FREE_TXTDM );?> </span> </a>
			</div>

			<div class="col-md-4 pro-features-list">
				<ul class="cip-desc">
				  <li> <?php esc_html_e('Set Your TimeZone', CIP_FREE_TXTDM );?></li>
				  <li> <?php esc_html_e('Salary status (Monthly or Hourly)', CIP_FREE_TXTDM );?> </li>
				  <li> <?php esc_html_e('Ip Restriction', CIP_FREE_TXTDM );?> </li>
				  <li> <?php esc_html_e('Shift Mangment', CIP_FREE_TXTDM );?> </li>
				  <li> <?php esc_html_e('Holiday Listing', CIP_FREE_TXTDM );?></li>
				  <li> <?php esc_html_e('Leave Management Module', CIP_FREE_TXTDM );?> </li>
				  <li> <?php esc_html_e('Project Management', CIP_FREE_TXTDM );?> </li>
			
				</ul>
			</div>

			<div class="col-md-4 pro-features-list">
				<ul class="cip-desc">
				  <li> <?php esc_html_e('Event Management Module', CIP_FREE_TXTDM );?> </li>
				  <li><?php esc_html_e('Detailed Employee Records', CIP_FREE_TXTDM );?></li>
				  <li><?php esc_html_e('Attendance Management Module', CIP_FREE_TXTDM );?> </li>
				  <li><?php esc_html_e('General Setting Module', CIP_FREE_TXTDM );?></li>
				  <li><?php esc_html_e('News Letter Subscriptions APIs ', CIP_FREE_TXTDM );?></li>
				  <li> <?php esc_html_e('Import/Export Data', CIP_FREE_TXTDM );?></li>
				  <li> <?php esc_html_e('Task Management', CIP_FREE_TXTDM );?> </li>	
				</ul>
			</div>
		</div>
	</div>
</div>
<?php
	$current_time   = date( "H:i:s" );
	if ( $current_time < '12:00:00' ) {
		$greetings = esc_html__('Good Morning', CIP_FREE_TXTDM );
	}
	if ( $current_time > '12:00:00' && $current_time < '17:00:00') {
		$greetings = esc_html__('Good Afternoon ', CIP_FREE_TXTDM );
	}
	if ( $current_time > '17:00:00' && $current_time < '21:00:00') {
		$greetings = esc_html__('Good Evening ', CIP_FREE_TXTDM );
	}
	if ( $current_time > '21:00:00' && $current_time < '04:00:00') {
		$greetings = esc_html__('Good Night ', CIP_FREE_TXTDM );
	}
?>
<div class="row container-fluid information-sec">
	<div class="col-3">
		<div class="card stretch border-primary mb-3">
		  <div class="card-body text-primary">
		    <h5 class="card-title"><?php esc_html_e( $greetings, CIP_FREE_TXTDM );?></h5>
		  </div>
		</div>
	</div>
	<div class="col-3">
		<div class="card stretch border-success mb-3">
		  <div class="card-body text-success">
		    <h5 class="card-title"><?php esc_html_e("Pending Requests", CIP_FREE_TXTDM );?><span class="title-inner-count"><?php echo cip_incoming_leave_count(); ?></span></h5>
		  </div>
		</div>
	</div>
	<div class="col-3">
		<div class="card stretch border-danger mb-3">
		  <div class="card-body text-danger">
		    <h5 class="card-title"><?php esc_html_e("Incoming Holidays", CIP_FREE_TXTDM );?><span class="title-inner-count"><?php echo cip_incoming_holidays_count(); ?></span></h5>
		  </div>
		</div>
	</div>
	<div class="col-3">
		<div class="card stretch border-info mb-3">
		  <div class="card-body text-info">
		    <h5 class="card-title"><?php esc_html_e("Total Employee", CIP_FREE_TXTDM );?><span class="title-inner-count"><?php echo cip_total_staff_count(); ?></span></h5>
		  </div>
		</div>
	</div>
</div>
<div class="cip-table-content">
	<h1 class="dashboard-title"><?php esc_html_e("Today's Status", CIP_FREE_TXTDM );?></h1>
	<table class="table table-striped">
		<thead>
			<tr class="info main_tb_head">
				<th>#</th>
				<th><?php esc_html_e('Name', CIP_FREE_TXTDM );?></th>
				<th><?php esc_html_e('Date', CIP_FREE_TXTDM );?></th>
				<th><?php esc_html_e('Office In', CIP_FREE_TXTDM );?></th>
				<th><?php esc_html_e('Office Out', CIP_FREE_TXTDM );?></th>
				<th><?php esc_html_e('Lunch In', CIP_FREE_TXTDM );?></th>
				<th><?php esc_html_e('Lunch Out', CIP_FREE_TXTDM );?></th>
				<th><?php esc_html_e('Work Hour', CIP_FREE_TXTDM );?></th>
				<th><?php esc_html_e('IP Address', CIP_FREE_TXTDM );?></th>
				<th><?php esc_html_e('Location', CIP_FREE_TXTDM );?></th>
				<th><?php esc_html_e('Status', CIP_FREE_TXTDM );?></th>
			</tr>
		</thead>
		<tbody>
			<?php
			if ( ! empty ( $all_staffs = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM `$staff_table` WHERE `status` = %d", 1 ) ) ) ) {
				$no = 1;
				foreach( $all_staffs as $staff_data ) {
					$staff_id  = $staff_data->staff_id;				
					$user_info = get_userdata( $staff_id );
					if(!empty($user_info)){
					$email = $user_info->user_email;
					$fname = $user_info->first_name;
					$lname = $user_info->last_name;					
					$fullname = ucwords($fname." ".$lname);
					
					$office_status = 0;
					// check user in or out
					if ( ! empty ( $staff = $wpdb->get_row( $wpdb->prepare("SELECT * FROM `$staff_attendance_table` WHERE `staff_id` = %d AND `date` = %s", $staff_id, $current_date) ) ) ) {
						
						$office_date = date($date_format , strtotime($staff->date));
						$office_in   = $staff->office_in;
						$office_out  = $staff->office_out;					
						$lunch_in    = $staff->lunch_in;
						$lunch_out   = $staff->lunch_out;

						if($office_in  != "00:00:00") $office_in = date($time_format, strtotime($office_in));
						if($office_out != "00:00:00") $office_out = date($time_format, strtotime($office_out));
						if($lunch_in   != "00:00:00") $lunch_in = date($time_format, strtotime($lunch_in));
						if($lunch_out  != "00:00:00") $lunch_out = date($time_format, strtotime($lunch_out));

						$office_status           = 1;
						$extra                   = @unserialize($staff->extra);
						$sever_name              = $_SERVER['SERVER_NAME'];
						$sever_ip_address        = $_SERVER['SERVER_ADDR'];
						$sever_remote_ip_address = $_SERVER['REMOTE_ADDR'];
						$user_ip                 = $staff->ip;

						if( $office_out!='00:00:00' ) {
							$dteStart  = new DateTime($staff->office_in); 
							$dteEnd    = new DateTime($staff->office_out); 
							$dteDiff   = $dteStart->diff($dteEnd); 
							$work_hour = $dteDiff->format("%H:%I:%S");
						}

						$sever_bwoser_system_details = $_SERVER['HTTP_USER_AGENT'];
						$server_software             = $_SERVER['SERVER_SOFTWARE'];
						$server_signature            = $_SERVER['SERVER_SIGNATURE'];
					} else {
						$office_date                 = date($date_format , strtotime($current_date));
						$office_in                   = "None";
						$office_out                  = "None";
						$lunch_in                    = "None";
						$lunch_out                   = "None";
						$office_status               = 0;
						$sever_name                  = "None";
						$sever_ip_address            = "None";
						$sever_remote_ip_address     = "None";
						$sever_bwoser_system_details = "None";
						$server_software             = "None";
						$server_signature            = "None";
						$work_hour                   = "None";
					}
				?>
			<tr>
				<td><?php esc_html_e( $no); ?>.</td>
				<td><?php esc_html_e( $fullname); ?></td>
				<td><?php esc_html_e( $office_date); ?></td>
				<td><?php esc_html_e( $office_in); ?></td>
				<td><?php esc_html_e( $office_out); ?></td>
				<td><?php esc_html_e( $lunch_in); ?></td>
				<td><?php esc_html_e( $lunch_out); ?></td>
				<td><?php if($office_in != "00:00:00" && isset( $work_hour ) ) { esc_html_e( $work_hour); } else { esc_html_e('None'); } ?></td>
				<td><?php if($office_in != "None") { esc_html_e( $user_ip); } else { esc_html_e( "None"); } ?></td>
				<td><?php if($office_in != "None") {  esc_html_e( $staff->user_location); } else { esc_html_e( "None"); } ?>
				</td>
				<td><strong>
					<?php 
					 if( ! empty ( $staff->office_in ) && $staff->office_in != '00:00:00' && $staff->office_out == '00:00:00' ) echo "<button class='btn btn-sm btn-success'>IN</button>"; else echo "<button class='btn btn-sm btn-danger'>OUT</button>"; 
					?>
					</strong>
				</td>
			</tr>		
					<?php
				$no++;
				} // end If User Exist
				} // end foreach
			} else {?>
				<?php esc_html_e('No Staff Added into system.', CIP_FREE_TXTDM );?> ;
			<?php }
			?>
		</tbody>
			<thead>
			<tr class="info main_tb_head">
				<th>#</th>
				<th><?php esc_html_e('Name', CIP_FREE_TXTDM );?></th>
				<th><?php esc_html_e('Date', CIP_FREE_TXTDM );?></th>
				<th><?php esc_html_e('Office In', CIP_FREE_TXTDM );?></th>
				<th><?php esc_html_e('Office Out', CIP_FREE_TXTDM );?></th>
				<th><?php esc_html_e('Lunch In', CIP_FREE_TXTDM );?></th>
				<th><?php esc_html_e('Lunch Out', CIP_FREE_TXTDM );?></th>
				<th><?php esc_html_e('Work Hour', CIP_FREE_TXTDM );?></th>
				<th><?php esc_html_e('IP Address', CIP_FREE_TXTDM );?></th>
				<th><?php esc_html_e('Location', CIP_FREE_TXTDM );?></th>
				<th><?php esc_html_e('Status', CIP_FREE_TXTDM );?></th>
			</tr>
		</thead>
	</table>
</div>