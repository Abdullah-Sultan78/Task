<?php
function imageUpload($image, $path){

        $imageName = $path.time().rand().'.'.$image-> extension();
       $directory = $path.'/';
       $image->move($directory, $imageName);
       return $directory.$imageName;

}