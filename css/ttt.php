<div class="row">

			<form method = "POST" class="Reg-form"  id ="register">



					<!-- <legend><span class="number">1</span>Your basic info</legend> -->
					<div class="row">
					<div class="col-sm-6">
					<label for="name">Name: <b class="require">*</b></label>
					<input type="text" id="name" name="txtname">
					</div>
					<div class="col-sm-6">
					<label for="mail">Email: <b class="require">*</b></label>
					<input type="email" id="mail" name="txtemail">
					</div>
					</div>
					<div class="row">
					<div class="col-sm-6">
					<label for="password">Password: <b class="require">*</b></label>
					<input type="password" id="txtpassword" name="txtpassword">
					</div>
					<div class="col-sm-6">
					<label>Confrim Password <b class="require">*</b></label>
					<input type = "password" name = "txtconfrimpass"/>
					</div>
					</div>
					<div class="row">
					<div class="col-sm-6">
					<label>Gender <b class="require">*</b></label>
					<!-- <input type="radio" value="1" name="rdogender">Male
					<input type="radio"  value="2" name="rdogender">Female -->
					<select name="setgender">
						<opton value='Male'>Male</opton>
						<option value='Female'>Female</option>
					</select>

					</div>
					<div class="col-sm-6">
					<label>Address <b class="require">*</b></label>
					<input type = "text" name = "txtaddress" />
					</div>
					</div>
					<div class="row">
					<div class="col-sm-6">
					<label>Phone <b class="require">*</b></label>
					<input type = "text" name = "txtphone" />
					</div>
					<div class="col-sm-6">

					<label for="job">Blood Type: <b class="require">*</b></label>
					<select name = "selblood">
					 <?php
						$qry = "SELECT * FROM tbl_bd_blood_type WHERE 1=1";
						$result = mysql_query($qry) or die('Error SQL 1 :' .mysql_error());
						$i = 0;
						while($data = mysql_fetch_assoc($result))
						{
							echo '<option value='.$data['id'].'>'.$data['blood_type_name'].'</option>';
							$i++;
						}
					?>
				</select>
				</div>
				</div>

				<div class="row">
				<div class="col-sm-6">
				<input type = "submit" class= "btn-reg" name = "btnsubmit" value = "Submit" />
				</div>
				<div class="col-sm-6">
				<input type="reset" name = "btnreset" value = "Reset" class = "btn-reg"/>
				</div>
				</div>
			</form>


</div>