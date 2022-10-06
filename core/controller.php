<?php
defined('APP_PATH') OR exit('No direct script access allowed');

class controller extends app
{
	public function view($file,$data = null,$layout = '')
	{
		ob_start();
		includeFile($file,'view');
		$output = ob_get_contents();
		ob_end_clean();

		if($layout != '')
		{
			ob_start();
			includeFile($layout,'view');
			$output_layout = ob_get_contents();
			ob_end_clean();	

			preg_match_all('/\@include\([a-z0-9]+\)/', $output, $output_array);

			foreach($output_array[0] as $value)
			{
				$exp = explode($value,$output);
				$content = $exp[1];
				$exp = explode('(',$value);
				$exp = explode(')',$exp[1]);
				$id = $exp[0];
				$exp = explode('@end_include('.$id.')',$content);
				$content = $exp[0];
				//$content = str_replace('@end_include('.$id.')','',$content);

				$output_layout = str_replace('@field('.$id.')', $content,$output_layout);
			}

			echo $output_layout;
		}
		else
		{
			echo $output;
		}
	}
}