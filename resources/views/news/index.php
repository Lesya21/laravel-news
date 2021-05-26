<?php foreach ($newsList as $key => $news) { ?>
  <div>
	  <a href="<?= route('news.detail', ['id' => $key]) ?>"><?= $news ?></a>
  </div>
<?php } ?>
