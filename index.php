<?php

// Include DatabaseHelper.php file
require_once('DatabaseHelper.php');

// Instantiate DatabaseHelper class
$database = new DatabaseHelper();

//--PERSON--//
$social_insurance_ID = '';
if (isset($_GET['social_insurance_ID'])) {
    $social_insurance_ID = $_GET['social_insurance_ID'];
}

$name = '';
if (isset($_GET['name'])) {
    $name = $_GET['name'];
}

$birthdate = '';
if (isset($_GET['birthdate'])) {
    $birthdate = $_GET['birthdate'];
}

//-- PLAYER --//
$player_social_insurance_ID = '';
if (isset($_GET['player_social_insurance_ID'])) {
    $player_social_insurance_ID = $_GET['player_social_insurance_ID'];
}

$player_ID = '';
if (isset($_GET['player_ID'])) {
    $player_ID = $_GET['player_ID'];
}

$position = '';
if (isset($_GET['position'])) {
    $position = $_GET['position'];
}

$player_salary = '';
if (isset($_GET['player_salary'])) {
    $player_salary = $_GET['player_salary'];
}

$player_team_ID = '';
if (isset($_GET['player_team_ID'])) {
    $player_team_ID = $_GET['player_team_ID'];
}

//COACH
$coach_social_insurance_ID = '';
if (isset($_GET['coach_social_insurance_ID'])) {
    $coach_social_insurance_ID = $_GET['coach_social_insurance_ID'];
}

$coaches_ID = '';
if (isset($_GET['coaches_ID'])) {
    $coaches_ID = $_GET['coaches_ID'];
}

$coachingstyle = '';
if (isset($_GET['coachingstyle'])) {
    $coachingstyle = $_GET['coachingstyle'];
}

$coach_salary = '';
if (isset($_GET['coach_salary'])) {
    $coach_salary = $_GET['coach_salary'];
}

$coach_team_ID = '';
if (isset($_GET['coach_team_ID'])) {
    $coach_team_ID = $_GET['coach_team_ID'];
}

//TEAM
$team_ID = '';
if (isset($_GET['team_ID'])) {
    $team_ID = $_GET['team_ID'];
}

$team_name = '';
if (isset($_GET['team_name'])) {
    $team_name = $_GET['team_name'];
}

$age_limit = '';
if (isset($_GET['age_limit'])) {
    $age_limit = $_GET['age_limit'];
}

//Fetch data from database
$person_array = $database->selectFromPersonWhere($social_insurance_ID, $name, $birthdate);
$player_array = $database->selectFromPlayerWhere($player_social_insurance_ID, $player_ID, $position, $player_salary, $player_team_ID);
$coach_array = $database->selectFromCoachWhere($coach_social_insurance_ID, $coaches_ID, $coachingstyle, $coach_salary, $coach_team_ID);
$team_array = $database->selectFromTeamWhere($team_ID, $team_name, $age_limit);
?>

<html>
<head>
<style> h1 {text-align: center;}</style>
    <title>Sports Club</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
</head>

<body>
<br>
<h1>Sports Club</h1>

	<!-- PERSON -->
<div class="container">
	<div class="row">
		<div class="col-sm-3" class="border" class="rounded">
		<span class="border">
			<!-- Add Person -->
			<h2>Add Person: </h2>
			<form method="post" action="addPerson.php">

			<!-- social_insurance_ID textbox -->
				<div>
					<label for="new_social_insurance_ID">Social Insurance ID:</label>
					<input id="new_social_insurance_ID" name="social_insurance_ID" type="number" maxlength="30">
				</div>
				<br>

				<!-- Name textbox -->
				<div>
					<label for="new_name">Name:</label>
					<input id="new_name" name="name" type="text" maxlength="30">
				</div>
				<br>

				<!-- Birthdate textbox -->
				<div>
					<label for="new_birthdate">Birthdate:</label>
					<input id="new_birthdate" name="birthdate" type="text" maxlength="20">
				</div>
				<br>

				<!-- Submit button -->
				<div>
					<button type="submit" style="background-color:3380FF; border-color:3380FF; color:white">
						Add Person
					</button>
				</div>
			</form>
			<br>
		</span>
		</div>

		<div class="col-sm-3">
			<!-- Delete Person -->
			<h2>Delete Person: </h2>
			<form method="post" action="delPerson.php">
				<!-- ID textbox -->
				<div>
					<label for="del_name">Social Insurance ID:</label>
					<input id="del_name" name="id" type="number" min="0">
				</div>
				<br>

				<!-- Submit button -->
				<div>
					<button type="submit" style="background-color:3380FF; border-color:3380FF; color:white">
						Delete Person
					</button>
				</div>
			</form>
			<br>
		</div>

		<div class="col-sm-3">
			<!-- Update Person -->
			<h2>Update Person: </h2>
			<form method="post" action="updatePerson.php">
				<!-- ID textbox -->
				<div>
					<label for="update_sid">Social Insurance ID:</label>
					<input id="update_sid" name="social_insurance_ID" type="number" min="0">
				</div>
				<br>
				
				<div>
					<label for="update_name">New Name:</label>
					<input id="update_name" name="name" type="text" class="form-control input-md" maxlength="30">
				</div>
				<br>
				
				<div>
					<label for="update_birtdate">New Birthdate:</label>
					<input id="update_birthdate" name="birthdate" type="text" class="form-control input-md" maxlength="30">
				</div>
				<br>

				<!-- Submit button -->
				<div>
					<button type="submit" style="background-color:3380FF; border-color:3380FF; color:white">
						Update Person
					</button>
				</div>
			</form>
			<br>
		</div>

		<div class="col-sm-3">
			<!-- Search form -->
			<h2>Person Search:</h2>
			<form method="get">
				<!-- ID textbox:-->
				<div>
					<label for="social_insurance_ID">Social Insurance ID:</label>
					<input id="social_insurance_ID" name="social_insurance_ID" type="number" value='<?php echo $social_insurance_ID; ?>' min="0">
				</div>
				<br>

				<!-- Name textbox:-->
				<div>
					<label for="name">Name:</label>
					<input id="name" name="name" type="text" class="form-control input-md" value='<?php echo $name; ?>'
						   maxlength="30">
				</div>
				<br>

				<!-- Birthdate textbox:-->
				<div>
					<label for="birthdate">Birthdate:</label>
					<input id="birthdate" name="birthdate" type="text"
						   value='<?php echo $birthdate; ?>' maxlength="20">
				</div>
				<br>

				<!-- Submit button -->
				<div>
					<button id='submit' type='submit' style="background-color:3380FF; border-color:3380FF; color:white">
						Search
					</button>
				</div>
			</form>
			<br>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-16">
			<!-- Search result -->
			<h2>Person Search Result:</h2>
			<table>
				<tr>
					<th style="text-align:center" class="col-md-1">Social Insurance ID</th>
					<th style="text-align:center" class="col-md-1">Name</th>
					<th style="text-align:center" class="col-md-1">Birthdate</th>
				</tr>
				<?php foreach ($person_array as $person) : ?>
					<tr>
						<td style="text-align:center"><?php echo $person['SOCIAL_INSURANCE_ID'];?>  </td>
						<td style="text-align:center"><?php echo $person['P_NAME']; ?>  </td>
						<td style="text-align:center"><?php echo $person['DATEOFBIRTH']; ?>  </td>
					</tr>
				<?php endforeach; ?>
			</table>
			<br>
		</div>
	</div>
</div>

<!-- PLAYER -->
<div class="container">
	<div class="row">
		<div class="col-sm-3">
			<!-- Add Player -->
			<h2>Add Player: </h2>
			<form method="post" action="addPlayer.php">

			<!-- social_insurance_ID textbox -->
				<div>
					<label for="new_player_social_insurance_ID">Social Insurance ID:</label>
					<input id="new_player_social_insurance_ID" name="player_social_insurance_ID" type="number" maxlength="30">
				</div>
				<br>

				<!-- Position textbox -->
				<div>
					<label for="new_position">Postion:</label>
					<input id="new_position" name="position" type="text" maxlength="30">
				</div>
				<br>

			<!-- Salary textbox -->
				<div>
					<label for="new_player_salary">Salary:</label>
					<input id="new_player_salary" name="player_salary" type="number" maxlength="30">
				</div>
				<br>
				
			<!-- Team ID textbox -->
				<div>
					<label for="new_player_team_ID">Team ID:</label>
					<input id="new_player_team_ID" name="player_team_ID" type="number" maxlength="30">
				</div>
				<br>

				<!-- Submit button -->
				<div>
					<button type="submit" style="background-color:3380FF; border-color:3380FF; color:white">
						Add Player
					</button>
				</div>
			</form>
			<br>
		</div>
	
		<div class="col-sm-3">
			<!-- Delete Player -->
			<h2>Delete Player: </h2>
			<form method="post" action="delPlayer.php">
				<!-- ID textbox -->
				<div>
					<label for="del_name">Player ID:</label>
					<input id="del_name" name="ID" type="number" min="0">
				</div>
				<br>

				<!-- Submit button -->
				<div>
					<button type="submit" style="background-color:3380FF; border-color:3380FF; color:white">
						Delete Player
					</button>
				</div>
			</form>
			<br>
		</div>

		<div class="col-sm-3">
			<!-- Update Player -->
			<h2>Update Player: </h2>
			<form method="post" action="updatePlayer.php">
				<!-- ID textbox -->
				<div>
					<label for="update_player_id">Player ID:</label>
					<input id="update_player_id" name="player_id" type="number" min="0">
				</div>
				<br>
				
				<!-- Position textbox -->
				<div>
					<label for="update_position">New Position:</label>
					<input id="update_position" name="position" type="text" class="form-control input-md" maxlength="30">
				</div>
				<br>
				
				<!-- Salary textbox -->
				<div>
					<label for="update_player_salary">New Salary:</label>
					<input id="update_player_salary" name="player_salary" type="number" min="0">
				</div>
				<br>
				
				<!-- Team ID textbox -->
				<div>
					<label for="update_player_team_ID">New Team ID:</label>
					<input id="update_player_team_ID" name="player_team_ID" type="number" min="0">
				</div>
				<br>
				

				<!-- Submit button -->
				<div>
					<button type="submit" style="background-color:3380FF; border-color:3380FF; color:white">
						Update Player
					</button>
				</div>
			</form>
			<br>
		</div>

		<div class="col-sm-3">
			<!-- Search form -->
			<h2>Player Search:</h2>
			<form method="get">
				<!-- SID textbox:-->
				<div>
					<label for="player_social_insurance_ID">Social Insurance ID:</label>
					<input id="player_social_insurance_ID" name="player_social_insurance_ID" type="number" value='<?php echo $player_social_insurance_ID; ?>' min="0">
				</div>
				<br>

				<!-- Player_ID textbox:-->
				<div>
					<label for="player_ID">Player ID:</label>
					<input id="player_ID" name="player_ID" type="number" value='<?php echo $player_ID; ?>' min="0">
				</div>
				<br>

				<!-- Position textbox:-->
				<div>
					<label for="position">Position:</label>
					<input id="position" name="position" type="text" class="form-control input-md" value='<?php echo $position; ?>'
						   maxlength="30">
				</div>
				<br>
				
				<!-- Player_Salary textbox:-->
				<div>
					<label for="player_salary">Salary:</label>
					<input id="player_salary" name="player_salary" type="number" value='<?php echo $player_salary; ?>' min="0">
				</div>
				<br>
				
				<!-- Player Team ID textbox:-->
				<div>
					<label for="player_team_ID">Team ID:</label>
					<input id="player_team_ID" name="player_team_ID" type="number" value='<?php echo $player_team_ID; ?>' min="0">
				</div>
				<br>

				<!-- Submit button -->
				<div>
					<button id='submit' type='submit' style="background-color:3380FF; border-color:3380FF; color:white">
						Search
					</button>
				</div>
			</form>
			<br>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-16">
			<!-- Search result -->
			<h2>Player Search Result:</h2>
			<table>
				<tr>
					<th style="text-align:center" class="col-md-1">Social Insurance ID</th>
					<th style="text-align:center" class="col-md-1">Player_ID</th>
					<th style="text-align:center" class="col-md-1">Position</th>
					<th style="text-align:center" class="col-md-1">Salary</th>
					<th style="text-align:center" class="col-md-1">Team ID</th>
				</tr>
				<?php foreach ($player_array as $player) : ?>
					<tr>
						<td style="text-align:center"><?php echo $player['P_SOCIAL_INSURANCE_ID'];?>  </td>
						<td style="text-align:center"><?php echo $player['PLAYER_ID']; ?>  </td>
						<td style="text-align:center"><?php echo $player['P_POSITION']; ?>  </td>
						<td style="text-align:center"><?php echo $player['SALARY'] . "€"; ?>  </td>
						<td style="text-align:center"><?php echo $player['P_TEAM_ID']; ?>  </td>
					</tr>
				<?php endforeach; ?>
			</table>
			<br>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<!-- COACH -->

		<!-- Add coach -->
		<div class="col-sm-3">
			<h2>Add Coach: </h2>
			<form method="post" action="addCoach.php">

			<!-- social_insurance_ID textbox -->
				<div>
					<label for="new_coach_social_insurance_ID">Social Insurance ID:</label>
					<input id="new_coach_social_insurance_ID" name="coach_social_insurance_ID" type="number" maxlength="30">
				</div>
				<br>

				<!-- coachingstyle textbox -->
				<div>
					<label for="new_coachingstyle">Coachingstyle:</label>
					<input id="new_coachingstyle" name="coachingstyle" type="text" maxlength="30">
				</div>
				<br>

			<!-- Salary textbox -->
				<div>
					<label for="new_coach_salary">Salary:</label>
					<input id="new_coach_salary" name="coach_salary" type="number" maxlength="30">
				</div>
				<br>
				
			<!-- Team ID textbox -->
				<div>
					<label for="new_coach_team_ID">Team ID:</label>
					<input id="new_coach_team_ID" name="coach_team_ID" type="number" maxlength="30">
				</div>
				<br>

				<!-- Submit button -->
				<div>
					<button type="submit" style="background-color:3380FF; border-color:3380FF; color:white">
						Add Coach
					</button>
				</div>
			</form>
			<br>
		</div>

		<!-- Delete Coach -->
		<div class="col-sm-3">
			<h2>Delete Coach: </h2>
			<form method="post" action="delCoach.php">
				<!-- ID textbox -->
				<div>
					<label for="del_name">Coaches ID:</label>
					<input id="del_name" name="ID" type="number" min="0">
				</div>
				<br>

				<!-- Submit button -->
				<div>
					<button type="submit" style="background-color:3380FF; border-color:3380FF; color:white">
						Delete Coach
					</button>
				</div>
			</form>
			<br>
		</div>

		<!-- Update Coach -->
		<div class="col-sm-3">
			<h2>Update Coach: </h2>
			<form method="post" action="updateCoach.php">
				<!-- ID textbox -->
				<div>
					<label for="update_coaches_id">Coaches ID:</label>
					<input id="update_pcoaches_id" name="coaches_ID" type="number" min="0">
				</div>
				<br>
				
				<!-- coachingstyle textbox -->
				<div>
					<label for="update_coachingstyle">New Coachingstyle:</label>
					<input id="update_coachingstyle" name="coachingstyle" type="text" class="form-control input-md" maxlength="30">
				</div>
				<br>
				
				<!-- Salary textbox -->
				<div>
					<label for="update_coach_salary">New Salary:</label>
					<input id="update_coach_salary" name="coach_salary" type="number" min="0">
				</div>
				<br>
				
				<!-- Team ID textbox -->
				<div>
					<label for="update_coach_team_ID">New Team ID:</label>
					<input id="update_coach_team_ID" name="coach_team_ID" type="number" min="0">
				</div>
				<br>
				

				<!-- Submit button -->
				<div>
					<button type="submit" style="background-color:3380FF; border-color:3380FF; color:white">
						Update Coach
					</button>
				</div>
			</form>
			<br>
		</div>

		<!-- Search form -->
		<div class="col-sm-3">
			<h2>Coach Search:</h2>
			<form method="get">
				<!-- SID textbox:-->
				<div>
					<label for="coach_social_insurance_ID">Social Insurance ID:</label>
					<input id="coach_social_insurance_ID" name="coach_social_insurance_ID" type="number" value='<?php echo $coach_social_insurance_ID; ?>' min="0">
				</div>
				<br>

				<!-- Coaches_ID textbox:-->
				<div>
					<label for="coaches_ID">Coaches ID:</label>
					<input id="coaches_ID" name="coaches_ID" type="number" value='<?php echo $coaches_ID; ?>' min="0">
				</div>
				<br>

				<!-- Coachingstyle textbox:-->
				<div>
					<label for="coachingstyle">Coachingstyle:</label>
					<input id="coachingstyle" name="coachingstyle" type="text" class="form-control input-md" value='<?php echo $coachingstyle; ?>'
						   maxlength="30">
				</div>
				<br>
				
				<!-- Player_Salary textbox:-->
				<div>
					<label for="coach_salary">Salary:</label>
					<input id="coach_salary" name="coach_salary" type="number" value='<?php echo $coach_salary; ?>' min="0">
				</div>
				<br>
				
				<!-- Coach Team ID textbox:-->
				<div>
					<label for="coach_team_ID">Team ID:</label>
					<input id="coach_team_ID" name="coach_team_ID" type="number" value='<?php echo $coach_team_ID; ?>' min="0">
				</div>
				<br>

				<!-- Submit button -->
				<div>
					<button id='submit' type='submit' style="background-color:3380FF; border-color:3380FF; color:white">
						Search
					</button>
				</div>
			</form>
			<br>
		</div>
	</div>


	<!-- Search result -->
	<div class="row">
		<div class="col-sm-16">
			<h2>Coach Search Result:</h2>
			<table>
				<tr>
					<th style="text-align:center" class="col-md-1">Social Insurance ID</th>
					<th style="text-align:center" class="col-md-1">Coaches ID</th>
					<th style="text-align:center" class="col-md-1">Coachingstyle</th>
					<th style="text-align:center" class="col-md-1">Salary</th>
					<th style="text-align:center" class="col-md-1">Team ID</th>
				</tr>
				<?php foreach ($coach_array as $coach) : ?>
					<tr>
						<td style="text-align:center"><?php echo $coach['C_SOCIAL_INSURANCE_ID'];?>  </td>
						<td style="text-align:center"><?php echo $coach['COACHES_ID']; ?>  </td>
						<td style="text-align:center"><?php echo $coach['COACHINGSTYLE']; ?>  </td>
						<td style="text-align:center"><?php echo $coach['SALARY'] . "€"; ?>  </td>
						<td style="text-align:center"><?php echo $coach['C_TEAM_ID']; ?>  </td>
					</tr>
				<?php endforeach; ?>
			</table>
			<br>
		</div>
	</div>
</div>

<!-- TEAM -->
<div class="container">
	<!-- Add Team -->
	<div class="row">
		<div class="col-sm-3">
			<h2>Add Team: </h2>
			<form method="post" action="addTeam.php">

				<!-- Team Name textbox -->
				<div>
					<label for="new_team_name">Team Name:</label>
					<input id="new_team_name" name="team_name" type="text" maxlength="30">
				</div>
				<br>

			<!-- Age Limit textbox -->
				<div>
					<label for="new_age_limit">Age Limit:</label>
					<input id="new_age_limit" name="age_limit" type="number" maxlength="30">
				</div>
				<br>

				<!-- Submit button -->
				<div>
					<button type="submit" style="background-color:3380FF; border-color:3380FF; color:white">
						Add Team
					</button>
				</div>
			</form>
			<br>
		</div>

		<!-- Delete Team -->
		<div class="col-sm-3">
			<h2>Delete Team: </h2>
			<form method="post" action="delTeam.php">
				<!-- ID textbox -->
				<div>
					<label for="del_name">Team ID:</label>
					<input id="del_name" name="ID" type="number" min="0">
				</div>
				<br>

				<!-- Submit button -->
				<div>
					<button type="submit" style="background-color:3380FF; border-color:3380FF; color:white">
						Delete Team
					</button>
				</div>
			</form>
			<br>
		</div>

		<!-- Update Team -->
		<div class="col-sm-3">
			<h2>Update Team: </h2>
			<form method="post" action="updateTeam.php">
				<!-- ID textbox -->
				<div>
					<label for="update_team_ID">Team ID:</label>
					<input id="update_team_ID" name="team_ID" type="number" min="0">
				</div>
				<br>
				
				<!-- Team Name textbox -->
				<div>
					<label for="update_team_name">New Team Name:</label>
					<input id="update_team_name" name="team_name" type="text" class="form-control input-md" maxlength="30">
				</div>
				<br>
				
				<!-- Age Limit textbox -->
				<div>
					<label for="update_age_limit">New Age Limit:</label>
					<input id="update_age_limit" name="age_limit" type="number" min="0">
				</div>
				<br>

				<!-- Submit button -->
				<div>
					<button type="submit" style="background-color:3380FF; border-color:3380FF; color:white">
						Update Team
					</button>
				</div>
			</form>
			<br>
		</div>

		<!-- Search form -->
		<div class="col-sm-3">
			<h2>Team Search:</h2>
			<form method="get">
				<!-- ID textbox:-->
				<div>
					<label for="team_ID">Team ID:</label>
					<input id="team_ID" name="team_ID" type="number" value='<?php echo $team_ID; ?>' min="0">
				</div>
				<br>

				<!-- Name textbox:-->
				<div>
					<label for="team_name">Team Name:</label>
					<input id="team_name" name="team_name" type="text" class="form-control input-md" value='<?php echo $team_name; ?>'
						   maxlength="30">
				</div>
				<br>

				<!-- age limit textbox:-->
				<div>
					<label for="age_limit">Age Limit:</label>
					<input id="age_limit" name="age_limit" type="number" value='<?php echo $age_limit; ?>' min="0">
				</div>
				<br>

				<!-- Submit button -->
				<div>
					<button id='submit' type='submit' style="background-color:3380FF; border-color:3380FF; color:white">
						Search
					</button>
				</div>
			</form>
			<br>
		</div>
	</div>

	<!-- Search result -->
	<div class="row">
		<div class="col-sm-16">
			<h2>Team Search Result:</h2>
			<table>
				<tr>
					<th style="text-align:center" class="col-md-1">Team ID</th>
					<th style="text-align:center"class="col-md-1">Team Name</th>
					<th style="text-align:center"class="col-md-1">Age Limit</th>
				</tr>
				<?php foreach ($team_array as $team) : ?>
					<tr>
						<td style="text-align:center"><?php echo $team['TEAM_ID'];?>  </td>
						<td style="text-align:center"><?php echo $team['T_NAME']; ?>  </td>
						<td style="text-align:center"><?php echo $team['AGE_LIMIT']; ?>  </td>
					</tr>
				<?php endforeach; ?>
			</table>
			<br>
		</div>
	</div>
</div>

</body>
</html>