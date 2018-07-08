<!DOCTYPE html>
<html>
<head>
	<title>Live Score</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="css/mycss.css">
	<script src="js/bootstrap.min.js" ></script>
	<script src="js/jquery-2.1.1.min.js" ></script>
  <script type="text/javascript" src="js/date.js"></script>
	<meta charset="utf-8">
</head>
<body>
	<?php 
	include ("global.php");
	include ("nav.php"); 
	?>

  <div class="container">
    <div class="row" style="text-align: center;">
      <b style = "font-family: arial; font-size: 30px;">LIVE SCORE</b><br>
      <table class="table table-hover" id="livescore">
      </table>
    </div>
  </div>

	<?php include ("foot.php"); ?>
</body>

</html>

<script type="text/javascript">
  window.onload = getLiveAPI(Date.now());
  //window.onload = setInterval(getLiveAPI(Date.now()), 15000);
  var refInterval = window.setInterval('getLiveAPI(Date.now())', 30000);
  function getLiveAPI(timenow) {
    $.ajax({
      url: 'https://hithinh.com/soccer/score.php?' + timenow,
      type: 'GET',
      success: function(json) {
        $('#livescore').html("");
        for(var k in json) {
          $('#livescore').append(`
            <thead>
              <tr>
                <th>${k}</th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            `);
          for (match of json[k]) {
            dateNow = new Date(Date.now());
            matchTime = match.time.split(" ");
            matchTime = dateNow.getFullYear() + " " + matchTime[1] + " " + (matchTime[2] + "").substr(0, (matchTime[2]+"").length-2) + " " + matchTime[4] + " " + matchTime[5] + " " + matchTime[6];
            matchTime = new Date(matchTime);
            matchTime = (matchTime + "").split(" ");
            matchTime = matchTime[1] + " " + matchTime[2] + " " + matchTime[3] + " at " + (matchTime[4] + "").substr(0, (matchTime[4]+"").length-3)
            $('#livescore').append(`
              <tbody>
                <tr>
                  <td class="col-md-3"><i>
                    ${(match.time.length <= 10 && match.time != 'FT') ? "<img src='http://cdn3.livescore.com/web2/img/flash.gif'/>":""}
                    ${(match.time.length <= 10)? match.time : matchTime}
                  </i></td> 
                  <td class="col-md-3">${match.competitors.split("vs.")[0]}</td>
                  <td class="col-md-1">${(match.time.length <=10) ? match.scores:"vs."}</td>
                  <td class="col-md-3">${match.competitors.split("vs.")[1]}</td>
                </tr>
              </tbody>
            `);
          }
        }
        
      }
    });
  }

</script>