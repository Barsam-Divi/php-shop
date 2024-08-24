<?php
class fileupload
{
    public function uploader ($data,$sup_folder = "productsimg")
    {
        $folder ='../storage/';
        $img_name =  rand() . basename($data['name']);
        $path = $folder .'/'.$sup_folder.'/'. $img_name;
        $upload_ok=1;
        $filetype= mime_content_type($data['tmp_name']);
        $extension = array('image/jpeg','image/gif','image/png','image/jpg');
//check file extension
        if (!in_array($filetype,$extension)){
            echo 'file not allowed .your file type is :'.$filetype;
            $upload_ok =0;
        }
//check if file alreddy exsits
        if (file_exists($path)){
            echo 'sorry,file alredyy excist';
            $upload_ok =0;
        }
//check file size
        if ($data['size'] >5000000){
            echo 'your file is so big ';
            $upload_ok =0;
        }


        if ($upload_ok==0){
            echo ' sorry ,your file was not uploaded';
        } else {
            if ( move_uploaded_file($data['tmp_name'],$path)){
                return 'storage/' .$sup_folder.'/'.$img_name;
            }else {
                echo 'error';
            }
        }

    }

}