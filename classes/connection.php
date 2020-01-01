<?php
class Connection extends Db {
	public function getAllConnections() {
		$str = $this->connect()->query("SELECT * FROM connection");	
		while ($row = $str->fetchAll()) {
			//$cid = $row['cid'];
			return $row;
		}
	}
  
    
        public function getConnectionBy($city, $date){
            
        if ($city!='' && $date!='')
            $sql = "SELECT distinct con.cid as cid, con.dest as dest, c.CName as cname, con.dep_time as dep_time, con.via1 as via1, con.via2 as via2, con.bname as bname, (select cname from city c where c.id=con.dest) as mdest, (select cname from city c where c.id=con.via1) as mvia1, (select cname from city c where c.id=con.via2) as mvia2 FROM Connection con, city c WHERE c.cname COLLATE utf8_polish_ci LIKE :city and (con.dest=c.id OR via1=c.id OR via2=c.id) AND dep_time> '".$date."' GROUP BY cid;";
            else if ($city!='' && $date=='')
                $sql = "SELECT distinct con.cid as cid, con.dest as dest, c.CName as cname, con.dep_time as dep_time, con.via1 as via1, con.via2 as via2, con.bname as bname, (select cname from city c where c.id=con.dest) as mdest, (select cname from city c where c.id=con.via1) as mvia1, (select cname from city c where c.id=con.via2) as mvia2 FROM Connection con, city c WHERE c.cname COLLATE utf8_polish_ci LIKE :city and (con.dest=c.id OR via1=c.id OR via2=c.id) GROUP BY cid;";
            else if ($city=='' && $date!='')
                $sql = "SELECT distinct con.cid as cid, con.dest as dest, c.CName as cname, con.dep_time as dep_time, con.via1 as via1, con.via2 as via2, con.bname as bname, (select cname from city c where c.id=con.dest) as mdest, (select cname from city c where c.id=con.via1) as mvia1, (select cname from city c where c.id=con.via2) as mvia2 FROM Connection con, city c WHERE dep_time>='".$date."' GROUP BY cid;";
             
        $str = $this->connect()->prepare($sql);
            if ($city!='') {
                $s='%'.$city.'%';
                $str->bindValue(":city",$s);
            }
        
        
        $str->execute();
        
        if ($str->rowCount()) {
            while($row = $str->fetchAll()){
                return $row;
            }
            
        } else return null;
       
    }   
    
}
?>