@extends('layouts.master')

@section('head')
	@parent
	<title>Student Record</title>
@stop

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-0">
			<input id="hdnStudId" name="hdnStudId" type="hidden">
				<h1>Student Record</h1>
					<div class="row">
						<div class="col-md-6">
							<div id="divstudNo" class="form-group has-feedback">
								<label for="studNo">Student Number</label>
								<input id="studNo" name="studNo" type="text" class="form-control">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div id="divfname" class="form-group has-feedback">
								<label for="fname">Firstname</label>
								<input id="fname" name="fname" type="text" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div id="divlname" class="form-group has-feedback">
								<label for="lname">Lastname</label>
								<input id="lname" name="lname" type="text" class="form-control">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div id="divaddress" class="form-group has-feedback">
								<label for="address">Address</label>
								<input id="address" name="address" type="text" class="form-control">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<div id="divzip" class="form-group has-feedback">
								<label for="zip">Zip</label>
								<input id="zip" name="zip" type="text" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div id="divdrpCity" class="form-group has-feedback">
								<label for="drpCity">City</label>
								<select id="drpCity" name="drpCity" style="color:#000" class="form-control">
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div id="divdrpState" class="form-group has-feedback">
								<label for="drpState">State (All US States)</label>
								<select id="drpState" name="drpState" style="color:#000" class="form-control">
								</select>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<div id="divpnumber" class="form-group has-feedback">
								<label for="pnumber">Phone Number</label>
								<input id="pnumber" name="pnumber" type="text" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div id="divmnumber" class="form-group has-feedback">
								<label for="mnumber">Mobile Number</label>
								<input id="mnumber" name="mnumber" type="text" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div id="divemail" class="form-group has-feedback">
								<label for="email">Email</label>
								<input id="email" name="email" type="text" class="form-control">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div id="divdrpYearLvl" class="form-group has-feedback">
								<label for="drpYearLvl">Year Level</label>
								<select id="drpYearLvl" name="drpYearLvl" style="color:#000" class="form-control" onchange="allSections();">
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div id="divdrpSection" class="form-group has-feedback">
								<label for="drpSection">Section</label>
								<select id="drpSection" name="drpSection" style="color:#000" class="form-control">
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<input type="submit" value="Save New Record" onClick="saveStudenInfo();" id="btnSave" class="btn btn-default">
						<input type="submit" value="Update Record" onClick="saveStudenInfo();" id="btnUpdate" class="btn btn-default" style="display: none;">
						<input type="submit" value="Cancel" onClick="cancelEvent();" id="btnCancel" class="btn btn-default" style="display: none;">
					</div>
			</div>

			<div class="col-md-6 col-md-offset-0">
				<h1>Student List</h1>
				<div class="row">
					<div class="col-md-4">
						<div id="divdrpYearLvl" class="form-group has-feedback">
							<label for="drpYearLvl">Lastname</label>
						</div>
					</div>
					<div class="col-md-4">
						<div id="divdrpSection" class="form-group has-feedback">
							<label for="drpSection">Firstname</label>
						</div>
					</div>
				</div>
				<div id="studList">
				</div>
			</div>	
		</div>
		
			
	</div>

<script type="text/javascript">
	$(document).ready(function(){
	    yearList();
	    allCity();
	    allState();
	    allStudent();
	});

	function yearList()
	{
		$.get('{{URL::Route('allYears')}}' , function(response)
		{
				$('#drpYearLvl').empty();
			if(response.length != 0)
			{
				for(var i = 0; i< response.length; i++)
				{
					$('#drpYearLvl').append('<option value="'+response[i].info_id+'">'+response[i].data_description+'</option>');				
				}
			}
			allSections();
		});
	}

	function allSections()
	{
		$.get('{{URL::Route('sectionByYear')}}', { drpYearLvl :  $('#drpYearLvl').val() } , function(response)
		{
				$('#drpSection').empty();
			if(response.length != 0)
			{
				for(var i = 0; i< response.length; i++)
				{
					$('#drpSection').append('<option value="'+response[i].info_id+'">'+response[i].data_description+'</option>');				
				}
			}
		});
	}

	function allCity()
	{
		$.get('{{URL::Route('allCity')}}' , function(response)
		{
				$('#drpCity').empty();
			if(response.length != 0)
			{
				for(var i = 0; i< response.length; i++)
				{
					$('#drpCity').append('<option value="'+response[i].info_id+'">'+response[i].data_description+'</option>');				
				}
			}
		});
	}

	function allState()
	{
		$.get('{{URL::Route('allState')}}' , function(response)
		{
			$('#drpState').empty();
			if(response.length != 0)
			{
				for(var i = 0; i< response.length; i++)
				{
					$('#drpState').append('<option value="'+response[i].info_id+'">'+response[i].data_description+'</option>');				
				}
			}
		});
	}

	function allStudent()
	{
		$.get('{{URL::Route('allStudent')}}' , function(data)
		{
			$('#studList').empty();
			if(data.length != 0)
			{
				for(var i = 0; i< data.length; i++)
				{
					$('#studList').append('<div class="row" id="crud'+data[i].stud_id+'">\
												<div class="col-md-4">\
													<div id="divdrpYearLvl" class="form-group has-feedback">\
														<input id="lnameList'+data[i].stud_id+'" name="lnameList'+data[i].stud_id+'" value="'+data[i].stud_lname+'" disabled type="text" class="form-control">\
													</div>\
												</div>\
												<div class="col-md-4">\
													<div id="divdrpSection" class="form-group has-feedback">\
														<input id="fnameList'+data[i].stud_id+'" name="fnameList'+data[i].stud_id+'" value="'+data[i].stud_fname+'" disabled type="text" class="form-control">\
													</div>\
												</div>\
												<div >\
												<div class="col-md-2" >\
													<button type="button" id="editStudent'+data[i].stud_id+'" class="btn btn-default" onclick="editStudent('+data[i].stud_id+')" >Edit</button>\
												</div>\
												<div class="col-md-2" >\
													<button type="button" id="deleteStudent'+data[i].stud_id+'" class="btn btn-default" onclick="deleteStudent('+data[i].stud_id+')" >Delete</button>\
												</div>\
											</div>\
											</div>');

				}
			}
		});
	}

	function deleteStudent(stud_id)
	{
		$stud_id = stud_id;
		$_token = "{{ csrf_token() }}";
		var status = confirm("Do you want to delete this record?");
		if(status == true)
		{

			$.post('{{URL::Route('deleteStudent')}}',{ stud_id :$stud_id, _token :$_token } , function(data)
			{
				console.log(data);
				if(data == 1)
				{
					$('#crud'+$stud_id).empty();
					alert('successfully delete the record');
				}
				else
				{
					alert('failed to delete the record');
				}
			});
		}
	}
	function editStudent(stud_id)
	{
		$('#hdnStudId').val(stud_id);
		$('#editStudent'+stud_id).hide();
		$('#deleteStudent'+stud_id).hide();
		$('#btnSave').hide();
		$('#btnUpdate').show();
		$('#btnCancel').show();
		if($('#hdnStudId').val() != 0 || $('#hdnStudId').length() != 0)
		{
			$.get('{{URL::Route('getStudInfo')}}',{ studId : $('#hdnStudId').val()} , function(response)
			{
				allSections();
				$("#studNo").val(response['stud_num']);
				$("#fname").val(response['fname']);
				$("#lname").val(response['lname']);
				$("#address").val(response['address']);
				$("#zip").val(response['zip']);
				$("#drpCity").val(response['city']);
				$("#drpState").val(response['state']);
				$("#pnumber").val(response['phone']);
				$("#mnumber").val(response['mobile']);
				$("#email").val(response['email']);
				$("#drpYearLvl").val(response['year_lvl']);
				$("#drpSection").val(response['section']);
			});
		}
	}	


	function cancelEvent()
	{
		stud_id = $('#hdnStudId').val();
		$('#editStudent'+stud_id).show();
		$('#deleteStudent'+stud_id).show();
		$('#btnSave').show();
		$('#btnUpdate').hide();
		$('#btnCancel').hide();
		$('#hdnStudId').val(0);
		clearFields();
	}

	function clearFields()
	{
		$("#studNo").val("");
		$("#fname").val("");
		$("#lname").val("");
		$("#address").val("");
		$("#zip").val("");
		$("#pnumber").val("");
		$("#mnumber").val("");
		$("#email").val("");
	}
	function saveStudenInfo()
	{
		clearValidation();
		$checkValdation = false;
		$studId = $('#hdnStudId').val();
		$studNo = $('#studNo').val();
		$fname = $('#fname').val();
		$lname = $('#lname').val();
		$address = $('#address').val();
		$zip = $('#zip').val();
		$drpCity = $('#drpCity').val();
		$drpState = $('#drpState').val();
		$pnumber = $('#pnumber').val();
		$mnumber = $('#mnumber').val();
		$email = $('#email').val();
		$drpYearLvl = $('#drpYearLvl').val();
		$drpSection = $('#drpSection').val();
		$_token = "{{ csrf_token() }}";
		if($studNo.length == 0)
		{
			$("#divstudNo").addClass("has-error");
			$checkValdation = true;
		}
		if($fname.length == 0)
		{
			$("#divfname").addClass("has-error");
			$checkValdation = true;
		}
		if($lname.length == 0)
		{
			$("#divlname").addClass("has-error");
			$checkValdation = true;
		}
		if($address.length == 0)
		{
			$("#divaddress").addClass("has-error");
			$checkValdation = true;
		}

		if($zip.length == 0)
		{
			$("#divzip").addClass("has-error");
			$checkValdation = true;
		}
		if($drpCity.length == 0)
		{
			$("#divdrpCity").addClass("has-error");
			$checkValdation = true;
		}
		if($drpState.length == 0)
		{
			$("#divdrpState").addClass("has-error");
			$checkValdation = true;
		}
		if($pnumber.length == 0)
		{
			$("#divpnumber").addClass("has-error");
			$checkValdation = true;
		}
		if($mnumber.length == 0)
		{
			$("#divmnumber").addClass("has-error");
			$checkValdation = true;
		}

		if($email.length == 0)
		{
			$("#divemail").addClass("has-error");
			$checkValdation = true;
		}
		if($drpYearLvl.length == 0)
		{
			$("#divdrpYearLvl").addClass("has-error");
			$checkValdation = true;
		}

		if($drpSection.length == 0)
		{
			$("#divdrpSection").addClass("has-error");
			$checkValdation = true;
		}
		if(!$checkValdation)
		{
			$.post('{{URL::Route('saveStudenInfo')}}',{ _token: $_token , studId : $studId , studNo : $studNo , fname :$fname, lname :$lname , address : $address , zip :$zip, drpCity :$drpCity , drpState : $drpState , pnumber :$pnumber, mnumber :$mnumber , email : $email , drpYearLvl :$drpYearLvl, drpSection :$drpSection } , function(response)
			{
				if(response == 1)
				{
					alert("Account Succesfully Save!");
					allStudent();
					clearFields();
					cancelEvent();
				}
				else
				{
					alert("Account failed to save!");
				}
				//location.reload();
			});
		}
	}

	function clearValidation()
	{
		$("#divstudNo").removeClass("has-error");
		$("#divfname").removeClass("has-error");
		$("#divlname").removeClass("has-error");
		$("#divaddress").removeClass("has-error");
		$("#divzip").removeClass("has-error");
		$("#divdrpCity").removeClass("has-error");
		$("#divdrpState").removeClass("has-error");
		$("#divpnumber").removeClass("has-error");
		$("#divmnumber").removeClass("has-error");
		$("#divemail").removeClass("has-error");
		$("#divdrpYearLvl").removeClass("has-error");
		$("#divdrpSection").removeClass("has-error");
	}
</script>
@stop