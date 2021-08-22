<?php $sql = "SELECT `e`.*, DATE_FORMAT(`date`,"%d.%m.%Y") AS `date`, `p`.`name` as `partner_name` 
FROM `med_events` as `e`
LEFT JOIN `med_partners` as `p`
    on `e`.`partner_id` = `p`.`id`
ORDER BY `name`
WHERE `e`.`id` = " . request()->id . "";
 $res = DB::select($sql);
 return $res;