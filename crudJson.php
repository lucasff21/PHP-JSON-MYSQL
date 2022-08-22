<?php 
 
class Json{ 
    public $jsonFile = "js/pessoas.json"; 
     
 
    public function getRows(){ 
        if(file_exists($this->jsonFile)){ 
            $jsonData = file_get_contents($this->jsonFile); 
            $data = json_decode($jsonData, true); 
             
            if(!empty($data)){ 
                usort($data, function($a, $b) { 
                    return $b['id'] - $a['id']; 
                }); 
            } 
             
            return !empty($data)?$data:false; 
        } 
        return false; 
    } 
    
    public function insert($newData){ 
        if(!empty($newData)){ 
            $id = time();
            $newData['id'] = $id; 
             
            $jsonData = file_get_contents($this->jsonFile); 
            $data = json_decode($jsonData, true); 
             
            $data = !empty($data)?array_filter($data):$data; 
            if(!empty($data)){ 
                array_push($data, $newData); 
            }else{ 
                $data[] = $newData; 
            } 
            $insert = file_put_contents($this->jsonFile, json_encode($data, JSON_PRETTY_PRINT)); 
             
            return $insert?$id:false; 
        }else{ 
            return false; 
        } 
    } 

    public function delete($id){ 
        $jsonData = file_get_contents($this->jsonFile); 
        $data = json_decode($jsonData, true); 
             
        $newData = array_filter($data, function ($var) use ($id) { 
            return ($var['id'] != $id); 
        }); 
        $delete = file_put_contents($this->jsonFile, json_encode($newData)); 
        return $delete?true:false; 
    } 


    
}