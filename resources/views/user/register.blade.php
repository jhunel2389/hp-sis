@extends('layouts.master')

@section('head')
	@parent
	<title>Register</title>
@stop

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<h1>Register</h1>
				
					<div id="divUsername" class="form-group has-feedback">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<label for="username">Username</label>
						<input type="hidden" id="validUsername">
						<input id="username" name="username" type="text" class="form-control">
						<span id="spanGlyp" class="glyphicon form-control-feedback" aria-hidden="true"></span>
					
					</div>
					<div id="divpass1" class="form-group has-feedback">
						<label for="pass1">Password</label>
						<label id="lblPassWarning"></label>
						<input id="pass1" name="pass1" type="password" class="form-control">
					</div>
					<div id="divpass2" class="form-group has-feedback">
						<label for="pass2">Confirm Password</label>
						<input id="pass2" name="pass2" type="password" class="form-control">
					</div>
					<div class="checkbox">
						<label for="remember">
							<input type="checkbox" name="chkAdmin" id="chkAdmin">
								Admin Account
						</label>
					</div>
					<div class="form-group">
						<input type="submit" value="Register" onClick="createAccount();" class="btn btn-default">
					</div>
			</div>
			<h1>List of Account</h1>
			<div class="col-md-6 col-md-offset-3" id="divListAccount" style="background:#fff;padding:10px 20px;border-radius:8px;color:#000 !important;margin-bottom:20px;">
			</div>
		</div>
		
	</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip(); 
   		$('[data-toggle="popover"]').popover(); 
		$(document).keyup(function(e) {
		    	var username = $('#username').val();
		    	
		    	if(username.length > 0)
		    	{
		    		checkUsername();
		    	}
		    	else
		    	{
		    		clearUNValidation();
		    	}
	    });	

	    allAccount();
	});

	function createAccount()
	{
		clearValidation();
		$checkValdation = false;
		$validUsername = $('#validUsername').val();
		$isAdmin = $("#chkAdmin").prop('checked');
		$username = $('#username').val();
		$pass1 = $('#pass1').val();
		$pass2 = $('#pass2').val();
		$_token = "{{ csrf_token() }}";
		if($validUsername == 0)
		{
			$("#divUsername").addClass("has-error");
			alert("Username are not available!");
			$checkValdation = true;
		}
		if($username.length == 0)
		{
			$("#divUsername").addClass("has-error");
			$checkValdation = true;
		}
		if($pass1.length == 0)
		{
			$("#divpass1").addClass("has-error");
			$checkValdation = true;
		}
		if($pass1.length == 0)
		{
			$("#divpass2").addClass("has-error");
			$checkValdation = true;
		}

		if($pass1 != $pass2)
		{
			$("#divpass1").addClass("has-error");
			$("#divpass2").addClass("has-error");
			alert("Password thus not much!");
			$checkValdation = true;
		}
		if(!$checkValdation)
		{
			$.post('{{URL::Route('postCreate')}}',{ _token: $_token , isAdmin : $isAdmin , username :$username, pass1 :$pass1 } , function(response)
			{
				alert("Account Succesfully Added!");
				location.reload();
			});
		}

	}

	function clearValidation()
	{
		$("#divUsername").removeClass("btn-danger");
		$("#divpass1").removeClass("has-error");
		$("#divpass2").removeClass("has-error");
	}

	function clearUNValidation()
	{
		$("#divUsername").removeClass("has-success");
		$("#spanGlyp").removeClass("glyphicon-ok");
		$("#divUsername").removeClass("has-error");
		$("#spanGlyp").removeClass("glyphicon-remove");
	}
	function checkUsername()
	{
		$username = $('#username').val();
		if($username.length != 0)
		{
			$_token = "{{ csrf_token() }}";
			$.get('{{URL::Route('checkUsername')}}',{ _token: $_token , username: $username} , function(response)
			{
				console.log(response);
				$('#iconX').hide();
		    	$('#iconCheck').hide();
		    	clearUNValidation();
		    	if(response == 1)
		    	{
		    		$("#divUsername").addClass("has-success");
		    		$("#spanGlyp").addClass("glyphicon-ok");
		    		$('#validUsername').val(1);
		    	}
		    	else
		    	{
		    		$("#divUsername").addClass("has-error");
		    		$("#spanGlyp").addClass("glyphicon-remove");
		    		$('#validUsername').val(0);
		    	}
			});
		}
	}

	function allAccount()
	{
		$.get('{{URL::Route('allAccount')}}', function(data)
		{
			$('#divListAccount').empty();
			
			if(data.length != 0)
			{	
				for (var i = 0; i < data.length; i++) 
				{		
					$('#divListAccount').append('<div class="row" id="crud'+data[i].user_id+'">\
													<div class="col-md-8">\
															<input type="text" class="form-control" id="input'+data[i].user_id+'" name="input'+data[i].user_id+'" value="'+data[i].username+'" disabled>\
													</div>\
													<div >\
														<div class="col-md-3" >\
															<button type="button" id="delete'+data[i].user_id+'" class="btn btn-default" onclick="deleteAccount('+data[i].user_id+')" >delete</button>\
														</div>\
													</div>\
												</div>');
				}

			}
			else
			{
				$('#divListAccount').append('<option value = "">No Account Yet</option>');
			}
		});
	}

	function deleteAccount(acct_id)
	{
		$acct_id = acct_id;
		$_token = "{{ csrf_token() }}";
		var status = confirm("Do you want to delete this Account?");
		if(status == true)
		{

			$.post('{{URL::Route('deleteAccount')}}',{ acct_id :$acct_id, _token :$_token } , function(data)
			{
				console.log(data);
				if(data == 1)
				{
					$('#crud'+$acct_id).empty();
					alert('successfully delete the Account');
				}
				else
				{
					alert('failed to delete the Account');
				}
			});
		}
	}
</script>
@endsection