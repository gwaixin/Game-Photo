<?php


class GamesController extends AppController{
	
	protected $imgpath;
	
	public function profile(){
		$this->layout = 'main';
		if($this->request->is('post')){
				$this->__add();
		}
	}
	
	public function __add(){
		
		$row = $this->request->data;
		
		$image = $row['Games'];
		$this->Game->create();
		if($this->UploadFile($image)){
			
			$data = array(
					'name' => $row['name'],
					'image' => $this->imgpath,
					'description' => '',
					'user_id' => 'test',
					'stat' => 'b'
			);
			
			$this->Game->save($data);
			return $this->redirect(array('action' => 'list'));
		}
		
	}
	
	
	public function index(){
		$this->layout = 'main';
	}
	
	public function viewgame(){
		
	}
	
	public function UploadFile($params) {
		 $image = array_shift($params);
		 $imageTypes = array("image/gif", "image/jpeg", "image/png");
         //upload folder - make sure to create one in webroot
         $uploadFolder = "upload";
         //full path to upload folder
         $uploadPath = WWW_ROOT . $uploadFolder;
         foreach ($imageTypes as $type) {
         	if ($type == $image['type']) {
         		
         		//check if there wasn't errors uploading file on serwer
         		if ($image['error'] == 0) {
         			//image file name
         			$imageName = $image['name'];
         			//check if file exists in upload folder
         			if (file_exists($uploadPath . '/' . $imageName)) {
         				//create full filename with timestamp
         				$imageName = date('His') . $imageName;
         			}
         			//create full path with image name
         			$full_image_path = $uploadPath . '/' . $imageName;
         			//upload image to upload folder
         			if (move_uploaded_file($image['tmp_name'], $full_image_path)) {
         				$this->imgpath = $imageName;
         				return true;
         				//$this->set('imageName',$imageName);
         			} else {
         				$this->Session->setFlash('There was a problem uploading file. Please try again.');
         			}
         		} else {
         			$this->Session->setFlash('Error uploading file.');
         		}
         		break;
         	} else {
         		$this->Session->setFlash('Unacceptable file type');
         	}
         }
	}
	
}