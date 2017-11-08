<?php
$i="2017-11-01 19:07:48.642593: W tensorflow/core/platform/cpu_feature_guard.cc:45] The TensorFlow library wasn't compiled to use SSE4.1 instructions, but these are available on your machine and could speed up CPU computations. 2017-11-01 19:07:48.642627: W tensorflow/core/platform/cpu_feature_guard.cc:45] The TensorFlow library wasn't compiled to use SSE4.2 instructions, but these are available on your machine and could speed up CPU computations. 2017-11-01 19:07:48.642636: W tensorflow/core/platform/cpu_feature_guard.cc:45] The TensorFlow library wasn't compiled to use AVX instructions, but these are available on your machine and could speed up CPU computations. 2017-11-01 19:07:48.642643: W tensorflow/core/platform/cpu_feature_guard.cc:45] The TensorFlow library wasn't compiled to use AVX2 instructions, but these are available on your machine and could speed up CPU computations. 2017-11-01 19:07:48.642651: W tensorflow/core/platform/cpu_feature_guard.cc:45] The TensorFlow library wasn't compiled to use FMA instructions, but these are available on your machine and could speed up CPU computations. Baxton-Studio-Vino-Modern-Upholstered-Full-size-Bed-Headboard-P15358380.jpg leather 0.98452 wood 0.00878496 metal 0.00614105 fabric 0.000554322";
$pattern1 = "/(.+\.jpg)/";
#$replacement = "";
#echo preg_replace($pattern, $replacement, $i);
$new=preg_replace($pattern1, "", $i);
$pattern2="/([a-zA-Z]+) ([0-9.]+)/";
preg_match_all($pattern2, $new, $matches);
$c=count($matches[0]);
for ($n=0;$n<$c;$n++){
	echo "<li>".$matches[1][$n]." ".$matches[2][$n]."</li>";
}

#print_r($matches[2]);

?>



