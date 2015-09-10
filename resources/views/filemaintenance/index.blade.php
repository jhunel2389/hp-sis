@extends('layouts.master')

@section('head')
	@parent
	<title>File Maintenance</title>
@stop

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-0">
				<h3>File Maintenance</h3>
					 <div class="list-group">
						  <div class="list-group-item active">
						    Sidebar Text
						  </div>
						  <a href="#year"  onclick="yearForm();"class="list-group-item">Year
						  </a>
						  <a href="#section" onclick="sectionForm();" class="list-group-item">Section
						  </a>
						  <a href="#city"  onclick="cityForm();"class="list-group-item">City
						  </a>
						  <a href="#state" onclick="stateForm();" class="list-group-item">State
						  </a>
					</div>
			</div>

			<div class="col-md-8 col-md-offset-0">
				<h1 id="hTitle"></h1>
				
				<div class="row">
					<div id="inputForm">
					</div>
					<div class="" id="dataList">
					</div>
				</div>
			</div>	
			
		</div>
	</div>

<script type="text/javascript">
	
	function cityForm()
	{
		$("#hTitle").text('City');
		$("#inputForm").empty();
		$("#inputForm").append('<div class="row">\
									<div class="col-md-6">\
										<div class="form-group has-feedback">\
											<label for="txtYear">City</label>\
											<input id="txtCity" name="txtCity" type="text" class="form-control">\
										</div>\
									</div>\
								</div>\
								<div class="form-group">\
									<input type="submit" value="Save New Record" onClick="saveNewCityRecord();" class="btn btn-default">\
								</div>');

		$.get('{{URL::Route('allCity')}}', function(data)
		{
			$('#dataList').empty();
			
			if(data.length != 0)
			{	
				for (var i = 0; i < data.length; i++) 
				{		
					$("#dataList").append('<div class="row" id="crud'+data[i].info_id+'">\
											<div class="col-md-8">\
													<input type="text" class="form-control" id="input'+data[i].info_id+'" name="input'+data[i].info_id+'" value="'+data[i].data_description+'" disabled>\
											</div>\
											<div >\
												<div class="col-md-3" >\
													<button type="button" id="editYear'+data[i].info_id+'" class="btn btn-default" onclick="editYear('+data[i].info_id+')" style="display: none;">Edit</button>\
												</div>\
											</div>\
										</div>');
				}
			}
			else
			{
				$('#dataList').append('<option value = "">No Record Yet</option>');
			}
		});
	}

	function stateForm()
	{
		$("#hTitle").text('States');
		$("#inputForm").empty();
		$("#inputForm").append('<div class="row">\
									<div class="col-md-6">\
										<div class="form-group has-feedback">\
											<label for="txtYear">States</label>\
											<input id="txtState" name="txtState" type="text" class="form-control">\
										</div>\
									</div>\
								</div>\
								<div class="form-group">\
									<input type="submit" value="Save New Record" onClick="saveNewStateRecord();" class="btn btn-default">\
								</div>');

		$.get('{{URL::Route('allState')}}', function(data)
		{
			$('#dataList').empty();
			
			if(data.length != 0)
			{	
				for (var i = 0; i < data.length; i++) 
				{		
					$("#dataList").append('<div class="row" id="crud'+data[i].info_id+'">\
											<div class="col-md-8">\
													<input type="text" class="form-control" id="input'+data[i].info_id+'" name="input'+data[i].info_id+'" value="'+data[i].data_description+'" disabled>\
											</div>\
											<div >\
												<div class="col-md-3" >\
													<button type="button" id="editYear'+data[i].info_id+'" class="btn btn-default" onclick="editYear('+data[i].info_id+')" style="display: none;">Edit</button>\
												</div>\
											</div>\
										</div>');
				}
			}
			else
			{
				$('#dataList').append('<option value = "">No Record Yet</option>');
			}
		});
	}

	function yearForm()
	{
		$("#hTitle").text('Year Level');
		$("#inputForm").empty();
		$("#inputForm").append('<div class="row">\
									<div class="col-md-6">\
										<div class="form-group has-feedback">\
											<label for="txtYear">Year</label>\
											<input id="txtYear" name="txtYear" type="text" class="form-control">\
										</div>\
									</div>\
								</div>\
								<div class="form-group">\
									<input type="submit" value="Save New Record" onClick="saveNewYearRecord();" class="btn btn-default">\
								</div>');

		$.get('{{URL::Route('allYears')}}', function(data)
		{
			$('#dataList').empty();
			
			if(data.length != 0)
			{	
				for (var i = 0; i < data.length; i++) 
				{		
					$("#dataList").append('<div class="row" id="crud'+data[i].info_id+'">\
											<div class="col-md-8">\
													<input type="text" class="form-control" id="input'+data[i].info_id+'" name="input'+data[i].info_id+'" value="'+data[i].data_description+'" disabled>\
											</div>\
											<div >\
												<div class="col-md-3" >\
													<button type="button" id="editYear'+data[i].info_id+'" class="btn btn-default" onclick="editYear('+data[i].info_id+')" style="display: none;">Edit</button>\
												</div>\
											</div>\
										</div>');
				}
			}
			else
			{
				$('#dataList').append('<option value = "">No Record Yet</option>');
			}
		});
	}

	function sectionForm()
	{
		$("#hTitle").text('Section');
		$("#inputForm").empty();
		$("#inputForm").append('<div class="row">\
									<div class="col-md-6">\
										<div class="form-group has-feedback">\
											<label for="drpYear">Year</label>\
											<div>\
											<select id="drpYear" name="drpYear" style="color:#000" class="form-control">\
											</select>\
											</div>\
										</div>\
									</div>\
									<div class="col-md-6">\
										<div class="form-group has-feedback">\
											<label for="txtSection">Section</label>\
											<input id="txtSection" name="txtSection" type="text" class="form-control">\
										</div>\
									</div>\
								</div>\
								<div class="form-group">\
									<input type="submit" value="Save New Record" onClick="saveNewSectionRecord();" class="btn btn-default">\
								</div>');
		yearList();
		$.get('{{URL::Route('allSections')}}', function(data)
		{
			$('#dataList').empty();
			
			if(data.length != 0)
			{	
				for (var i = 0; i < data.length; i++) 
				{		
					$("#dataList").append('<div class="row" id="crud'+data[i].info_id+'">\
											<div class="col-md-5">\
													<input type="text" class="form-control" id="txtYear'+data[i].info_id+'" name="txtYear'+data[i].info_id+'" value="'+data[i].year+'" disabled>\
											</div>\
											<div class="col-md-5">\
													<input type="text" class="form-control" id="txtDesc'+data[i].info_id+'" name="txtDesc'+data[i].info_id+'" value="'+data[i].data_description+'" disabled>\
											</div>\
											<div >\
												<div class="col-md-2" >\
													<button type="button" id="edit'+data[i].info_id+'" class="btn btn-default btn-block" onclick="" style="display: none;">Edit</button>\
												</div>\
											</div>\
										</div>');
				}
			}
			else
			{
				$('#dataList').append('<option value = "">No Record Yet</option>');
			}
		});
	}

	function saveNewSectionRecord()
	{
		$drpYear = $('#drpYear').val();;
		$txtSection = $('#txtSection').val();
		$_token = "{{ csrf_token() }}";
		var status = confirm("Are you sure you want to add this record?");
		if(status == true)
		{

			$.post('{{URL::Route('saveNewSectionRecord')}}',{ drpYear :$drpYear , txtSection :$txtSection , _token :$_token } , function(data)
			{
				console.log(data);
				if(data == 1)
				{
					alert('successfully Save the record');
					sectionForm();
				}
				else
				{
					alert('failed to add the record');
					sectionForm();
				}
			});
		}
	}

	function saveNewYearRecord()
	{
		$txtYear = $('#txtYear').val();;
		$_token = "{{ csrf_token() }}";
		var status = confirm("Are you sure you want to add this record?");
		if(status == true)
		{
			$.post('{{URL::Route('saveNewYearRecord')}}',{ txtYear :$txtYear , _token :$_token } , function(data)
			{
				console.log(data);
				if(data == 1)
				{
					alert('successfully Save the record');
					yearForm();
				}
				else
				{
					alert('failed to save the record');
					yearForm();
				}
			});
		}
	}

	function saveNewCityRecord()
	{
		$txtCity = $('#txtCity').val();;
		$_token = "{{ csrf_token() }}";
		var status = confirm("Are you sure you want to add this record?");
		if(status == true)
		{
			$.post('{{URL::Route('saveNewCityRecord')}}',{ txtCity :$txtCity , _token :$_token } , function(data)
			{
				console.log(data);
				if(data == 1)
				{
					alert('successfully Save the record');
					cityForm();
				}
				else
				{
					alert('failed to save the record');
					cityForm();
				}
			});
		}
	}

	function saveNewStateRecord()
	{
		$txtState = $('#txtState').val();;
		$_token = "{{ csrf_token() }}";
		var status = confirm("Are you sure you want to add this record?");
		if(status == true)
		{
			$.post('{{URL::Route('saveNewStateRecord')}}',{ txtState :$txtState , _token :$_token } , function(data)
			{
				console.log(data);
				if(data == 1)
				{
					alert('successfully Save the record');
					stateForm();
				}
				else
				{
					alert('failed to save the record');
					stateForm();
				}
			});
		}
	}

	function yearList()
	{
		$.get('{{URL::Route('allYears')}}' , function(response)
		{
			if(response.length != 0)
			{
				for(var i = 0; i< response.length; i++)
				{
					$('#drpYear').append('<option value="'+response[i].info_id+'">'+response[i].data_description+'</option>');				
				}
			}
		});
	}
</script>
@stop