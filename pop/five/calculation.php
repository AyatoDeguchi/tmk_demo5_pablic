<?php
  foreach ($db_population_uda_2020_m as $l) {
    $population_uda_2020_m_0_9 = $l['0_4'] + $l['5_9'];
    $population_uda_2020_m_10_19 = $l['10_14'] + $l['15_19'];
    $population_uda_2020_m_20_59 = $l['20_24'] + $l['25_29'] + $l['30_34'] + $l['35_39'] + $l['40_44'] + $l['45_49'] + $l['50_54'] + $l['55_59'];
    $population_uda_2020_m_60_100 = $l['60_64'] + $l['65_69'] + $l['70_74'] + $l['75_79'] + $l['80_84'] + $l['85_89'] + $l['90_94'] + $l['95_99'] + $l['100_'];
  }
  $population_uda_2020_m = $population_uda_2020_m_0_9 + $population_uda_2020_m_10_19 + $population_uda_2020_m_20_59 + $population_uda_2020_m_60_100;
  foreach ($db_population_uda_2020_w as $l) {
    $population_uda_2020_w_0_9 = $l['0_4'] + $l['5_9'];
    $population_uda_2020_w_10_19 = $l['10_14'] + $l['15_19'];
    $population_uda_2020_w_20_59 = $l['20_24'] + $l['25_29'] + $l['30_34'] + $l['35_39'] + $l['40_44'] + $l['45_49'] + $l['50_54'] + $l['55_59'];
    $population_uda_2020_w_60_100 = $l['60_64'] + $l['65_69'] + $l['70_74'] + $l['75_79'] + $l['80_84'] + $l['85_89'] + $l['90_94'] + $l['95_99'] + $l['100_'];
  }
  $population_uda_2020_w = $population_uda_2020_w_0_9 + $population_uda_2020_w_10_19 + $population_uda_2020_w_20_59 + $population_uda_2020_w_60_100;
  $population_uda_2020 = $population_uda_2020_m + $population_uda_2020_w;
  foreach ($db_population_tamaru_2020_m as $l) {
    $population_tamaru_2020_m_0_9 = $l['0_4'] + $l['5_9'];
    $population_tamaru_2020_m_10_19 = $l['10_14'] + $l['15_19'];
    $population_tamaru_2020_m_20_59 = $l['20_24'] + $l['25_29'] + $l['30_34'] + $l['35_39'] + $l['40_44'] + $l['45_49'] + $l['50_54'] + $l['55_59'];
    $population_tamaru_2020_m_60_100 = $l['60_64'] + $l['65_69'] + $l['70_74'] + $l['75_79'] + $l['80_84'] + $l['85_89'] + $l['90_94'] + $l['95_99'] + $l['100_'];
  }
  $population_tamaru_2020_m = $population_tamaru_2020_m_0_9 + $population_tamaru_2020_m_10_19 + $population_tamaru_2020_m_20_59 + $population_tamaru_2020_m_60_100;
  foreach ($db_population_tamaru_2020_w as $l) {
    $population_tamaru_2020_w_0_9 = $l['0_4'] + $l['5_9'];
    $population_tamaru_2020_w_10_19 = $l['10_14'] + $l['15_19'];
    $population_tamaru_2020_w_20_59 = $l['20_24'] + $l['25_29'] + $l['30_34'] + $l['35_39'] + $l['40_44'] + $l['45_49'] + $l['50_54'] + $l['55_59'];
    $population_tamaru_2020_w_60_100 = $l['60_64'] + $l['65_69'] + $l['70_74'] + $l['75_79'] + $l['80_84'] + $l['85_89'] + $l['90_94'] + $l['95_99'] + $l['100_'];
  }
  $population_tamaru_2020_w = $population_tamaru_2020_w_0_9 + $population_tamaru_2020_w_10_19 + $population_tamaru_2020_w_20_59 + $population_tamaru_2020_w_60_100;
  $population_tamaru_2020 = $population_tamaru_2020_m + $population_tamaru_2020_w;
  foreach ($db_population_tokida_2020_m as $l) {
    $population_tokida_2020_m_0_9 = $l['0_4'] + $l['5_9'];
    $population_tokida_2020_m_10_19 = $l['10_14'] + $l['15_19'];
    $population_tokida_2020_m_20_59 = $l['20_24'] + $l['25_29'] + $l['30_34'] + $l['35_39'] + $l['40_44'] + $l['45_49'] + $l['50_54'] + $l['55_59'];
    $population_tokida_2020_m_60_100 = $l['60_64'] + $l['65_69'] + $l['70_74'] + $l['75_79'] + $l['80_84'] + $l['85_89'] + $l['90_94'] + $l['95_99'] + $l['100_'];
  }
  $population_tokida_2020_m = $population_tokida_2020_m_0_9 + $population_tokida_2020_m_10_19 + $population_tokida_2020_m_20_59 + $population_tokida_2020_m_60_100;
  foreach ($db_population_tokida_2020_w as $l) {
    $population_tokida_2020_w_0_9 = $l['0_4'] + $l['5_9'];
    $population_tokida_2020_w_10_19 = $l['10_14'] + $l['15_19'];
    $population_tokida_2020_w_20_59 = $l['20_24'] + $l['25_29'] + $l['30_34'] + $l['35_39'] + $l['40_44'] + $l['45_49'] + $l['50_54'] + $l['55_59'];
    $population_tokida_2020_w_60_100 = $l['60_64'] + $l['65_69'] + $l['70_74'] + $l['75_79'] + $l['80_84'] + $l['85_89'] + $l['90_94'] + $l['95_99'] + $l['100_'];
  }
  $population_tokida_2020_w = $population_tokida_2020_w_0_9 + $population_tokida_2020_w_10_19 + $population_tokida_2020_w_20_59 + $population_tokida_2020_w_60_100;
  $population_tokida_2020 = $population_tokida_2020_m + $population_tokida_2020_w;
  foreach ($db_population_shimotokida_2020_m as $l) {
    $population_shimotokida_2020_m_0_9 = $l['0_4'] + $l['5_9'];
    $population_shimotokida_2020_m_10_19 = $l['10_14'] + $l['15_19'];
    $population_shimotokida_2020_m_20_59 = $l['20_24'] + $l['25_29'] + $l['30_34'] + $l['35_39'] + $l['40_44'] + $l['45_49'] + $l['50_54'] + $l['55_59'];
    $population_shimotokida_2020_m_60_100 = $l['60_64'] + $l['65_69'] + $l['70_74'] + $l['75_79'] + $l['80_84'] + $l['85_89'] + $l['90_94'] + $l['95_99'] + $l['100_'];
  }
  $population_shimotokida_2020_m = $population_shimotokida_2020_m_0_9 + $population_shimotokida_2020_m_10_19 + $population_shimotokida_2020_m_20_59 + $population_shimotokida_2020_m_60_100;
  foreach ($db_population_shimotokida_2020_w as $l) {
    $population_shimotokida_2020_w_0_9 = $l['0_4'] + $l['5_9'];
    $population_shimotokida_2020_w_10_19 = $l['10_14'] + $l['15_19'];
    $population_shimotokida_2020_w_20_59 = $l['20_24'] + $l['25_29'] + $l['30_34'] + $l['35_39'] + $l['40_44'] + $l['45_49'] + $l['50_54'] + $l['55_59'];
    $population_shimotokida_2020_w_60_100 = $l['60_64'] + $l['65_69'] + $l['70_74'] + $l['75_79'] + $l['80_84'] + $l['85_89'] + $l['90_94'] + $l['95_99'] + $l['100_'];
  }
    $population_shimotokida_2020_w = $population_shimotokida_2020_w_0_9 + $population_shimotokida_2020_w_10_19 + $population_shimotokida_2020_w_20_59 + $population_shimotokida_2020_w_60_100;
    $population_shimotokida_2020 = $population_shimotokida_2020_m + $population_shimotokida_2020_w;
    /*全体の総合人数*/
    $population_2020 = $population_uda_2020 + $population_tamaru_2020 + $population_tokida_2020 + $population_shimotokida_2020;
?>
