<div class="section-registration">
	<div class="container">
		<div class="form-add-width center-block">
				<h1>Update games</h1>
				<div class="img-cont">
					<div class="img-prev">
						<?php 
							if($data){
								echo $this->Html->image('/upload/'.$data['Game']['image'], array('alt' => 'CakePHP', 'id' => 'img_preview', 'class' => 'img-responsive'));
							}else{
								echo $this->Html->image('emptyprofile.jpg', array('alt' => 'CakePHP', 'id' => 'img_preview', 'class' => 'img-responsive'));
							}	 
						?>
					</div>
				</div>
		 		<?php 
			    echo $this->Session->flash();
			    echo $this->Form->create('Games', array('type' => 'file'));
			    echo $this->Form->input('imgVal', array('type' => 'hidden', 'value' => $data['Game']['image']));
			    echo $this->Form->input('name',
								array('div' => array(
										'class' => 'form-group'
									),
									 'name' => 'name',
									 'id' => 'txtName',
									 'class' => 'form-control',
									 'size' => 16,
									 'value' => $data['Game']['name'],
									 'label' => '',
									 'placeholder' => 'NAME'
								)
							);
				echo $this->Form->file('Image', array('id' => 'uploadFile', 'accept' => 'image/*', 'value' => $data['Game']['image']));
			    echo $this->Form->input('description',
											array('div' => array(
													'class' => 'form-group'
											),
													'name' => 'description',
													'id' => 'txtdescription',
													'class' => 'form-control',
													'rows' => 5,
													'value' => $data['Game']['description'],
													'type' => 'textarea',
													'size' => 16,
													'label' => '',
													'placeholder' => 'DESCRIPTION'
											)
									);
			    echo $this->Form->button('Submit', array('type' => 'submit','class' => 'btn btn-primary'));
			    echo $this->Form->end();
			    ?>
	    </div>	    
	</div>
</div>	