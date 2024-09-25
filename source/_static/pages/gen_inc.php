<?php
global $urls;
$urls = array(
	'HuggingFace' => 'https://huggingface.co/',
	'HuggingFace_OpenAI' => 'https://huggingface.co/openai',
	'HuggingFace_stabilityai' => 'https://huggingface.co/stabilityai',
	'HuggingFace_ControlNet' => 'https://huggingface.co/lllyasviel',

	// GH
	'GitHub' => 'https://github.com/',
	'GitHub_OpenAI' => 'https://github.com/openai',
	'GitHub_CompVis_Stable_Diffusion' => 'https://github.com/CompVis/stable-diffusion',
	'GitHub_AUTOMATIC1111_stable_diffusion_webui' => 'https://github.com/AUTOMATIC1111/stable-diffusion-webui',

	//
	'Pytorch' => 'https://pytorch.org/',
	'Pytorch_Doc_EN' => 'https://pytorch.org/docs/stable/index.html',
	'Pytorch_Doc_CN' => 'https://pytorch.apachecn.org',
	'Pytorch_Doc_CN2' => 'https://pytorch.ac.cn/tutorials/beginner/basics/intro.html',
//
	'civitai' => 'https://civitai.com/',
	'OpenAI' => 'https://openai.com/',
	
	
	'HF非官方镜像' => 'http://hf-mirror.com',
);


ksort($urls);
print_r($urls);

function get_url($name,$url_key=""){
	global $urls;
	if($url_key == ""){
		$url_key  = $name;
	}
	return '<a href="'.$urls[$url_key].'" target="_blank">'.$name.'</a>';
} 

$hf_li = "<ul>";
$hf_li .= '<li>'.get_url('OpenAI',"HuggingFace_OpenAI").'</li>';
$hf_li .= '<li>StableDiffusion:'.get_url('stabilityai',"HuggingFace_stabilityai").get_url("ControlNet","HuggingFace_ControlNet").'</li>';

$hf_li .= "</ul>";


$gh_li = "<ul>";
$gh_li .= '<li>'.get_url("OpenAI","GitHub_OpenAI").'</li>';

$gh_li .= '<li>StableDiffusion:'.get_url("CompVis/Stable_Diffusion","GitHub_CompVis_Stable_Diffusion").get_url("AUTOMATIC1111/Stable_Diffusion_WebUI","GitHub_AUTOMATIC1111_stable_diffusion_webui").'</li>';

$gh_li .= "</ul>";


$misc_li = "<ul>";
$misc_li .= '<li>'.get_url("OpenAI","OpenAI").get_url("civitai.com","civitai").get_url("HF非官方镜像").'</li>';
$misc_li .= '<li>Pytorch 文档:'.get_url("English","Pytorch_Doc_EN").get_url("中文","Pytorch_Doc_CN2").'</li>';

$misc_li .= "</ul>";


$tbl = '<table class="table_fluid"><tr><th>'.get_url("HuggingFace").'</th><th>'.get_url("GitHub").'</th><th>其他</th></tr>';

$tbl .='<tr>';

$tbl .='<td>';
$tbl .=$hf_li;
$tbl .='</td>';

// col: github
$tbl .='<td>';
$tbl .= $gh_li;
$tbl .='</td>';

// col: misc
$tbl .='<td>';
$tbl .= $misc_li;
$tbl .='</td>';

$tbl .='</tr>';


$tbl .= '</table>';


$css = '<link rel="stylesheet" type="text/css" href="/_static/pages/inc_style.css">';
$data_links = $css.$tbl;
file_put_contents("inc_links.html", $data_links);

$data_models = 'models';
file_put_contents("inc_models.html", $data_models);

echo '====='.date('Y-m-d H:i:s').'=====';

?>



