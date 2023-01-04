<?php
/**
 * Description of mod_slider
 *
 * @author anwar
 */

class mod_slider extends Model {
    function __construct() {
        parent::Model();
    }

    function save_slider() {
        $img='';
        if($_FILES['image']['name']!='') {
            $img=$this->add_image();
        }
        $sql="insert into wb_slider set
                title={$this->db->escape($_POST['title'])},
                des={$this->db->escape($_POST['des'])},
                image={$this->db->escape($img)}";
        $flag = $this->db->query($sql);
        return $flag;
    }
    function update_slider() {
        $img='';
        if($_FILES['image']['name']!='') {
            $img=$this->add_image($_POST['p_image']);
        }else {
            $img=$_POST['p_image'];
        }
        $slider_id=$this->session->userdata('slider_id');
        $sql="update wb_slider set
                title={$this->db->escape($_POST['title'])},
                des={$this->db->escape($_POST['des'])},
                image={$this->db->escape($img)}
                where slider_id=$slider_id";
        $flag = $this->db->query($sql);
       
        return $flag;
    }
    function delete_slider($slider_id) {
        $file=sql::row('wb_slider',"slider_id=$slider_id");
        @unlink(UPLOAD_PATH."slider/".$file['image']);
        $sql="delete from wb_slider where slider_id=$slider_id";
        return $this->db->query($sql);
    }
    function add_image($pre_image='') {
        $param['dir']=UPLOAD_PATH."slider/";
        $param['type']="jpg,png,gif";

        if(class_exists('zupload')) {
            $this->zupload->setUploadDir(UPLOAD_PATH.'slider/');
        } else {
            $this->load->library('zupload',$param);
        }

        if($pre_image!="") {
            $this->zupload->delFile($pre_image);
            $this->zupload->delFile("n".$pre_image);
        }
        $this->zupload->setFileInputName('image');
        $this->zupload->upload(true);
        $img=$this->zupload->getOutputFileName();

        return $img;
    }
}?>