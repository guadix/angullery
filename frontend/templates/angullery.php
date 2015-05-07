<div ng-app="angullery">
<section class="angullery"
				 ng-controller="angulleryCtrl"
				 ng-init="items=[
				 	{title: 'T1', media: '//lorempixel.com/300/200?rnd=<?php echo rand(0, 1000) ?>', caption: 'C1'},
					{title: 'T2', media: '//lorempixel.com/300/200?rnd=<?php echo rand(0, 1000) ?>', caption: 'C2'},
					{title: 'T3', media: '//lorempixel.com/300/200?rnd=<?php echo rand(0, 1000) ?>', caption: 'C3'}
					]">
	<article ng-repeat="item in items">
		<h1>
			<?php echo $title ?>
			{{ item.title }}
		</h1>
		<section class="media">
			<img ng-src="{{ item.media }}" >
		</section>
		<section class="caption">
			<?php echo $random_phrase ?>
			{{ item.caption }}
		</section>
	</article>
</section>
</div>
