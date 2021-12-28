<?php

class DatabaseHelper
{
    // Since the connection details are constant, define them as const
    // We can refer to constants like e.g. DatabaseHelper::username
    const username = 'a11832991'; // use a + your matriculation number
    const password = 'dbs21'; // use your oracle db password
    const con_string = 'oracle-lab.cs.univie.ac.at:1521/lab';  //on almighty "lab" is sufficient

    // Since we need only one connection object, it can be stored in a member variable.
    // $conn is set in the constructor.
    protected $conn;

    // Create connection in the constructor
    public function __construct()
    {
        try {
            // Create connection with the command oci_connect(String(username), String(password), String(connection_string))
            // The @ sign avoids the output of warnings
            // It could be helpful to use the function without the @ symbol during developing process
            $this->conn = @oci_connect(
                DatabaseHelper::username,
                DatabaseHelper::password,
                DatabaseHelper::con_string
            );

            //check if the connection object is != null
            if (!$this->conn) {
                // die(String(message)): stop PHP script and output message:
                die("DB error: Connection can't be established!");
            }

        } catch (Exception $e) {
            die("DB error: {$e->getMessage()}");
        }
    }

    // Used to clean up
    public function __destruct()
    {
        // clean up
        @oci_close($this->conn);
    }

    // This function creates and executes a SQL select statement and returns an array as the result
    // 2-dimensional array: the result array contains nested arrays (each contains the data of a single row)
    public function selectFromPersonWhere($social_insurance_ID, $name, $birthdate)
    {
        // Define the sql statement string
        // Notice that the parameters $social_insurance_ID, $name, $birthdate in the 'WHERE' clause
        $sql = "SELECT * FROM person
            WHERE social_insurance_ID LIKE '%{$social_insurance_ID}%'
			AND upper(p_name) LIKE upper('%{$name}%')
			AND dateofbirth LIKE '%{$birthdate}%'
            ORDER BY social_insurance_ID ASC";

        // oci_parse(...) prepares the Oracle statement for execution
        // notice the reference to the class variable $this->conn (set in the constructor)
        $statement = @oci_parse($this->conn, $sql);

        // Executes the statement
        @oci_execute($statement);

        // Fetches multiple rows from a query into a two-dimensional array
        // Parameters of oci_fetch_all:
        //   $statement: must be executed before
        //   $res: will hold the result after the execution of oci_fetch_all
        //   $skip: it's null because we don't need to skip rows
        //   $maxrows: it's null because we want to fetch all rows
        //   $flag: defines how the result is structured: 'by rows' or 'by columns'
        //      OCI_FETCHSTATEMENT_BY_ROW (The outer array will contain one sub-array per query row)
        //      OCI_FETCHSTATEMENT_BY_COLUMN (The outer array will contain one sub-array per query column. This is the default.)
        @oci_fetch_all($statement, $res, 0, 5, OCI_FETCHSTATEMENT_BY_ROW); // maxrows wieder ändern vor Abgabe

        //clean up;
        @oci_free_statement($statement);

        return $res;
    }
	
	// This function creates and executes a SQL select statement and returns an array as the result
    // 2-dimensional array: the result array contains nested arrays (each contains the data of a single row)
    public function selectFromPlayerWhere($player_social_insurance_ID, $player_ID, $position, $player_salary, $player_team_ID)
    {
        // Define the sql statement string
        $sql = "SELECT * FROM PLAYER
            WHERE p_social_insurance_ID LIKE '%{$player_social_insurance_ID}%'
			AND player_ID LIKE '%{$player_ID}%'
			AND upper(p_position) LIKE upper('%{$position}%')
			AND salary LIKE '%{$player_salary}%'
			AND p_team_ID LIKE '%{$player_team_ID}%'
			ORDER BY player_ID ASC";

        // oci_parse(...) prepares the Oracle statement for execution
        // notice the reference to the class variable $this->conn (set in the constructor)
        $statement = @oci_parse($this->conn, $sql);

        // Executes the statement
        @oci_execute($statement);

        // Fetches multiple rows from a query into a two-dimensional array
        // Parameters of oci_fetch_all:
        //   $statement: must be executed before
        //   $res: will hold the result after the execution of oci_fetch_all
        //   $skip: it's null because we don't need to skip rows
        //   $maxrows: it's null because we want to fetch all rows
        //   $flag: defines how the result is structured: 'by rows' or 'by columns'
        //      OCI_FETCHSTATEMENT_BY_ROW (The outer array will contain one sub-array per query row)
        //      OCI_FETCHSTATEMENT_BY_COLUMN (The outer array will contain one sub-array per query column. This is the default.)
        @oci_fetch_all($statement, $res, 0, 5, OCI_FETCHSTATEMENT_BY_ROW);// maxrows wieder ändern vor Abgabe

        //clean up;
        @oci_free_statement($statement);

        return $res;
    }
	
	public function selectFromCoachWhere($coach_social_insurance_ID, $coaches_ID, $coachingstyle, $coach_salary, $coach_team_ID)
    {
        // Define the sql statement string
        $sql = "SELECT * FROM COACH
            WHERE c_social_insurance_ID LIKE '%{$coach_social_insurance_ID}%'
			AND coaches_ID LIKE '%{$coaches_ID}%'
			AND upper(coachingstyle) LIKE upper('%{$coachingstyle}%')
			AND salary LIKE '%{$coach_salary}%'
			AND c_team_ID LIKE '%{$coach_team_ID}%'
			ORDER BY coaches_ID ASC";

        // oci_parse(...) prepares the Oracle statement for execution
        // notice the reference to the class variable $this->conn (set in the constructor)
        $statement = @oci_parse($this->conn, $sql);

        // Executes the statement
        @oci_execute($statement);

        // Fetches multiple rows from a query into a two-dimensional array
        // Parameters of oci_fetch_all:
        //   $statement: must be executed before
        //   $res: will hold the result after the execution of oci_fetch_all
        //   $skip: it's null because we don't need to skip rows
        //   $maxrows: it's null because we want to fetch all rows
        //   $flag: defines how the result is structured: 'by rows' or 'by columns'
        //      OCI_FETCHSTATEMENT_BY_ROW (The outer array will contain one sub-array per query row)
        //      OCI_FETCHSTATEMENT_BY_COLUMN (The outer array will contain one sub-array per query column. This is the default.)
        @oci_fetch_all($statement, $res, 0, 5, OCI_FETCHSTATEMENT_BY_ROW);// maxrows wieder ändern vor Abgabe

        //clean up;
        @oci_free_statement($statement);

        return $res;
    }
	
	public function selectFromTeamWhere($team_ID, $team_name, $age_limit)
    {
        // Define the sql statement string
        $sql = "SELECT * FROM TEAM
            WHERE team_ID LIKE '%{$team_ID}%'
			AND upper(t_name) LIKE upper('%{$team_name}%')
			AND age_limit LIKE '%{$age_limit}%'
			ORDER BY team_ID ASC";

        // oci_parse(...) prepares the Oracle statement for execution
        // notice the reference to the class variable $this->conn (set in the constructor)
        $statement = @oci_parse($this->conn, $sql);

        // Executes the statement
        @oci_execute($statement);

        // Fetches multiple rows from a query into a two-dimensional array
        // Parameters of oci_fetch_all:
        //   $statement: must be executed before
        //   $res: will hold the result after the execution of oci_fetch_all
        //   $skip: it's null because we don't need to skip rows
        //   $maxrows: it's null because we want to fetch all rows
        //   $flag: defines how the result is structured: 'by rows' or 'by columns'
        //      OCI_FETCHSTATEMENT_BY_ROW (The outer array will contain one sub-array per query row)
        //      OCI_FETCHSTATEMENT_BY_COLUMN (The outer array will contain one sub-array per query column. This is the default.)
        @oci_fetch_all($statement, $res, 0, 5, OCI_FETCHSTATEMENT_BY_ROW);// maxrows wieder ändern vor Abgabe

        //clean up;
        @oci_free_statement($statement);

        return $res;
    }
	
	
	//---INSERTIONS---//
	
    public function insertIntoPerson($social_insurance_ID, $name, $birthdate)
    {
        $sql = "INSERT INTO PERSON VALUES ({$social_insurance_ID}, '{$name}', to_date('{$birthdate}', 'DD/MM/YYYY'))";

        $statement = @oci_parse($this->conn, $sql);
        $success = @oci_execute($statement) && @oci_commit($this->conn);
        @oci_free_statement($statement);
        return $success;
    }
	
	public function insertIntoPlayer($player_social_insurance_ID, $position, $player_salary, $player_team_ID)
    {
        $sql = "INSERT INTO PLAYER (p_social_insurance_id, p_position, salary, p_team_ID)
		VALUES ({$player_social_insurance_ID}, '{$position}', {$player_salary}, {$player_team_ID})";

        $statement = @oci_parse($this->conn, $sql);
        $success = @oci_execute($statement) && @oci_commit($this->conn);
        @oci_free_statement($statement);
        return $success;
    }
	
	public function insertIntoCoach($coach_social_insurance_ID, $coachingstyle, $coach_salary, $coach_team_ID)
    {
        $sql = "INSERT INTO COACH (c_social_insurance_id, coachingstyle, salary, c_team_ID)
		VALUES ({$coach_social_insurance_ID}, '{$coachingstyle}', {$coach_salary}, {$coach_team_ID})";
        $statement = @oci_parse($this->conn, $sql);
        $success = @oci_execute($statement) && @oci_commit($this->conn);
        @oci_free_statement($statement);
        return $success;
    }
	
	public function insertIntoTeam($team_name, $age_limit)
    {
        $sql = "INSERT INTO TEAM (t_name, age_limit)
		VALUES ('{$team_name}', {$age_limit})";
        $statement = @oci_parse($this->conn, $sql);
        $success = @oci_execute($statement) && @oci_commit($this->conn);
        @oci_free_statement($statement);
        return $success;
    }
	
	
	//---UPDATES---

    public function UpdatePerson($social_insurance_ID, $name, $birthdate)
    {
		//update NAME
		if(!empty($name)){
			$sql = "UPDATE PERSON SET PERSON.P_NAME = '{$name}' WHERE PERSON.SOCIAL_INSURANCE_ID = {$social_insurance_ID}";
			$statement = @oci_parse($this->conn, $sql);
			if(!$statement){
				$e = oci_error($this->conn);
				trigger_error(htmlentities($e['message']), E_USER_ERROR);
			}
			$exec = @oci_execute($statement, OCI_DEFAULT);
			if(!$exec){
				$e = oci_error($statement);
				trigger_error(htmlentities($e['message']), E_USER_ERROR);
				$update_name = false;
			}
			else{$update_name = true;}
		}
		//update BIRTHDATE
		if(!empty($birthdate)){
			$sql = "UPDATE PERSON SET PERSON.DATEOFBIRTH = to_date('{$birthdate}', 'DD/MM/YYYY')
			WHERE PERSON.SOCIAL_INSURANCE_ID = {$social_insurance_ID}";
			$statement = @oci_parse($this->conn, $sql);
			if(!$statement){
				$e = oci_error($this->conn);
				trigger_error(htmlentities($e['message']), E_USER_ERROR);
			}
			$exec = @oci_execute($statement, OCI_DEFAULT);
			if(!$exec){
				$e = oci_error($statement);
				trigger_error(htmlentities($e['message']), E_USER_ERROR);
				$update_birthdate = false;
			}
			else{$update_birthdate = true;}
		}
		@oci_commit($this->conn);
        @oci_free_statement($statement);
		$success = false;
		if($update_name or $update_birthdate){
			$success = true;
		}
        return $success;
    }
	
	public function UpdatePlayer($player_ID, $position, $player_salary, $player_team_ID)
    {
		//update POSITION
		if(!empty($position)){
			$sql = "UPDATE PLAYER SET PLAYER.P_POSITION = '{$position}' WHERE PLAYER.PLAYER_ID = {$player_ID}";
			$statement = @oci_parse($this->conn, $sql);
			if(!$statement){
				$e = oci_error($this->conn);
				trigger_error(htmlentities($e['message']), E_USER_ERROR);
			}
			$exec = @oci_execute($statement, OCI_DEFAULT);
			if(!$exec){
				$e = oci_error($statement);
				trigger_error(htmlentities($e['message']), E_USER_ERROR);
				$update_position = false;
			}
			else{$update_position = true;}
		}
		//update PLAYER SALARY
		if(!empty($player_salary)){
			$sql = "UPDATE PLAYER SET PLAYER.SALARY = {$player_salary} WHERE PLAYER.PLAYER_ID = {$player_ID}";
			$statement = @oci_parse($this->conn, $sql);
			if(!$statement){
				$e = oci_error($this->conn);
				trigger_error(htmlentities($e['message']), E_USER_ERROR);
			}
			$exec = @oci_execute($statement, OCI_DEFAULT);
			if(!$exec){
				$e = oci_error($statement);
				trigger_error(htmlentities($e['message']), E_USER_ERROR);
				$update_salary = false;
			}
			else{$update_salary = true;}
			
		}
		//update TEAM ID
		if(!empty($player_team_ID)){
			$sql = "UPDATE PLAYER SET PLAYER.P_TEAM_ID = {$player_team_ID} WHERE PLAYER.PLAYER_ID = {$player_ID}";
			$statement = @oci_parse($this->conn, $sql);
			if(!$statement){
				$e = oci_error($this->conn);
				trigger_error(htmlentities($e['message']), E_USER_ERROR);
			}
			$exec = @oci_execute($statement, OCI_DEFAULT);
			if(!$exec){
				$e = oci_error($statement);
				trigger_error(htmlentities($e['message']), E_USER_ERROR);
				$update_team_id = false;
			}
			else{$update_team_id = true;}
		}
		@oci_commit($this->conn);
        @oci_free_statement($statement);
		$success = false;
		if($update_position or $update_salary or $update_team_id)
			$success = true;
        return $success;
    }
	
	public function UpdateCoach($coaches_ID, $coachingstyle, $coach_salary, $coach_team_ID)
    {
		//update POSITION
		if(!empty($coachingstyle)){
			$sql = "UPDATE COACH SET COACH.COACHINGSTYLE = '{$coachingstyle}' WHERE COACH.COACHES_ID = {$coaches_ID}";
			$statement = @oci_parse($this->conn, $sql);
			if(!$statement){
				$e = oci_error($this->conn);
				trigger_error(htmlentities($e['message']), E_USER_ERROR);
			}
			$exec = @oci_execute($statement, OCI_DEFAULT);
			if(!$exec){
				$e = oci_error($statement);
				trigger_error(htmlentities($e['message']), E_USER_ERROR);
				$update_coachingstyle = false;
			}
			else{$update_coachingstyle = true;}
		}
		//update SALARY
		if(!empty($coach_salary)){
			$sql = "UPDATE COACH SET COACH.SALARY = '{$coach_salary}' WHERE COACH.COACHES_ID = {$coaches_ID}";
			$statement = @oci_parse($this->conn, $sql);
			if(!$statement){
				$e = oci_error($this->conn);
				trigger_error(htmlentities($e['message']), E_USER_ERROR);
			}
			$exec = @oci_execute($statement, OCI_DEFAULT);
			if(!$exec){
				$e = oci_error($statement);
				trigger_error(htmlentities($e['message']), E_USER_ERROR);
				$update_salary = false;
			}
			else{$update_salary = true;}
			
		}
		//update TEAM ID
		if(!empty($coach_team_ID)){
			$sql = "UPDATE COACH SET COACH.C_TEAM_ID = '{$coach_team_ID}' WHERE COACH.COACHES_ID = {$coaches_ID}";
			$statement = @oci_parse($this->conn, $sql);
			if(!$statement){
				$e = oci_error($this->conn);
				trigger_error(htmlentities($e['message']), E_USER_ERROR);
			}
			$exec = @oci_execute($statement, OCI_DEFAULT);
			if(!$exec){
				$e = oci_error($statement);
				trigger_error(htmlentities($e['message']), E_USER_ERROR);
				$update_team_id = false;
			}
			else{$update_team_id = true;}
		}
		@oci_commit($this->conn);
        @oci_free_statement($statement);
		$success = false;
		if($update_coachingstyle or $update_salary or $update_team_id)
			$success = true;
        return $success;
    }
	
	public function UpdateTeam($team_ID, $team_name, $age_limit)
    {
		//update TEAM NAME
		if(!empty($team_name)){
			$sql = "UPDATE TEAM SET TEAM.T_NAME = '{$team_name}' WHERE TEAM.TEAM_ID = {$team_ID}";
			$statement = @oci_parse($this->conn, $sql);
			if(!$statement){
				$e = oci_error($this->conn);
				trigger_error(htmlentities($e['message']), E_USER_ERROR);
			}
			$exec = @oci_execute($statement, OCI_DEFAULT);
			if(!$exec){
				$e = oci_error($statement);
				trigger_error(htmlentities($e['message']), E_USER_ERROR);
				$update_name = false;
			}
			else{$update_name = true;}
		}
		//update BIRTHDATE
		if(!empty($age_limit)){
			$sql = "UPDATE TEAM SET TEAM.AGE_LIMIT = '{$age_limit}' WHERE TEAM.TEAM_ID = {$team_ID}";
			$statement = @oci_parse($this->conn, $sql);
			if(!$statement){
				$e = oci_error($this->conn);
				trigger_error(htmlentities($e['message']), E_USER_ERROR);
			}
			$exec = @oci_execute($statement, OCI_DEFAULT);
			if(!$exec){
				$e = oci_error($statement);
				trigger_error(htmlentities($e['message']), E_USER_ERROR);
				$update_age_limit = false;
			}
			else{$update_age_limit = true;}
		}
		@oci_commit($this->conn);
        @oci_free_statement($statement);
		$success = false;
		if($update_name or $update_age_limit){
			$success = true;
		}
        return $success;
    }


	//---DELETIONS---//
    // Using a Procedure
    // This function uses a SQL procedure to delete a person and returns an errorcode (&errorcode == 1 : OK)
    public function deletePerson($social_insurance_ID)
    {
        // It is not necessary to assign the output variable,
        // but to be sure that the $errorcode differs after the execution of our procedure we do it anyway
        $errorcode = 0;

        // In our case the procedure P_DELETE_PERSON takes two parameters:
        //  1. social_insurance_ID (IN parameter)
        //  2. error_code (OUT parameter)

        // The SQL string
        $sql = 'BEGIN P_DELETE_PERSON(:social_insurance_ID, :errorcode); END;';
        $statement = @oci_parse($this->conn, $sql);

        //  Bind the parameters
        @oci_bind_by_name($statement, ':social_insurance_ID', $social_insurance_ID);
        @oci_bind_by_name($statement, ':errorcode', $errorcode);

        // Execute Statement
        @oci_execute($statement);

        //Note: Since we execute COMMIT in our procedure, we don't need to commit it here.
        //@oci_commit($statement); //not necessary

        //Clean Up
        @oci_free_statement($statement);

        //$errorcode == 1 => success
        //$errorcode != 1 => Oracle SQL related errorcode;
        return $errorcode;
    }
	
	// Using a Procedure
    // This function uses a SQL procedure to delete a person and returns an errorcode (&errorcode == 1 : OK)
    public function deletePlayer($player_ID)
    {
        // It is not necessary to assign the output variable,
        // but to be sure that the $errorcode differs after the execution of our procedure we do it anyway
        $errorcode = 0;

        // In our case the procedure P_DELETE_PLAYER takes two parameters:
        //  1. social_insurance_ID (IN parameter)
        //  2. error_code (OUT parameter)

        // The SQL string
        $sql = 'BEGIN P_DELETE_PLAYER(:player_ID, :errorcode); END;';
        $statement = @oci_parse($this->conn, $sql);

        //  Bind the parameters
        @oci_bind_by_name($statement, ':player_ID', $player_ID);
        @oci_bind_by_name($statement, ':errorcode', $errorcode);

        // Execute Statement
        $exec = @oci_execute($statement);
		if(!$exec){
			$e = oci_error($statement);
			trigger_error(htmlentities($e['message']), E_USER_ERROR);
		}

        //Note: Since we execute COMMIT in our procedure, we don't need to commit it here.
        //@oci_commit($statement); //not necessary

        //Clean Up
        @oci_free_statement($statement);

        //$errorcode == 1 => success
        //$errorcode != 1 => Oracle SQL related errorcode;
        return $errorcode;
    }
	
	// Using a Procedure
    // This function uses a SQL procedure to delete a person and returns an errorcode (&errorcode == 1 : OK)
    public function deleteCoach($coaches_ID)
    {
        // It is not necessary to assign the output variable,
        // but to be sure that the $errorcode differs after the execution of our procedure we do it anyway
        $errorcode = 0;

        // In our case the procedure P_DELETE_PLAYER takes two parameters:
        //  1. social_insurance_ID (IN parameter)
        //  2. error_code (OUT parameter)

        // The SQL string
        $sql = 'BEGIN P_DELETE_COACH(:coaches_ID, :errorcode); END;';
        $statement = @oci_parse($this->conn, $sql);
		
        //  Bind the parameters
        @oci_bind_by_name($statement, ':coaches_ID', $coaches_ID);
        @oci_bind_by_name($statement, ':errorcode', $errorcode);

        // Execute Statement
        $exec = @oci_execute($statement);
		if(!$exec){
			$e = oci_error($statement);
			trigger_error(htmlentities($e['message']), E_USER_ERROR);
		}

        //Note: Since we execute COMMIT in our procedure, we don't need to commit it here.
        //@oci_commit($statement); //not necessary

        //Clean Up
        @oci_free_statement($statement);

        //$errorcode == 1 => success
        //$errorcode != 1 => Oracle SQL related errorcode;
        return $errorcode;
    }
	
	 public function deleteTeam($team_ID)
    {
        // It is not necessary to assign the output variable,
        // but to be sure that the $errorcode differs after the execution of our procedure we do it anyway
        $errorcode = 0;

        // In our case the procedure P_DELETE_PLAYER takes two parameters:
        //  1. social_insurance_ID (IN parameter)
        //  2. error_code (OUT parameter)

        // The SQL string
        $sql = 'BEGIN P_DELETE_TEAM(:team_ID, :errorcode); END;';
        $statement = @oci_parse($this->conn, $sql);
		
        //  Bind the parameters
        @oci_bind_by_name($statement, ':team_ID', $team_ID);
        @oci_bind_by_name($statement, ':errorcode', $errorcode);

        // Execute Statement
        $exec = @oci_execute($statement);
		if(!$exec){
			$e = oci_error($statement);
			trigger_error(htmlentities($e['message']), E_USER_ERROR);
		}

        //Note: Since we execute COMMIT in our procedure, we don't need to commit it here.
        //@oci_commit($statement); //not necessary

        //Clean Up
        @oci_free_statement($statement);

        //$errorcode == 1 => success
        //$errorcode != 1 => Oracle SQL related errorcode;
        return $errorcode;
    }

    // NOT IN USE - ALTERNATIVE to a simple insert (method return person_id)
    // using a Procedure to add a Person -> the Id of the currently added Person is return (otherwise false)
    public function addPerson($name, $surname)
    {
        $person_id = -1;
        $sql = 'BEGIN P_ADD_PERSON(:name, :surname, :person_id); END;';
        $statement = @oci_parse($this->conn, $sql);

        @oci_bind_by_name($statement, ':name', $name);
        @oci_bind_by_name($statement, ':surname', $surname);
        @oci_bind_by_name($statement, ':person_id', $person_id);


        if (!@oci_execute($statement)) {
            @oci_commit($this->conn);
        }
        @oci_free_statement($statement);

        return $person_id;
    }
}