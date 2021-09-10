<?php
defined('IN_EZRPG') or exit;

$hooks->add_hook('player', 'level_up', 2);

function hook_level_up($db, &$tpl, $player, $args = 0)
{
    //No player data
    if ($args === 0 || LOGGED_IN == false)
       return $args;

    //Check if player has leveled up
    if ($args->exp >= $args->max_exp)
    {
        require_once CUR_DIR . '/defaults.php';

        //Update the current player variable ($args)
        $args->exp = $args->exp - $args->max_exp;
        $args->level += 1;
        $args->stat_points += INCREMENT_STAT_POINTS;
        $args->max_exp += INCREMENT_MAX_EXP;
        $args->max_energy += INCREMENT_MAX_ENERGY;
        $args->energy += INCREMENT_MAX_ENERGY;
        $args->hp += INCREMENT_MAX_HP;
        $args->max_hp += INCREMENT_MAX_HP;
        
        //Update the database
        $db->execute('UPDATE `<ezrpg>players` SET `exp`=?, `level`=level+1, `stat_points`=stat_points+'+INCREMENT_STAT_POINTS+', `max_exp`=max_exp+'+INCREMENT_MAX_EXP+', `energy`=energy+'+INCREMENT_MAX_ENERGY+', `max_energy`=max_energy+'+INCREMENT_MAX_ENERGY+', `hp`=hp+'+INCREMENT_MAX_HP+', `max_hp`=max_hp+'+INCREMENT_MAX_HP+' WHERE `id`=?', array(intval($args->exp), intval($args->id)));
        
        //Add event log
        $msg = 'You have leveled up! You gained +'+INCREMENT_STAT_POINTS+' stat points and +'+INCREMENT_MAX_ENERGY+' max energy!';
        addLog(intval($args->id), $msg, $db);
    }
    
    return $args;
}
?>
