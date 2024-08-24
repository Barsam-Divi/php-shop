<?php
require_once"../app/model/Migration.php";
require_once"../includes/config.php";

$migration_obj = new Migration();

$tables = get_class_methods('Migration');
unset($tables[0]);

unset($tables[1]);

$list =array_values($tables);


foreach ($list as $table)
{
    $res = $migration_obj->check_tbl($table);
        if (!$res)
        {
            $migration_obj->$table();
            echo $table .'was successfully created <br>';
        }
}