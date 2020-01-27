<?php
return [
//    'app_id' => '2017101809370929',
    'app_id' => '2017101109250477',
    //  包含http或https内容
    'notify_url' => 'https://www.juli_jianzhan.com',
    //  可选参数RSA,RSA2
//    'sign_type' => 'RSA2',
    'sign_type' => 'RSA2',
    //  应用私钥文件路径（绝对路径）
    'rsa_private_key_file_path' => '',
    //  未配置私钥文件时，使用该配置（请注意，请填入单行字符串，删除相关换行和-----BEGIN RSA PRIVATE KEY-----内容）
//    'rsa_private_key' => 'MIICWwIBAAKBgQDhAFnqwow1urIg6f0Yu9HY7DBDv7j0YI1NZ7RUAx/ICwAM3NeLckBayT0AeZ+i+yTMVfBjQrPda+0xrz5SNs8d5rOtDLJ5sheYGvj8jeE8fED4Qw4BQM5lRQKfEVMnoEVXaz3NuTPjBJjmvMOrbKHIMIv+m3tPrKTR17EQbUJDdQIDAQABAoGAZoMFdJsszHICJFLXWISCKGX723Inb1fqKSEdnMVLnpW8cR/RKJxmS7ayD1xaaiQocNyayG6kijZY/DEOoOCN3gOcrKEELlGAUsqaEmk9ysrWhQoXMMp2+/uOGYh/c0aVctqZsFwoRMBMIBkmkAqm/FeUlj8TAfxIwZJDjgOP/oUCQQD+/nF1ivxa7UDYK3SKpJ9WqKd3K305rrtg21wJ+M9XCEumEFEhPtA2/RPkxX3Ly5dDfloZMhjgXbgX0EAFvWqvAkEA4eOdMf7hzOj9eoHEGj8kjai1nfiYBkSsEqfxU1LwbvTK0OSnb/S5A+gS9qnl1uSnphTWXhPO85/Uj2bcQrztGwJAdDQsLG7cNeutA1Y6U/xViL5vIsW02ZahWbBdr0Wt53GmV9VTw5zGcmi+qiC+BSOQmXd5Q8YqxASxoliK9JKvjQJASmXeM0ZAdm3SdpPg08gyMNn9H09uOrpJdkeMCyaI+/JyDkURBKW0fh3kiQtCIPnkYaYBSLD7e3AL4UM+jliNOwJAa/oVwTMg/dHfhjeHTjR7g7RWurgWYHn3Wex/2G41V5JQ31s52E7GeNYZU+Nec0f5mern3inEdu291H37lsMQJg==',
    'rsa_private_key' => 'MIIEowIBAAKCAQEAx38HxZ1I/COXONRnsOjQ8EuVq5a+MNDgSKeWflJ1OTFnnZTyOdaMU8QXLnxbouR8tO3Q/SosW08rqMq56UwJ3AUY3ynrP76AW5MBPJ7OcmOipvPF+Tj4/uHAvWVrNWcBEHydeRtVg71EYWwWqW0KlL2V/3JIDFxAh1xFmDxzJtQZAKS+YyjMlyA+tIRNPBWYutx524rXfvtI01caojmdYlBzZwDkd0RHKNPnITGfG8T1Ep1pR8TCX6gv4Ookf0Eb8OAaYpcE49tijVpN8Enqy5hAUgyX6laa7q5C0DLEFCUB1sc1+NV58p9NREqXfK2ZLc/jkgRgDFV/GSOc0MK3qQIDAQABAoIBACru06VbrBFXN3wregVAlXahTZyX3GZ1DU+VgXW+GSwtzbbEDz0TRy/fy31dlfsAYTYu2AMjyFf+Oc8hkdD7ZEPNdQTR6KbXQJh0kpeRNay4dJCpdbmk4TE5NFmOMfxUJo59wwYFM+oeGVE+CcJ8jQJlqppG5eqDEAARg4i3ubBpI4CQjRw+7buf35XA2DKfqL96ClX9K3EamgBvcLxy06mVF/m7Pi78INK5+8zz8nDWfxXlYdq4JLcrP31p400VDWakE9gLXW1y76qtl2kvD2nU+bmnLVJNB/F/rPv5A5negL6u/ED6tQWRclA9O2ZLGHZkGG2jbFFlX4ayI7k4/mECgYEA6uXeOtIa6VSwFo/72Od73IGayYY999x0Pcat1BbQCNWxy+NMpEJINCWGWz1hEvkQCsDy1SHm4Mn+4OoILv/ewprUstSqEviacR1oCdrZmoHMWJTicnVQPIxKEvJV0wRiboIWwYZjk+z1MLAFzi6NxCYI1eykgDDddAfjq+9kQ9MCgYEA2WsAWTlrzP8bAdnjiVKR+mNQ5xNioO/QK8+l6h9QT+55vlVTG91iA1nwyS/DMwlsdVj9pEOZEDVjx1Q5y9eEt8yBtADxozO0lIxPvcoaoXFbvadeAPu7+2E8kq+5Onvmr0L6mjOW0UCld5foOTIgb4DxVHm+FAtbRodF2bs9NRMCgYBcjvdidifkiVpZiaLTdWN5IBi+EAebA2NKdF9KkzKmSI4mqQoqL3QEGEU47paxwzJvClilYxZ2vSGRvqY63tgIFrp5PRNHJm6048F7IKFeIIdE4GXadB+JvD3z+UmYPMIMiXYuC6ZxQ43aAYJIHFAAWnxgzz6CxL5+Wh18QnhfwQKBgHqDw0SECO0Ra+SVJZTCRKQ1xucPk2pg+ItXjYTqdFU2asAIULbI/2woCHk2QubFjqpppTQlK2Fo1HsESTVGkvEHeqc2SPPQNRfoIR8vfeYvfKTYZS5krD8xQfLetp/wJcPpGFJAc+IibZuArElep8xtepBBsgyVga+ylnfk/M6lAoGBAOjxGNuEXGe2j+Uq42IapsIFUmYAyEBdDEmXFxnV+Gl0MRbSpCrQPp+ywyR8MhMIyObHQcQwjTllaCzB5zZnpz+4YJDjxmLlHI2CVbjzeHC7zxs6cnhgNlBmh+aZeJNDup2LAofmM9RnIOtuJshrJyQtQX8fZ8TYS630NJ7Vxguo',
    //  服务商商配置
    'is_agent' => true,
    'agent' => [
        //  服务商商PID
        'sys_service_provider_id' => '2088821214422587'
    ],
];