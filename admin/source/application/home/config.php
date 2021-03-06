<?php
return [
    'session'                => [
        'prefix'         => 'think',
        'type'           => '',
        'auto_start'     => true,
    ],
  // 定义一个常量超级管理员
  'SUPER_ADMIN'    => '10001',
  'AK' => 'kPQjg4MH5PsHU11fOTI217G2VgpO2wie',
  'template'            => [
    // layout布局
    'layout_on'    => true,
    'layout_name'  => 'layouts/header',
    // 模板引擎类型 支持 php think 支持扩展
    'type'         => 'think',
    // 模板路径
    'view_path'    => '',
    // 模板后缀
    'view_suffix'  => 'php',
    // 模板文件名分隔符
    'view_depr'    => DS,
    // 模板引擎普通标签开始标记
    'tpl_begin'    => '{{',
    // 模板引擎普通标签结束标记
    'tpl_end'      => '}}',
    // 标签库标签开始标记
    'taglib_begin' => '{{',
    // 标签库标签结束标记
    'taglib_end'   => '}}',
  // 模板引擎普通标签开始标记
//    'tpl_begin'    => '{',
//    // 模板引擎普通标签结束标记
//    'tpl_end'      => '}',
//    // 标签库标签开始标记
//    'taglib_begin' => '{',
//    // 标签库标签结束标记
//    'taglib_end'   => '}',
  ],
];
