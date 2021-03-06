<?php

/**************************************************
*
*    Games Class
*
***************************************************/

/**************************************************
*
*   Table Description:
*
*	id - INT - PRIMARY KEY
*	creation_time - TIMESTAMP
*	game_system - INT
*	scenario - TINYINT
*
**************************************************/
require_once("query.php");

class Games {

var $db=NULL;
var $table="games";


/***************************************************

Constructor & Destructor

***************************************************/
public function __construct(){
    $this->db = Query::getInstance();
}

public function __destruct(){}


/**************************************************

Create Function

**************************************************/
public function create($game_system, $scenario){

	//Validate the inputs
	$game_system = $this->filterGameSystem($game_system); if($game_system === false){return false;}
	$scenario = $this->filterScenario($scenario); if($scenario === false){return false;}

	//Create the values Array
	$values = array(
		":game_system"=>$game_system,
 		":scenario"=>$scenario
	);

	//Build the query
	$sql = "INSERT INTO $this->table (
				creation_time,
				game_system,
				scenario
			) VALUES (
				NOW(),
				:game_system,
				:scenario)";

	return $this->db->insert($sql, $values);
}


/**************************************************

Delete Function

**************************************************/
public function deleteByColumns($columns){

    //Create the values array
    $values = array();
    foreach($columns as $c=>$v){
        $values[":".$c]=$v;
    }

    //Create Query\n";
    $sql = "DELETE FROM $this->table WHERE ";
    $keys = array_keys($columns);
    foreach($keys as $column){
        $sql.= "$column=:$column";
        if(strcmp($column, end($keys))){
            $sql.= " AND ";
        }
    }

    return $this->db->delete($sql, $values);
}

public function deleteById($id){
    return $this->deleteByColumns(array("id"=>$id));
}


/**************************************************

Update Record By ID Function(s)

**************************************************/
public function updateGamesById($id, $columns){

    //Values Array
    $values = array(":id"=>$id);
    foreach($columns as $column=>$value){
        $values[":".$column]=$value;
    }

    //Generate the query
    $sql = "UPDATE $this->table SET ";
    $keys = array_keys($columns);
    foreach($keys as $column){
        $sql.= "$column=:$column";
        if(strcmp($column, end($keys))){
            $sql.= ", ";
        }
    }
    $sql.= " WHERE id=:id";

    return $this->db->update($sql, $values);
}


/**************************************************

Query Everything

**************************************************/
public function getAll(){

    //Generate the query
    $sql = "SELECT * FROM $this->table";

    return $this->db->query($sql, array());
}


/**************************************************

Check Last Game Time

**************************************************/
public function getMinutesFromGameTime($game_id){
    $sql = "SELECT TIME_TO_SEC(TIMEDIFF(NOW(), creation_time))/60 AS minutes ";
    $sql.= "FROM $this->table WHERE id=:id";
    $values = array(":id"=>$game_id);

    return $this->db->query($sql, $values);
}

/**************************************************

Query by Column(s) Function

**************************************************/
public function queryByColumns($columns){

    //Values Array
    $values = array();
    foreach($columns as $column=>$value){
        $values[":".$column]=$value;
    }

    //Generate the query
    $sql = "SELECT * FROM $this->table WHERE ";
    $keys = array_keys($columns);
    foreach($keys as $column){
        $sql.= "$column=:$column";
        if(strcmp($column, end($keys))){
            $sql.= " AND ";
        }
    }

    return $this->db->query($sql, $values);
}


public function getById($id){
	
    //Validate Inputs
    $id = $this->filterId($id); if($id === false){return false;}

    return $this->queryByColumns(array("id"=>$id));
}


public function getByCreationTime($creation_time){
	
    //Validate Inputs
    $creation_time = $this->filterCreationTime($creation_time); if($creation_time === false){return false;}

    return $this->queryByColumns(array("creation_time"=>$creation_time));
}


public function getByGameSystem($game_system){
	
    //Validate Inputs
    $game_system = $this->filterGameSystem($game_system); if($game_system === false){return false;}

    return $this->queryByColumns(array("game_system"=>$game_system));
}


public function getByScenario($scenario){
	
    //Validate Inputs
    $scenario = $this->filterScenario($scenario); if($scenario === false){return false;}

    return $this->queryByColumns(array("scenario"=>$scenario));
}


/**************************************************

Exists by Column(s) Function

**************************************************/
public function existsByColumns($columns){
    $results = $this->queryByColumns($columns);

    return count($results);
}


/**************************************************
 
Column Validation Function(s)

**************************************************/
function filterId($id){
    //Not allowed to be null
    if(Check::isNull($id)){
        echo "id cannot be null!"; return false;
    }

    if(Check::notInt($id)){
        echo "id was invalid!"; return false;
    }

    return intVal($id);
}



function filterCreationTime($creation_time){
    //Not allowed to be null
    if(Check::isNull($creation_time)){
        echo "creation_time cannot be null!"; return false;
    }

    if(Check::isNull($creation_time)){
        echo "creation_time was invalid!"; return false;
    }

    return date("Y-m-d H:i:s", $creation_time);
}



function filterGameSystem($game_system){
    //Not allowed to be null
    if(Check::isNull($game_system)){
        echo "game_system cannot be null!"; return false;
    }

    if(Check::notInt($game_system)){
        echo "game_system was invalid!"; return false;
    }

    return intVal($game_system);
}



function filterScenario($scenario){
    //Not allowed to be null
    if(Check::isNull($scenario)){
        echo "scenario cannot be null!"; return false;
    }

    if(Check::notBool($scenario)){
        echo "scenario was invalid!"; return false;
    }

    return intVal($scenario);
}



}//close class

?>
