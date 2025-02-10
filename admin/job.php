<?php


$title = "Job Request | Vesopa EPOS Administration";
include 'admin_server_files/admin_header.php';

?>




<div class="admin_middle_box_conatiner">



	<div class="admin_middle_box_conatiner">







		<div class="task_all_viewer_container">

			<h2 style="color: #009688" class="all_r_task_header">Job Position Request</h2>

			<div class="homepage_mid_container">


				<div class="notification_section">

					<?php

					$sql = 'SELECT timeadded, id, name, email, phone, company, description FROM career_request ORDER BY id DESC;';
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							echo '
								<div class="mystd_single_student_container">
									<div class="mystd_single_student_left">
										<!-- <a class="mystd_profile_pic_flag">
											<img class="mystd_student_pic" src="../assets/profile_pic/avatar.svg">
										</a> -->

										<div class="mystd_basic_info">
											<p class="mystd_basic_info_name">'. $row["name"] .'</p>
											<p class="mystd_basic_info_bs"><span class="material-icons">event</span> '. date("dS M, Y H:i A", strtotime($row["timeadded"])) .'</p>
											<p class="mystd_basic_info_bs"><span class="material-icons">mail</span> '. $row["email"] .'</p>
											<p class="mystd_basic_info_bs"><span class="material-icons">phone</span> '. $row["phone"] .'</p>
											<p class="mystd_basic_info_bs"><span class="material-icons">work</span> '. $row["company"] .'</p>
										</div>

										<!--
										<div class="mystd_status_gender">
											<div class="mystd_status_gender_item"></div>
										</div>
										-->

                                        <div class="mystd_other_info">
											<p class="message_customer">'. $row["description"] .'</p>
										</div>


										
									</div>

									<div class="mystd_comment_keeper">
										

										<form method="post" action="delete_job_request">
											<input type="hidden" name="profile_id" value="'. $row["id"] .'">
											<button onClick="return confirmSubmitWithPopup(this, \'Do you really want to delete the job request of '. $row["name"] .' ?\')" type="submit" class="all_member_active_rec_btn">
												<span class="material-icons" style="color: #ff0057;">delete_forever</span>
												<p>Delete</p>
											</button>
										</form>

									</div>
								</div>
							';
						}
					}

					?>







				</div>



			</div>

		</div>




	</div>

</div>






<?php require 'admin_server_files/admin_footer.php'; ?>
