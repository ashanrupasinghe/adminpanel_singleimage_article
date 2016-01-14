<h2 align="center"><?php echo $title ?></h2>
<table class="table">
	<tbody>
		<tr>
			<th></th>
			<th>title</th>
			<th>content</th>
			<th>images</th>
			<th>more</th>
			<th>options</th>
		</tr>


<?php $count=1;?>
<?php foreach ($news as $news_item): ?>
  <tr>
			<td><?php echo $count;?></td>
			<td><?php echo $news_item['title'] ?></td>
			<td><?php echo $news_item['text'] ?></td>
			<td><img src="<?php echo base_url();?>uploads/<?php echo $news_item['images'];?>" width="100" height="100"></td>
			<td><a href="view/<?php echo $news_item['slug']; ?>"
				class="btn btn-primary" role="button">View article</a></td>
			
			<td><a
				href="<?php echo base_url();?>index.php/users/delete/<?php echo $news_item['id'];?>"
				class="btn btn-danger" role="button">delete</a></td>
		</tr>       
<?php $count++;?>
<?php endforeach ?>
</tbody>
</table>
