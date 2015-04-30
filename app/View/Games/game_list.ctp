<div class='col-lg-12'>
	<h2> Game List</h2>
<?php
	foreach($data as $d) {
?>

	
	<div class="thumbnail game-list">
		<img
			src="<?php echo $this->webroot?>upload/<?php echo $d['Game']['image'];?>" alt="...">
		<div class="caption">
			<h3><?php echo $d['Game']['name'];?></h3>
			<p><?php echo $d['Game']['description'];?></p>
			<p class='game-options'>
				<span>
					<a href='javascript:;'>
						<i class="fa fa-eye"></i>
					</a>
				</span>
				<span>
					<a href='javascript:;'>
						<i class="fa fa-pencil"></i>
					</a>
				</span>
				<span>
					<a href='javascript:;'>
						<i class="fa fa-trash"></i>
					</a>
				</span>
			</p>
			<!-- <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p> -->
		</div>
	</div>
<?php
}
?>
</div>
<div class='col-lg-12' style='text-align:center;'>
	<?php 
		/* Use the paginator helper to display links to other pages.
		 A full list of available options can be found in the CakePHP documentation:
		 http://book.cakephp.org/2.0/en/core-libraries/components/pagination.html */
		
		
		echo $this->Paginator->numbers(array(
			'modulus' => 4,   /* Controls the number of page links to display */
			'first' => 'First',
			'separator' => '',
			'last' => 'Last',
			'tag'	=> 'li',
			'currentClass' => 'active',
			'before' => "<ul class='pagination'>", 'after' => '</ul>')
		);
	?>
</div>