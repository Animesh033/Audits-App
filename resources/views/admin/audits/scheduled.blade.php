<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Audit Scheduleder</title>
</head>
<body>
	<div class="container">
		<div class="row justify-content-start">
			<h4>Hi,</h4>

			 <h4>Greetings from ComplyIndia!</h4>

			 <p>An Audit has been scheduled for Site Name : {{ $scheduler->site }} <span>on Date : {{ $scheduler->audit_date }}.</span></p>

			 <p>Audit has been scheduled for the months of 
			 	<span> 
				 	@foreach (array_unique(explode("|",$scheduler->month_year))  as $key => $monthYear) 
				 	@if($key == 0)
				 	{{$monthYear}} 
				 	@elseif($key == count(array_unique(explode("|",$scheduler->month_year))) -1)
				 	& {{ $monthYear}}. 
				 	@else, {{ $monthYear}} 
				 	@endif 
				 	@endforeach
				 </span>
			</p>
			<h4>Krishnan</h4>
		</div>
	</div>
	
</body>
</html>