<?php
return [
    'app_id' => '2017101109250477',
    //  包含http或https内容
    'notify_url' => '',
    //  可选参数RSA,RSA2
    'sign_type' => 'RSA2',
    //  应用私钥文件路径（绝对路径）
    'rsa_private_key_file_path' => '',
    //  未配置私钥文件时，使用该配置（请注意，请填入单行字符串，删除相关换行和-----BEGIN RSA PRIVATE KEY-----内容）
    'rsa_private_key' => '',
    //  服务商商配置
    'is_agent' => true,
    'agent' => [
        //  服务商商PID
        'sys_service_provider_id' => ''
    ],
];