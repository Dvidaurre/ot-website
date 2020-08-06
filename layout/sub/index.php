<?php
if ($config['UseChangelogTicker']) {
	//////////////////////
	// Changelog ticker //
	// Load from cache
	$changelogCache = new Cache('engine/cache/changelog');
	$changelogs = $changelogCache->load();

	if (isset($changelogs) && !empty($changelogs) && $changelogs !== false) {
		?>
		<table id="changelogTable">
			<tr class="yellow">
				<td colspan="2">Latest Changelog Updates (<a href="changelog.php" style="color: darkorange;">Click here to see full changelog</a>)</td>
			</tr>
			<?php
			for ($i = 0; $i < count($changelogs) && $i < 5; $i++) {
				?>
				<tr>
					<td><?php echo getClock($changelogs[$i]['time'], true, true); ?></td>
					<td><?php echo $changelogs[$i]['text']; ?></td>
				</tr>
				<?php
			}
			?>
		</table>
		<?php
	} else echo "No changelogs submitted.";
}
$cache = new Cache('engine/cache/news');
if ($cache->hasExpired()) {
	$news = fetchAllNews();
	
	$cache->setContent($news);
	$cache->save();
} else {
	$news = $cache->load();
	
}

// Design and present the list
if ($news) {
	function TransformToBBCode($string) {
		$tags = array(
			'[center]{$1}[/center]' => '<center>$1</center>',
			'[b]{$1}[/b]' => '<b>$1</b>',
			'[size={$1}]{$2}[/size]' => '<font size="$1">$2</font>',
			'[img]{$1}[/img]'    => '<a href="$1" target="_BLANK"><img src="$1" alt="image" style="width: 100%"></a>',
			'[link]{$1}[/link]'    => '<a href="$1">$1</a>',
			'[link={$1}]{$2}[/link]'   => '<a href="$1" target="_BLANK">$2</a>',
			'[color={$1}]{$2}[/color]' => '<font color="$1">$2</font>',
			'[*]{$1}[/*]' => '<li>$1</li>',
			'[youtube]{$1}[/youtube]' => '<div class="youtube"><div class="aspectratio"><iframe src="//www.youtube.com/embed/$1" frameborder="0" allowfullscreen></iframe></div></div>',
		);

		foreach ($tags as $tag => $value) {
			$code = preg_replace('/placeholder([0-9]+)/', '(.*?)', preg_quote(preg_replace('/\{\$([0-9]+)\}/', 'placeholder$1', $tag), '/'));
			$string = preg_replace('/'.$code.'/i', $value, $string);
		}

		return $string;
	}
	echo '<div id="newz">';
	foreach ($news as $n) {
		?>
		<div class="BorderTitleText" style="background-image:url(layout/images/global/content/newsheadline_background.gif); color: white;"><?php echo '<font size="2">'. getClock($n['date'], true) .' by <a href="characterprofile.php?name='. $n['name'] .'">'. $n['name'] .'</a></font><font size="4" color="white"> - '. TransformToBBCode($n['title']) .'</font>'; ?></div>
		<p><?php echo TransformToBBCode(nl2br($n['text'])); ?></p>
		<?php
	}
	echo '</div>';
	
} else {
	?>
	<h1>Welcome to Perfect Tibia </h1>
	<h4> We realized that long ago, Tibia made continuous wrong decisions. Cipsoft failed to improve the gameplay, and made tibia easy and less meaningful with every update they released</h4>
	<h4> However not everything was terrible, some sprites, spells, mechanics and quests were valuable. We realized that despite the fact Cipsoft "ruined " the game we used to love, they also made some valuable improvements in terms of graphics and content
	</h4>
	<h4> We believe that Tibia's best moment was between versions 8.0 and 8.1, we believe that some sweet spot between the old gameplay and some of the new features that were added to the game will create an awesome experience</h4>
	<h4>We decided to create what we believe is the perfect version of Tibia.</h4>
	<table id="changelogTable">
		<tr class="yellow">
			<td colspan="2"></td>
		</tr>
		<?php

		?>
	</table>
	<h1> Features : </h1>
	<h3> Gameplay : </h3>
	<ul>
		<li>
			Old gameplay, Old spells formulas for SD , UHS, Explos and HMMs with rune making
		</li>
		<li>
			No Pay to Win or Pay to play features, everything is enabled for players to enjoy <b> for free </b>, donations serve aesthetic purposes.
		</li>
		<li>
		Knights and Paladins use UHS as in the old days, the economy spins around rune making	
		</li>
		<li>
			No unbalanced potions. The potion system remains as it was in 8.0
		</li>
		<li>
			No Yalaharor game breaking spawns. Content spins around the main continent of Tibia as it was back in 8.0. Many spawns and quests were added to the main continent
		</li>
		<li>
			We preserved the main continent spawns of 8.0 + versions (for instance, por hope water elementals and so on)
		</li>
		<li>
			Fully working quests for outfits : Pirate, Beggar, Shaman, Assassin , Norseman, like back in the old days, with all the functionalities they imply.
		</li>
		<li>
			Fully working addons and trheir respective quests
		</li>
		<li>
			Fully working quests for POI, Inquisition, Annihi and endgame related quests + custom and challenging content
		</li>
		<li>
		No level requirement for knight weapons. You can be a lvl 8 with UHS and 80/80 skills wielding a War Hammer as in the old days
	</li>
		<li>
			Extended spawns to improve gameplay, made with custom professional map making. a few examples <a href="">here</a>
		</li>

	</ul>
	<h3> PVP : </h3>
	<ul>
	<li>
		Old style PVP. Explo using knights, Sd throwing paladins. 
	</li>
	<li>
	Sorcerers and Druids work as a mix between old and newer versions. Elements are preserved yet there are no directed spells.  Old formulas for explo arrows and fully working 8.1 druid spells
	</li>
	<li>
	Old SD formulas, no long cooldown between spells and no shared cooldowns, like in the old days, you can throw 2 UE in a row if you have the mana for it.
	</li>
	<li>
	Skull system with PVP enforced mechanics. You get experience if you kill someone who's higher level than you are.
	</li>
	<li>
	5 Kills for red skull,
	10 Kills for banishment, No Black skull , Guild War system enabled with exp/death involved.

	</li>
	</ul>
	<h3> Improvements : </h3>
	<ul>
		<li>
		Fully working Auction house system
		</li>
		<li>
		Runes are the main currency for the economy. Having a maker is allowed. <b>NPCs don't sell runes</b>
		</li>
		<li>
		Fully working Rashid/Djinn quests
		</li>
		<li>
		<b>All 8.1 runes are working with no level requirement, only magic level.</b> You can have your maker to cast icicles, fireballs, uhs or whatever is it that fits your current hunt 
		</li>
		<li>
		Trainer system with runemaking allowed, offline training is also enabled, although it's less effective than online training. Afk training/runemaking is enabled and encouraged
		</li>
		<li>
		Community oriented anti-bot system.  We won't ban botters. However we implemented a script that tracks players down, if the script finds a botter in a spot, a Blue Skull will appear over them. Blue skulled players are killable without frag counter and will give exp to their killers.
		Aol and blessings don't work under a blue school.
		You may bot at your peril, players are encouraged to hunt down botters and are rewarded for it.
		</li>
		<li>
			Houses are charged weekly instead of monthly in order to remove ghost house owners. Only players over lvl 30 can buy a house
		</li>

		<li>
		Mounts are enabled although they are harder to get than in real tibia. Mounts are rewarded in custom quests or events, they are not obtained that easily. We reworked mounting system so that you get dismounted whenever you engage in combat. At the same time , mounts give more speed than in real tibia.
		</li>
		<li>
		New outfits and mounts are available in the website's shop
		</li>
		<li>
			We preserved all the new spawns for the main content up to Svargrond. We extended known spawns in order for players to always have things to do.
		</li>
		<li>
			Custom quests for new outfits and mounts
		</li>
		<li>
		Custom quests and incredible scripts. Continuous development of new features, quests, dungeons and pvp prices
		</li>

		<li>
			Implemented Task System
		</li>
		<li>
			Implemented Daily quest system
		</li>
		<b> We listen to our players </b> Player oriented content -> We will make polls to decide the next content to be released. In the beginning, SAO and further related content will not be enabled
		</li>
	</ul>
	<h3>
		Give it a shot, <a href="#">create an account </a> and join us in the mission of building the best version of the game we love and enjoy so much
	</h3>
	<h4>Top players will be converted into tutors and will be able to actively participate on the server's direction and development.</h4>

	<b><i> Kindest regards, The Perfect Tibia Team </i></b>

	<table id="changelogTable">
		<tr class="yellow">
			<td colspan="2"></td>
		</tr>
	</table>


	<?php
}


?>