<?php



class GamesController extends AppController{
	public $components = array('RequestHandler','Paginator');
	
	public $helpers  = array('Html', 'Form');
	
	protected $imgpath;
	
	public $paginate = array(
		'limit' => 6
		//'order' => array('Contact.contact_name' => 'asc')
	);
	
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
					'description' => $row['description'],
					'user_id' => $this->Session->read('User.id'),
					'stat' => 'b'
			);
			
			$this->Game->save($data);
			return $this->redirect(array('action' => 'gameList'));
		}
		
	}
	
	
	public function index(){
		$this->layout = 'main';
	}
<<<<<<< HEAD
	
<<<<<<< HEAD
	public function gameList() {
		$this->layout = 'main';
		$this->Paginator->settings = array(
			/*'conditions' => array(
				'Game.user_id =' => $this->Session->read('User.id')
				//'Contact.contact_name like' => "%{$keyword}%"
			),*/
			'limit' => 6
		);
		$data = $this->Paginator->paginate('Game');
		$this->set(compact('data'));
		
	}
	
	public function viewgame(){
=======
=======

>>>>>>> 0f87600eba7fa3c7edc39a0046e3c33da77215f9
	public function edit($id = null){
		
		$id = $this->params['url']['id'];

		$this->layout = 'main';
		if(!$id){
			$this->redirect(array('action' => 'index'));
		}
		
		$detail = $this->Game->findById($id);
		if(!$detail){
			$this->redirect(array('action' => 'index'));
		}
		$this->set('data', $detail);
<<<<<<< HEAD
>>>>>>> origin/nr_edit
=======
>>>>>>> 0f87600eba7fa3c7edc39a0046e3c33da77215f9
		
		if($this->request->is('post')){
			$data = $this->request->data;
			$imgPath = $data['Games']['imgVal'];

			if($data['Games']['Image']['tmp_name'] !== ''){
				unset($data['Games']['imgVal']);
				$this->UploadFile($data['Games']);
				$imgPath = $this->imgpath;
			}
			
			$this->Game->id = $id;
			$dataRow = array(
					'name' => $data['name'],
					'image' => $imgPath,
					'description' => $data['description'],
					'user_id' => 'test',
					'stat' => 'b'
			);
			if($this->Game->save($dataRow)){
				$this->Session->setFlash('successfuly updated');
				$this->redirect(array('action' => 'index'));
			}
			
		}
	}
	
		public function gameList() {
		$this->layout = 'main';
		$this->Paginator->settings = array(
			/*'conditions' => array(
				'Game.user_id =' => $this->Session->read('User.id')
				//'Contact.contact_name like' => "%{$keyword}%"
			),*/
			'limit' => 6
		);
		$data = $this->Paginator->paginate('Game');
		$this->set(compact('data'));
		
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