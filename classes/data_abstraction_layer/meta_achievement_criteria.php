<?php
///////////////////////////////////////////////
//
//  FILE WRITTEN BY SCRIPT database/scripts/create_classes.php
//
///////////////////////////////////////////////

require_once("query.php");

///////////////////////////////////////////////
//
//     Table Description
//
// id - INT - PRIMARY KEY
// parent_achievement - INT - FK: achievements, id
// child_achievement - INT - FK: achievements, id
// count - INT
//
///////////////////////////////////////////////

class MetaAchievementCriteria {

    private $db;
    private $table = "meta_achievement_criteria";

    private $id = null;
    private $parent_achievement = null;
    private $child_achievement = null;
    private $count = null;

    private $varlist = array(
        "parent_achievement",
        "child_achievement",
        "count");

    public function __construct($id=null){
        $this->id = $id;
        $this->db = Query::getInstance();
    }

    ///////////////////////////////////////////////////
    //
    //  Data Access Functions (Setters & Getters)
    //
    ///////////////////////////////////////////////////

    ///////////////////////////////////////////////
    // Functions for id
    ///////////////////////////////////////////////
	public function checkId($id){
	 	//Not allowed to be NULL
		if(Check::isNull($id)){
			echo "meta_achievement_criteria->id cannot be null!";
		}
       //Check the value
       if(Check::notInt($id)){
           echo "meta_achievement_criteria->id is invalid!";
           return false;
       }

       return intVal($id);
   }

    public function setId($id){
       if($this->checkId($id){
           $this->id = $id;
       }
    }

    public function getId($id){
        return $this->id;
    }


    ///////////////////////////////////////////////
    // Functions for parent_achievement
    ///////////////////////////////////////////////
	public function checkParentAchievement($parent_achievement){
	 	//Not allowed to be NULL
		if(Check::isNull($parent_achievement)){
			echo "meta_achievement_criteria->parent_achievement cannot be null!";
		}
       //Check the value
       if(Check::notInt($parent_achievement)){
           echo "meta_achievement_criteria->parent_achievement is invalid!";
           return false;
       }

       return intVal($parent_achievement);
   }

    public function setParentAchievement($parent_achievement){
       if($this->checkParentAchievement($parent_achievement){
           $this->parent_achievement = $parent_achievement;
       }
    }

    public function getParentAchievement($parent_achievement){
        return $this->parent_achievement;
    }


    ///////////////////////////////////////////////
    // Functions for child_achievement
    ///////////////////////////////////////////////
	public function checkChildAchievement($child_achievement){
	 	//Not allowed to be NULL
		if(Check::isNull($child_achievement)){
			echo "meta_achievement_criteria->child_achievement cannot be null!";
		}
       //Check the value
       if(Check::notInt($child_achievement)){
           echo "meta_achievement_criteria->child_achievement is invalid!";
           return false;
       }

       return intVal($child_achievement);
   }

    public function setChildAchievement($child_achievement){
       if($this->checkChildAchievement($child_achievement){
           $this->child_achievement = $child_achievement;
       }
    }

    public function getChildAchievement($child_achievement){
        return $this->child_achievement;
    }


    ///////////////////////////////////////////////
    // Functions for count
    ///////////////////////////////////////////////
	public function checkCount($count){
	 	//Not allowed to be NULL
		if(Check::isNull($count)){
			echo "meta_achievement_criteria->count cannot be null!";
		}
       //Check the value
       if(Check::notInt($count)){
           echo "meta_achievement_criteria->count is invalid!";
           return false;
       }

       return intVal($count);
   }

    public function setCount($count){
       if($this->checkCount($count){
           $this->count = $count;
       }
    }

    public function getCount($count){
        return $this->count;
    }


	///////////////////////////////////////////////////
	//
	//	Commit (Insert/Update) to DB Function(s)
	//
	///////////////////////////////////////////////////
	
	public function commit(){

    	if($this->filterId($this->id)){
        	return $this->updateRow();
	    } else {
    	    return $this->insertRow();
	    }
	}

	private function insertRow(){

	    //Check for good data, first
    	foreach($varlist as $vname=>$valFn){
        	if(!$this->$valFn($this->$vname)) return false;
	    }

	    //Create the array of variables names and value calls
    	$c_names = "";
	    $v_calls = "";
    	$values = array();
	    foreach(array_keys($varlist) as $v){
    	    $c_names .= "$v";
        	$v_calls .= ":$v";
        	$values[":$v"] = $this->$v;

	        if($v != end(array_keys($varlist)){
    	        $c_names .= ", ";
        	    $v_calls .= ", ";
	        }
    	}

	    //Build the query
    	$sql = "INSERT INTO $this->table ($c_names) VALUES ($v_calls)";

	    return $this->db->insert($sql, $values);
	}

	private function updateRow(){

    	//Check for good data, first
    	foreach($varlist as $vname=>$valFn){
        	if(!$this->$valFn($this->$vname)) return false;
    	}

    	//Create the array of variables names and value calls
    	$c_str = "";
    	$values = array(":id"=>$this->id);
    	foreach(array_keys($varlist) as $v){
        	$c_str .= "$v=:$v";
        	$values[":$v"] = $this->$v;

        	if($v != end(array_keys($varlist)){
            	$c_str .= ", ";
        	}
    	}

    	//Build the query
    	$sql = "UPDATE $this->table SET $c_str WHERE id=:id";

    	return $this->db->update($sql, $values);
	}

    ///////////////////////////////////////////////////
    //
    //  Delete from DB Function(s)
    //
    ///////////////////////////////////////////////////

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

	public function delete(){
    	if($this->id) return $this->deleteByColumns(array("id"=>$id));
    	return false;
	}

    ///////////////////////////////////////////////////
    //
    //  Query DB Function(s)
    //
    ///////////////////////////////////////////////////


	public static function getAll(){
    	//Generate the query
    	$sql = "SELECT * FROM $this->table";

    	$rows = $this->db->query($sql, array());

		$data = array();
		foreach($rows as $r){
			$data[] = MetaAchievementCriteria::parseRow($r);
		}

		return $data;
	}

	public static function getbyId($id){
		return MetaAchievementCriteria::queryByColumns(array("id"=>$id));
	}

    public static function queryByColumns($columns){

        //Create the values array
        $values = array();
        foreach($columns as $c=>$v){
            $values[":".$c]=$v;
        }

        //Create Query\n";
        $sql = "SELECT FROM $this->table WHERE ";
        $keys = array_keys($columns);
        foreach($keys as $column){
            $sql.= "$column=:$column";
            if(strcmp($column, end($keys))){
                $sql.= " AND ";
            }
        }

        $rows = $this->db->query($sql, $values);

		$data = array();
		foreach($rows as $r){
            $data[] = MetaAchievementCriteria::parseRow($r);
        }

        return $data;
    }

	private static function parseRow($row){
		$meta_achievement_criteria = new MetaAchievementCriteria();

	    $meta_achievement_criteria->setId($row["id"]);
	    $meta_achievement_criteria->setParentAchievement($row["parent_achievement"]);
	    $meta_achievement_criteria->setChildAchievement($row["child_achievement"]);
	    $meta_achievement_criteria->setCount($row["count"]);
	
		return $meta_achievement_criteria;
	}
 ///////////////////////////////////////////////////////////
 //
 //     END OF AUTOMATED PORTION OF FILE
 //     Put any custom functions below.
 //     DO NOT DELETE THIS COMMENT
 //
 ///////////////////////////////////////////////////////////






 ///////////////////////////////////////////////////////////
 //
 //     END OF FILE.  ANYTHING AFTER THIS WILL BE LOST.
 //     DO NOT DELETE THIS COMMENT
 //
 ///////////////////////////////////////////////////////////
}
