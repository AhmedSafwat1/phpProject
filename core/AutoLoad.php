<?php
/*
* take class load it
* when declare it new class()
*/
spl_autoload_register(function ($class_name) {
    $dirs = [CONTROLLER.DS,MODEL.DS,CORE.DS,ROOT.DS.'config'.DS];
    $formats = ['%sController.php','%s.php','%sModel.php','class.%s.php','%sclass.php'];
    foreach ($dirs as $dir) {
        # code..
        foreach ($formats as $format) {
            # code...
            $path = $dir.sprintf($format,$class_name);
            if(file_exists($path))
            {
                include_once $path;
                return TRUE;
            }
        }
    }
    return FALSE;
});
?>