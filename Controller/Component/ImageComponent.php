<?php
class ImageComponent extends Component
{
    public function upload($controller, $width, $thumb_width, $thumd_third = null){
        if(isset($_FILES['data']['name'][ucfirst($controller)]['image'])){

            $uploaddir = $this->uploadDir($controller, $width, $thumb_width, $thumd_third);

            $img = $_FILES['data']['name'][ucfirst($controller)]['image'];
            $tmp = $_FILES['data']['tmp_name'][ucfirst($controller)]['image'];

            $ext = $this->getExtension($img);

            if(in_array($ext, $this->validExtension())){
                $image = uniqid().'.'.$ext;                
                $path = WWW_ROOT . $uploaddir[0] . $image;
                
                if( move_uploaded_file($tmp, $path) ){
                    return $image;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
        	return false;
        }
    }

    public function validExtension(){
        return array('jpg', 'jpeg', 'png', 'gif');
    }

    public function uploadDir($controller, $width, $thumb_width, $thumd_third = null){
        $uploadDir[0] = 'uploads'. DS .$controller. DS;
        $uploadDir[1] = 'uploads'. DS .$controller. DS .$width. DS;
        $uploadDir[2] = 'uploads'. DS .$controller. DS .$thumb_width. DS;
        $uploadDir[3] = 'uploads'. DS .$controller. DS .$thumd_third. DS;
        
        for($i=0; $i < count($uploadDir); $i++){
            $cachedir = '';
            $folders = explode(DS, $uploadDir[$i]);
            foreach($folders as $folder){
                $cachedir .= $folder . DS;
                if(!is_dir($cachedir)){
                    mkdir($cachedir, 0777);
                }
            }
        }
        return $uploadDir;
    }

    public function n_abs($num) {
        return ($num > 0) ? $num * -1 : $num;
    }

    public function crop($file, $width = 800, $height = 600, $controller) {        
        $imageSize = getimagesize(WWW_ROOT . 'uploads' . DS . $controller . DS . $file);
        $process = imagecreatetruecolor($width, $height);
        $original_width = $imageSize[0];
        $original_height = $imageSize[1];

        $ext = $this->getExtension(WWW_ROOT . 'uploads' . DS . $controller . DS . $file);

        switch ($ext)
        {
            case 'jpeg':
            case 'jpg':
                $original_image = imagecreatefromjpeg(WWW_ROOT . 'uploads' . DS . $controller . DS . $file);
                break;
            case 'png':
                $original_image = imagecreatefrompng(WWW_ROOT . 'uploads' . DS . $controller . DS . $file);
                break;
            case 'gif':
                $original_image = imagecreatefromgif(WWW_ROOT . 'uploads' . DS . $controller . DS . $file);
                break;
        }

        $new_width = $original_width / $width;
        $new_height = $original_height / $height;
        $path_thumb = $width . DS . $file;
        
        if ($new_width > $new_height) {
            $img_x = ($height/$original_height) * $original_width;
            $img_y = $height;
            $diff = $this->n_abs(($img_x - $width) / 2);
            imagecopyresampled($process, $original_image, $diff, 0, 0, 0, $img_x, $img_y, $original_width, $original_height);
        } else {
            $img_y = ($width/$original_width) * $original_height;
            $img_x = $width;
            $diff = $this->n_abs(($img_y - $height) / 2);
            imagecopyresampled($process, $original_image, 0, $diff, 0, 0, $img_x, $img_y, $original_width, $original_height);
        }
        
        imagejpeg($process, WWW_ROOT . 'uploads' . DS . $controller . DS . $path_thumb, 95);
        imagedestroy($process);

        return $file;
    }

    public function getImageName($file){
        $img = strtolower($file);
        $img = explode('/', $img);
    	return end($img);
    }

    public function getExtension($file){
        $img = strtolower($file);
        $ext = explode('.', $img);
        return end($ext);
    }
}