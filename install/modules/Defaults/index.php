<?php
class Install_Defaults extends InstallerFactory
{
	function start(){
		if(!isset($_POST['submit'])){
			
			$INITIAL_STAT_POINTS = 10;
			$INITIAL_MAX_EXP = 20;
			$INITIAL_EXP = 0;
			$INITIAL_MAX_ENERGY = 10;
			$INITIAL_ENERGY = 10;
			$INITIAL_MAX_HP = 20;
			$INITIAL_HP = 20;
			$INITIAL_STRENGTH = 5;
			$INITIAL_VITALITY = 5;
			$INITIAL_AGILITY = 5;
			$INITIAL_DEXTERITY = 5;

			$INCREMENT_STAT_POINTS = 2;
			$INCREMENT_MAX_EXP = 20;
			$INCREMENT_MAX_ENERGY = 1;
			$INCREMENT_MAX_HP = 5;
		} else
		{
			$INITIAL_STAT_POINTS = $_POST['INITIAL_STAT_POINTS'];
			$INITIAL_MAX_EXP = $_POST['INITIAL_MAX_EXP'];
			$INITIAL_EXP = $_POST['INITIAL_EXP'];
			$INITIAL_MAX_ENERGY = $_POST['INITIAL_MAX_ENERGY'];
			$INITIAL_ENERGY = $_POST['INITIAL_ENERGY'];
			$INITIAL_MAX_HP = $_POST['INITIAL_MAX_HP'];
			$INITIAL_HP = $_POST['INITIAL_MAX_HP'];
			$INITIAL_STRENGTH = $_POST['INITIAL_STRENGTH'];
			$INITIAL_VITALITY = $_POST['INITIAL_VITALITY'];
			$INITIAL_AGILITY = $_POST['INITIAL_AGILITY'];
			$INITIAL_DEXTERITY = $_POST['INITIAL_DEXTERITY'];

			$INCREMENT_STAT_POINTS = $_POST['INCREMENT_STAT_POINTS'];
			$INCREMENT_MAX_EXP = $_POST['INCREMENT_MAX_EXP'];
			$INCREMENT_MAX_ENERGY = $_POST['INCREMENT_MAX_ENERGY'];
			$INCREMENT_MAX_HP = $_POST['INCREMENT_MAX_HP'];
			
			$defaults = <<<CONF
<?php
//This file cannot be viewed, it must be included
defined('IN_EZRPG') or exit;

/*
  Title: Defaults
  The players default settings for the game are set here.
*/

/*
  Constants: Initial
  Various user settings used in ezRPG at signup.
  
  INITIAL_STAT_POINTS - Amount of stat points on register
  INITIAL_MAX_EXP - Amount of max exp on register
  INITIAL_EXP - Amount of exp on register
  INITIAL_MAX_ENERGY - Amount of max energy on register
  INITIAL_ENERGY - Amount of energy on register
  INITIAL_MAX_HP - Amount of max hp on register
  INITIAL_HP - Amount of hp on register
  INITIAL_STRENGTH - Amount of strength on register
  INITIAL_VITALITY - Amount of vitality on register
  INITIAL_AGILITY - Amount of agility on register
  INITIAL_DEXTERITY - Amount of dexterity on register
*/
define('INITIAL_STAT_POINTS', {$INITIAL_STAT_POINTS});
define('INITIAL_MAX_EXP', {$INITIAL_MAX_EXP});
define('INITIAL_EXP', {$INITIAL_EXP});
define('INITIAL_MAX_ENERGY', {$INITIAL_MAX_ENERGY});
define('INITIAL_ENERGY', {$INITIAL_ENERGY});
define('INITIAL_MAX_HP', {$INITIAL_MAX_HP});
define('INITIAL_HP', {$INITIAL_HP});
define('INITIAL_STRENGTH', {$INITIAL_STRENGTH});
define('INITIAL_VITALITY', {$INITIAL_VITALITY});
define('INITIAL_AGILITY', {$INITIAL_AGILITY});
define('INITIAL_DEXTERITY', {$INITIAL_DEXTERITY});

/*
  Constants: Increments
  Various user settings used in ezRPG for leveling.
  
  INCREMENT_STAT_POINTS - Amount of stat points increased by level
  INCREMENT_MAX_EXP - Amount of max exp increased by level
  INCREMENT_MAX_ENERGY - Amount of max energy increased by level
  INCREMENT_MAX_HP - Amount of max hp increased by level
*/
define('INCREMENT_STAT_POINTS', {$INCREMENT_STAT_POINTS});
define('INCREMENT_MAX_EXP', {$INCREMENT_MAX_EXP});
define('INCREMENT_MAX_ENERGY', {$INCREMENT_MAX_ENERGY});
define('INCREMENT_MAX_HP', {$INCREMENT_MAX_HP});
?>
CONF;
				$fh = fopen('../defaults.php', 'w');
				fwrite($fh, $defaults);
				fclose($fh);
				$this->header();
				echo "<h2>Configuration file written</h2>\n";
				echo "<p>The configuration has ben verified, and the defaults.php file has been successfully written.</p><br />\n";
				echo "<a href=\"index.php?step=Populate\">Continue to next step</a>";
				$this->footer();
				die;
			}
		
		$this->header();
		echo "<h2>Player Default Configuration</h2><br />\n";
		echo '<form method="post">';

		echo '<label>Initial stat points</label>';
		echo '<input type="text" name="INITIAL_STAT_POINTS" value="' . $INITIAL_STAT_POINTS . '" />';

		echo '<label>Initial max exp</label>';
		echo '<input type="text" name="INITIAL_MAX_EXP" value="' . $INITIAL_MAX_EXP . '" />';
		echo '<label>Initial exp</label>';
		echo '<input type="text" name="INITIAL_EXP" value="' . $INITIAL_EXP . '" />';

		echo '<label>Initial max energy</label>';
		echo '<input type="text" name="INITIAL_MAX_ENERGY" value="' . $INITIAL_MAX_ENERGY . '" />';
		echo '<label>Initial energy</label>';
		echo '<input type="text" name="INITIAL_ENERGY" value="' . $INITIAL_ENERGY . '" />';

		echo '<label>Initial max hp</label>';
		echo '<input type="text" name="INITIAL_MAX_HP" value="' . $INITIAL_MAX_HP . '" />';
		echo '<label>Initial hp</label>';
		echo '<input type="text" name="INITIAL_HP" value="' . $INITIAL_HP . '" />';

		echo '<label>Initial strength</label>';
		echo '<input type="text" name="INITIAL_STRENGTH" value="' . $INITIAL_STRENGTH . '" />';
		echo '<label>Initial vitality</label>';
		echo '<input type="text" name="INITIAL_VITALITY" value="' . $INITIAL_VITALITY . '" />';
		echo '<label>Initial agility</label>';
		echo '<input type="text" name="INITIAL_AGILITY" value="' . $INITIAL_AGILITY . '" />';
		echo '<label>Initial dexterity</label>';
		echo '<input type="text" name="INITIAL_DEXTERITY" value="' . $INITIAL_DEXTERITY . '" />';

		echo '<label>Increment stat points per level</label>';
		echo '<input type="text" name="INCREMENT_STAT_POINTS" value="' . $INCREMENT_STAT_POINTS . '" />';
		echo '<label>Increment stat points per level</label>';
		echo '<input type="text" name="INCREMENT_MAX_EXP" value="' . $INCREMENT_MAX_EXP . '" />';
		echo '<label>Increment stat points per level</label>';
		echo '<input type="text" name="INCREMENT_MAX_ENERGY" value="' . $INCREMENT_MAX_ENERGY . '" />';
		echo '<label>Increment stat points per level</label>';
		echo '<input type="text" name="INCREMENT_MAX_HP" value="' . $INCREMENT_MAX_HP . '" />';
		
		echo '<input type="submit" name="submit" value="Submit"  class="button" />';
		echo '</form>';
	}
}
?>
