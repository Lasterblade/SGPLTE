<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter Array Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		EllisLab Dev Team
 * @link		http://codeigniter.com/user_guide/helpers/array_helper.html
 */

// ------------------------------------------------------------------------

//helper cep
if ( ! function_exists('buscar_endereco'))
{
	function buscar_endereco($cep)
	{

        $cep = str_replace('.', '', $cep);
        $cep = str_replace('-', '', $cep);

        $url = 'http://republicavirtual.com.br/web_cep.php?cep='.urlencode($cep).'&formato=query_string';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_POST, 0);

        $resultado = curl_exec($ch);
        curl_close($ch);

        if( ! $resultado)
            $resultado = "&resultado=0&resultado_txt=erro+ao+buscar+cep";

        $resultado = urldecode($resultado);
        $resultado = utf8_encode($resultado);
        parse_str( $resultado, $retorno);

        return json_encode($retorno);

	}
}

?>