<?php
/*
* upload file take extenntion and location and the palce where need to upload
* if error happen can show it in errors
*/
class UploadFile
{
    public $errors = array();
    public $AllowExt;
    public $location;
    public $AllowSize;
    public $Name;
    public function __construct(array $extenstion, string $location, $size)
    {
        if(is_array($extenstion) && is_int($size))
        {
            $this->AllowExt = $extenstion;
            $this->location = $location;
            $this->AllowSize = $size;
        }
        else
        {
            throw new Exception("Error Processing Request file extenstion or max size");
            
        }
    }

    private function checkExtenstion($name)
    {
        
        $ext =(explode(".", $name));
        $ext = end($ext);
        if(!in_array($ext,$this->AllowExt))
        {
            $this->errors["FileExtenstion"] = "This $name Extenstion $ext Not Allowed";
            return $this;
        }
        return $this;
    }
    private function checkSize($size, $name)
    {
        if($size > $this->AllowSize )
        {
            $this->errors["FileSize"] = "This $name Size $size Not Allowed";
            return $this;
        }
        return $this;
    }
    private function makeNewName($oldName)
    {
        $random = rand(0,99);
        $newName = $random.date('d-m-y')."_".$oldName;
        return $newName;
    }
    public function upload($file, $mulit = 0, $reuired = 1)
    {
        
        if(!$mulit)
        {
            
            if($file['error'] != 4)
            {
                
                $this->checkExtenstion($file['name'])->checkSize($file['size'], $file['name']);
                if(empty($this->errors))
                {
                    $this->Name = $this->makeNewName($file['name']);
                    $dest = $this->location.$this->Name;
                    if(move_uploaded_file($file['tmp_name'], $dest));
                        return true;
                    
                }
            }
            else {
               
                if($reuired)
                {
                    $this->errors["required"] = "must choose the image";
                    return false;
                }
                return true;
            }
            return false;
        }
    }
}

?>