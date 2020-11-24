<?php
/**
 * Created by PhpStorm.
 * User: Lusavuvu
 * Date: 12/01/2018
 * Time: 18:13
 */

namespace app\core\Managers\FileManager;


Class FileUploader
{
    protected $upload_dir;
    protected $new_name;
    protected $size;
    protected $max_size;
    protected $extension;
    protected $extensionPermit;
    protected $error = false;
    protected $tmp_name;

    public function __construct(array $fileData, array $extensionPermit = array(), $max_size, $dir)
    {
        if ($fileData['error'] == 0) {
            $this->setName();
            $this->setSize($fileData['size']);
            $this->setMax_size((int)$max_size);
            $this->setExtention($fileData['name']);
            $this->setExtensionPermit($extensionPermit);
            $this->setUploadDir((string)$dir);
            $this->setTmp_name($fileData['tmp_name']);
        } else {
            $this->error = true;
        }
    }

    public function name()
    {
        return $this->new_name;
    }

    public function size()
    {
        return $this->size;
    }

    public function extension()
    {
        return $this->extension;
    }

    public function error()
    {
        return $this->error;
    }

    public function tmp_name()
    {
        return $this->tmp_name;
    }

    public function setName($prefix = null, $suffix = null, $name = null)
    {
        if (isset($name) && is_string($name)) $this->new_name = $name;
        else $this->generateName();

        if (isset($prefix) && is_string($prefix)) $this->new_name = $prefix . $this->new_name;
        if (isset($suffix) && is_string($suffix)) $this->new_name .= $suffix;
    }

    protected function setSize($size)
    {
        $this->size = (int)$size;
    }

    protected function setExtension($name)
    {
        $infoFichier = pathinfo($name);
        $this->extension = $infoFichier['extension'];

    }

    protected function setMax_size($max_size)
    {
        $this->max_size = (int)$max_size;
    }

    protected function setExtension_permit(array $ext_permit)
    {
        $this->extensionPermit = $ext_permit;
    }

    protected function setUploadDir($dir)
    {
        $this->upload_dir = $dir;
    }

    protected function setTmp_name($tmp_name)
    {
        $this->tmp_name = $tmp_name;
    }

    protected function generateName($name)
    {
        $this->new_name = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
    }

    public function save()
    {
        if ($this->size <= $this->max_size and in_array($this->extension, $this->extensionPermit)) {
            move_uploaded_file($this->tmp_name, $this->upload_dir . '/' . $this->new_name . '.' . $this->extension);
            return $this->upload_dir . '/' . $this->new_name . '.' . $this->extension;
        } else {
            return $this->error = true;
        }
    }
}