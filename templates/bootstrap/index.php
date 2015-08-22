<?php
/**
 * User: Paul
 * Date: 29/05/14
 * Time: 17:59
 */
$params = array(
    'view_params' => array(
        'template_engine' => 'twig',
        'template_params' => array(
            'template_dir' => 'bootstrap',
            'template_file' => 'index.twig',
            'params' => array()
        )
    )
);
$input_format = 'direct';
$output_format = 'template';
$children_controllers = array();

$ControllerIndex = new ControllerIndex($params, $input_format, $output_format, $children_controllers);
$ControllerIndex->run();