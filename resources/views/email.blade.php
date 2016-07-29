<!DOCTYPE html>
<html>
	<head>

	</head>

	<body style="border: 1px solid gray;">
		<header style="border-bottom: 1px dotted gray">
		<table style="width:100%">
		  <tr>
		    <th rowspan="2" style="width:35%; "><img src="{{asset('image/frontend/frontend/logo.png')}} " style="float:right;"></th>
		    <th style="width:30%"><h1 style="text-align:center;">PT.HALLOMALANG.COM</h1></th> 
		    <th style="width:35%">&nbsp;</th>
		  </tr>
		  <tr>
		    <td style="width:35%"><p style="text-align:center;">Jalan Pondok Belimbing Indah Blok B No.29 Malang</p></td> 
		    <td style="width:30%"></td>
		    <td style="width:35%">&nbsp;</td>
		  </tr>
		</table>
		</header>
		
		<div class="isi">
			<h3 style="text-align:center;">{{$judul}}</h3>
			<p  style="padding-left:20px;">{{$konten}}</p>
		</div>

		<footer style="width:100%; background-color:gray; padding-bottom:10px; padding-top:10px;">
				<p style="padding-left:50px;">2016 KIDZO. All right reserved<span style="float:right; padding-right: 50px;">Develop by : Thunderlab Indonesia</span></p>
		</footer>
			
		

	</body>
</html>