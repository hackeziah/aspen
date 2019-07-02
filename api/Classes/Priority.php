<?php
include '..\..\config\Database.php';

class Priority{


        public function getPriority()
        {
            $sql = " SELECT * FROM priorities ";
            $prioQuery = (new Database())->query($sql);

            return $prioQuery;
        }
        public function updatePriority($id, $data)
        {
            $sql = "UPDATE `priorities` SET Level = ?, Days = ?, Hours = ?, Minutes = ?  WHERE Priority_Id = ?";

            $prioQuery = (new Database())->query(
                $sql,
                [$data['Level'], $data['Days'],$data['Hours'],$data['Minutes'], $id],
                'update'
            );

            return $prioQuery;
        }


        public function addPriority($data)
        {
            $sql = "INSERT INTO priorities(Level, Days, Hours, Minutes) VALUE(?, ?, ?, ? )";

            $prioQuery = (new Database())->query(
                $sql,
                [$data['Level'],$data['Days'],$data['Hours'],$data['Minutes']],
                'insert'
            );

            return $prioQuery;
        }


        public function deletePriority($id)
        {
            $sql = "DELETE FROM priorities WHERE Priority_Id = $id";

            $prioQuery = (new Database())->query($sql,[$id],'delete');

            return $prioQuery;
        }

        public function getSinglePriority($id)
        {
            $sql = " SELECT * FROM priorities WHERE Priority_Id = $id";

            $prioQuery = (new Database())->query($sql, [$id],'select');

            return $prioQuery;
        }

        // public function searchPriority($data)
        // {
        //     $sql=" SELECT * FROM users WHERE fLevel like '%".$Level."%' OR user_email like '%".$email."%'";

        //     $prioQuery = (new Database())->query(
        // 		$sql,
        // 		[$data['Level'],$data['Days']],
        // 		'insert'
        // 	);

        //     return $prioQuery;
        // }




}